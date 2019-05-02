<?php 
	include_once("models/Notification.php");
	class NotificationController{
		var $model;
		function __construct(){
			$this->model = new Notification();
		}
		function list(){
			$notifications = $this->model->list();
			require_once("views/dashboard/main.php");
		}
		function add(){
			$notifications = $this->model->list();
			require_once("views/notification/addnotification.php");
		}
		function find(){
			$id = $_GET['id'];
			$status = $this->model->find($id);
			if($status != null){
		        echo json_encode([
		          'data' => $status,
		          'status' => true,
		        ]);
		      }else{
		        echo json_encode([
		          'data' => null,
		          'status' => false,
		        ]);
		      }
		}
		function store(){
			$data = $_POST;
			$status = $this->model->insert($data);
			header("Location: ?mod=notification&act=add");
		}
	}
 ?>