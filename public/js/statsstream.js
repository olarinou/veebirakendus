
function dataRetrival(valik) {	
	if(typeof(EventSource) !== "undefined") {
		var e = document.getElementById("valik");
		querySetting = e.options[e.selectedIndex].value;
		var source = new EventSource("/data/"+querySetting);
		source.onmessage = function(event) {
			document.getElementById("result").innerText = event.data;
			e = document.getElementById("valik");
			querySetting = e.options[e.selectedIndex].value;
			source=EventSource("/data/"+querySetting);	
		};
	}
	else {
		document.getElementById("result").innerText = "Sorry, your browser does not support server-sent events...";
	}
}
