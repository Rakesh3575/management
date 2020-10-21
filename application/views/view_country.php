<?php
$this->load->view('common.php');
?>
<style type="text/css">
  .star
  {
    color: red;
  }
</style>

 
<div class="content-page">  <!-- Start content page-->
  <div class="content"> <!-- Start content -->
    <div class="container-fluid"> <!-- Start container -->
      <div class="row"><!-- Start row -->
        <div class="col-xl-8">
          <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">Country<hr></h4>
            <h2>country</h2>
             <form method="post" name="upload_form" id="upload_form"  action="<?php echo base_url();?>view_country">
              <div class="form-group">
                <label for="email">Country:</label>
                <input type="text" class="form-control" id="name" required="" placeholder="Enter country" name="name">
              </div>
              <button type="submit" class="btn btn-primary" onclick="Validate();">Submit</button>
            </form>
          </div>
        </div><!-- end col -->
      </div> <!-- end row -->
    </div> <!-- end container -->
  </div> <!-- end content -->
</div><!-- end content-page -->

<!--Start View category -->
<div class="content-page">  <!-- Start content page-->
  <div class="content"> <!-- Start content -->
    <div class="container-fluid"> <!-- Start container -->
      <div class="row"><!-- Start row -->
        <div class="col-xl-8">
          <div class="col-12 pull-right">
            <?php if ($this->session->flashdata('message')) {
              $alert = $this->session->flashdata('message'); ?>
              <div class="alert alert-<?php echo $alert['class']; ?> alert-dismissible alert-own">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo $alert['tag']; ?></strong> <?php echo $alert['message']; ?>
              </div>
            <?php } ?>
          </div>
          <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">View Country<hr></h4>
            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Category</th>
                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
                <?php if($country){ $no=1;
                  foreach($country as $value){ ?>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $value['name'];  ?></td>
                    <td>
                      <?php if($value['status']==1)
                      { ?>
                        <a href="<?php echo base_url(); ?>edit_country/<?php echo $value['id']; ?>">edit</a> ||
                        <a href="<?php echo base_url(); ?>inactive_country/<?php echo $value['id']; ?>"> In-Active</a>
                      <?php }else{?>
                        <a href="<?php echo base_url(); ?>active_country/<?php echo $value['id']; ?>"> Active</a>
                        <?php } ?></td>

                      </tr>
                      <?php
                      $no++;
                    }
                  } ?>
                </tbody>
              </table>
            </div>
          </div><!-- end col -->
        </div> <!-- end row -->
      </div> <!-- end container -->
    </div> <!-- end content -->
  </div><!-- end content-page -->
  <script type="text/javascript">
    function Validate()
    {
      $("#upload_form").validate({
        rules:
        {
          name: {
            required: true,
  //remote: {
  // url: base_path() + "admin/chk_database_country",
  // type: "post",
  //}
},
},
messages: {
  name:{
    required:"Please Enter Country Name!!",
  // remote: "Country Name is already exist!"
},
}
});
    }
    $(function() {
  $('#countryname').focus(); // Init focus on first link
});
</script>