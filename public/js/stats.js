function statsRetrival() {
	var e = document.getElementById("ala");
	var ala = e.options[e.selectedIndex].value;
	e = document.getElementById("partei");
	var partei = e.options[e.selectedIndex].value;
	e = document.getElementById("lisa");
	var lisa = e.options[e.selectedIndex].value;
    //document.getElementById("result").innerHTML = "test"+ala+partei+lisa;	
	$( "#result" ).load( "data/Kandidaat" );
	
} 