<?php 
	include_once("models/Auth.php");
	class AuthController {
		var $model;
		function __construct(){
			$this->model = new Auth();
		}
		function auth(){
			$email = $_POST['email'];
			$pass = md5($_POST['password']);
			$status = $this->model->login($email,$pass);
			if($status == true){
				header("Location: index.php?mod=dashboard");
			}else{
				setcookie('check','false',time()+10);
				header("Location: index.php");
			}
			
		}
		function login(){
			require_once("views/auth/signin.php");
		}
		function email(){
			include_once("public/email/email_function.php");
			$code = $_POST['code_forget'];
			$email = $_POST['email_forget'];
			$password=rand(100000,999999);
			$status = $this->model->setPass($code,$email,$password);
			echo $status;
			echo $password;
			$contents = "Mật khẩu của bạn là : ".$password;
			send_email($email,"Admin BLOG",$contents,"Quên mật khẩu");
			setcookie('msg_sendemail', 'ok', time() + 10);
			header("Location: ?mod=auth");
		}
	}
	
 ?>