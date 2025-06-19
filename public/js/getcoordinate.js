
function getLocation() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition);
		// navigator.geolocation.getCurrentPosition(initialize);
	} else {
		alert("Yah browsernya ngga support Geolocation bro!");
	}
}

function showPosition(position) {
	alert(position.coords.latitude+' dan '+position.coords.longitude);
	// initialize(position.coords.latitude,position.coords.longitude);

}

