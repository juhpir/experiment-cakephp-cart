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
		},
        error: function(jqXhr, textStatus, errorThrown) {
			console.log('addToCart(productCode) error: ' + textStatus + ', ' + errorThrown);
			alert('Add to cart failed. Please contact sales with your order details.');
        }
	});
}

