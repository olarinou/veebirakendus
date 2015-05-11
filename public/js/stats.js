function statsRetrival() {
	var e = document.getElementById("ala");
	var ala = e.options[e.selectedIndex].value;
	e = document.getElementById("partei");
	var partei = e.options[e.selectedIndex].value;
	e = document.getElementById("lisa");
	var lisa = e.options[e.selectedIndex].value;
    //document.getElementById("result").innerHTML = "test"+ala+partei+lisa;
	myRequest.open("GET", "/data/Kandidaat", true);
	myRequest.onreadystatechange = responseAjax;
    myRequest.setRequestHeader("Cache-Control", "no-cache");
	myRequest.send(null);
	/*	
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
        xmlhttp.open("GET","/data2/Harju/Merkuur/kandidaat",true);
        xmlhttp.send();
    }/*
	
} 