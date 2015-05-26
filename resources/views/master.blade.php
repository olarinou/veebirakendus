<!doctype html>
<head>	
    <meta charset="utf-8">
	<title>Veebivalimised</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">   
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">	
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('theme.css') }}">
</head>
<body>
	<div class="wrap">
	<div class="nav">
	<div class="container">	
	@if (Auth::check())
		@include('menuloggedin')
	@else    
        @include('menuloggedout')
	@endif	
    </div>
	</div>
	<div class="body">
    <div class="container">
		@yield('main')
    </div>
	</div>
	<div class="footer">
		<div class="container">
  		<p>Veebivalimised on loodud aine Veebirakenduste loomine korras, 
		<a href="http://katolilly.tumblr.com/post/109805392949/">kasutatud planeedipiltide allikas.</a></p>
		</div>
	</div>
	</div>
</body>
</html>	
