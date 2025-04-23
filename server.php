<?php
Class Server
{
	private $conn;
	function db_connection()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database ="xml_data";

		// Create connection
		$this->conn = new mysqli($servername, $username, $password,$database);

		// Check connection
		if (!$this->conn) {
		  return false;
		}
	    return $this->conn;
	}
	function query_exec($sql)
	{
		if (!$this->conn) {
			$this->db_connection();
		}
		$result=mysqli_query($this->conn,$sql);
		return $result;

	}
	function createuser($name,$contact)
	{
		$sql='select id from users where contact="'.$contact.'" and status=1';
		$selectresult=$this->query_exec($sql);
		if (mysqli_num_rows($selectresult) > 0)
			 return json_encode(['message'=>'user already exists.','status'=>false]);

		$sql='Insert into users(name,contact)values("'.$name.'","'.$contact.'")';
		$result=$this->query_exec($sql);

		if($result)
		{		
			return json_encode(['message'=>'user created successfully.','status'=>true]);
		}
		else
			return json_encode(['message'=>'Something went wrong.','status'=>false]);

	}
	function updateuser($id,$name,$contact)
	{
		

		$sql='update users set name="'.$name.'",contact="'.$contact.'" where id='.$id.'';		
		$result=$this->query_exec($sql);

		if($result)
		{		
			return json_encode(['message'=>'user updated successfully.','status'=>true]);
		}
		else
			return json_encode(['message'=>'Something went wrong.','status'=>false]);

	}
	function deleteuser($id)
	{
		
		$sql='update users set status=0 where id="'.$id.'"';
		$result=$this->query_exec($sql);

		if($result)
		{		
			return json_encode(['message'=>'user deleted successfully.','status'=>true]);
		}
		else
			return json_encode(['message'=>'Something went wrong.','status'=>false]);

	}
	function getuser($id)
	{
		$message=['message'=>'Data Available.','data'=>[],'status'=>true];
		$where=($id!=0) ? " and id='".$id."'" : "";
		$sql='select id,name,contact,date_format(created_date,"%d-%m-%Y %r") as created_date,if(status=1,"Active","InActive") as status from users where status=1 '.$where.'';
		$result=$this->query_exec($sql);

		if (mysqli_num_rows($result) > 0)
		{		
           
             while($row = mysqli_fetch_assoc($result)) {
			    array_push($message['data'],['id'=>$row['id'],'name'=>$row['name'],'contact'=>$row['contact'],'created_date'=>$row['created_date'],'status'=>$row['status']]);
			 }
			return json_encode($message);
		}
		else
			return json_encode(['message'=>'No Data Available.','status'=>false]);

	}

}

?>