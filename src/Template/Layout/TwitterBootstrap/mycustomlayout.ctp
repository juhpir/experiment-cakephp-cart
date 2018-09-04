<?php

use Cake\Core\Configure;

/**
 * Default `html` block.
 */
if (!$this->fetch('html')) {
    $this->start('html');
    printf('<html lang="%s" class="no-js">', Configure::read('App.language'));
    $this->end();
}

/**
 * Default `title` block.
 */
if (!$this->fetch('title')) {
    $this->start('title');
    echo Configure::read('App.title');
    $this->end();
}

/**
 * Default `footer` block.
 */
if (!$this->fetch('tb_footer')) {
    $this->start('tb_footer');
    /*printf('&copy;%s %s', date('Y'), Configure::read('App.title'));*/
    $this->end();
}

/**
 * Default `body` block.
 */
$this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->controller, $this->request->action]) . '" ');
if (!$this->fetch('tb_body_start')) {
    $this->start('tb_body_start');
    echo '<body' . $this->fetch('tb_body_attrs') . '>';
    $this->end();
}
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash))
        echo $this->Flash->render();
    $this->end();
}
if (!$this->fetch('tb_body_end')) {
    $this->start('tb_body_end');
    echo '</body>';
    $this->end();
}

/**
 * Prepend `meta` block with `author` and `favicon`.
 */
$this->prepend('meta', $this->Html->meta('author', null, ['name' => 'author', 'content' => Configure::read('App.author')]));
$this->prepend('meta', $this->Html->meta('favicon.ico', '/favicon.ico', ['type' => 'icon']));

/**
 * Prepend `css` block with Bootstrap stylesheets and append
 * the `$html5Shim`.
 */
$html5Shim =
<<<HTML

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
HTML;
$this->prepend('css', $this->Html->css(['bootstrap/bootstrap', 'bootstrap/bootstrap-theme.min', 'mycustomstyle']));

$this->append('css', $html5Shim);

/**
 * Prepend `script` block with jQuery and Bootstrap scripts
 */
$this->prepend('script', $this->Html->script(['jquery/jquery', 'bootstrap/bootstrap', 'cart']));

?>
<!DOCTYPE html>

<?= $this->fetch('html') ?>

    <head>

        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">

        <title><?= $this->fetch('title') ?></title>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>

    </head>

    <?php
        echo $this->fetch('tb_body_start');
        echo $this->fetch('tb_flash');
    ?>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">A4D-shop</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/products">Products</a></li>
            <li><a href="/carts">Shopping Cart (<span id="cartItems">0</span>)</a></li>
            <li><a href="/pages/contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>

<div class="container">
    <div class="jumbotron">

    <h2>A4D-shop</h2>
    <p>Have an <strong>A</strong>nimal <strong>F</strong>or a <strong>D</strong>ay! It is now so easy and <em>surprising</em>: just add your favourite animals to a cart, make your order and they will come for a day, when they want.</p>

    </div>
</div>

    <?php
        echo $this->fetch('content');
        echo $this->fetch('tb_footer');
        echo $this->fetch('script');
    ?>

    <script type="text/javascript">
        window.onload=function(){
            getCartItems();
        }
    </script>

    <?php
        echo $this->fetch('tb_body_end');
    ?>

</html>
