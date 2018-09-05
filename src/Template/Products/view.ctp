<!-- File: src/Template/Products/view.ctp -->

<?php
/* Single product view */
?>

<div class="container">
  <div class="jumbotron">
    <div class="row">
        <div class="col-md-4">
        	<?php
        	if (empty($product->photo_url)) { // dirty fix
        		$product->photo_url = "../img/default.jpg";
        	}
        	?>
        	<img class="product-img" src="/webroot/files/<?= h($product->photo_url) ?>">
        </div>
        <div class="col-md-8">
        	<div class="cart-view-addtocart-wrapper">
	        	<h1><?= h($product->title) ?></h1>
	        	<p><?= h($product->body) ?></p>
        	</div>

        	<div class="col-md-8">
	        	<table class="table table-striped">
	            <tbody>
            	  <tr>
	                <td>Product code</td>
	                <td><?= h($product->id) ?></td>
	              </tr>
	              <tr>
	                <td>Sex</td>
	                <td><?= h($product->sex) ?></td>
	              </tr>
	              <tr>
	                <td>Age</td>
	                <td><?= $this->Number->format($product->age_years) ?> years</td>
	              </tr>
	              <tr>
	                <td>Weight</td>
	                <td><?= $this->Number->format($product->weight_kg) ?> kg</td>
	              </tr>
	              <tr>
	                <td>Length</td>
	                <td><?= $this->Number->format($product->length_cm) ?> cm</td>
	              </tr>
	              <tr>
	                <td>Availability</td>
	                <td>for <?= $this->Number->format($product->in_stock) ?> times</td>
	              </tr>
	            </tbody>
	          	</table>
      		</div>
        
          <div class="cart-view-addtocart-wrapper">
	          <h2 class="text-primary"><strong><?= $this->Number->format($product->price_eur) ?> €</strong></h2>
	          <button type="button" class="btn btn-lg btn-primary" onclick="addToCart('<?= h($product->id) ?>', '<?= h($product->title) ?>'')">Add to cart</button>
      	  </div>

        </div>
	</div>
  </div>

</div>
</div>
</div>

<?php
	/* Add to cart form must be here in order to generate csrf token for making ajax requests valid */
	echo $this->Form->create(null, ['url' => ['controller' => 'Carts', 'action' => 'add'], 'type' => 'put']);
	echo $this->Form->end();
?>