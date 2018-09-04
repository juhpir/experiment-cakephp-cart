/*
	Script to add items to shopping cart.
	Must be used in conjunction with a CakePHP form that contains Csrf Token.
*/

function addToCart(productCode) {
	$.ajax({
		url: '/carts/add',
		dataType: 'json',
		type: 'put',
		contentType: 'application/json',
		headers : { 'X-CSRF-Token': $('[name="_csrfToken"]').val()},
		processData: false,
		data: JSON.stringify({ productCode: productCode }),
		success: function(data, textStatus, jQxhr){
			console.log('addToCart(productCode) success: ' + textStatus + ', ' + JSON.stringify(data));
			alert('Item added to the cart');
			updateCartItems(data);
		},
        error: function(jqXhr, textStatus, errorThrown) {
			console.log('addToCart(productCode) error: ' + textStatus + ', ' + errorThrown);
			alert('Add to cart failed. Please contact sales with your order details.');
        }
	});
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