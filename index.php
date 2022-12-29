<?php

session_start();


if(isset($_COOKIE['cookie_user'])) {
	// get user from cookie 
 	$model = new user();
    $user = $model->getUserFromCookie($_COOKIE['cookie_user']);
	if (isset($user) && $user != "")  {
		$_SESSION['logged_in'] = true;
	    $_SESSION['username'] = $user["user_name"];
		$_SESSION['userpass'] = $user["user_pass"];
	}
}

if(!isset($_SESSION['logged_in']) && isset($_GET['url']) && $_GET['url']!="user") {
    header("Location: index.php?url=user&action=login");
 }

require_once('Routes.php');

function __autoload($class_name) {
	if (file_exists('./classes/'.$class_name.'.php')) {
		require_once('./classes/'.$class_name.'.php');
	}
	else
	if (file_exists('./controllers/'.$class_name.'.php')) {
		require_once('./controllers/'.$class_name.'.php');
	}
	else
	if (file_exists('./models/'.$class_name. '.php')) {
		require_once('./models/'.$class_name.'.php');
	}
}

?>