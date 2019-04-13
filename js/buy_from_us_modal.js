var modal = document.getElementById('modal-product-photo');
var btn = document.getElementById("modal-product-button");
var span = document.getElementsByClassName("close")[0];

function closeModal() {
	// var form = document.getElementById('profile-photo-form');
	// form.reset();
	modal.style.display = "none";
	image.src = oldImage;
}

btn.onclick = function() {
	modal.style.display = "block";
}

span.onclick = function() {
	closeModal();
}

window.onclick = function(event) {
	if (event.target == modal) {
		closeModal();
	}
}

var fileInput = document.getElementById('newProfilePic');
function test() {
	var file = fileInput.files[0];
	var reader  = new FileReader();
	reader.onload = function(e)  {
		image.src = e.target.result;
		image.height = 200;
		image.width = 200;
	}
	reader.readAsDataURL(file);
}