<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Sub Category Narration";
?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php  include "left_menu.php"; ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class=" mt-4"><?php echo $title;  ?></h1>
                <?php include 'bedcrum.php'; ?>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br>
                    </div>
                    <div class="col-md-12 ">
                        <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>

                        <div id="gridview">
                        </div>

                    </div>
        </main>

        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Update Sub Category Narration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo base_url();?>admin/subcatnarration"
                            enctype='multipart/form-data'>
                            <input type="hidden" name="olsubid" class="olsubid">
                            <div class="form-group subcat_id">
                                <label><span class="text-danger">*</span>Sub Category</label><br>
                                <select name="Sub_Category_ID" class="form-control selectpicker"
                                    data-hide-disabled="true" data-live-search="true" id="uid">
                                    <?php $getsubcategory = $this->db->get('sub_category')->result();
                                        if ($getsubcategory) { foreach ($getsubcategory as $key ) {?>
                                    <option value="<?= $key->Sub_Category_ID?>"><?= $key->Sub_Category_Name?>
                                    </option>
                                    <?php }
                                        }
                                    ?>
                                </select>

                            </div>
                            <!-- <div class="form-group">
                                <label><span class="text-danger">*</span> Title </label><br>
                                <input type="text" placeholder="Enter title" id="Text_On_Image" name="Text_On_Image"
                                    class="form-control">
                            </div> -->
                            <div class="form-group">
                                <label><span class="text-danger">*</span> Slider Image</label><br>
                                <input type="file" name="uaddfile" id="uaddfile"
                                    accept="image/x-png,image/gif,image/jpeg"><br>
                                <small><i>Please select the size of image 1366*250</i></small><br>
                                <input type="hidden" id="oldimage" name="oldimage" />
                                <span id="uimageone"></span>
                            </div>
                            <span id="jerror"></span>
                            <!-- <div class="form-group">
                                <label><span class="text-danger">*</span> Banner Image</label><br>
                                <input type="file" name="uaddfiletwo" id="uaddfiletwo"
                                    accept="image/x-png,image/gif,image/jpeg"><br>
                                <small><i>Please select the size of image 1400*250</i></small><br>
                                <input type="hidden" id="oldimagetwo" name="oldimagetwo" />
                                <span id="uimagetwo"></span>
                            </div> -->

                            <div class="form-group">
                                <label><span class="text-danger">*</span> Narration</label><br>
                                <textarea type="text" name="utestcontent" id="utestcontent" placeholder="Enter content"
                                    class="form-control"></textarea>
                                <br>
                            </div>
                            <span id="ujerror"></span>

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatenarration" value="updatenarration" class="btn btn-primary"
                            onclick="return validateone();">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Add Sub Category Narration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo base_url();?>admin/subcatnarration"
                            enctype='multipart/form-data'>

                            <div class="form-group">
                                <label><span class="text-danger">*</span>Sub Category</label><br>
                                <select name="Sub_Category_ID" class="form-control selectpicker"
                                    data-hide-disabled="true" data-live-search="true">
                                    <option selected="true" disabled="disabled">Select Sub Category</option>
                                    <?php $getsubcategory = $this->db->get('sub_category')->result();
                                        if ($getsubcategory) { foreach ($getsubcategory as $key ) {?>
                                    <option value=" <?= $key->Sub_Category_ID?>"><?= $key->Sub_Category_Name?>
                                    </option>
                                    <?php }
                                        }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label><span class="text-danger">*</span>Top Banner</label><br>
                                <input type="file" name="addfile" id="addfile"
                                    accept="image/x-png,image/gif,image/jpeg"><br>
                                <small><i>Please select the size of image 1366*250</i></small><br>
                            </div>
                            <span id="jerror1"></span>
                            <!-- <div class="form-group">
                                <label><span class="text-danger">*</span> Banner Image</label><br>
                                <input type="file" name="addbanner" id="addbanner"
                                    accept="image/x-png,image/gif,image/jpeg"><br>


                            </div> -->
                            <!-- <div class="form-group">
                                <label><span class="text-danger">*</span> Title </label><br>
                                <input type="text" placeholder="Enter title" id="price" name="Text_On_Image"
                                    class="form-control">
                            </div> -->

                            <div class="form-group">
                                <label><span class="text-danger">*</span> Narration</label><br>
                                <textarea type="text" name="subcatnarration" id="subcatnarration"
                                    placeholder="Enter content" class="form-control"></textarea>
                            </div>


                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addnarration" value="addnarration" class="btn btn-primary"
                            onclick="return validate();">Add</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php include "footer.php";  ?>
    </div>
</div>
<?php include "scripts.php";  ?>

