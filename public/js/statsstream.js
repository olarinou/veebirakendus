
function dataRetrival(valik) {	
	if(typeof(EventSource) !== "undefined") {
		var e = document.getElementById("valik");
		var querySetting = e.options[e.selectedIndex].value;
		var source = new EventSource("/data/"+querySetting);
		var newquery = e.options[e.selectedIndex].value;
		source.onmessage = function(event) {
			document.getElementById("result").innerText = event.data;
			e = document.getElementById("valik");
			newquery = e.options[e.selectedIndex].value;			
			if(newquery !== querySetting)
			{				
				break;				
			}			
		};
	}
	else {
		document.getElementById("result").innerText = "Sorry, your browser does not support server-sent events...";
	}
}
