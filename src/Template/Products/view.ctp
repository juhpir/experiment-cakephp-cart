<!-- File: src/Template/Articles/view.ctp -->

<?php
/* Single product view */
?>

<div class="container">

  <div class="jumbotron">
    <div class="row">
        <div class="col-md-4">
        	<img data-src="holder.js/200x200" class="img-thumbnail" alt="A generic square placeholder image with a white border around it, making it resemble a photograph taken with an old instant camera">
        	<!-- <?= h($product->photo_url) ?>  -->
        </div>
        <div class="col-md-8">
        	<h1><?= h($product->title) ?></h1>
        	<p><?= h($product->body) ?></p>

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
        
          <div class="cart-clear-both">
	          <h2 class="text-primary"><?= $this->Number->format($product->price_eur) ?> €</h2>
	          <button type="button" class="btn btn-lg btn-primary">Add to cart</button>
      	  </div>

        </div>
	</div>
  </div>


</div>
</div>
</div>
