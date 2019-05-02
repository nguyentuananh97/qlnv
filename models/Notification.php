<?php 

	include_once("Connection.php");
	class Notification{
		var $conn;
		function __construct(){
			$obj = new Connection();
			$this->conn = $obj->conn;
		}

		function list(){
			
		    $query = "SELECT * FROM notifications";
			$result = $this->conn->query($query);
		    
			$data = array();

			while ( $row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
		function insert($data){
			$query = "INSERT INTO notifications(title,content) VALUES ('".$data['title']."','".$data['content']."')";
			$result = $this->conn->query($query);
			return $result;	
		}
		function find($id){
			$query = "SELECT * FROM notifications WHERE id=".$id;
			$result = $this->conn->query($query)->fetch_assoc();
			
			return $result;
		}

	}



 ?>