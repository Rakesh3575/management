<?php 
 $this->load->view('common.php');
?>

<div class="container">
  <h2>Admin Panel</h2>
  <?php
   if($this->session->flashdata('user')) {
          $alert = $this->session->flashdata('user'); ?>
     <div class="alert alert-<?php echo $alert['class']; ?> alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><?php echo $alert['tag']; ?></strong>&nbsp;<?php echo $alert['user'];   ?>
   </div>
<?php
 } ?>
 
  <form method="post" action="<?php echo base_url();?>admin/admin_login">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="username" placeholder="Enter username" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
