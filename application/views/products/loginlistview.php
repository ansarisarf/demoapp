<div class="row">
    <div class="col-lg-12">           
        <h2>Name data Listing          
        </h2>
     </div>
</div>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
      <tr>
          <th>Firstname</th>
          <th>Lastname</th>
      <th>Action</th>
      </tr>
  </thead>
  <tbody>
    
   <?php foreach ($data as $d) { ?>      
      <tr>
          <td><?php echo $d->firstname; ?></td>
          <td><?php echo $d->lastname; ?></td>          
      <td>
        <form method="DELETE" action="<?php echo base_url('logincontroller/delete/'.$d->id);?>">
         <a class="btn btn-info btn-xs" href="<?php echo base_url('logincontroller/edit/'.$d->id) ?>"><i class="glyphicon glyphicon-pencil"></i></a>
          <button type="submit" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
        </form>
      </td>     
      </tr>
      <?php } ?>
  </tbody>
</table>
</div>