@extends('master') 
@section('main')
	<div class="container">		
	<div id="result"></div>

	<script>
	if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("/data");
    source.onmessage = function(event) {
        document.getElementById("result").innerHTML = event.data;
    };
	} else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
	}
	</script>
    <!--<div id="perf_div"></div>
   {!! $lava->render('PieChart', 'Info', 'perf_div') !!}-->
	</div>
@stop
