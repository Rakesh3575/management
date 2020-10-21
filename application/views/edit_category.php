 
<?php 
 $this->load->view('common.php');
?>

<div class="container">
  <h2>Category</h2>
	
  <form method="post" action="<?php echo base_url()?>edit_category/<?php echo $edit_cat->id; ?>">
    <div class="form-group">

      <input type="hidden" name="id" class="form-control" value="<?php echo $edit_cat->id; ?>" id="id" placeholder="Enter category" >
      <label for="email">Email:</label>
      <input type="text" class="form-control" value="<?php echo $edit_cat->category_name; ?>" id="category" placeholder="Enter category" name="category_name">
    </div>   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>