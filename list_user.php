<!doctype html><html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Bootstrap 3 JavaScript (must come after jQuery) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
	
	<title>Macs R Poo</title>
	
	<style>
	.inline-80 {
		display: inline-block; 
		width: 80px;
	}
	</style>
</head>
<body>
	<div>
		&nbsp;
	</div>
	
	
	
	<div class="container" id="menu">		
		<a href="index.php" class="btn btn-default">Add</a> &nbsp;
		<button class="btn btn-success" data-toggle="modal" data-target="#uploadModal">Import Data</button>
	</div>
	
	<div>
		&nbsp;
	</div>
	
	<div class="container" id="listing">
		<h3>List of Users</h3>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Contact</th>
					<th>Status</th>
					<th>Created Date</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody id="user_data">
				<tr>
					<td>NU-CH-000001</td>
					<td>Chocolate chip cookies</td>
					<td>Pack</td>
					<td>
						<a href="#" class="btn btn-default">Edit</a> &nbsp; 
						<a href="#" class="btn btn-default">Default</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <form id="uploadForm" enctype="multipart/form-data" method="POST" action="process.php">
	        <div class="modal-header">
	          <h4 class="modal-title" id="uploadModalLabel">Upload File</h4>
	        </div>
	        <div class="modal-body">
	          <div class="form-group">
	            <label for="fileInput">Choose file</label>
	            <input type="file" id="fileInput" name="file" class="form-control" required />
	          </div>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	          <button type="submit" name="module" class="btn btn-primary">Upload</button>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
	
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Bootstrap 3 JavaScript (must come after jQuery) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>
<script type="text/javascript">
	$("document").ready(function(){		          

       loaddata(); 
	});
	function loaddata()
    {
    	 $.ajax({
         url: "process.php",
         data:{"module":"getuser"},
         method:"POST",
         success: function(result){
         	 result=JSON.parse(result);
		     if(result.status)
		     {
		     	users='';
		     	data=result.data;
		     	for(i=0;i<data.length;i++)
		     	{
                  users += '<tr>';
                  users += '<td>'+(i+1)+'</td>';
                  users += '<td>'+data[i].name+'</td>';
                  users += '<td>'+data[i].contact+'</td>';
                  users += '<td>'+data[i].status+'</td>';
                  users += '<td>'+data[i].created_date+'</td>';
                  users += '<td><a href="index.php?id='+data[i].id+'" class="btn btn-default">Edit</a> &nbsp;<button  id="'+data[i].id+'" class="btn btn-default delete" onClick="delete_user('+data[i].id+')">Delete</button></td>';
                  users +='</tr>';
		     	} 		     	

		     }
		     else
		     {
		     	 users='<tr><td colspan="6">'+result.message+'</td></tr>'
		     }
		     $("#user_data").html("");
		     $("#user_data").html(users);
		}});
    }
	function delete_user(id) {
		if (confirm("Are you sure you want to delete this?")) {
	    	$.ajax({
	             url: "process.php",
	             data:{"module":"delete","id":id},
	             method:"POST",
	             success: function(result){
	             	 result=JSON.parse(result);
				     if(result.status)
				     {
		             	 alert(result.message);
		             	 loaddata();
	             	 }
	             	 else
	             	 	alert(result.message);
	             },
	         });
	       
	    } else {
	      // Cancel action
	      alert("Action canceled.");
	    }
	}
	$("#import_data").click(function(){
        $('#confirmDeleteModal').modal('show');
	});

</script>