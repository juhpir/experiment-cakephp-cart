<?php

// src/Controller/CartsController.php

namespace App\Controller;

use App\Controller\AppController;

class CartsController extends AppController
{
	    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('TwitterBootstrap/mycustomlayout');
    }


    /* method for viewing the cart */
    public function index() {

   	
    	// Get session object and contents of the cart contents
    	$session = $this->getRequest()->getSession();
    	$productsInCart = unserialize(($session->read('cart')));
    	$cart = [];

    	if (empty($productsInCart)) {
    		$this->Flash->set("The cart is empty!", ['element' => 'error']);
    	}
    	else {

    		// Build query of products in the cart
			
			$this->loadModel("Products");
       		$products = $this->Products->find();
			$first = true;

    		foreach ($productsInCart as $productCode => $amount) {

    			if ($first) {
    				$products->where(['id' => $productCode]);
    				$first = false;
    			}
    			else {
    				$products->orWhere(['id' => $productCode]);
    			}

    		}
			
    		// Generate cart contents

    		$total = 0;
    		foreach ($products as $key => $product) {

    			$cart[$product->id]["id"] = $product->id;
    			$cart[$product->id]["title"] = $product->title;
    			$cart[$product->id]["price"] = $product->price_eur;
    			$cart[$product->id]["amount"] = $amount;
    			$cart[$product->id]["subtotalPerProduct"] = $amount * $product->price_eur;
    			$cart[$product->id]["slug"] = $product->slug;

    			$total += $amount * $product->price_eur;

    		}
   		
    	}

    	$this->set(compact('cart'));
    	$this->set(compact('total'));
    }


	/* method of adding products to the cart */
    public function add() {

    	// Get session object and contents of the cart contents
    	$session = $this->getRequest()->getSession();
    	$productsInCart = unserialize(($session->read('cart')));

    	if (empty($productsInCart)) {
    		$productsInCart = [];
    	}

    	// We expect to have a JSON data request by jQuery Ajax form
    	$addToCart = $this->request->input('json_decode');

    	if ($this->request->is('json')) {

    		// This time we expect to receive only one product to be added to the cart in each call
    		if (array_key_exists($addToCart->productCode, $productsInCart)) {
    			// The product is already in the cart, let's add to cart more items of it
    			$productsInCart[$addToCart->productCode] += 1;
    		}

    		else {
    			// The product wasn't in the cart, let's add it to the cart
    			$productsInCart[$addToCart->productCode] = 1;
    		}

    		// Let's save cart contents to the session object
    		$session->write('cart',serialize($productsInCart));

    	}

    	// We return cart items as response
    	$jsonResponse = $productsInCart;

    	$this->set(compact('jsonResponse'));   	
    }


	/* method of removing products from the cart */
    public function sub() {
    	// TODO
    }


    /* return content of shopping cart in json */
    public function get() {
    	// Get session object and contents of the cart contents
    	$session = $this->getRequest()->getSession();
    	$productsInCart = unserialize(($session->read('cart')));

    	if (empty($productsInCart)) {
    		$productsInCart = [];
    	}

		// We return cart items as response
    	$jsonResponse = $productsInCart;

    	$this->set(compact('jsonResponse'));
    }

}