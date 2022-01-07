<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Sub Category Profile Add";
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
                        <form method="post" action="<?php echo base_url();?>admin/subcatnarrationprofileadd"
                            enctype='multipart/form-data'>
                            <div class="form-group uCategory_ID" id="">
                                <label><span class="text-danger">*</span>Category </label><br>
                                <select name="Category_ID" id="catiddddd" class="form-control selectpicker"
                                    data-hide-disabled="true" data-live-search="true">
                                    <option selected="true" disabled="disabled">Select Category</option>
                                    <?php $getcategory = $this->db->get('category')->result();
                                        if ($getcategory) { foreach ($getcategory as $key ) {?>
                                    <option value="<?= $key->Category_ID?>"><?= $key->Category_Name?> </option>
                                    <?php }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group" id="uSub_Category_ID" class="form-control selectpicker"
                                data-hide-disabled="true" data-live-search="true">
                                <label><span class="text-danger">*</span>Sub Category</label><br>
                                <select name="Sub_Category_ID" id="usub_ID" class="form-control selectpicker"
                                    data-live-search="true">
                                </select>
                            </div>
                            <input type="hidden" name="proid" class="proid">
                            <div class="form-group" id="uIDd">
                                <label><span class="text-danger">*</span> Profile </label><br>
                                <select name="PROFILE_ID" class="form-control selectpicker" data-live-search="true">
                                </select>
                            </div>
                            <div class="form-group">
                                <label><span class="text-danger">*</span>Banner</label><br>
                                <input type="file" name="Image" id="Image11"
                                    accept="image/x-png,image/gif,image/jpeg"><br>
                                <small><i>Please select the size of image 1020*243</i></small><br>
                                <input type="hidden" id="oldimage" name="oldimage" />
                                <span id="uimageone"></span>
                            </div>
                            <span id="jerror1"></span>

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatenarration" value="updatenarration" class="btn btn-primary"
                            onclick="return validate();">Add</button>
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
                        <form method="post" action="<?php echo base_url();?>admin/subcatnarrationprofileadd"
                            enctype='multipart/form-data'>
                            <div class="form-group Category_ID">
                                <label><span class="text-danger">*</span>Category </label><br>
                                <select name="Category_ID" class="form-control selectpicker catidddddddd"
                                    data-hide-disabled="true" data-live-search="true">
                                    <option selected="true" disabled="disabled">Select Category</option>
                                    <?php $getcategory = $this->db->get('category')->result();
                                        if ($getcategory) { foreach ($getcategory as $key ) {?>
                                    <option value="<?= $key->Category_ID?>"><?= $key->Category_Name?> </option>
                                    <?php }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group" id="Sub_Category_ID" class="form-control selectpicker"
                                data-hide-disabled="true" data-live-search="true">
                                <label><span class="text-danger">*</span>Sub Category</label><br>
                                <select name="Sub_Category_ID" id="sub_ID" class="form-control selectpicker"
                                    data-live-search="true">
                                </select>
                            </div>
                            <div class="form-group" id="ID">
                                <label><span class="text-danger">*</span> Profile </label><br>
                                <select name="ID" class="form-control selectpicker" data-live-search="true">
                                </select>
                            </div>

                            <div class="form-group">
                                <label><span class="text-danger">*</span>Banner</label><br>
                                <input type="file" name="Image" id="Image"
                                    accept="image/x-png,image/gif,image/jpeg"><br>
                                <small><i>Please select the size of image 1020*243</i></small><br>


                            </div>
                            <span id="jerror"></span>

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

});
var _URL = window.URL || window.webkitURL;
$("#Image").change(function(e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        var objectUrl = _URL.createObjectURL(file);
        img.onload = function() {

            if ((this.width < 1366)) {
                $('#jerror').html(
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select the size of image 1366*250 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                );
                $("#Image").val('');
            }
            if ((this.height < 250)) {
                $('#jerror').html(
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select the size of image 1366*250<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                );
                $("#Image").val('');
            }
            _URL.revokeObjectURL(objectUrl);
        };
        img.src = objectUrl;
    }
});
$("#Image11").change(function(e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        var objectUrl = _URL.createObjectURL(file);
        img.onload = function() {

            if ((this.width < 1366)) {
                $('#jerror1').html(
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select the size of image 1366*250 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                );
                $("#Image11").val('');
            }
            if ((this.height < 250)) {
                $('#jerror1').html(
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select the size of image 1366*250<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                );
                $("#Image11").val('');
            }
            _URL.revokeObjectURL(objectUrl);
        };
        img.src = objectUrl;
    }
});

