<?php


  class LoginController extends Controller

    {
        private $model;
        function __construct($view){
              if(isset($_SESSION['logged_in'])) {
                    header("Location:index.php");
                 }
        	 $this->model = new LoginModel(); 
        	 $this->loginUser();


        	 $this->CreateView($view);
       
     	}	
     	function loginUser() {
     		 // Lấy dữ liệu từ trang view
		    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		    $username = $_POST['username'];
		    $userpass = md5($_POST['userpass']);
		    $remember = isset($_POST['remember']) ? true : false;

		    // Gửi dữ liệu đến model để kiểm tra

		   
		    $result = $this->model->check_login($username, $userpass);
		    echo $result;
		    //xử lý kết quả trả về từ model

		    if($result){
		        //Lưu thông tin đăng nhập vào session 
		        $_SESSION['logged_in'] = true;
		        $_SESSION['username'] = $username;
		        $_SESSION['userpass'] = $userpass;

		        // Nếu người dùng chọn nhớ tài khoản, lưu thông tin vào cookie
		        if($remember = true){
		            setcookie('username', $username, time() + (86400 * 30), '/');
		            setcookie('userpass', $userpass, time() + (86400 * 30), '/');
		        }
		        // Nếu đăgn nhập thành công, chuyển hướng người dùng đến trang chủ
		         header('Location:index.php');
		         $rusername = $_COOKIE['username'];
		         $ruserpass = $_COOKIE['userpass'];
		         exit;
		       
		   
		    }
		    else{
		        // Nếu đăng nhập hoặc mật khẩu không đúng
		          echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng');history.back()</script>";
		        }
		    }
     	}
    }

