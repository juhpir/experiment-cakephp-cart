<!-- File: src/Template/Carts/index.ctp -->

<?php
/* View the product cart */
?>

<div class="container">

  <div id="ajax-flash"></div>

  <div class="jumbotron">

  	<h1>The shopping cart</h1>

  	<hr>

  	<?= $this->Flash->render(); ?>

  				<?php

                if (!empty($cart)) {

            	?>

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
            		}

            		foreach ($cart as $product) {
    			?>
            			<tr>
	                		<td><?= h($product['id']) ?></td>
	                		<td><?= h($product['title']) ?></td>
	                		<td><div id="cart-price-<?= h($product['id']) ?>" style="display:inline"><?= h($this->Number->precision($product['price'], 2)) ?></div> €</td>
	                		<td><div id="cart-amount-<?= h($product['id']) ?>"><?= h($product['amount']) ?></div></td>
	                		<td><div id="cart-subtotal-<?= h($product['id']) ?>" style="display:inline"><?= h($this->Number->precision($product['subtotalPerProduct'], 2)) ?></div> €</td>
	                		<td>
	                			<a href="/products/view/<?= h($product['slug']) ?>" class="btn btn-sm btn-info" role="button">View</a>
                        <button type="button" class="btn btn-sm btn-primary" onclick="addToCart('<?= h($product['id']) ?>', '<?= h($product['title']) ?>'); updateCartCalculation('<?= h($product['id']) ?>');">Add 1 item more</button>
	                		</td>
                		</tr>
        		<?php
                	}

                if (!empty($cart)) {

            	?>

            	<tr>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td><strong>Total:</strong></td>
                	<td><strong><div id="cart-total" style="display:inline"><?= h($this->Number->precision($total, 2)) ?></div> €</strong></td>
                	<td></td>
               	</tr>

            </tbody>
          </table>

        <div class="col-xs-3 pull-right">
          <button type="button" class="btn btn-danger btn-block" onclick="alert('Cashier feature is not implemented yet');">Buy now</button>
          <button type="button" class="btn btn-warning btn-block" onclick="window.history.go(-1); return false;">Back to previous page</button>
        </div>

    </div>

				<?php

      	    } 
            else {
              ?>
                <button style="max-width: 200px;" type="button" class="btn btn-warning btn-block" onclick="window.history.go(-1); return false;">Back to previous page</button>
              <?php
            }      		

   			?>
 
  </div>

</div>

<?php
	/* Add to cart form must be here in order to generate csrf token for making ajax requests valid */
	echo $this->Form->create(null, ['url' => ['controller' => 'Carts', 'action' => 'add'], 'type' => 'put']);
	echo $this->Form->end();
?>