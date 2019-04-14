function validateForm() {
	var formName = "event_edit_form";
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	var x = document.forms[formName]["eventName"].value;
	if (x == "") {
		alert("Event Name is empty");
		return false;
	}

	x = document.forms[formName]["eventDate"].value;
	if (x == "") {
		alert("Event Date is empty");
		return false;
	}

	x = document.forms[formName]["eventVenue"].value;
	if (x == "") {
		alert("Event Venue is empty");
		return false;
	}

	x = document.forms[formName]["eventDescription"].value;
	if (x == "") {
		alert("Event Description is empty");
		return false;
	}
}