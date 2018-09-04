<?php

// src/Controller/CartsController.php

namespace App\Controller;

use App\Controller\AppController;

class CartsController extends AppController
{
	    public function initialize()
    {
        parent::initialize();
    }

	/* method of adding products to the cart */
    public function add() {

    	// Get session object and contents of the cart contents
    	$session = $this->getRequest()->getSession();
    	$productsInCart = unserialize(($session->read('productsInCart')));

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
    		$session->write('productsInCart',serialize($productsInCart));

    	}

    	// We return cart items as response
    	$jsonResponse = $productsInCart;

    	$this->set(compact('jsonResponse'));   	
    }

	/* method of removing products from the cart */
    public function sub() {
    	// TODO
    }
}