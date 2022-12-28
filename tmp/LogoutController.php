<?php

  class LogoutController extends Controller
    {
        private $model;
        function __construct($view){
        	$this-> logoutUser();
        	$this->CreateView($view);
     	}	
        
     	function logoutUser() {
     		session_destroy();
     	}
    }

?>