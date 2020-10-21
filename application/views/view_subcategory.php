 
<?php 
 $this->load->view('common.php');
?>

<div class="container">
  <h2>Sub Category</h2>
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
  <form method="post" action="<?php echo base_url();?>admin/add_subcategory">
    <div class="form-group">
      <label for="email">Sub Category:</label>
      <input type="text" class="form-control" id="subcategory" placeholder="Enter subcategory" name="subcategory_name">
    </div> 
     <div class="form-group"> 
       <label for="email">category:</label>
       <select name="category_id" class="form-control">
        <?php foreach ($category as $value) { ?>
           <option value="<?php echo $value->id; ?>"><?php echo $value->category_name; ?></option> 
 <?php       } ?>
        </select>
    </div>   
     
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
 
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Sub Category</th>
      <th scope="col"> Category</th>
      <th scope="col">Action</th> 
    </tr>
  </thead>
  <tbody>
    <tr>
    	<?php if($subcategory){
// print_r($get_category);die;
       $no=1;
    	 foreach($subcategory as $value){ ?>
      <th scope="row"><?php echo $no; ?></th>
      <td><?php echo $value->subcategory_name; ?></td>
      <td><?php //echo $value->category_name;
       if($category){
        foreach ($category as $cvalue) {
          if($cvalue->id == $value->category_id) 
            echo $cvalue->category_name;
        }
      }  ?></td>
       <td><a href="<?php echo base_url(); ?>edit_subcategory/<?php echo $value->id; ?>">edit</a></td>
            <td><a href="<?php echo base_url(); ?>delete_subcategory/<?php echo $value->id; ?>" onClick="return confirm('Are You Sure?')">Delete</a></td>
     
     </tr>
     <?php 
  $no++;
 }
 
 } ?>
  </tbody>
</table>