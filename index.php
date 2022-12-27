<?php

session_start();
  // if(!isset($_SESSION['logged_in'])) {
  //   header("Location:http://localhost/Miniproject_PHP/login");
  // }
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
