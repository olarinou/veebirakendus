

function dataRetrival() {	
	if(typeof(EventSource) !== "undefined") {	
		var e = document.getElementById("valik");
		var querySetting = e.options[e.selectedIndex].value;
		var source = new EventSource("/data/"+querySetting);		
		source.onmessage = function(event) {
			document.getElementById("result").innerText = event.data;
			source.close();	
			e = document.getElementById("valik");
			querySetting = e.options[e.selectedIndex].value;
			source = new EventSource("/data/"+querySetting);
			source.open();	
		};
		
		 
	}
	else {
		document.getElementById("result").innerText = "Sorry, your browser does not support server-sent events...";
	}
}
