<!-- File: src/Template/Carts/index.ctp -->

<?php
/* View the product cart */
?>

<div class="container">

  <div class="jumbotron">

  	<h1>The shopping cart</h1>
  	<h3>A4D-shop: have an Animal For a Day</h3>
  	<p></p>

  	<hr>

  	<?= $this->Flash->render(); ?>

    <div class="row">

    	<table class="table table-striped">
            <thead>
              <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Price per unit</th>
                <th>Units</th>
                <th>Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            	<?php
            		foreach ($cart as $product) {
    			?>
            			<tr>
	                		<td><?= h($product['id']) ?></td>
	                		<td><?= h($product['title']) ?></td>
	                		<td><?= h($product['price']) ?> €</td>
	                		<td><?= h($product['amount']) ?></td>
	                		<td><?= h($product['subtotalPerProduct']) ?> €</td>
	                		<td>
	                			<a href="/products/view/<?= h($product['slug']) ?>" class="btn btn-sm btn-info" role="button">View</a>
	                		</td>
                		</tr>
        		<?php
                	}
        		?>
       			<tr>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td><strong>Total:</strong></td>
                	<td><strong><?= h($total) ?> €</strong></td>
                	<td></td>
               	</tr>
            </tbody>
          </table>
        
	</div>
 
  </div>

</div>