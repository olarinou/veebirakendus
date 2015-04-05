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
  		<p>Veebivalimised on loodud aine Veebirakenduste loomine korras</p>
		</div>
	</div>
