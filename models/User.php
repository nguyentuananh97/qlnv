<?php 

	include_once("Connection.php");
	class User{
		var $conn;
		function __construct(){
			$obj = new Connection();
			$this->conn = $obj->conn;
		}

		function list($page, $pageSize, $name){
			
		    $query = "SELECT * FROM users WHERE `name` LIKE '%".$name."%' ORDER BY id DESC LIMIT ". ($page)*$pageSize . ", " . $pageSize;
			$result = $this->conn->query($query);
		    
			$data = array();

			while ( $row = $result->fetch_assoc()) {
				$data[] = $row;
			}

			$query1 = "SELECT COUNT(*) size FROM users WHERE `name` LIKE '%".$name."%'";
			$result1 = $this->conn->query($query1);
		    
			$size = 0;

			if ( $row1 = $result1->fetch_assoc()) {
				$size = $row1['size'];
			}
			echo json_encode(['data' => $data, 'size' => $size]);
		}

		function listRole(){
			
		    $query = "SELECT * FROM users_role";
			$result = $this->conn->query($query);
		    
			$data = array();

			while ( $row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			echo json_encode($data);
		}

		function listUser(){
			
		    $query = "SELECT * FROM users";
			$result = $this->conn->query($query);
		    
			$data = array();

			while ( $row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}

		function find($code){
			$query = "SELECT * FROM users WHERE id= ".$code;
			$result = $this->conn->query($query)->fetch_assoc();
			// return $result;
			echo  json_encode($result);
		}

		function insert($data){
			$query = "INSERT INTO users(name,code,email,password,phone_number,dob,address,joined_date,role_id)
				  VALUES ('".$data->name."','".$data->code."','".$data->email."','".md5($data->password)."','".$data->phone_number."','".explode("T",$data->dob)[0]."','".$data->address."','".explode("T",$data->joined_date)[0]."','".$data->role_id."')";

			$result = $this->conn->query($query);
			return $result;
		}
		function update($data,$id){
			$query = "UPDATE  users SET name='".$data->name."',email='".$data->email."',password='".md5($data->password)."',phone_number='".$data->phone_number."',dob='".explode("T",$data->dob)[0]."',address='".$data->address."',joined_date='".explode("T",$data->joined_date)[0]."',role_id='".$data->role_id."' WHERE id = ".$id;
			$result = $this->conn->query($query);
			return $result;
		}

		function delete($id){
			$query = "DELETE FROM users WHERE id= ".$id;
			$result = $this->conn->query($query);
			return $result;
		}
		function avatar($data,$id){
			$query = "UPDATE  users SET image='".$data."' WHERE id = ".$id;
			$result = $this->conn->query($query);
			return $result;
		}


	}



 ?>