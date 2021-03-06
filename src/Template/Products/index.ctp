<!-- File: src/Template/Products/index.ctp -->

<?php
/* Product search and multiple product listing */
?>

<div class="container">

  <div class="jumbotron">

  	<h1>Product list</h1>

  	<hr>

  	<h4>Filter the product list</h4>

		<?php
		/* Search form */
			echo $this->Form->create(null, ['url' => ['controller' => 'Products', 'action' => 'index'], 'type' => 'get']);
  		echo $this->Form->control('search', ['required' => false, 'type' => 'text', 'label' => 'Please type product code or name']);
  		echo $this->Form->button('Search');
      echo $this->Form->button('Reset', ['type' => 'reset', 'style' => 'margin-left:10px', 'onclick' => "window.location.href = '/';return false;"]);
			echo $this->Form->end();
		?>

	<hr>

    <div id="ajax-flash"></div>

  	<?= $this->Flash->render(); ?>

    <div class="row">

      <h5 class="pull-right">Please sort the product listing by column by clicking the column title</h5>

    	<table class="table table-striped">
            <thead>
              <tr>
                <th><?= $this->Paginator->sort('id', 'Code', ['direction' => 'desc']) ?></th>
                <th><?= $this->Paginator->sort('title', 'Name') ?></th>
                <th><?= $this->Paginator->sort('sex', 'Sex') ?></th>
                <th><?= $this->Paginator->sort('age_years', 'Age') ?></th>
                <th><?= $this->Paginator->sort('weight_kg', 'Weigth') ?></th>
                <th><?= $this->Paginator->sort('length_cm', 'Length') ?></th>
                <th><?= $this->Paginator->sort('price_eur', 'Price per item') ?></th>
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
	                		<td><?= h($this->Number->precision($product->age_years, 1)) ?> years</td>
	                		<td><?= h($this->Number->precision($product->weight_kg, 1)) ?> kg</td>
	                		<td><?= h($product->length_cm) ?> cm</td>
                      <td><?= h($this->Number->precision($product->price_eur, 2)) ?> €</td>
	                		<td>
	                			<a href="/products/view/<?= h($product->slug) ?>" class="btn btn-sm btn-info" role="button">View</a>
	                			<button type="button" class="btn btn-sm btn-primary" onclick="addToCart('<?= h($product->id) ?>', '<?= h($product->title) ?>')">Add to cart</button>
	                		</td>
                		</tr>
        		<?php
                	}
        		?>
            </tbody>
          </table>

          <div class="pull-right">
            <button style="display:block" type="button" class="btn btn-success" onclick="window.location.href = '/carts'; return false;">Show the cart</button>
              <ul class="pagination">
                <?= $this->Paginator->first('<< '.('first')) ?>
                <?= $this->Paginator->prev('< '.('previous')) ?>
                <?= $this->Paginator->next(('next').' >') ?>
                <?= $this->Paginator->last(('last').' >>') ?>
              </ul>

              <?= $this->Paginator->numbers() ?>

          <h4><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} of {{count}} products')]) ?></div>

        </p>
        
	</div>
 
  </div>

</div>

<?php
	/* Add to cart form must be here in order to generate csrf token for making ajax requests valid */
	echo $this->Form->create(null, ['url' => ['controller' => 'Carts', 'action' => 'add'], 'type' => 'put']);
	echo $this->Form->end();
?>