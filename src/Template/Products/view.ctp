<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($product->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($product->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sex') ?></th>
            <td><?= h($product->sex) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Url') ?></th>
            <td><?= h($product->photo_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('In Stock') ?></th>
            <td><?= $this->Number->format($product->in_stock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price Eur') ?></th>
            <td><?= $this->Number->format($product->price_eur) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight Kg') ?></th>
            <td><?= $this->Number->format($product->weight_kg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Length Cm') ?></th>
            <td><?= $this->Number->format($product->length_cm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age Years') ?></th>
            <td><?= $this->Number->format($product->age_years) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Published') ?></th>
            <td><?= $product->published ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($product->body)); ?>
    </div>
</div>
