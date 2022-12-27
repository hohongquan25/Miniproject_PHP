<?php


// Đăng ký route 

// route index
Route::set('index.php', function(){
	new Index('Index');
});


// route for add product
Route::set('add', function() {
	new AddController('add');
});


// route for edit product
Route::set('edit', function() {
	new EditController('edit');
});

// route for delete, with param 	dynamic
Route::set('delete', function() {
	new DeleteController('delete');
});

Route::set('login', function() {
	new LoginController('login');
});



Route::set('logout', function() {
	new LogoutController('logout');
});

Route::set('login', function() {
	loginController::CreateView('login');
});
Route::set('logout', function() {
	logoutController::CreateView('logout');
});



// route test

?>