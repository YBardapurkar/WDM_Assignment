function validateForm() {
	var formName = "signup_event_form";
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	var x = document.forms[formName]["firstName"].value;
	if (x == "") {
		alert("First Name is empty");
		return false;
	}

	x = document.forms[formName]["lastName"].value;
	if (x == "") {
		alert("Last Name is empty");
		return false;
	}

	x = document.forms[formName]["email"].value;
	if (x == "") {
		alert("Email is empty");
		return false;
	}
	if(!mailformat.test(x)) {
		alert("Enter valid email address");
		return false;
	}

	x = document.forms[formName]["password"].value;
	if (x == "") {
		alert("Password is empty");
		return false;
	}
}