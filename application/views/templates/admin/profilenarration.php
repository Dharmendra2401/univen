<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Profile Narration";
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
        <style>
        #profin {
            position: absolute;
            right: 0px;
            top: 42px;
            right: 6px;
            font-style: italic;
            font-size: 13px;
            color: #D81F26;
        }
        </style>
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
                            <input type="hidden" id="uid" name="uid">
                            <input type="hidden" id="proid" name="proid">
                            <input type="hidden" id="subtid" name="subtid">
                            <input type="hidden" id="cid" name="cid">
                            <input type="hidden" id="proiddddd" name="proiddddd">
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label class="form-label heading-title" for="mobile"><span
                                            class="text-danger">*</span>Profile</label>
                                    <input type="text" class="form-input form-control formregasp" name="profidd"
                                        id="profidd" placeholder="select profile"><span id="profin"></span>
                                    <div class="droping-list">
                                        <span id="getprof"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span>Top Banner</label><br>
                                    <input type="file" name="addfile" id="uaddfile"
                                        accept="image/x-png,image/gif,image/jpeg"><br>
                                    <small><i>Please select the size of image 1366*250</i></small><br>
                                    <input type="hidden" id="oldimage" name="oldimage" />
                                    <span id="uimageone" style="width: 100%;"></span>
                                </div>
                            </div>
                            <div class="col-md-12"><span id="jerror1"></span></div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span>Middle Banner</label><br>
                                    <input type="file" name="addbannertwo" id="uaddfilethree"
                                        accept="image/x-png,image/gif,image/jpeg"><br>
                                    <small><i>Please select the size of image 1400*250</i></small><br>
                                    <input type="hidden" id="oldimagethree" name="oldimagethree" />
                                    <span id="uimagethree" style="width: 100%;"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span>Bottom Banner</label><br>
                                    <input type="file" name="addbanner" id="uaddfiletwo"
                                        accept="image/x-png,image/gif,image/jpeg"><br>
                                    <small><i>Please select the size of image 1400*250</i></small><br>
                                    <input type="hidden" id="oldimagetwo" name="oldimagetwo" />
                                    <span id="uimagetwo"></span>
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span> Overview</label><br>
                                    <textarea type="text" name="unarrationone" id="narrationone"
                                        placeholder="Enter content" class="form-control"></textarea>
                                    <br>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span> How To Become</label><br>
                                    <textarea type="text" name="unarrationtwo" id="narrationtwo"
                                        placeholder="Enter content" class="form-control"></textarea>
                                    <br>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span> Qualifications</label><br>
                                    <textarea type="text" name="unarrationthree" id="narrationthree"
                                        placeholder="Enter content" class="form-control"></textarea>
                                    <br>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span> Positions & Responsibilities</label><br>
                                    <textarea type="text" name="unarrationfour" id="narrationfour"
                                        placeholder="Enter content" class="form-control"></textarea>
                                    <br>
                                </div>
                            </div>

                            <div class="col-md-12"><span id="ujerror"></span></div>

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
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Add Profile Narration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo base_url();?>admin/profilenarration"
                            enctype='multipart/form-data' class="row">
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span> Profile </label><br>
                                    <select name="profileid" class="form-control selectpicker" data-hide-disabled="true"
                                        data-live-search="true">
                                        <option value="">Select Profile</option>
                                        <?php print_r($getprofiles); foreach($getprofiles as $getsubcats){?>
                                        <option value="<?php echo $getsubcats['PROFILE_ID'];?>"
                                            <?php if($getsubcats['PROFILE_ID']==$getsubcats['ID']){echo "disabled";}?>>
                                            <?php echo $getsubcats['PROFILE_NAME'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div> -->
                            <input type="hidden" id="profileid" name="profileiddd">
                            <input type="hidden" id="subcatid" name="subcatid">
                            <input type="hidden" id="catid" name="catid">
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label class="form-label heading-title" for="mobile"><span
                                            class="text-danger">*</span>Profile</label>
                                    <input type="text" class="form-input form-control formregasp" name="iwanttobe"
                                        id="iwanttobe" placeholder="select profile"><span id="profilein"></span>
                                    <div class="droping-list">
                                        <span id="getprofile"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span>Top Banner</label><br>
                                    <input type="file" name="addfile" id="addfile"
                                        accept="image/x-png,image/gif,image/jpeg"><br>
                                    <small><i>Please select the size of image 1366*250</i></small><br>

                                </div>
                            </div>
                            <div class="col-md-12"><span id="jerror"></span></div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span>Middle Banner</label><br>
                                    <input type="file" name="addbannertwo" id="addbannertwo"
                                        accept="image/x-png,image/gif,image/jpeg"><br>
                                    <small><i>Please select the size of image 1400*250</i></small><br>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span> Bottom Banner</label><br>
                                    <input type="file" name="addbanner" id="addbanner"
                                        accept="image/x-png,image/gif,image/jpeg"><br>
                                    <small><i>Please select the size of image 1400*250</i></small><br>

                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span> Overview</label><br>
                                    <textarea type="text" name="subcatnarration" id="subcatnarration"
                                        placeholder="Enter content" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span> How To Become</label><br>
                                    <textarea type="text" name="subcatnarrationone" id="subcatnarrationone"
                                        placeholder="Enter content" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span> Qualifications</label><br>
                                    <textarea type="text" name="subcatnarrationtwo" id="subcatnarrationtwo"
                                        placeholder="Enter content" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><span class="text-danger">*</span> Positions and Responsibilities</label><br>
                                    <textarea type="text" name="subcatnarrationthree" id="subcatnarrationthree"
                                        placeholder="Enter content" class="form-control"></textarea>
                                </div>
                            </div>



                            <div class="col-md-12"><span id="jerror"></span></div>

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
var _URL = window.URL || window.webkitURL;
$("#addfile").change(function(e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        var objectUrl = _URL.createObjectURL(file);
        img.onload = function() {

            if ((this.width < 1366)) {
                $('#jerror').html(
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select the size of image 1366*250 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                );
                $("#addfile").val('');
            }
            if ((this.height < 250)) {
                $('#jerror').html(
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

            if ((this.width < 1366)) {
                $('#jerror1').html(
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select the size of image 1366*250 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                );
                $("#uaddfile").val('');
            }
            if ((this.height < 250)) {
                $('#jerror1').html(
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select the size of image 1366*250<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                );
                $("#uaddfile").val('');
            }
            _URL.revokeObjectURL(objectUrl);
        };
        img.src = objectUrl;
    }
});
$('#iwanttobe').keyup(function() {
    $('.droping-list').show();
    $('#profilein').html('');
    $('#profileid').val('');
    $('#subcatid').val('');
    $('#catid').val('');

    $('#getprofile').html('<p class="text-center"><i class="fas fa-spinner fa-spin"></i></p>');
    var iwanttobe = $('#iwanttobe').val();
    if (iwanttobe.trim() != '') {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>getprofiles',
            data: {
                'iwanttobe': iwanttobe
            },
            success: function(formresult) {
                $('#getprofile').html(formresult);


            }
        })

    } else {
        $('.droping-list').hide();
    }
})
$('#profidd').keyup(function() {
    $('.droping-list').show();
    $('#profin').html('');
    $('#proid').val('');
    $('#subtid').val('');
    $('#cid').val('');

    $('#getprof').html('<p class="text-center"><i class="fas fa-spinner fa-spin"></i></p>');
    var iwanttobe = $('#profidd').val();
    if (iwanttobe.trim() != '') {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>admin/ugetprofiles',
            data: {
                'iwanttobe': iwanttobe
            },
            success: function(formresult) {
                $('#getprof').html(formresult);


            }
        })

    } else {
        $('.droping-list').hide();
    }
})
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

