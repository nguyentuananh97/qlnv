<?php 
	session_start();
	// session_destroy();
	if(isset($_SESSION["isLogin"])){
		if(isset($_GET["mod"])){
			$mod = $_GET["mod"];
		}else{
			$mod = 'dashboard';
		}

		if(isset($_GET["act"])){
			$act = $_GET["act"];
		}else{
			$act = "list";
		}
		switch ($mod) {
			case 'dashboard':
				include_once('controllers/DashboardController.php');
				$dashboard = new DashboardController();
				switch ($act) {
					case 'profile':
						$dashboard->profile();
						break;
					case 'logout':
						$dashboard->logout();
						break;
					default:
						$dashboard->list();
						break;
				}
				break;
			case 'notification':
				include_once('controllers/NotificationController.php');
				$notification = new NotificationController();
				switch ($act) {
					case 'list':
						$notification->list();
						break;
					case 'add':
						$notification->add();
						break;
					case 'store':
						$notification->store();
						break;
					case 'find':
						$notification->find();
						break;
					default:
						$notification->add();
						break;
				}
				break;
			case 'user':
				include_once('controllers/UserController.php');
				$user = new UserController();
				switch ($act) {
					case 'list-role':
						$user->listRole();
						break;
					case 'list':
						$user->list();
						break;
					case 'listuser':
						$user->listUser();
						break;
					case 'store':
						$user->store();
						break;
					case 'detail':
						$user->detail();
						break;
					case 'update':
						$user->update();
						break;
					case 'delete':
						$user->delete();
						break;
					case 'avatar':
						$user->avatar();
						break;
					default:
						$user->list();
						break;
				}
				break;
			default:
				header("Location: ?mod=dashboard");
				break;
		}
	}else{

    	$mod="auth";

		if(isset($_GET["act"])){
			$act = $_GET["act"];
		}else{
			$act = "login";
		}
		include_once 'controllers/AuthController.php';

		$auth = new AuthController();

		switch ($act) {
			case 'list':
				$auth->login();
				break;
			case 'auth':
				$auth->auth();
				break;
			case 'email':
				$auth->email();
				break;
			default:
				$auth->login();
				break;
		}

    }
 ?>