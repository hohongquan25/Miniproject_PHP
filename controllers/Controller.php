<?php
	class Controller {
		
		public static function CreateView($view, $data=[]) {
			require_once("./views/$view.php");
		}
	}
?>