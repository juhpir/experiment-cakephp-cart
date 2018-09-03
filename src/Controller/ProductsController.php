<?php

// src/Controller/ProductsController.php

namespace App\Controller;

use App\Controller\AppController;

class ProductsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('TwitterBootstrap/mycustomlayout');
    }

    public function view($slug)
    {
        $product = $this->Products->findBySlug($slug)->firstOrFail();
        $this->set(compact('product'));
    }

}