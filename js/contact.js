function validateForm() {
	var formName = "contact_form";
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var phoneformat = /^\(?([2-9][0-8][0-9])\)?\W{0,1}([2-9][0-9]{2})\W{0,1}([0-9]{4})$/;

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

	x = document.forms[formName]["phone"].value;
	if(!phoneformat.test(x)) {
		alert("Enter valid phone");
		return false;
	}

	x = document.forms[formName]["message"].value;
	if (x == "") {
		alert("No message found");
		return false;
	}
	return true;
}