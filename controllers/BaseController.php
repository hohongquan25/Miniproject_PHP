<?php
	class BaseController {
		
		protected $model;
		protected $data;
		
		function __construct() {
			$this->HandlerURL();
		}

		public function HandlerURL() {
			$controller = $_GET['url'];
			$action = "index";
			if (isset($_GET['action']))  $action= $_GET['action'];
        	$this->model = $this->loadModel($controller); 
        	$this->data = [];
        	$this->$action();
        	$this->CreateView($action, $this->data); 
		}

		public function loadModel($model) {
			require_once("./models/$model.php");
			return new $model();
		}

		public function CreateView($view, $data=[]) {
			require_once("./views/$view.php");
		}
	}
?>