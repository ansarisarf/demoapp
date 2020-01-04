<!-- <!DOCTYPE html>
<html>
<head>
	<title>Log in Pages</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body> -->
<div class="container" style="width: 35%;">
	<form  class="p-sm-5 mx-auto mt-sm-5 rounded" method="post" 
	action="<?php echo base_url('register_controller/update/'.$logintable->id);?>" style="border: 1px solid grey; box-shadow: 0 3px 7px 0 rgba(0,0,0,.35);">
		<div class="form-group">
			<label>FirstName</label>
			<input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter your Email" value="<?php echo $logintable->firstname; ?>">
			<!-- <?php echo $logintable;
			echo "string"; ?> -->
			<!-- <span class="text-danger"><?php echo form_error("firstname"); ?></span> -->
			<span id="firstname_msg"></span>
		</div>
		<div class="form-group">
			<label>Lastname</label>
			<input type="text" name="lastname" id="lastname" class="form-control" placeholder="lastname" value="<?php echo $logintable->lastname; ?>">
			<!-- <span class="text-danger"><?php echo form_error("lastname"); ?></span>  --> 
		</div>
		<div class="form-group">
			<!-- <button class="btn btn-dark"><a href="register.php">Register</a></button> -->	
			<button class="btn btn-info" name="submit" id="submit">Update</button>
		</div>
	</form>
</div>
<!-- </body>
</html>
 -->
<script type="text/javascript">
$(document).ready(function(){
	$('#firstname').change(function(){
		var firstname=$('#firstname').val();
		alert(firstname);
		if(firstname!=""){
			$.ajax({
				url:"<?php echo base_url(); ?>logincontroller/checkdulicate",
				method:"POST",
				data:{firstname:firstname},
				success:function(data){
					$("#firstname_msg").html(data);
				}
			});
		}
	});
});
</script>