<?php
$this->load->view('common.php');
?>
<style type="text/css">
.star
{
  color: red;
}
</style>

<button id="btnAdd" class="btn btn-success">Add New</button>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <form id="myForm" action="" method="post" class="form-horizontal">
          <input type="hidden" name="txtId" value="0">
          <div class="form-group">
            <label for="name" class="label-control col-md-4">Employee Name</label>
            <div class="col-md-8">
              <input type="text" name="txtEmployeeName" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="address" class="label-control col-md-4">Address</label>
            <div class="col-md-8">
              <textarea class="form-control" name="txtAddress"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
            <div class="alert alert-success" style="display: none;">
    
          </div>
          <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">View employee<hr></h4>
            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>id</th>
                  <th>employee</th>
                  <th>Address</th>
                  <th>created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="showdata">
                
                </tbody>
              </table>
            </div>
          </div><!-- end col -->
        </div> <!-- end row -->
      </div> <!-- end container -->
    </div> <!-- end content -->
  </div><!-- end content-page -->

  <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
          Do you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


  <script type="text/javascript">
    $(function() {
    showAllEmployee();

      $('#btnAdd').click(function() {
        $('#myModal').modal('show');
        $('#myModal').find('.modal-title').text('Employee Modal');
        $('#myForm').attr('action', '<?php echo base_url()?>add_employee');
      });
      $('#btnSave').click(function()
      {
        var url = $('#myForm').attr('action');
        var data = $('#myForm').serialize();
      //Validate form
      var employeeName = $('input[name=txtEmployeeName]');
      var address = $('textarea[name=txtAddress]');
      var result ='';
      if(employeeName.val()=='')
      {
        employeeName.parent().parent().addClass('has-error');
      }else
      {
        employeeName.parent().parent().removeClass('has-error');
        result +='1';
      }
      if (address.val()=='') {
        address.parent().parent().addClass('has-error');
      }else{
        address.parent().parent().removeClass('has-error');
        result +='2';
      }
      
      if(result=='12'){
        $.ajax({
          type: 'ajax',
          method: 'post',
          url: url,
          data: data,
          async: false,
          dataType: 'json',
          success: function(response){
            if(response.success){
             alert(response.success);
              $('#myModal').modal('hide');
              $('#myForm')[0].reset();
              if(response.type=='add'){
                var type = 'added'
              } else if(response.type=='update'){
                var type ="updated"
                alert(type);
              }
              $('.alert-success').html('Employee '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');

              showAllEmployee();
            }else{
              alert('Error');
            }
          },
          error: function(){
            alert('Could not add data');
          }
        });
      }
    });

          //delete- 
    $('#showdata').on('click', '.item-delete', function(){
      var id = $(this).attr('data');
      $('#deleteModal').modal('show');
      //prevent previous handler - unbind()
      $('#btnDelete').unbind().click(function(){
        $.ajax({
          type: 'ajax',
          method: 'get',
          async: false,
          url: '<?php echo base_url() ?>deleteEmployee',
          data:{id:id},
          dataType: 'json',
          success: function(response){
            if(response.success){
              $('#deleteModal').modal('hide');
              $('.alert-success').html('Employee Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
              showAllEmployee();
            }else{
              alert('Error');
            }
          },
          error: function(){
            alert('Error deleting');
          }
        });
      });
    });

  //edit
    $('#showdata').on('click', '.item-edit', function(){
      var id = $(this).attr('data');
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Edit Employee');
      $('#myForm').attr('action', '<?php echo base_url() ?>updateEmployee');
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>editEmployee',
        data: {id: id},
        async: false,
        dataType: 'json',
        success: function(data){
          $('input[name=txtEmployeeName]').val(data.employee);
          $('textarea[name=txtAddress]').val(data.address);
          $('input[name=txtId]').val(data.id);
        },
        error: function(){
          alert('Could not Edit Data');
        }
      });
    });
      function showAllEmployee() {
          url= "<?php echo base_url();?>employee_list";
          
           $.ajax({
           url: url,
           type: 'ajax',
           dataType: 'json',
          success:function(data){ 

          var html = '';
          var i;
          for(i=0; i<data.length; i++){
          
            html +='<tr>'+
                  '<td>'+data[i].id+'</td>'+
                  '<td>'+data[i].employee+'</td>'+
                  '<td>'+data[i].address+'</td>'+
                  '<td>'+data[i].created_at+'</td>'+
                  '<td>'+
                    '<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">Edit</a>'+
                    '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'">Delete</a>'+
                  '</td>'+
                  '</tr>';
          }
              $('#showdata').html(html);

              }, 
         error: function(){
          alert('Could not get Data from Database');
        }
          });          
         
      }

    });


    function Validate()
    {
      $("#upload_form").validate({
        rules:
        {
          name: {
            required: true,
      //remote: {
      // url: base_path() + "admin/chk_database_employee",
      // type: "post",
      //}
    },
  },
  messages: {
    name:{
      required:"Please Enter employee Name!!",
      // remote: "employee Name is already exist!"
    },
  }
});
    }
    $(function() {
      $('#employeename').focus(); // Init focus on first link
    });
  </script>