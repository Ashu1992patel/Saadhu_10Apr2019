@extends('master.master')
@section('title','Donation | Payment')
@section('content')

    <div class="content-wrapper">
        <div class="container">
            <br>
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
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Contribution Plan Amount</label>
                            <div class="input-group">
                                <span class="input-group-addon">₹</span>
                                <select name="plan" id="plan" class="form-control">
                                    @foreach($plan as $plans)
                                        <option value="{{$plans->id}}">{{$plans->amount}}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-btn">
                        <button class="btn btn-default" type="button" disabled>Per Month</button>
                        </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Pay Amount</label>
                            <div class="input-group">
                                <input type="text"
                                       class="form-control required"
                                       id="payment"
                                       name="payment"
                                       required
                                       minlength="3"
                                       maxlength="12"
                                       placeholder="Enter Amount">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <button type="reset" class="btn btn-danger btn-lg">Reset</button>
                        <button type="submit" class="btn btn-success btn-lg">Complete Payment</button>
                    </div>
                </div>
            </form>
        </div>
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