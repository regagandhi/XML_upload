<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>XML Upload</title>

    <!-- Bootstrap 3 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        body {
            padding-top: 40px;
            background-color: #f9f9f9;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h3 {
            margin-bottom: 25px;
            text-align: center;
        }
        .form-group label {
            font-weight: 500;
        }
        .btn {
            min-width: 100px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h3>Create User</h3>
            <form action="server.php" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" required>
                </div>

                <div class="form-group">
                    <label for="contact">Contact No.:</label>
                    <input type="text" id="contact" name="contact" class="form-control"  placeholder="+00 000 0000000" required>
                </div>

                <div class="form-group text-center">
                	<?php
                	$btn=(isset($_REQUEST['id'])) ? '<button type="button" name="update_user" id="update" class="btn btn-primary">Update</button>' : '<button type="button" name="create_user" id="save" class="btn btn-primary">Create</button>';
                	echo $btn;
                	?>
                    <a href="list_user.php" class="btn btn-default">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
<?php
 $id=0;
 if(isset($_REQUEST['id']))
 	$id=$_REQUEST['id'];
?>
<script type="text/javascript">
	$("document").ready(function(){
        $("#save").click(function(){
           name=$("#name").val();
           contact=$("#contact").val();
            $.ajax({
             url: "process.php",
             data:{"name":name,"contact":contact,"module":"createuser"},
             method:"POST",
             success: function(result){
             	 result=JSON.parse(result);
			     if(result.status)
			     {
			     	 alert(result.message);
			     	 window.location.href = "list_user.php";

			     }
			     else
			     {
			     	 alert(result.message);
			     	 

			     }
			}});
        });
     const id='<?php echo $id;?>';
     $("#update").click(function(){
           name=$("#name").val();
           contact=$("#contact").val();
            $.ajax({
             url: "process.php",
             data:{"name":name,"contact":contact,"id":id,"module":"updateuser"},
             method:"POST",
             success: function(result){
             	 result=JSON.parse(result);
			     if(result.status)
			     {
			     	 alert(result.message);
			     	 window.location.href = "list_user.php";

			     }
			     else
			     {
			     	 alert(result.message);
			     	 

			     }
			}});
        });
   
    if(id!=0)
    {
    	 $.ajax({
             url: "process.php",
             data:{"module":"getuser",'id':id},
             method:"POST",
             success: function(result){
             	 result=JSON.parse(result);
             	 data=result.data;
             	 for(i=0;i<data.length;i++)
		     	{
                  $("#name").val(data[i].name);
                  $("#contact").val(data[i].contact);
                  
		     	} 		     	
			     
			}});
    }

	});
</script>