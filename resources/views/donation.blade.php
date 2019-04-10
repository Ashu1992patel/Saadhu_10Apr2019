@extends('master.master')
@section('title','Donation | Donate')
@section('content')

    <div class="container">
        <form action="donate" method="post" target="_blank">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="contact">Contact Number</label>
                        <input type="text"
                               class="form-control required"
                               id="contact"
                               name="contact" required
                               minlength="10"
                               maxlength="12"
                               placeholder="Enter Mobile Number">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="name">Full Name</label>
                        <input class="form-control" id="name" name="name" type="text" autofocus required
                               placeholder="Enter Full Name">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Contribution Amount</label>
                        <div class="input-group">
                            <span class="input-group-addon">₹</span>
                            <select name="amount1" id="amount1" class="form-control">
                                <option value="1000">1000</option>
                                <option value="2000">2000</option>
                                <option value="5000">5000</option>
                                <option value="10000">10000</option>
                            </select>
                            <span class="input-group-btn">
                        <button class="btn btn-default" type="button" disabled>for 108 Month</button>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <legend>Address</legend>
                    <div class="col-sm-6">
                        <label for="address" class="control-label">Address</label>
                        <input type="text" id="address" name="address" class="form-control"
                               placeholder="e.g. House Number / Area">
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label" for="zip">Zip / Postal Code</label>
                        <input type="number" id="zip" name="zip" class="form-control" placeholder="e.g. 482003">
                    </div>

                    <div class="col-sm-6">
                        <label class="control-label" for="state">State / Province / Region</label>
                        <select name="state" id="state" class="form-control" onchange="changeState();">
                            <option value="0">--Select State--</option>
                            @foreach ($state as $item)
                                <option>{{ $item->state_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label class="control-label" for="city">City / Town</label>
                        <select name="city" id="city" class="form-control">
                            <option value="0">--Select City--</option>
                        </select>
                        <small id="note" name="note">City automatically will reflect once state is selected.</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <button type="reset" class="btn btn-danger btn-lg">Reset</button>
                    <button type="submit" class="btn btn-success btn-lg">Save</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        function changeState() {
            var state = document.getElementById('state').value;
            // alert(state) ;
            $.get('{{ url('selectCity') }}', {
                state: state
            }, function (data) {
                console.log(data);
                $('#city').html(data);
                $('#note').hide();
            });
        }
    </script>

@stop