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
						<h4 class="header-title m-t-0 m-b-30">Edit Banner<hr></h4>
					    <form action="<?php echo base_url()?>edit_banner/<?php echo $edit_banner[0]->banner_id; ?>" method="post" name="upload_form" enctype="multipart/form-data" data-parsley-validate novalidate >
  					<input type="hidden" name="id" id="id" value="<?php echo $edit_banner[0]->banner_id; ?>">
  					<input type="hidden" name="old_banner" id="old_banner" value="<?php echo $edit_banner[0]->banner; ?>">

							<div class="form-group">
								<label for="category">Titile Banner<span class="star"> * </span></label>
								<input type="text" name="title" parsley-trigger="change" required
								placeholder="Enter Title" class="form-control"  value="<?php echo $edit_banner[0]->title; ?>">
							</div>

							<div class="form-group">
								<label for="category">Upload Banner<span class="star"> * </span></label>
						  			<input type="file" name="banner" />  	
								<img src="<?php echo base_url()?>uploads/banner/<?php echo $edit_banner[0]->banner; ?>" alt="<?php echo $edit_banner[0]->banner; ?>" width="130px;" height="150px;" />  </div>
  
  							<div class="form-group text-right m-b-0">
								<button class="btn btn-info waves-effect waves-light" type="submit">
									Submit </button>
								<button type="reset" class="btn btn-secondary waves-effect waves-light m-l-5"> Cancel
								</button>
							</div>
						</form>
					</div>
				</div><!-- end col -->
			</div> <!-- end row -->
		</div> <!-- end container -->
	</div> <!-- end content -->
</div><!-- end content-page -->
 