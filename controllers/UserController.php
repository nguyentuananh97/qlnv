<?php 
	include_once("models/User.php");
	include_once("models/Notification.php");
	class UserController{
		var $user_model;
		var $model_notification;
		function __construct(){
			$this->user_model = new User();
			$this->model_notification = new Notification();
		}
		function list(){				
			$notifications = $this->model_notification->list();		
			require_once("views/user/list.php");
		}
		function listRole(){			
			$users_roles = $this->user_model->listRole();
		}
		function listUser(){
			$page = $_GET["page"];
			$pageSize = $_GET["pageSize"];
			$name = $_GET["name"];
			$this->user_model->list($page, $pageSize, $name);
		}
		function file_get_contents_utf8($fn) { 
		     $content = file_get_contents($fn); 
		      return mb_convert_encoding($content, 'UTF-8', 
		          mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true)); 
		} 
		function store(){
			$content = file_get_contents("php://input");
			$postdata = mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true)); 
			$request = json_decode($postdata);
			$status = $this->user_model->insert($request);
			echo json_encode($status);
		}
		function detail(){
			$code = $_GET["code"];
			$status = $this->user_model->find($code);
		}
		function update(){
			$content = file_get_contents("php://input");
			$postdata = mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true)); 
			$request = json_decode($postdata);
			if($_SESSION['user']['id'] == $request->id){
				$_SESSION['user']['name'] = $request->name;
				$_SESSION['user']['email'] = $request->email;
				$_SESSION['user']['password'] = $request->password;
				$_SESSION['user']['dob'] = explode("T",$request->dob)[0];
				$_SESSION['user']['joined_date'] = explode("T",$request->joined_date)[0];
				$_SESSION['user']['address'] = $request->address;
				$_SESSION['user']['phone_number'] = $request->phone_number;
			}
			$status = $this->user_model->update($request,$request->id);

			echo json_encode($status);
		}
		function delete(){
			$code = $_POST["id"];
			$status = $this->user_model->delete($code);			
			echo $status;
			
		}
		function avatar(){
			if (isset($_POST['submit']))
		    {
		        // Nếu người dùng có chọn file để upload
		        if (isset($_FILES['avatar']))
		        {
		            // Nếu file upload không bị lỗi,
		            // Tức là thuộc tính error > 0
		            if ($_FILES['avatar']['error'] > 0)
		            {
		                echo 'File Upload Bị Lỗi';
		            }
		            else{
		                // Upload file
		                move_uploaded_file($_FILES['avatar']['tmp_name'], 'public/images/'.$_FILES['avatar']['name']);
		                echo 'File Uploaded';
		            }
		        }
		        else{
		            echo 'Bạn chưa chọn file upload';
		        }
    		}
			$id = $_GET['id'];
			$status = $this->user_model->avatar($_FILES['avatar']['name'],$id);			
			$_SESSION['user']['image'] = $_FILES['avatar']['name'];
			header("Location: ?mod=dashboard&act=profile");
			
		}
	}




 ?>