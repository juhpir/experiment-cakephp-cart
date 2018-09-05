/*
	Script to add items to shopping cart.
	Must be used in conjunction with a CakePHP form that contains Csrf Token.
*/

function addToCart(productCode, productName) {
	
	$.ajax({
		url: '/carts/add',
		dataType: 'json',
		type: 'put',
		contentType: 'application/json',
		headers : { 'X-CSRF-Token': $('[name="_csrfToken"]').val()},
		processData: false,
		data: JSON.stringify({ productCode: productCode }),
		success: function(data, textStatus, jQxhr){
			successMessage='<div role="alert" class="alert alert-dismissible fade in alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Added 1 item of ' + productName + ' to the cart.</div>';
			$("#ajax-flash").append(successMessage);
			updateCartItems(data);
		},
        error: function(jqXhr, textStatus, errorThrown) {
        	errorMessage='<div role="alert" class="alert alert-dismissible fade in alert-error"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Adding 1 item of ' + productName + ' to the cart failed with error: ' + textStatus + ', ' + errorThrown + '. Please contact sales with your order details.</div>';
			$("#ajax-flash").append(errorMessage);
        }
	});
}

/* Update shopping cart view's data dynamically by adding 1 item to an existing product
   Note: not a recommended way to hack this */

function updateCartCalculation(productCode) {

	productAmount = parseFloat($('#cart-amount-'+productCode).text());
	productPrice = parseFloat($('#cart-price-'+productCode).text().replace(/[^\d\.\-]/g, ""));
	productSubtotal = parseFloat($('#cart-subtotal-'+productCode).text().replace(/[^\d\.\-]/g, ""));
	cartTotal = parseFloat($('#cart-total').text().replace(/[^\d\.\-]/g, ""));

	productAmount += 1;
	cartTotal -= productSubtotal;
	productSubtotal = productPrice * productAmount;
	cartTotal += productSubtotal;
	
	$('#cart-amount-'+productCode).html(productAmount);
	$('#cart-subtotal-'+productCode).html(productSubtotal.toFixed(2));
	$('#cart-total').html(cartTotal.toFixed(2));
}


/* Update amount of products in cart in the nav bar 
   data must be cart contents { productCode, amountOfItems } in JSON format */

function updateCartItems(data) {

	// count amount of products in the cart
	var total = 0;

	for (var i in data) {
		total += data[i];
	}

	// update amount to navigation
	$("#cartItems").html(total);
}

/* Retrieve cart contents and update them on navigation */

function getCartItems() {
	$.ajax({
		dataType: "json",
		url: '/carts/get',
		data: JSON.stringify({ 'foo': 'bar' }),
		success: function(data, textStatus, jQxhr){
			updateCartItems(data);
		},
	});
}