function validateForm() {
	var formName = "business_edit_form";

	var x = document.forms[formName]["businessName"].value;
	if (x == "") {
		alert("Business Name is empty");
		return false;
	}

	x = document.forms[formName]["businessDescription"].value;
	if (x == "") {
		alert("Business Description is empty");
		return false;
	}
}