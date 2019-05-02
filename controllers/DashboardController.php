<?php 
	include_once("models/User.php");
	include_once("models/Notification.php");
	class DashboardController{
		var $model;
		var $model_notification;
		function __construct(){
			$this->model = new User();
			$this->model_notification = new Notification();
		}
		function list(){
			$users= $this->model->listUser();
			$notifications = $this->model_notification->list();
			require_once("views/dashboard/main.php");
		}
		function logout(){
			session_destroy();
			header("Location: ?mod=auth");
		}
		function profile(){
			require_once("views/dashboard/profile.php");
		}
	}
 ?>