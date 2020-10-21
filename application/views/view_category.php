 
<?php 
 $this->load->view('common.php');
?>

<div class="container">
  <h2>Category</h2>
  <?php
   if($this->session->flashdata('user'))
    {
          $alert = $this->session->flashdata('user'); ?>
                   
    <div class="alert alert-<?php echo $alert['class']; ?> alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><?php echo $alert['tag']; ?></strong>&nbsp;<?php echo $alert['user'];   ?>
   </div>
<?php
 } ?>
  <form method="post" action="<?php echo base_url();?>add_category">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="category" placeholder="Enter category" name="category_name">
    </div>   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
 
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th> 
    </tr>
  </thead>
  <tbody>
    <tr>
    	<?php if($category){ $no=1;
    	 foreach($category as $value){ ?>
      <th scope="row"><?php echo $no; ?></th>
      <td><?php echo $value->category_name;  ?></td>
      <td><a href="<?php echo base_url(); ?>edit_category/<?php echo $value->id; ?>">edit</a></td>
     
     </tr>
     <?php 
  $no++;
 }
 } ?>
  </tbody>
</table>