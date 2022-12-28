<?php


// Đăng ký route 

// route index
Route::set('index.php', function(){
	new Index('index');
});


// // route for add product
// Route::set('add', function() {
// 	new AddController('add');
// });


// // route for edit product
// Route::set('edit', function() {
// 	new EditController('edit');
// });

// // route for delete, with param 	dynamic
// Route::set('delete', function() {
// 	new DeleteController('delete');
// });

// // Route::set('login', function() {
// // 	new LoginController('login');
// // });



// Route::set('logout', function() {
// 	new LogoutController('logout');
// });


Route::set('user', function() {
	new UserController();
});

Route::set('product', function() {
	new ProductController();
});

// route test

?>