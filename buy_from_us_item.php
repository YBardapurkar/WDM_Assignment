<div class="shop-item-div">
	<div>
		<figure>
			<?php
			echo '<img src="'.$row['imageUrl'].'">';
			?>
			<figcaption></figcaption>
		</figure>
		<?php
		echo '<p>$'.$row['price'].'</p>';
		echo '<p>'.$row['description'].'</p>';
		echo '<button onclick="openModal(\'modal-product-photo-'.$row['id'].'\')">Add To Cart</button>';
		?>
	</div>
</div>