<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    {{--<link rel="stylesheet" type="text/css" href="css/bootswatch.css">--}}

    <title>@yield('title')</title>


    @include('admin.header')
</head>
<body>
@include('admin.sidebar')


@yield('content')

@include('admin.footer')
</body>
</html>




<link rel="shortcut icon" type="image/x-icon" href="{{url('image/3.ico')}}">
