<!DOCTYPE html>
<html lang="en"  style="font-family: Segoe UI, Helvetica, Arial, sans-serif">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senthan Software Engineer</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body style="background: #222 url(../images/bg-body.png)">


	<div style="margin: 50px">
		<div class="container" style="max-width: 1060px; background-color: #fff;">
			@yield('content')
		</div>
	</div>


	<script type="text/javascript" src="{{  asset('components/jquery/dist/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{  asset('components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

	<noscript>
    <a href="http://www.boldchat.com" title="Visitor Monitoring" target="_blank"><img alt="Visitor Monitoring" src="https://vms.boldchat.com/aid/432858954879854351/bc.vmi?wdid=3125219906087627409&amp;vr=&amp;vn=&amp;vi=&amp;ve=&amp;vp=&amp;curl=" border="0" width="1" height="1" /></a>
</noscript>
<!-- /BoldChat Visitor Monitor HTML v5.00 -->

</body>
</html>