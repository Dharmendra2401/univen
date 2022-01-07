<?php  
include "top_head1.php"; 
include "left_menu1.php";
?>

<div class="row">
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add">Add Module</button><br><br>
    </div>
    <div class="col-md-12 ">
        <?php include "alert.php"; ?>
        <div id="gridview">
            <table id="example1" class="table table-striped table-bordered " width='100%'>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Module Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; if(!empty($modules_list)){
                        foreach($modules_list as $data){ ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data->Backend_Mod_Name ?></td>
                        <td class="tablebutton"> 
                            <a href="#" title="edit" data-toggle="modal" data-target="#update" onclick="return update('<?php echo base64_encode($data->Back_Mod_ID); ?>','<?php echo base64_encode($data->Backend_Mod_Name); ?>');" class="rounded btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            
                            <?php if($data->Active_Status=='1'){ ?>
                            <a href="#" title="Click here to deactive" data-toggle="modal"  onclick="return change_status('<?php echo $data->Back_Mod_ID; ?>','0');" class="rounded btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                            <?php }else{ ?>
                            <a href="#" title="Click here to active" data-toggle="modal"  onclick="return change_status('<?php echo $data->Back_Mod_ID; ?>','1');" class="rounded btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                            <?php } ?>
                            <a href="#" title="delete" data-toggle="modal"  onclick="return btnclickdelete('<?php echo $data->Back_Mod_ID; ?>','backend_module');" class="rounded btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                       
                    </tr>
                    <?php $i++; } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</main>                                 
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Update <span id="type" class="text-capitalize"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>master/modules" name="form_edit_module" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Module </label><br>
                            <input type="text" name="edit_module_name" id="edit_module_name" placeholder="Module Name" class="form-control" maxlength="150">
                        </div>
                        <span id="jerror"></span>
                        <input type="hidden" id="uid" name="uid">
                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updated" value="updated" class="btn btn-primary" >Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Add </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body controls"> 
                        <form method="post" action="<?php echo base_url();?>master/modules" id="form_add_module" name="form_add_module" onsubmit="return validate();" >
                            <div class="form-group">
                                <label><span class="text-danger">*</span> Module </label>
                            </div>
                            <div class="entry input-group form-group col-xs-3">
                                <input class="form-control" name="add_module_name[]" type="text" placeholder="Module Name" />
                                <span class="input-group-btn">
                                    <button class="btn btn-success btn-add" type="button">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" name="add" value="add" class="btn btn-primary" onclick="$('#form_add_module').submit()">Add</button>
                    </div>
                </div>
            </div>
        </div>

<?php include "footer1.php";  ?>

<?php include "scripts.php";  ?>

<script>
var error_html = '<div class="alert alert-danger alert-dismissible fade show" role="alert">This field is required <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

function update(uid,module_name){
    $('#uid').val(atob(uid));
    $('#edit_module_name').val(atob(module_name));
}
$(function(){
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="fa fa-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;
    });
});

    // var text = '<div class="form-group"><input type="text" name="add_module_name[]" placeholder="Module Name" class="form-control" maxlength="150"></div>';
    // $("#module_body").append(text);



function validate(){
    var count = 0;    

     $('input[name="add_module_name[]"]').each(function() {
        var val = $(this).val();
        if(val)
            count++;    
      });
     if(!count){
        $(".entry:first").append("<br>"+error_html);
        return false;
    }
    return true;
    // $("#form_add_module").submit();


}

$("form[name='form_edit_module']").validate({
    rules: {
      edit_module_name: "required",
    },
    submitHandler: function(form) {
      form.submit();
    }
  });


function btnclickdelete(id,table)
{
    
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this module",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
      .then((willDelete) => {
      if (willDelete) {
        
      $.ajax({
       type: 'POST',
       url: "<?php echo base_url()?>master/delete",
       data: {"id":id,"table":table,"column":'Back_Mod_ID'},
       success: function(response){
       if(response=='1')	
       {	
        location.reload(); 
        }
        else {
        swal("Sorry! Please try again");
        }
} 
});	
    
  } 
});
}


function change_status(id,status){
    
    if(status==0)
        var msg = "You want to deactive this module!";
    else
        var msg = "You want to active this module!";
    swal({
        title: "Are you sure?",
        text: msg,
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
      .then((willDelete) => {
      if (willDelete) {
        $.ajax({
        type: 'POST',
        url: "change_status",
        data: {"id":id,"status":status},
        success: function(data112){ 
       if(data112=='1')	
       {	
        location.reload();
        
        }
        else {
        swal("Sorry! Please try again");

        }
} 
});	
    
  } 
});
	
}	

$(document).ready(function() {
    
    var table =$('#example1').DataTable({searching: true, paging: true, info: false});
    $('.dataTables_length').css('display', 'inline-block');
    // $('.dataTables_filter').css({
    //     'display': 'inline-block',
    //     'float': 'right'
    // });
    
});



</script>

