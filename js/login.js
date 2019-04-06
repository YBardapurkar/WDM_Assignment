function validateForm() {
	var formName = "login_form";
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	var x = document.forms[formName]["email"].value;
	if (x == "") {
		alert("Email is empty");
		return false;
	}
	if(!(x.match(mailformat))) {
		alert("Enter valid email address");
		return false;
	}

	x = document.forms[formName]["password"].value;
	if (x == "") {
		alert("Password is empty");
		return false;
	}
}