<?php 
	include_once("Connection.php");
	class Auth{
		
		var $conn;
		function __construct(){
			$obj = new Connection();
			$this->conn = $obj->conn;
		}

		function login($email,$password){
			$query = sprintf("SELECT * FROM users WHERE email ='%s' AND password ='%s' ",$email,$password);


			$result = $this->conn->query($query)->fetch_assoc();

			if($result != NULL){
				$_SESSION["isLogin"]=true;
				$_SESSION["user"]= $result;
				return true;
			}else{
				return false;
			}
		}
		function setPass($code,$email,$password){
			$query_find = sprintf("SELECT id FROM users WHERE email ='%s' AND code ='%s' ",$email,$code);
			$result_find = $this->conn->query($query_find)->fetch_assoc();

			
			$query = "UPDATE  users SET password='".md5($password)."' WHERE id = ".$result_find["id"];
			$result = $this->conn->query($query);
			return $result;
		}
	}

 ?>