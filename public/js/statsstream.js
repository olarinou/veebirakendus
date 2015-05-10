var querySetting = "Riik";

function dataRetrival() {
	if(typeof(EventSource) !== "undefined") {
		var source = new EventSource("/data"+querySetting);
		source.onmessage = function(event) {
			document.getElementById("result").innerText = event.data;
		};
	}
	else {
		document.getElementById("result").innerText = "Sorry, your browser does not support server-sent events...";
	}
}

function setQuery(value) {
	querySetting = value;
}
