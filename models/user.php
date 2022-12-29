<?php

	class User extends BaseModel
	{
		function insert($data) {
			//write something here
		}
		function update($data) {}
		function delete($id) {}
		function get($id= null){}

		function check_login($username) {
			  $connection = $this->mysqli;
		      $querySelect = "SELECT `user_name`, `user_pass` FROM `user` WHERE `user_name`='$username'";
		      $results = mysqli_query($connection, $querySelect);
		      $user = [];
		        if (mysqli_num_rows($results) != false) {
		            $rows = mysqli_fetch_all($results, MYSQLI_ASSOC);
		            $user = $rows[0];
		        }

		       return $user;
		}
		function insertCookie($cookie, $username) {
			 $stmt = $this->mysqli->prepare("UPDATE `user` SET `cookie`=? WHERE `user_name` = ?");
			        $stmt->bind_param("ss",$cookie,$username);
			         if( $stmt->execute() == TRUE){
			            return true ;
			        }else{
			            return false;
			        }
		}

		function getUserFromCookie($cookie) {
			  $connection = $this->mysqli;
		      $querySelect = "SELECT `user_name`, `user_pass` FROM `user` WHERE `cookie`='$cookie'";
		      $results = mysqli_query($connection, $querySelect);
		      $user = [];
		        if (mysqli_num_rows($results) != false) {
		            $rows = mysqli_fetch_all($results, MYSQLI_ASSOC);
		            $user = $rows[0];
		        }

		       return $user;
		}
	}
?>