<?php


// Đăng ký route 

// route index
Route::set('index.php', function(){
		Index::CreateView('Index');
});


// route for add product
Route::set('add', function() {
		AddController::CreateView('add');
});


// route for edit product
Route::set('edit', function() {
		// new EditController('edit');
		EditController::CreateView('edit');
});

// route for delete, with param 	dynamic
Route::set('delete', function() {
		DeleteController::CreateView('delete');
});


// route test
Route::set('about-us', function() {
		 AboutUs::CreateView('AboutUs');
});


?>