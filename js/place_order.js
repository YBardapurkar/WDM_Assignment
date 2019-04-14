function validateForm() {
	var formName = "place_order_form";
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var zipFormat = /^[0-9]{5}$/;

	var x = document.forms[formName]["email"].value;
	if (x == "") {
		alert("Email is empty");
		return false;
	}
	if(!mailformat.test(x)) {
		alert("Enter valid email address");
		return false;
	}

	x = document.forms[formName]["firstName"].value;
	if (x == "") {
		alert("First Name is empty");
		return false;
	}

	x = document.forms[formName]["lastName"].value;
	if (x == "") {
		alert("Last Name is empty");
		return false;
	}

	x = document.forms[formName]["address"].value;
	if (x == "") {
		alert("Address");
		return false;
	}

	x = document.forms[formName]["language"].value;
	if (x == "") {
		alert("Select a Language");
		return false;
	}

	x = document.forms[formName]["city"].value;
	if (x == "") {
		alert("City is empty");
		return false;
	}

	x = document.forms[formName]["state"].value;
	if (x == "") {
		alert("State is empty");
		return false;
	}

	x = document.forms[formName]["zip"].value;
	if (x == "") {
		alert("Postal Code is empty");
		return false;
	}
	if(!zipFormat.test(x)) {
		alert("Enter valid Postal Code");
		return false;
	}
}