<script>
CKEDITOR.replace('subcatnarration', {
    extraPlugins: 'colorbutton,colordialog'
});
CKEDITOR.replace('utestcontent', {
    extraPlugins: 'colorbutton,colordialog'
});
$(document).ready(function() {
    getdata();
    var _URL = window.URL || window.webkitURL;
    $("#addfile").change(function(e) {
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            var objectUrl = _URL.createObjectURL(file);
            img.onload = function() {

                if ((this.width < 1366)) {
                    $('#jerror1').html(
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select the size of image 1366*250 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                    );
                    $("#addfile").val('');
                }
                if ((this.height < 250)) {
                    $('#jerror1').html(
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select the size of image 1366*250<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                    );
                    $("#addfile").val('');
                }
                _URL.revokeObjectURL(objectUrl);
            };
            img.src = objectUrl;
        }
    });
    $("#uaddfile").change(function(e) {
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            var objectUrl = _URL.createObjectURL(file);
            img.onload = function() {

                if (this.width < 1366 && this.height < 250) {
                    $('#jerror').html(
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select the size of image 1366*250<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                    );
                    $("#uaddfile").val('');
                }
                _URL.revokeObjectURL(objectUrl);
            };
            img.src = objectUrl;
        }
    });
});

function update(uid, uimageone, utestcontent, subcategoryname) {
    $('#uid').val(atob(uid));
    console.log($('#Text_On_Image'));
    $('#oldimage').val(atob(uimageone));
    $('#uimageone').html('<img style="width:100%;" src="<?php echo base_url();?>uploads/subcategorynarration/' + (atob(
        uimageone)) + '">');
    CKEDITOR.instances['utestcontent'].setData(atob(utestcontent));
    //We need to show the text inside the span that the plugin show
    $('.subcat_id div.filter-option div.filter-option-inner div.filter-option-inner-inner').text(
        subcategoryname);

    //Check the selected attribute for the real select
    $('select[name=Sub_Category_ID]').val(atob(uid));
    $('.olsubid').val(atob(uid));
}

// function validate() {
//     var subcatid = $('select[name=subcatid').val();
//     var imageone = $('input[name=addfile').val();
//     var imagetwo = $('input[name=addbanner').val();
//     var content = CKEDITOR.instances['subcatnarration'].getData().replace(/<[^>]*>/gi, '').length;

//     if (subcatid.trim() == '') {
//         $('select[name=subcatid]').focus();
//         $('#jerror').html(
//             '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select Sub Category <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
//         );
//         return false;

//     } else if (imageone.trim() == '') {
//         $('#addfile').focus();
//         $('#jerror').html(
//             '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select slider image <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
//         );
//         return false;

//     } else if (imagetwo.trim() == '') {
//         $('#addbanner').focus();
//         $('#jerror').html(
//             '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select banner image <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
//         );
//         return false;

//     } else if (content == 0) {
//         $('#subcatnarration').focus();
//         $('#jerror').html(
//             '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
//         );
//         return false;

//     } else {

//         return true;
//     }


// }

// function validateone() {
//     var content = CKEDITOR.instances['utestcontent'].getData().replace(/<[^>]*>/gi, '').length;


//     if (content == 0) {
//         $('#subcatnarration').focus();
//         $('#ujerror').html(
//             '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
//         );
//         return false;

//     } else {

//         return true;
//     }


// }

function getdata() {
    $('.loader').show();
    var loadpage = "load_subcategorycontent.php";
    var model = "subcontent";
    $.ajax({
        type: 'POST',
        url: "load_table",
        data: {
            "loadpage": loadpage,
            "model": model
        },
        success: function(dataload) {
            $("#gridview").html(dataload);
            $('.loader').hide();

        }
    });
}


function btnclickdelete(id, table) {

    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this sub category narration!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    type: 'POST',
                    url: "delete",
                    data: {
                        "id": id,
                        "table": table
                    },
                    success: function(data1234) {
                        if (data1234 == 'ok') {
                            getdata();


                        } else {
                            swal("Sorry! Please try again");
                        }
                    }
                });

            }
        });
}


function verify(id, status, table) {
    swal({
            title: "Are you sure?",
            text: "You want to active this sub category narration!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'POST',
                    url: "update",
                    data: {
                        "id": id,
                        "status": status,
                        "table": table
                    },
                    success: function(data112) {
                        if (data112 == 'ok') {
                            getdata();

                        } else {
                            swal("Sorry! Please try again");

                        }
                    }
                });

            }
        });

}



function unverify(id, status, table) {
    swal({
            title: "Are you sure?",
            text: "You want to deactive this sub category narration!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    type: 'POST',
                    url: "update",
                    data: {
                        "id": id,
                        "status": status,
                        "table": table
                    },
                    success: function(data13) {

                        if (data13 == 'ok') {
                            getdata();
                        } else {
                            swal("Sorry! Please try again");
                        }
                    }
                });

            }
        });

}
</script>
</body>

</html>