<div class="container">
    <div class="col-lg-12">           
       <h2>Name data Listing</h2>
     </div>
<div class="table-responsive">
	<table class="table table-bordered" style="width: 80%;">
		<thead>
	    <!-- <?php echo "<pre>"; print_r($data); ?> -->
	      <tr>
	        <th>First Name</th>
	        <th>Last Name</th>
	      	<th>Action</th>
	      </tr>
	  	</thead>
			<tbody>
				<?php foreach ($data as $value) { ?>
	    			<tr>
						<td><?php echo $value->firstname; ?></td>
          				<td><?php echo $value->lastname; ?></td> 
<td>
    <form method="DELETE" action="<?php echo base_url('register_controller/delete/'.$value->id);?>">
			 <a class="btn btn-info btn-xs" href="<?php echo base_url('register_controller/edit/'.$value->id) ?>"><i class="glyphicon glyphicon-pencil"></i></a>
		<button type="submit" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
	</form>					
</td>
					</tr>
				<?php } ?>					
			</tbody>
	</table>
</div>
</div>