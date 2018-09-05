<!-- File: src/Template/Products/add.ctp -->

<div class="container">

  <div class="jumbotron">

  	<h1>Add a new product</h1>
  	<p><span class="text-danger">*</span> = required fields</p>

		<?= $this->Form->create($product, ['type' => 'file']) ?>
	
	<table class="table table-striped">

		<tbody>
			<tr>
				<td>
					<?= $this->Form->control('title') ?>
				</td>
				<td>
					<h2 class="text-danger">*</h2>
				</td>
			</tr>
			<tr>
				<td>
					<?= $this->Form->control('body') ?>
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>
					<?= $this->Form->control('in_stock') ?>
					<span class="pull-right">For stock, values must be integer</span>
				</td>
				<td>
					<h2 class="text-danger">*</h2>
				</td>
			</tr>
			<tr>
				<td>
					<?= $this->Form->control('price_eur', ['step' => '0.01']) ?>
					<span class="pull-right">For price, values with 2 decimals 0.00 are accepted</span>
				</td>
				<td>
					<h2 class="text-danger">*</h2>
				</td>
			</tr>
			<tr>
				<td>
					<?= $this->Form->control('weight_kg', ['step' => '0.1']) ?>
					<span class="pull-right">For weight, values with 1 decimal 0.0 are accepted</span>
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>
					<?= $this->Form->control('length_cm') ?>
					<span class="pull-right">For length, values must be integer</span>
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>
					<?= $this->Form->control('age_years', ['step' => '0.1']) ?>
					<span class="pull-right">For age, values with 1 decimal 0.0 are accepted</span>
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>
					<?= $this->Form->control('sex', ['options'=>['female'=>'female','male'=>'male','other'=>'other'],'value'=>'other']) ?>
				</td>
				<td>
					 <h2 class="text-danger">*</h2>
				</td>
			</tr>
			<tr>
				<td>
					<?= $this->Form->control('photo_url', ['type' => 'file']) ?>
				</td>
				<td>
				</td>
			</tr>

    	</tbody>
	</table>

        <?= $this->Form->button(('Add a new product')) ?>
    	<?= $this->Form->end() ?>

    </div>
</div>

