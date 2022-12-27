<?php

	class LoginModel extends Model
	{
		
		function check_login($username,$userpass)
		{
			
			$sql = "SELECT * FROM user WHERE user_name = '$username' AND user_pass = '$userpass'";
			$result = mysqli_query($this->mysqli,$sql);

			return mysqli_num_rows($result) > 0;
		}
	}
?>