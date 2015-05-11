var myRequest = new XMLHttpRequest();

function dataRetrival() {	
	if(typeof(EventSource) !== "undefined") {	
		//var e = document.getElementById("valik");
		//var querySetting = e.options[e.selectedIndex].value;
		var source = new EventSource("/data/Kandidaat");		
		source.onmessage = function(event) {
			document.getElementById("result").innerHTML = event.data.replace(/IbrRI/g, " b ");						
		};
		 
	}
	else {
		document.getElementById("result").innerText = "Sorry, your browser does not support server-sent events...";
		/*myRequest.open("GET", "/data/Kandidaat", true);
		myRequest.onreadystatechange = responseAjax;
        myRequest.setRequestHeader("Cache-Control", "no-cache");
		myRequest.send(null);*/
	}
}

function responseAjax() {
     if(myRequest.readyState == 4) {
        if(myRequest.status == 200) {
            result = myRequest.responseText;
            alert(result);
            alert("we made it");
        } else {
            alert( " An error has occurred: " + myRequest.statusText);
        }
     }
  }
  
 