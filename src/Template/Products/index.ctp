<!-- File: src/Template/Articles/index.ctp -->

<?php
/* Product search and multiple product listing */
?>

<div class="container">

  <div class="jumbotron">

  	<h1>A4D-shop</h1>
  	<h3>Have an Animal For a Day</h3>
  	<p>It is now so easy and <em>surprising</em>: just add your favourite animals to a cart, make your order and they will come for a day, when they want.</p>

  	<hr>

  	<h3>Filter the product list</h3>

		<?php
		/* Search form */
			echo $this->Form->create(null, ['url' => ['controller' => 'Products', 'action' => 'index'], 'type' => 'get']);
  			echo $this->Form->control('search', ['required' => false, 'type' => 'text', 'label' => 'Please type product code or name']);
  			echo $this->Form->button('Search');
			echo $this->Form->end();
		?>

	<hr>

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
	                			<a href="/products/view/<?= h($product->slug) ?>" class="btn btn-sm btn-info" role="button">View</a>
	                			<button type="button" class="btn btn-sm btn-primary" onclick="addToCart(<?= h($product->id) ?>)">Add to cart</button>
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

<?php
	/* Add to cart form must be here in order to generate csrf token for making ajax requests valid */
	echo $this->Form->create(null, ['url' => ['controller' => 'Carts', 'action' => 'add'], 'type' => 'put']);
	echo $this->Form->end();
?>