<?php  //echo $country[0]->name ; 
 $this->load->view('common.php');
?>
<section>
	<!-- main content start-->
	<div class="main-content" >
		<!--body wrapper start-->
		<div class="wrapper">
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading">
							Edit Country
						</header>
						<div class="panel-body">
							<form class="form-inline" role="form" id="country" method="post" action="<?php echo base_url(); ?>admin/edit_country/<?php echo $country[0]->id; ?>">
							<input name="cid" id="cid" value="<?php  echo $country[0]->id; ?>" type="hidden" display="none" >

								<div class="form-group">
									<label class="sr-only" for="exampleInputEmail2">Email address</label>
									<input type="text" class="form-control" id="name" name="name" value="<?php echo $country[0]->name ; ?>" placeholder="Enter email">
								</div>
								 
								<button type="submit" onclick="sd();" class="btn btn-primary">Update</button>
							</form>
						</div>
					</section>
				</div>
			</div>
		</div>
		<!--body wrapper end-->
	</div>
	<!-- main content end-->
</section>

        <script type="text/javascript">
           function sd()
           {
                    $("#country").validate({
                    rules:
                    {
                        name: {
                            required: true,
                            remote: {
                                url: base_path() + "admin/chk_edit_country",
                                type: "post",
                                data: {
                                	name: function() {
                                		return $("#name").val();
                                	}
                                	id: function() {
									return $("#cid").val();
									}
                                }
                            }
                        },

                    },
                    messages: {

                        name:{
                            required:"Please Enter Country Name!!",
                            remote: "Country Name is already exist!"
                        },

                    }
                });

}
$(function() {
    $('#name').focus(); // Init focus on first link
});
        </script>
