<style type="text/css">
	.star
	{
		color: red;
	}
</style>
 
<?php 
 $this->load->view('common.php');
?>

<div class="content-page"> 	<!-- Start content page-->
	<div class="content">	<!-- Start content -->
		<div class="container-fluid">	<!-- Start container -->
			<div class="row"><!-- Start row -->
				<div class="col-xl-8">
					<div class="card-box">
						<h4 class="header-title m-t-0 m-b-30">Banner<hr></h4>
						 <form action="<?php echo base_url()?>add_banner" method="post" id="upload_form" name="upload_form" enctype="multipart/form-data" data-parsley-validate novalidate >
							<div class="form-group">
								<label for="category">Titile Banner<span class="star"> * </span></label>
								<input type="text" name="title" id="title" required="required" placeholder="Enter Title" class="form-control" >
							</div>

							<div class="form-group">
								<label for="category">Upload Banner<span class="star"> * </span></label>
								<input type="file" required="required"  class="dropify" data-height="150" data-width="150" name="banner"/>
 							</div>

							<div class="form-group text-right m-b-0">
								<button class="btn btn-info waves-effect waves-light" onclick="sd();" type="submit">
									Submit
								</button>
								<button type="reset" class="btn btn-secondary waves-effect waves-light m-l-5"> 	Cancel
								</button>
							</div>
						</form>
					</div>
				</div><!-- end col -->
			</div> <!-- end row -->
		</div> <!-- end container -->
	</div> <!-- end content -->
</div><!-- end content-page -->

<!--Start View category -->

<div class="content-page"> 	<!-- Start content page-->
	<div class="content">	<!-- Start content -->
		<div class="container-fluid">	<!-- Start container -->
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
						<h4 class="m-t-0 header-title">View Banner<hr></h4>

						<table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>id</th>
									<th>Image</th>
									<th>Category</th>
									<th>Status</th>
									<th>Action</th>
									 
								</tr>
							</thead> 
							<tbody>
						<?php //print_r($banner);
							if($banner)
							{	$i=0;
								foreach ($banner as $value) {
									 ?><tr>
									 	<td><?php echo $i; $i++;?></td>

									 	<td> <?php if($value->banner != ""){ ?>
									 		<img src="<?php echo base_url()?>uploads/banner/<?php echo $value->banner;?>" width="100px" height="150px">
									 		<?php }else{ ?> <img src="<?php echo base_url() ?>uploads/banner/avtar.jpg" width="100px;" height="100px;"><?php } ?>
									 	</td>

									 	<td><?php echo $value->title;?></td>

									 	<td><?php if($value->status==1){ ?> <span  style="color: green; font-weight: 500;">Active</span><?php }else{ ?>  <span  style="color: red; font-weight: 500;">De-Active</span> <?php } ?></td>
 
									 	<td>  <?php if($value->status==1){ ?><a href="<?php echo base_url()?>inactive_banner/<?php echo $value->banner_id; ?>"> De-Active </a> ||
									 	 <a href="<?php echo base_url()?>edit_banner/<?php echo $value->banner_id; ?>">Edit</a>
									<?php }else{?> <a href="<?php echo base_url()?>active_banner/<?php echo $value->banner_id; ?>">Active </a> <?php } ?></td>
									 </tr>
								<?php }
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


    <script type="text/javascript">
        function sd()
        {
            $("#upload_form").validate({
                rules:
                { 
                   title: {
                        required: true,
                        //remote: {
                            // url: base_path() + "admin/chk_database_country",
                            // type: "post",
                        //}
                    },
                },
                messages: {
                    title:{
                        required:"Please Enter Banner Name!!",
                        // remote: "Country Name is already exist!"
                    },
                }
            });
        }
        $(function() {
$('#countryname').focus(); // Init focus on first link
});
</script>

