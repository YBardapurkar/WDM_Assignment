<?php
require 'php/validation.php';
?>
<div id="<?php echo 'modal-product-photo-'.$row['id']?>" class="modal">
	<div class="modal-content">
		<span id="<?php echo 'close-modal-'.$row['id']?>" class="close_modal">&times;</span>
		<form id="<?php echo 'add-to-cart-form-'.$row['id']?>" name="add-to-cart-form" class="profile-photo-form" action="php/buy_from_us.controller.php" method="post">
			<div class="column">
				<figure>
					<?php
					if (file_exists($row['imageUrl'])) {
						echo '<img src="'.$row['imageUrl'].'">'; 
					} else {
						echo '<img src="imgsay/user.jpg">';
					}
					?>
					<figcaption></figcaption>
				</figure>
			</div>
			<div class="column">
				<label for="quantity">Quantity</label>
				<input type="hidden" name="productId" value="<?php echo $row['id']?>">
				<input type="number" name="quantity" placeholder="Quantity" value="1">
				<p class="filler-red">Note: some quick example text to build on the card title and make up the bulk of the card's content!</p>
				<input type="submit" name="add_to_cart_submit" value="Add to Cart" class="button-color">
			</div>
		</form>
	</div>
</div>