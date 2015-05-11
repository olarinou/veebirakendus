function statsRetrival() {
	var e = document.getElementById("ala");
	var ala = e.options[e.selectedIndex].value;
	e = document.getElementById("partei");
	var partei = e.options[e.selectedIndex].value;
	e = document.getElementById("lisa");
	var lisa = e.options[e.selectedIndex].value;
    //document.getElementById("result").innerHTML = "test"+ala+partei+lisa;	
	xmlhttp.open("GET","/data2/Harju/Merkuur/kandidaat",false);
    xmlhttp.send();
	document.getElementById("result").innerHTML=xmlhttp.responseText;
	
} 