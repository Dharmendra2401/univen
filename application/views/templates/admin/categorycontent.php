<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Category Narration";
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
                        <button type="button" class="btn btn-primary addbutton" data-toggle="modal"
                            data-target="#add">Add
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
                        <h5 class="modal-title" id="">Update Category Narration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo base_url();?>admin/catnarration"
                            enctype='multipart/form-data' class="row">
                            <input type="hidden" name="olsubid" class="olsubid">
                            <div class="form-group col-md-6">
                                <label><span class="text-danger">*</span> Category </label><br>
                                <select name="ID" class="form-control selectpicker Category_ID" id="catID"
                                    disabled="disabled">
                                    <?php $getcategory = $this->db->get('category')->result();
                                        if ($getcategory) { foreach ($getcategory as $key ) {?>
                                    <option value="<?=$key->Category_ID?>"><?= $key->Category_Name?> </option>
                                    <?php }
                                        }
                                    ?>

                                </select>
                            </div>

                            <div class="form-group  col-md-6 sub_categoryone">
                                <label><span class="text-danger">*</span> Sub Category</label><br>
                                <select name="Sub_Category_ID" class="form-control selectpicker" id="usub_category1">
                                    <?php $getsubcategory = $this->db->get('sub_category')->result();
                                        if ($getsubcategory) { foreach ($getsubcategory as $key ) {?>
                                    <option value="<?=$key->Sub_Category_ID?>"><?= $key->Sub_Category_Name?>
                                    </option>
                                    <?php }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label><span class="text-danger">*</span>Sub-Category Image</label><br>
                                <input type="file" name="Image1" id="image1"
                                    accept="image/x-png,image/gif,image/jpeg"><br>
                                <input type="hidden" id="oldimage1" name="oldimage1" />
                                <span id="uImage1"></span>
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
                        <h5 class="modal-title" id="">Add Category Narration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo base_url();?>admin/catnarration"
                            enctype='multipart/form-data' class="row">

                            <div class="form-group col-md-6">
                                <label><span class="text-danger">*</span> Category </label><br>
                                <select name="ID" class="form-control selectpicker Category_ID"
                                    data-hide-disabled="true" data-live-search="true" onChange="return getCattt(this.value,'');">
                                    <option selected="true" disabled="disabled">Select Category</option>
                                    <?php $getcategory = $this->db->get('category')->result();
                                        if ($getcategory) { foreach ($getcategory as $key ) {?>
                                    <option value="<?=$key->Category_ID?>"><?= $key->Category_Name?> </option>
                                    <?php }
                                        }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group  col-md-6 sub_categoryone1">
                                <label><span class="text-danger">*</span> Sub-Category</label><br>
                                <select name="Sub_Category_ID" class="form-control selectpicker" id="sub_category1"
                                    data-hide-disabled="true" data-live-search="true">

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label><span class="text-danger">*</span>Sub-Category Image</label><br>
                                <input type="file" name="Image1" id="image122"
                                    accept="image/x-png,image/gif,image/jpeg"><br>
                                <small><i>Please select the size of image 174*207</i></small><br>
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


$(document).ready(function() {
    getdata();
    var _URL = window.URL || window.webkitURL;
    $("#image122").change(function(e) {
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            var objectUrl = _URL.createObjectURL(file);
            img.onload = function() {

                if (this.width < 174 && this.height < 207) {
                    $('#jerror').html(
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select the size of image 174*207<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                    );
                    $("#image122").val('');
                }
                _URL.revokeObjectURL(objectUrl);
            };
            img.src = objectUrl;
        }
    });
    $("#image1").change(function(e) {
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            var objectUrl = _URL.createObjectURL(file);
            img.onload = function() {

                if (this.width < 174 && this.height < 207) {
                    $('#jerror1').html(
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select the size of image 174*207<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                    );
                    $("#image1").val('');
                }
                _URL.revokeObjectURL(objectUrl);
            };
            img.src = objectUrl;
        }
    });

});

function update(ID, usub_category1, uImage1, catname, subcatname) {
    getCattt(atob(ID),atob(subcatname));
    $('#catID').val(atob(ID));
    $('#usub_category1').val(atob(usub_category1));
    console.log($('#sub_category5'));
    $('#oldimage1').val(atob(uImage1));
    $('#uImage1').html(
        '<img style="width:450px;height:180px;" src="<?php echo base_url();?>uploads/categorynarration/' +
        (atob(uImage1)) + '">');
    $('.Category_ID div.filter-option').text(atob(catname));
    $('.sub_categoryone div.filter-option div.filter-option-inner div.filter-option-inner-inner').text(atob(
        subcatname));
       
    $('.olsubid').val(atob(usub_category1));

}

function validate() {

    var content = CKEDITOR.instances['catnarration'].getData().replace(/<[^>]*>/gi, '').length;

    if (catid.trim() == '') {
        $('select[name=Category_ID]').focus();
        $('#jerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select Title <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else if (title.trim() == '') {
        $('#Title').focus();
        $('#jerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select sub title <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else if (subtitle.trim() == '') {
        $('#Sub_Title1').focus();
        $('#jerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select sub title <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else if (image1.trim() == '') {
        $('#Image1').focus();
        $('#jerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select image1 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else {

        return true;
    }


}

function validateone() {
    var content = CKEDITOR.instances['Title'].getData().replace(/<[^>]*>/gi, '').length;


    if (content == 0) {
        $('#catnarration').focus();
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
    var loadpage = "load_categorycontent.php";
    var model = "catcontent";
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
            text: "Once deleted, you will not be able to recover this category narration!",
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
            text: "You want to active this category narration!",
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
            text: "You want to deactive this category narration!",
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


   function getCattt(cat,subcatname){
        // City change
        $('.loader').show();
       
        // AJAX request
        $.ajax({
            url: 'getSubCategoryData',
            method: 'POST',
            data: {
                cat: cat
            },
            success: function(data123) {
                // $('#Sub_Category_ID').val('<option>SHIPPED</option>');
                $(".sub_categoryone").html(data123);
                $(".sub_categoryone1").html(data123);
                $('.sub_categoryone div.filter-option div.filter-option-inner div.filter-option-inner-inner').text(
        subcatname);
                $('.loader').hide();

            }
        });
    };

</script>
</body>

</html>