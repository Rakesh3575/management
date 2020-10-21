 
<?php 
$this->load->view('common.php');
       // print_r($joincategory);die();
?>
 <div class="container">
  <h2>Sub Category</h2>

  <form method="post" action="<?php echo base_url()?>edit_subcategory/<?php echo $edit_subcat->id; ?>">
    <div class="form-group"> 
      <input type="hidden" class="form-control" value="<?php echo $edit_subcat->id; ?>" id="category" placeholder="Enter category" name="id">
      <label for="email">SubCategory:</label>
      <input type="text" class="form-control" value="<?php echo $edit_subcat->subcategory_name; ?>" id="subcategory_name" placeholder="Enter Sub category" name="subcategory_name">
    </div>
 
    <div class="form-group"> 
     <label for="email">category:</label>
     <select name="category_id" >
      <?php if($category)
      { 
        foreach ($category as $cunty)
         {
          ?>   <option value="<?php echo $cunty->id; ?>" 
            <?php if($edit_subcat->category_id==$cunty->id)
            { ?> selected <?php } ?> >
            <?php echo $cunty->category_name; ?></option> 
          <?php } 
        }   ?>
        </select>
      </div>   
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>