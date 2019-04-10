<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Receipt</title>
    
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
    <!------ Include the above in your HEAD tag ---------->
    <script type="text/javascript">
        window.onload = function() { window.print(); }
    </script>
</head>
<body>   

<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            
            <div class="row">

                <div class="text-center">
                    <h1 onclick="print();">संकल्प पत्र</h1>                    
                </div>
                
                <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>पूरा नाम</th>
                                <th>पता</th>
                                <th>शहर नाम</th>
                                <th>प्रदेश</th>
                                <th>पिन कोड</th>
                                <th>संपर्क मोबाइल नंबर</th>                                
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">{{ $data->name }}</td>
                                    <td scope="row">{{ $data->address }}</td>
                                    <td scope="row">{{ $data->city }}</td>
                                    <td scope="row">{{ $data->state }}</td>
                                    <td scope="row">{{ $data->zip }}</td>
                                    <td scope="row">+91-{{ $data->contact }}</td>
                                </tr>
                            </tbody>
                    </table>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>दान का विवरण</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>दिनांक</th>
                            <th>प्रतिमाह</th>
                            <th class="text-center">
टोटल</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        <tr>    
                            <td>   </td>
                            <td>{{ date('d-M-Y', strtotime($data->date)) }}</td>                       
                            <td class="text-left">
                               ₹ {{ $data->amount }}
                            </td>                            
                            <td class="text-center text-danger">                                
                                    <strong>₹  {{ $data->amount }}</strong>                                
                            </td>                           
                        </tr>
                        
                        <tr>
                            <td colspan="4">
                                <small>
                                    All donation are accepted & utilised strictly as per Digambar jain sect.
                                    For any query regarding donation kindly contact: +91-9827013929 / 9425152426 / 9425153249 / 9131188440.
                                </small>
                        </td>
                        </tr>
                    </tbody>
                </table>
                
                {{-- <button type="button" class="btn btn-success btn-lg btn-block" onclick="print();">
                    Print   <span class="glyphicon glyphicon-print"></span>
                </button> --}}
            
            </div>
        </div>
    </div>
</body>
</html>