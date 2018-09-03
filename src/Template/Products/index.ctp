<!-- File: src/Template/Articles/index.ctp -->

<?php
/* Product search and multiple product listing */
?>

<div class="container">

  <div class="jumbotron">

  	<h1>A4D-shop</h1>
  	<h3>Have an Animal For a Day</h3>
  	<p>It is now so easy and <em>surprising</em>: just add your favourite animals to a cart, make your order and they will come for a day, when they want.</p>

  	<?= $this->Flash->render(); ?>

    <div class="row">

    	<table class="table table-striped">
            <thead>
              <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Sex</th>
                <th>Age</th>
                <th>Weigth</th>
                <th>Length</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            	<?php
            		foreach ($products as $product) {
            			?>

            			<tr>
	                		<td><?= h($product->id) ?></td>
	                		<td><?= h($product->title) ?></td>
	                		<td><?= h($product->sex) ?></td>
	                		<td><?= h($product->age_years) ?> years</td>
	                		<td><?= h($product->weight_kg) ?> kg</td>
	                		<td><?= h($product->length_cm) ?> cm</td>
	                		<td>
	                			<button type="button" class="btn btn-sm btn-info">View</button>
	                			<button type="button" class="btn btn-sm btn-primary">Add to cart</button>
	                		</td>
                		</tr>

            			<?php
            		}
            	?>
            </tbody>
          </table>
        
	</div>
  
  </div>


</div>
