function statsRetrival(str) {
	var e = document.getElementById("ala");
	var ala = e.options[e.selectedIndex].value;
	e = document.getElementById("partei");
	var partei = e.options[e.selectedIndex].value;
	e = document.getElementById("lisa");
	var lisa = e.options[e.selectedIndex].value;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("result").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","/data/"+ala+partei+lisa,true);
        xmlhttp.send();
    	
} 