var modal = document.getElementById('modal-new-profile-photo');
var btn = document.getElementById("profile-photo-change-button");
var span = document.getElementsByClassName("close")[0];

var fileInput = document.getElementById('newProfilePic');
var image = document.getElementById('newProfilePicImage');
var oldImage = image.src;

function closeModal() {
	var form = document.getElementById('profile-photo-form');
	form.reset();
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

fileInput.onchange = function(){
	test();
}