var modal;
// var closeList = document.getElementsByClassName("close_modal");
var id = 0;

function openModal(modal_id) {
	modal = document.getElementById(modal_id);
	words = modal_id.split('-');
	id = words[words.length - 1];

	modal.style.display = "block";

	var close = document.getElementsById("close-modal-" + id);
	close.onclick = function() {
		closeModal();
	} 
}

// function openModal() {
// 	console.log(modal);
// 	if (modal != null) 
// 		modal.style.display = "block";
// }

function closeModal() {
	var form = document.getElementById('add-to-cart-form-' + id);
	form.reset();
	modal.style.display = "none";
}

// for (var close in closeList) {
// 	close.onclick = function() {
// 		closeModal();
// 	}
// }

window.onclick = function(event) {
	if (event.target == modal) {
		closeModal();
	}
}