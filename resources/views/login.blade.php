<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Simple Login Form with Blue Background</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	body {
		color: #fff;
		background: #3598dc;
	}
	.form-control {
		min-height: 41px;
		background: #f2f2f2;
		box-shadow: none !important;
		border: transparent;
	}
	.form-control:focus {
		background: #e2e2e2;
	}
	.form-control, .btn {        
        border-radius: 2px;
    }
	.login-form {
		width: 350px;
		margin: 30px auto;
		text-align: center;
	}
	.login-form h2 {
        margin: 10px 0 25px;
    }
    .login-form form {
		color: #7a7a7a;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form .btn {        
        font-size: 16px;
        font-weight: bold;
		background: #3598dc;
		border: none;
        outline: none !important;
    }
	.login-form .btn:hover, .login-form .btn:focus {
		background: #2389cd;
	}
	.login-form a {
		color: #fff;
		text-decoration: underline;
	}
	.login-form a:hover {
		text-decoration: none;
	}
	.login-form form a {
		color: #7a7a7a;
		text-decoration: none;
	}
	.login-form form a:hover {
		text-decoration: underline;
	}
</style>
</head>
<body>
<div class="login-form">
	<form action="{{ url('dashboard') }}" method="post">
		@csrf
        <h2 class="text-center">Login</h2>
        <div class="form-group has-error">
        	<input type="text" class="form-control" name="username" id="username" placeholder="Username / Mobile Number" required="required">
        </div>
		<div class="form-group" id="pwd">
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
        </div>

        <div class="form-group" id="ot">
            <input type="password" class="form-control" name="otp" id="otp" placeholder="Enter 6 digits OTP received">
        </div>
        <div class="form-group" id="sub">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
        </div>
        <div class="form-group" id="subotp">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit OTP</button>
        </div>
        <p><a href="#" id="linkotp" onclick="otpFun();">Login with OTP</a></p>
        <p><a href="#" id="linkpwd" onclick="pwdFun();">Login with Password</a></p>
{{--        <p><a href="#">Lost your Password?</a></p>--}}
    </form>
    <p class="text-center small">Don't have an account? <a href="#">Sign up here!</a></p>
</div>
</body>
<script>
    $(function()
    {
        $('#pwd').show();
        $('#sub').show();
        $('#linkpwd').hide();
        $('#ot').hide();
        $('#subotp').hide();
    });
    function otpFun()
    {
        $('#pwd').hide();
        $('#sub').hide();
        $('#ot').show();
        $('#linkotp').hide();
        $('#linkpwd').show();
        $('#subotp').show();
    }
    function pwdFun()
    {
        $('#pwd').show();
        $('#sub').show();
        $('#linkotp').show();
        $('#linkpwd').hide();
        $('#ot').hide();
        $('#subotp').hide();
    }
</script>
</html>                            