function update(uid, uimageone, utestcontent, narrationtwo, narrationthree, narrationfour, profilename) {

    $('#uid').val(atob(uid));
    $('#oldimage').val(atob(uimageone));
    $('#uimageone').html('<img style="width:100%;" src="<?php echo base_url();?>uploads/profilenarration/' + (atob(
        uimageone)) + '">');
    CKEDITOR.instances['narrationone'].setData(atob(utestcontent));
    CKEDITOR.instances['narrationtwo'].setData(atob(narrationtwo));
    CKEDITOR.instances['narrationthree'].setData(atob(narrationthree));
    CKEDITOR.instances['narrationfour'].setData(atob(narrationfour));

    //We need to show the text inside the span that the plugin show

    $('input[name=profidd]').val(atob(profilename));
    //Check the selected attribute for the real select
    $('select[name=selValue]').val(atob(uid));
}

// function validate() {
//     var subcatid = $('select[name=profileid').val();
//     var imageone = $('input[name=addfile').val();
//     var imagetwo = $('input[name=addbanner').val();
//     var content = CKEDITOR.instances['subcatnarration'].getData().replace(/<[^>]*>/gi, '').length;
//     var contentone = CKEDITOR.instances['subcatnarrationone'].getData().replace(/<[^>]*>/gi, '').length;
//     var contenttwo = CKEDITOR.instances['subcatnarrationtwo'].getData().replace(/<[^>]*>/gi, '').length;
//     var contentthree = CKEDITOR.instances['subcatnarrationthree'].getData().replace(/<[^>]*>/gi, '').length;

//     if (subcatid.trim() == '') {
//         $('select[name=profileid]').focus();
//         $('#jerror').html(
//             '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select Profile <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
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
//             '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter overview content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
//         );
//         return false;

//     } else if (contentone == 0) {
//         $('#subcatnarrationone').focus();
//         $('#jerror').html(
//             '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter how to become content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
//         );
//         return false;

//     } else if (contenttwo == 0) {
//         $('#subcatnarrationtwo').focus();
//         $('#jerror').html(
//             '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter qualifications content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
//         );
//         return false;

//     } else if (contentthree == 0) {
//         $('#subcatnarrationthree').focus();
//         $('#jerror').html(
//             '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter positions & responsibilities content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
//         );
//         return false;

//     } else {

//         return true;
//     }


// }

// function validateone() {
//     var content = CKEDITOR.instances['narrationone'].getData().replace(/<[^>]*>/gi, '').length;
//     var contentone = CKEDITOR.instances['narrationtwo'].getData().replace(/<[^>]*>/gi, '').length;
//     var contenttwo = CKEDITOR.instances['narrationthree'].getData().replace(/<[^>]*>/gi, '').length;
//     var contentthree = CKEDITOR.instances['narrationfour'].getData().replace(/<[^>]*>/gi, '').length;
//     if (content == 0) {
//         $('#subcatnarration').focus();
//         $('#ujerror').html(
//             '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter overview content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
//         );
//         return false;

//     } else if (contentone == 0) {
//         $('#narrationtwo').focus();
//         $('#ujerror').html(
//             '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter how to become content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
//         );
//         return false;

//     } else if (contenttwo == 0) {
//         $('#narrationthree').focus();
//         $('#ujerror').html(
//             '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter qualifications content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
//         );
//         return false;

//     } else if (contentthree == 0) {
//         $('#narrationfour').focus();
//         $('#ujerror').html(
//             '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter  positions and responsibilities content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
//         );
//         return false;

//     } else {

//         return true;
//     }


// }

function getdata() {
    $('.loader').show();
    var loadpage = "load_profilenarration.php";
    var model = "subcontenttwo";
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