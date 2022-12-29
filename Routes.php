<?php


// Đăng ký route 


// route index
Route::set('index', function(){
	Header("Location: product");
});

Route::set('user', function() {
	new UserController();
});

Route::set('product', function() {
	new ProductController();
});

// route test

?>