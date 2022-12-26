<?php
	class Controller {

		public static function CreateView($view) {
			require_once("./views/$view.php");
		}
	}
?>