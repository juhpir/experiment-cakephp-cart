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

    public function index()
    {

    	/* Search by product id? */
    	$productCodeSearch = $this->request->getQuery('id');
    	if (!is_null($productCodeSearch)) {

    		/* Search by product id */
    		$result = $this->Products->find()->where(['id' => $productCodeSearch]);

    		/* Set flash message based on how many results search returned */
    		$amount = $result->count();
    		$flashmsg = 'The search returned '.$amount.' results.';
    		if ($amount == 0) { $this->Flash->set($flashmsg, ['element' => 'error']); }
    		else { $this->Flash->set($flashmsg, ['element' => 'success']); }
    		
    	}
    	else {
    		/* Search the whole data */
    		$result=$this->Products->find();
    	}

    	/* Build data for product listing view */
        $this->loadComponent('Paginator');
        $products = $this->Paginator->paginate($result);
        $this->set(compact('products'));
    }

}