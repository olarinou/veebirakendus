var bool = false;

function dataRetrival() {	
	if(typeof(EventSource) !== "undefined") {
		var e = document.getElementById("valik");
		querySetting = e.options[e.selectedIndex].value;
		var source = new EventSource("/data/"+querySetting);		
		source.onmessage = function(event) {
			document.getElementById("result").innerText = event.data;						
			if(bool)
			{				
				break;				
			}			
		};
	}
	else {
		document.getElementById("result").innerText = "Sorry, your browser does not support server-sent events...";
	}
}
