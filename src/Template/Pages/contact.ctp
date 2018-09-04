<!-- File: src/Template/Products/view.ctp -->

<?php
/* Single product view */
?>

<div class="container">
  <div class="jumbotron">
    <div class="row">
        <div class="col-md-4">
        	<img src="/img/contact.jpg" class="img-thumbnail">
        </div>
        <div class="col-md-8">
        	<h1>Contact</h1>
        	<p><strong>A4D-shop</strong></p>
        	<p>Postal address:
        		<br>14 Edward Street
        		<br>Grand Cayman KY1-1100
        		<br>CAYMAN ISLANDS
        	</p>

        	<p>Tel:
        		<br>123-456-789
        	</p>

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