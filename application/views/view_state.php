<style type="text/css">
  .star
  {
    color: red;
  }
</style>
<?php
$this->load->view('common.php');
?>
<div class="content-page">  <!-- Start content page-->
  <div class="content"> <!-- Start content -->
    <div class="container-fluid"> <!-- Start container -->
      <div class="row"><!-- Start row -->
        <div class="col-xl-8">
          <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">State<hr></h4>
            <h2>State</h2>
            <form class="form-inline" role="form" method="post"  id="state" class="add_state" action="<?php echo base_url(); ?>admin/view_state">
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail2">State Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Text">
              </div>
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail2">Country</label>
                <select id="country_id" name="country_id" class="form-control m-bot15">
                  <option value="" selected="">---Select Country ----</option>
                  <?php
                  foreach ($country as $row) {
                    ?>
                    <option value="<?php echo $row['id']; ?>">
                      <?php echo $row['name']; ?>
                    </option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <button type="submit" onclick="sd();" class="btn btn-primary">Insert</button>
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

          <div class="card-box table-responsive">
            <div class="col-12 pull-right">
              <?php if ($this->session->flashdata('message')) {
                $alert = $this->session->flashdata('message'); ?>
                <div class="alert alert-<?php echo $alert['class']; ?> alert-dismissible alert-own">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><?php echo $alert['tag']; ?></strong> <?php echo $alert['message']; ?>
                </div>
              <?php } ?>
            </div>
            <h4 class="m-t-0 header-title">View State<hr></h4>
            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Country Id</th>
                  <th>StateName</th>
                  <th>Country Name</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($state) {
                  $no = 1;
                  foreach ($state as $data) {
                    ?>
                    <tr class="gradeX">
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['name']; ?></td>
                      <td><?php
                      foreach ($country as $country_id) {
                        if ($country_id['id'] == $data['country_id']) {
                          echo $country_id['name'];
                        }
                      }
                      ?>
                    </td>
                    <td>
                      <a href="<?php echo base_url() ?>edit_state/<?php echo $data['id']; ?>">Update</a>
                    </td>  <td>
                      <?php
                      if ($data['status'] == 1) {?>
                        <a href="<?php echo base_url() ?>inactive_status/<?php echo $data['id']; ?>" onClick="return confirm('Are You Sure You Want In-Active?')" onClick= "return confirm('Are Sure In Active' )">In-Active</a>
                        <?php
                      } else {
                        ?>
                        <a href="<?php echo base_url() ?>restore_status/<?php echo $data['id']; ?>" onClick="return confirm('Are You Sure You Want Active?')" onClick= "return confirm('Are Sure Active' )">Active</a>
                      <?php }?>
                    </td>
                  </tr>
                  <?php $no++;
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div><!-- end col -->
    </div> <!-- end row -->
  </div> <!-- end container -->
</div> <!-- end content -->
  </div><!-- end content-page -->