
function formValidation() {
	var controlReg = /^[a-zA-ZÄÜÕÕöäüõó' ]*$/;
	var whiteReg = /^\s+$/;
	var nimi = document.getElementById("nimi").value;
	var erakond = document.getElementById("erakond").value;
	var piirkond = document.getElementById("piirkond").value;

	if (nimi.match(whiteReg) !== null || erakond.match(whiteReg) !== null || piirkond.match(whiteReg) !== null) {
		alert("Tühikud ei ole lubatud");
		return false;
	}

	if (!controlReg.test(nimi)) {
		alert("Nimi sisaldab lubamatuid tähemärke");
		return false;

	} else if (!controlReg.test(erakond)) {
		alert("Erakond sisaldab lubamatuid tähemärke");
		return false;

	} else {

		if (confirm("Lisada kandidaadiks:\nNimi: " + nimi +
				"\nErakond: " + erakond +
				"\nPiirkond: " + piirkond)) {
			return true;
		} else {
			return false;
		}
	}

}
