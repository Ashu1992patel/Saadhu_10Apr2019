<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>साधु</title>
    
   <link rel="stylesheet" type="text/css" href="css/bootswatch.css">

</head>
<body>
 
 <!-- Navigation Bar Start -->
 
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      {{-- <a class="navbar-brand" href="{{ url('index') }}">साधु</a> --}}
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        {{-- <li class="active"><a href="{{ url('index') }}">Home <span class="sr-only">(current)</span></a></li> --}}
        <li class="active"><a href="{{ url('donation') }}">Donate</a></li>

        {{-- <li class="active"><a href="{{ url('donor') }}">Donor List</a></li> --}}
      @if(session('admin')->role != 'user')
          <li class="active"><a href="{{ url('donors') }}">Donor List</a></li>
      @endif
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li ><a href="#">{{ session('admin')->role }}</a></li>
        <li class="active"><a href="{{ url('logout') }}">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
 <!-- Navigation bar End -->
</body>
</html>