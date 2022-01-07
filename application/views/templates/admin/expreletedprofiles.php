<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Profile Slider Image";
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
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Update Profile Narration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo base_url();?>admin/profilenarration"
                            enctype='multipart/form-data' class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span>Main Profile</label><br>
                                    <select name="PROFILE_ID" class="form-control selectpicker"
                                        data-hide-disabled="true" data-live-search="true">
                                        <option value="">Select Profile</option>
                                        <?php print_r($getprofiles); foreach($getprofiles as $getsubcats){?>
                                        <option value="<?php echo $getsubcats['PROFILE_ID'];?>"
                                            <?php if($getsubcats['PROFILE_ID']==$getsubcats['ID']){echo "disabled";}?>>
                                            <?php echo $getsubcats['PROFILE_NAME'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span>Related Profile </label><br>
                                    <select name="Profile1" class="form-control selectpicker" data-hide-disabled="true"
                                        data-live-search="true">
                                        <option value="">Select Profile</option>
                                        <?php print_r($getprofiles); foreach($getprofiles as $getsubcats){?>
                                        <option value="<?php echo $getsubcats['PROFILE_ID'];?>"
                                            <?php if($getsubcats['PROFILE_ID']==$getsubcats['ID']){echo "disabled";}?>>
                                            <?php echo $getsubcats['PROFILE_NAME'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span>Image</label><br>
                                    <input type="file" name="Image1" id="addfile"
                                        accept="image/x-png,image/gif,image/jpeg"><br>
                                    <small><i>Please select the size of image 250*250</i></small><br>

                                </div>
                            </div>
                            <div class="col-md-12"><span id="ujerror"></span></div>

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatenarration" value="updatenarration" class="btn btn-primary"
                            onclick="return validateone();">Update</button>
                    </div>
                    <input type="hidden" id="uid" name="uid">
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Add Profile Slider</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo base_url();?>admin/explore_releted_profiles"
                            enctype='multipart/form-data' class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span>Main Profile</label><br>
                                    <select name="PROFILE_ID" class="form-control selectpicker"
                                        data-hide-disabled="true" data-live-search="true">
                                        <option value="">Select Profile</option>
                                        <?php print_r($getprofiles); foreach($getprofiles as $getsubcats){?>
                                        <option value="<?php echo $getsubcats['PROFILE_ID'];?>"
                                            <?php if($getsubcats['PROFILE_ID']==$getsubcats['ID']){echo "disabled";}?>>
                                            <?php echo $getsubcats['PROFILE_NAME'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span>Related Profile </label><br>
                                    <select name="Profile1" class="form-control selectpicker" data-hide-disabled="true"
                                        data-live-search="true">
                                        <option value="">Select Profile</option>
                                        <?php print_r($getprofiles); foreach($getprofiles as $getsubcats){?>
                                        <option value="<?php echo $getsubcats['PROFILE_ID'];?>"
                                            <?php if($getsubcats['PROFILE_ID']==$getsubcats['ID']){echo "disabled";}?>>
                                            <?php echo $getsubcats['PROFILE_NAME'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span>Image</label><br>
                                    <input type="file" name="Image1" id="addfile"
                                        accept="image/x-png,image/gif,image/jpeg"><br>
                                    <small><i>Please select the size of image 250*250</i></small><br>

                                </div>
                            </div>
                            <div class="col-md-12"><span id="jerror"></span></div>

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addprofilelist" value="addprofilelist" class="btn btn-primary"
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
CKEDITOR.replace('subcatnarrationone', {
    extraPlugins: 'colorbutton,colordialog'
});
CKEDITOR.replace('subcatnarrationtwo', {
    extraPlugins: 'colorbutton,colordialog'
});
CKEDITOR.replace('subcatnarrationthree', {
    extraPlugins: 'colorbutton,colordialog'
});
CKEDITOR.replace('narrationone', {
    extraPlugins: 'colorbutton,colordialog'
});
CKEDITOR.replace('narrationtwo', {
    extraPlugins: 'colorbutton,colordialog'
});
CKEDITOR.replace('narrationthree', {
    extraPlugins: 'colorbutton,colordialog'
});
CKEDITOR.replace('narrationfour', {
    extraPlugins: 'colorbutton,colordialog'
});


$(document).ready(function() {
    getdata();

});

function update(uid, uimageone, uimagetwo, utestcontent, narrationtwo, narrationthree, narrationfour) {
    $('#uid').val(atob(uid));
    $('#oldimage').val(atob(uimageone));
    $('#oldimagetwo').val(atob(uimagetwo));
    $('#uimageone').html('<img src="<?php echo base_url();?>uploads/profilenarration/' + (atob(uimageone)) + '"> ');
    $('#uimagetwo').html('<img src="<?php echo base_url();?>uploads/profilenarration/' + (atob(uimagetwo)) +
        '" style=width:100%>');
    CKEDITOR.instances['narrationone'].setData(atob(utestcontent));
    CKEDITOR.instances['narrationtwo'].setData(atob(narrationtwo));
    CKEDITOR.instances['narrationthree'].setData(atob(narrationthree));
    CKEDITOR.instances['narrationfour'].setData(atob(narrationfour));
}

function validate() {
    var subcatid = $('select[name=profileid').val();
    var imageone = $('input[name=addfile').val();
    var imagetwo = $('input[name=addbanner').val();
    var content = CKEDITOR.instances['subcatnarration'].getData().replace(/<[^>]*>/gi, '').length;
    var contentone = CKEDITOR.instances['subcatnarrationone'].getData().replace(/<[^>]*>/gi, '').length;
    var contenttwo = CKEDITOR.instances['subcatnarrationtwo'].getData().replace(/<[^>]*>/gi, '').length;
    var contentthree = CKEDITOR.instances['subcatnarrationthree'].getData().replace(/<[^>]*>/gi, '').length;

    if (subcatid.trim() == '') {
        $('select[name=profileid]').focus();
        $('#jerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select Profile <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
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
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter overview content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else if (contentone == 0) {
        $('#subcatnarrationone').focus();
        $('#jerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter how to become content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else if (contenttwo == 0) {
        $('#subcatnarrationtwo').focus();
        $('#jerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter qualifications content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else if (contentthree == 0) {
        $('#subcatnarrationthree').focus();
        $('#jerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter positions & responsibilities content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else {

        return true;
    }


}

function validateone() {
    var content = CKEDITOR.instances['narrationone'].getData().replace(/<[^>]*>/gi, '').length;
    var contentone = CKEDITOR.instances['narrationtwo'].getData().replace(/<[^>]*>/gi, '').length;
    var contenttwo = CKEDITOR.instances['narrationthree'].getData().replace(/<[^>]*>/gi, '').length;
    var contentthree = CKEDITOR.instances['narrationfour'].getData().replace(/<[^>]*>/gi, '').length;
    if (content == 0) {
        $('#subcatnarration').focus();
        $('#ujerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter overview content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else if (contentone == 0) {
        $('#narrationtwo').focus();
        $('#ujerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter how to become content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else if (contenttwo == 0) {
        $('#narrationthree').focus();
        $('#ujerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter qualifications content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else if (contentthree == 0) {
        $('#narrationfour').focus();
        $('#ujerror').html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter  positions and responsibilities content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        );
        return false;

    } else {

        return true;
    }


}

function getdata() {
    $('.loader').show();
    var loadpage = "load_expreleted_profiles.php";
    var model = "profileSlider";
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
            text: "Once deleted, you will not be able to recover this profile narration!",
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
            text: "You want to active this profile narration!",
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
            text: "You want to deactive this profile narration!",
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