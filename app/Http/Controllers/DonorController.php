<?php

namespace App\Http\Controllers;
use App\DonorModel;
use App\PlanModel;
use App\ZipDetail;
use App\LoginModel;
use Illuminate\Http\Request;


class DonorController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function logout(Request $request)
    {
        $request->session()->forget('admin');
        return redirect('/');
    }
    public function logincheck(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $data = LoginModel::where(['username' => $username , 'password' => $password , 'is_del' => 0])->first();        
        if(isset($data))
        {            
            $da = $request->session()->put('admin', $data);

            $zipd = ZipDetail::distinct()->get();
            $collection = collect($zipd);
            $state1 = $collection->unique('state_name');
            $state = $state1->values()->all();
            $plan = PlanModel::where(['is_active'=>1])->get();
            return view('donation')->with(['state'=>$state, 'admin'=>session('admin'), 'plan'=>$plan]);
        }
        else
        {
            return view('login');
        }
    }
    public function dashboard(Request $request)
    {
            $zipd = ZipDetail::distinct()->get();
            $collection = collect($zipd);
            $state1 = $collection->unique('state_name');
            $state = $state1->values()->all();
            $plan = PlanModel::where(['is_active'=>1])->get();
            return view('dashboard')->with(['state'=>$state, 'plan'=>$plan]);
    }
    public function donor()
    {             
        $zipd = ZipDetail::distinct()->get();
        $plan = PlanModel::where(['is_active'=>1])->get();
        $collection = collect($zipd);
        $state1 = $collection->unique('state_name');
        $state = $state1->values()->all();             
        return view('donation')->with(['state'=>$state, 'plan'=>$plan]);
    }

    public function receipt()
    {
        return view('donation_receipt');
    }
    public function donation()
    {
        $plan = PlanModel::where(['is_active'=>1])->get();
        return view('donation')->with(['plan'=>$plan]);
    }
    public function donate()
    {
        $data = new DonorModel;
        $donorLogin = new UserLoginModel;
        $data->name = request('name');
        $data->contact = request('contact');
        $data->state = request('state');
        $data->city = request('city');
        $data->zip = request('zip');
        $data->address = request('address');
        $data->amount = request('amount1');
        $data->save();

        $donorLogin->contact = request('contact');
        $donorLogin->otp = '123';

        $name  = urlencode("$data->name");
        $msg  = "जय%20जिनेंद्र%20$name,%20आपकी%20सहयोग%20राशि%20₹%20$data->amount%20के%20लिये%20धन्यवाद।";
        // $msg  = "धन्यवाद।";
        // $msg1=str_replace('%u', '',$this->utf8_to_unicode($msg));
        // $msg  = urlencode("Thank you Mr./Mrs. $data->name for your contribution of Rs. $data->amount.");
        file_get_contents("http://login.heightsconsultancy.com/API/WebSMS/Http/v1.0a/index.php?username=vidhyas&password=password&sender=VIDHYA&to=$data->contact&message=$msg&reqid=1&format={json|text}&route_id=113&msgtype=unicode");
                
        // return $data;
        $dt = DonorModel::find($data->id);
        return view('currentReceipt')->with(['data'=>$dt]);
    }

    public function utf8_to_unicode($str) 
    {
        $unicode = array();
        $values = array();
        $lookingFor = 1;
        for ($i = 0; $i < strlen($str); $i++) {
            $thisValue = ord($str[$i]);
            if ($thisValue < 128) {
                $number = dechex($thisValue);
                $unicode[] = (strlen($number) == 1) ? '%u000' . $number : "%u00" . $number;
            } else {
                if (count($values) == 0)
                    $lookingFor = ( $thisValue < 224 ) ? 2 : 3;
                $values[] = $thisValue;
                if (count($values) == $lookingFor) {
                    $number = ( $lookingFor == 3 ) ?
                            ( ( $values[0] % 16 ) * 4096 ) + ( ( $values[1] % 64 ) * 64 ) + ( $values[2] % 64 ) :
                            ( ( $values[0] % 32 ) * 64 ) + ( $values[1] % 64
                            );
                    $number = dechex($number);
                    $unicode[] =
                            (strlen($number) == 3) ? "%u0" . $number : "%u" . $number;
                    $values = array();
                    $lookingFor = 1;
                } // if
            } // if
        }
        return implode("", $unicode);
        }

    public function list1()
    {
        $data = DonorModel::orderBy('id', 'desc')->paginate(10);
        return view('list')->with(['data' => $data]);

    }
    public function donation_receipt($id)
    {
        $data = DonorModel::where('id', $id)->get();
        return view('donation_receipt')->with(['data' => $data]);        
    }

    public function selectCity()
    {
        $state = request('state');
        
        $data = ZipDetail::where(['state_name'=>$state])->get();

        $collection = collect($data);
        $city1 = $collection->unique('city_name');
        // $city1 = $collection->unique('city_name');
        // $zip = $collection->unique('pincode');

        $city = $city1->values()->all();
        return view('dd_city')->with(['city'=>$city]);
    }
}
