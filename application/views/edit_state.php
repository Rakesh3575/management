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
                            Edit state
                        </header>
                        <div class="panel-body">
                    <form class="form-inline" role="form" method="post"  id="state" class="add_state" action="<?php echo base_url(); ?>edit_state/<?php echo $state[0]->id; ?>">
                                <input name="id" id="id" value="<?php echo $state[0]->id; ?>" type="hidden" display="none" >
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail2">State Name</label>
                                    <input type="text" value="<?php echo $state[0]->name; ?>" class="form-control" id="name" name="name" placeholder="Text">
                                </div>      <?php //echo "<pre>"; print_r($state);?>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail2">Country</label>
                                    <select id="country_id" name="country_id" class="form-control m-bot15">
                                        <option value="" selected="">---Select Country ----</option>
                                        <?php
                                        foreach ($country as $row) { 
                                        if ($row['id'] == $state[0]->country_id) {
                                        ?>
                                        <option value="<?php echo $row['id']; ?>" selected>
                                            <?php echo $row['name']; ?>
                                        </option>
                                        <?php
                                        } else {?>
                                        <option value="<?php echo $row['id']; ?>">
                                            <?php echo $row['name']; ?>
                                        </option>
                                        <?php }
                                        }
                                        ?>
                                    </select>
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
