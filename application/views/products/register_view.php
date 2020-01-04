<div class="container" style="width: 35%;">
	<form method="post" action="<?php echo base_url('register_controller/formvalidation');?>" class="p-sm-5 mx-auto mt-sm-5 rounded" method="post" style="border: 1px solid grey; box-shadow: 0 3px 7px 0 rgba(0,0,0,.35);">
		<div class="form-group">
			<label>FirstName</label>
			<input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter your Email">
			<span class="text-danger"><?php echo form_error("firstname"); ?></span>
			<span id="firstname_msg"></span>
		</div>
		<div class="form-group">
			<label>Lastname</label>
			<input type="text" name="lastname" id="lastname" class="form-control" placeholder="lastname">
			<span class="text-danger"><?php echo form_error("lastname"); ?></span>  
		</div>
		<div class="form-group">
			<!-- <button class="btn btn-dark"><a href="register.php">Register</a></button> -->	
			<button class="btn btn-info" name="submit" id="submit">Register</button>
		</div>
	</form>
</div>
<!-- </body>
</html> -->

<script type="text/javascript">
$(document).ready(function(){
	$('#firstname').change(function(){
		var firstname=$('#firstname').val();
		if(firstname!=""){
			$.ajax({
				url:"<?php echo base_url(); ?>register_controller/checkdulicate",
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