function update(uid, uimageone, category, subcategory, profile, categoryid, subcategoryid, profile_id) {
    $('#oldimage').val(atob(uimageone));
    $('#uimageone').html('<img style="width:100%;" src="<?php echo base_url();?>uploads/subcategorynarration/' + (atob(
        uimageone)) + '">');
    //We need to show the text inside the span that the plugin show
    $('.filter-option-inner-inner ').text(atob(category));

    //Check the selected attribute for the real select
    $('select[name=Category_ID]').val(atob(categoryid));
    $('#uSub_Category_ID div.filter-option div.filter-option-inner div.filter-option-inner-inner').text(atob(
        subcategory));
    //We need to show the text inside the span that the plugin show

    //Check the selected attribute for the real select
    $('select[name=Sub_Category_ID]').val(atob(subcategoryid));

    //We need to show the text inside the span that the plugin show

    $('.select button.dropdown-toggle').text(atob(profile));

    //Check the selected attribute for the real select
    $('select[name=ID]').val(atob(uid));
    $('.proid').val(atob(uid));
    subcatget(atob(categoryid), atob(subcategory), atob(subcategoryid));
    uugetsubcat(atob(subcategoryid), atob(profile_id), atob(uid));

}
$('.select').selectpicker();
$('.select1').selectpicker();
$('.select2').selectpicker();



function validate() {
    var subcatid = $('select[name=subcatid').val();
    var imageone = $('input[name=addfile').val();
    var imagetwo = $('input[name=addbanner').val();
    var content = CKEDITOR.instances['subcatnarration'].getData().replace(/<[^>]*>/gi, '').length;

    if (subcatid.trim() == '') {
        $('select[name=subcatid]').focus();
        $('#jerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select Sub Category <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else if (imageone.trim() == '') {
        $('#addfile').focus();
        $('#jerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select slider image <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else if (imagetwo.trim() == '') {
        $('#addbanner').focus();
        $('#jerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select banner image <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else if (content == 0) {
        $('#subcatnarration').focus();
        $('#jerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else {

        return true;
    }


}

function validateone() {
    var content = CKEDITOR.instances['utestcontent'].getData().replace(/<[^>]*>/gi, '').length;


    if (content == 0) {
        $('#subcatnarration').focus();
        $('#ujerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else {

        return true;
    }


}

function getdata() {
    $('.loader').show();
    var loadpage = "load_subcategorynarration.php";
    var model = "subcatprofilecontent";
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
$(document).ready(function() {
    // City change
    $('.catidddddddd').change(function() {
        var cat = $(this).val();
        // AJAX request
        $.ajax({
            url: 'getSubCategoryDataprofileadd',
            method: 'POST',
            data: {
                cat: cat
            },
            success: function(data) {
                $("#Sub_Category_ID").html(data);
                console.log(data);
            }
        });
    });

});
$(document).ready(function() {


    $('input[name=Category_ID]').change(function() {
        $('.loader').show();
        var cat = $(this).val();
        // AJAX request
        $.ajax({
            url: 'getSubCategoryDataprofileadd',
            method: 'POST',
            data: {
                cat: cat
            },
            success: function(data) {
                $("#Sub_Category_ID").html(data);
                $('.loader').hide();

            }
        });
    });
    // City change
    $('#catiddddd').change(function() {
        $('.loader').show();
        var cat = $(this).val();
        // AJAX request
        $.ajax({
            url: 'getSubCategoryDataprofileadd',
            method: 'POST',
            data: {
                cat: cat
            },
            success: function(data) {
                $("#uSub_Category_ID").html(data);
                $('.loader').hide();
                getsubcat(cat)

            }
        });
    });

});


function subcatget(getsubcat, subcategory, subcategoryid) {
    var cat = getsubcat;
    $('.loader').show();
    // AJAX request
    $.ajax({
        url: 'getSubCategoryDataprofileadd',
        method: 'POST',
        data: {
            cat: cat
        },
        success: function(data) {
            $("#uSub_Category_ID").html(data);
            if (subcategory != '') {
                $('#uSub_Category_ID div.filter-option div.filter-option-inner div.filter-option-inner-inner')
                    .text(subcategory);
            }
            if (subcategoryid != '') {
                $('select[name=Sub_Category_ID]').val(subcategoryid);
            }


            $('.loader').hide();
            console.log(data);
        }
    });

}



// $('#sub_ID').change(function() {
//     var subcat = $('select[name=Sub_Category_ID]').val();
//     alert(subcat);
//     // AJAX request
//     $.ajax({
//         url: 'getProfileData',
//         method: 'POST',
//         data: {
//             subcat: subcat
//         },
//         success: function(data) {
//             $("#ID").html(data);
//             console.log(data);
//         }
//     });
// });

function getsubcat(name) {
    $('.loader').show();
    var subcattt = $("#sub_ID option:selected").val();
    $.ajax({
        url: "getProfileData",
        method: "POST",
        data: {
            "subcattt": subcattt
        },
        success: function(data) {
            $("#ID").html(data);
            $('.loader').hide();
            uugetsubcat(subcattt, '', '');
        }
    });
}

function uugetsubcat(name, profile, uid) {
    $('.loader').show();
    var subcattt = name;
    $.ajax({
        url: 'getProfileDataa',
        method: 'POST',
        data: {
            "subcattt": subcattt
        },
        success: function(data) {

            $("#uIDd").html(data);
            if (profile != '') {
                $('#uIDd div.filter-option div.filter-option-inner div.filter-option-inner-inner')
                    .text(profile);
            }
            if (uid != '') {
                $('.profileiddd').val(uid);
            }
            $('.loader').hide();

        }
    });
}
</script>
</body>

</html>