<!-- File: src/Template/Products/add.ctp -->

<div class="container">

  <div class="jumbotron">

  	<h1>Add a new product</h1>
  	<p>* = required fields</p>

		<?= $this->Form->create($product) ?>
	
	<table class="table table-striped">

		<tbody>
			<tr>
				<td>
					<?= $this->Form->control('title') ?>
				</td>
				<td>
					*
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
				</td>
				<td>
					*
				</td>
			</tr>
			<tr>
				<td>
					<?= $this->Form->control('price_eur') ?>
				</td>
				<td>
					*
				</td>
			</tr>
			<tr>
				<td>
					<?= $this->Form->control('weight_kg') ?>
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>
					<?= $this->Form->control('length_cm') ?>
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>
					<?= $this->Form->control('age_years') ?>
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>
					<?= $this->Form->control('sex', ['options'=>['female'=>'female','male'=>'male','other'=>'other'],'value'=>'other']) ?>
				</td>
				<td>
					 *
				</td>
			</tr>
			<tr>
				<td>
					<?= $this->Form->control('photo_url') ?>
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

