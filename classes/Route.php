<?php
class Route {
	public static $validRoutes = array();


	//Đăng ký route và chạy hàm function bằng cách sử dụng __invoke()
	public static function set($route, $function) {

		self::$validRoutes[] = $route;

		// print_r(self::$validRoutes);
		if ($_GET['url'] == $route) {
				$function->__invoke();
		}
		
	}
}
?>