<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	<title>Home Login</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/feathericon.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}"> </head>
	{{-- message toastr --}}
	<link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
	<script src="{{ asset('assets/js/toastr_jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/toastr.min.js') }}"></script>

<body>
	@yield('content')

	<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>