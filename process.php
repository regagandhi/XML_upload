<?php
require_once("server.php");
$server=new Server();
if(isset($_REQUEST['module']))
{
   if(isset($_REQUEST['module']) && $_REQUEST['module']=='createuser')
   {
   	   $name=$_REQUEST['name'];
   	   $contact=$_REQUEST['contact'];

       echo $server->createuser($name,$contact);
   }
   if(isset($_REQUEST['module']) && $_REQUEST['module']=='updateuser')
   {
   	   $name=$_REQUEST['name'];
   	   $contact=$_REQUEST['contact'];
   	   $id=$_REQUEST['id'];

       echo $server->updateuser($id,$name,$contact);
   }
   if(isset($_REQUEST['module']) && $_REQUEST['module']=='getuser')
   {
   	  $id=0;
   	  if(isset($_REQUEST['id']) && $_REQUEST['id']!=0)
         $id=$_REQUEST['id'];
       echo $server->getuser($id);
   }
   if(isset($_REQUEST['module']) && $_REQUEST['module']=='delete')
   {
   	   $id=$_REQUEST['id'];
       echo $server->deleteuser($id);
   }
   
}
if (isset($_FILES['file'])) {
    $uploadDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFile = $uploadDir . $fileName;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedTypes = ['xml'];
    if (!in_array($fileType, $allowedTypes)) {
        echo "File type not allowed.";
        exit;
    }

    if ($_FILES["file"]["size"] > 5 * 1024 * 1024) {
        echo "File is too large.";
        exit;
    }

    // Move file to the upload directory
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        $sql="INSERT INTO user_file(file_path) VALUES ('".$targetFile."')";
        $result=$server->query_exec($sql);
        if($result)
        {
        	$xml = simplexml_load_file($targetFile) or die("Error: Cannot load XML file");
        	//var_dump($xml);
			foreach ($xml->contact as $user) {
			    
			    $server->createuser($user->name,$user->phone);
			    header("Location:list_user.php");
			}
        	 echo "inserted";
        }
    } else {
        echo "Error uploading file.";
    }
} 
?>
