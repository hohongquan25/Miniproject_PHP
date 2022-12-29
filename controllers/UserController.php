<?php


  class UserController extends Controller

    {

     	function logout() {
     		session_destroy();
     		setcookie('cookie_user', "", time() - 3600, '/');
     		header('Location:index');
     	}

     	function login() {
     		 // Lấy dữ liệu từ trang view
     		// if use cookie save user
		    if(isset($_COOKIE['cookie_user'])) {
		    	// get user from cookie 
        	 	$user = $this->model->getUserFromCookie($_COOKIE['cookie_user']);	
        		$this->data["user"] = $user;
		    }
		    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		    	
		    $username = $_POST['username'];
		    $userpass = $_POST['userpass'];
		    $remember = isset($_POST['remember']) ? true : false;

		    // Gửi dữ liệu đến model để kiểm tra

		   
		    $result = false;
		    $user = $this->model->check_login_v2($username);
		    if (isset($user)) {
		    	if ($user["user_pass"] == $userpass || $user["user_pass"] == md5($userpass)) 
		    	$result = true;
		    }
		    // $result = $this->model->check_login($username, $userpass);
		    //xử lý kết quả trả về từ model

		    if($result){
		        //Lưu thông tin đăng nhập vào session 
		        $_SESSION['logged_in'] = true;
		        $_SESSION['username'] = $username;
		        $_SESSION['userpass'] = $userpass;

		        // Nếu người dùng chọn nhớ tài khoản, lưu thông tin vào cookie
		        if($remember == true){
		        	$cookie = $this->generateRandom();
		            setcookie('cookie_user', $cookie, time() + (86400 * 30), '/');
		            $this->model->insertCookie($cookie, $username);
		        }
		        else 
		        	setcookie('cookie_user', "",time() - 3600, '/');
		        // Nếu đăgn nhập thành công, chuyển hướng người dùng đến trang chủ
		         header('Location:index');
		         exit;	       
		   
		    }
		    else{
		        // Nếu đăng nhập hoặc mật khẩu không đúng
		          echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng');history.back()</script>";
		        }
		    }
     	}


     	function generateRandom($length = 64) {
		    $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $len = strlen($string);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $string[rand(0, $len - 1)];
		    }
		    return $randomString;
		}
    }

?>



