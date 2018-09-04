<?php

// src/Controller/ProductsController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;

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

    	/* Search by product id or name? */
    	$productCodeSearch = $this->request->getQuery('search');

    	if ($productCodeSearch != null && trim($productCodeSearch)!="") {
    		/* This was not a search, so limit what products to show */

    		/* There is a rule, that product code is always numeric and product name can't be only numeric */
    		if (is_numeric($productCodeSearch)) {
    			/* Search by product id */
    			$result = $this->Products->find()->where(['id' => $productCodeSearch]);
    		}
    		else {
    			/* Search by product name */
    			$result = $this->Products->find()->where(['title LIKE' => '%'.$productCodeSearch.'%']);
    		}
    		
    		/* Set flash message based on how many results search returned */
    		$amount = $result->count();
    		$flashmsg = 'The search returned '.$amount.' results.';
    		if ($amount == 0) { $this->Flash->set($flashmsg, ['element' => 'error']); }
    		else { $this->Flash->set($flashmsg, ['element' => 'success']); }
    		
    	}
    	else {
    		/* This was not a search, so show all products */
    		$result=$this->Products->find();
    	}

    	/* Build data for product listing view */
        $this->loadComponent('Paginator');
        $products = $this->Paginator->paginate($result);
        $this->set(compact('products'));
    }


    public function add()
    {

        $product = $this->Products->newEntity();

        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            $product->slug = Text::slug($product->title);
            $product->published = true;

            if ($this->Products->save($product)) {
                $this->Flash->set('The new product was successfully added!', ['element' => 'success']);

                return $this->redirect('/products/view/'.$product->slug);
            }
            else {
                $this->Flash->set('The new product could not be added! '.$product->sex, ['element' => 'error']);
            }

        }

        $this->set(compact('product'));
    }

}