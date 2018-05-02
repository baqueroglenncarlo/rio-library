<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/global.css')}}">
	<script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</head>
<body class="bg-light">
	@include('nav.nav')
	@include('modal.login')
	@include('modal.section')
	@include('modal.error_popup')
	@include('modal.success_popup')

@if(!Auth::check())
<script type="text/javascript">
	$(document).ready(function(){
		$('#login_modal').modal('show');

		$('#login_modal').modal({
			backdrop:'static',
			keyboard:false
		});
	});
</script>
@endif

</body>
</html>