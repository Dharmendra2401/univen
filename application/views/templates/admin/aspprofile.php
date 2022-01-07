<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Aspirant Profile/Section/Form";
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
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Import
                            <?php echo $title;  ?></button> -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-profile">Add
                            Profile
                        </button>
                        <br><br>
                    </div>
                    <div class="col-md-12 ">
                        <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>

                        <div id="gridview">
                        </div>

                    </div>
        </main>



        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Import Profiles</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo base_url();?>admin/aspprofile" name="upload_excel"
                            enctype="multipart/form-data" autocomplete="off">

                            <div class="form-group">
                                <label><span class="text-danger">*</span> Import</label><br>
                                <input type="file" name="file" id="file" accept=".xlsx">
                            </div>
                            <div class="form-group">
                                <small>Please click <i><a
                                            href="<?php echo base_url();?>samples/profiles.xlsx">here</a></i> to
                                    download format.</small>
                            </div>
                            <span id="jerror"></span>

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="import" value="import" class="btn btn-primary">Add</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="add-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo base_url();?>admin/aspprofile" class="row"
                            autocomplete="off">

                            <div id="items" class="col-md-12 prsentjobparent">
                                <div class="row">
                                    <div class="col-md-3 form-group position-relative">
                                        <label>Category </label><br>
                                        <input type="text" class="form-input form-control" maxlength="50" id="cat"
                                            onkeyup="return cats('');" name="cat[]" value=""
                                            Placeholder="Select category">
                                        <div class="droping-lists  dropping" id="droping-lists" style="display:none">
                                        </div>

                                        <input type="hidden" name="selectcat[]" id="catt" value="">
                                    </div>

                                    <div class="col-md-4 form-group position-relative">
                                        <label>Sub Category </label><br>
                                        <input type="text" class="form-input form-control" maxlength="50" id="subcat"
                                            onkeyup="return subcats('');" name="subcat[]" value=""
                                            Placeholder="Select sub category">
                                        <div class="droping-lists droppingone" id="droping-lists" style="display:none">
                                        </div>

                                        <input type="hidden" name="selectsubcat[]" id="subcatt" value="">
                                    </div>
                                    <div class="col-md-4 form-group position-relative">
                                        <label>Profile </label><br>
                                        <input type="text" class="form-input form-control" maxlength="50" id="profile"
                                            name="profile[]" value="" Placeholder="Select profile">
                                        <div class="droping-lists droppingtwo" id="droping-lists" style="display:none">
                                        </div>


                                    </div>
                                    <div class="col-md-1 form-group position-relative">
                                        <button type="button" class="addsss addadmin"><svg
                                                class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com --></button>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="form-group col-md-6">-->
                            <!--    <label>Profile Section </label><br>-->
                            <!--    <input type="text" name="Section_Name" id="sectionname" class="form-control"-->
                            <!--        placeholder="Profile Section">-->
                            <!--</div>-->
                            <!--<div class="form-group col-md-6">-->
                            <!--    <label>Profile Form </label><br>-->
                            <!--    <input type="text" name="Profile_Form" id="catform" class="form-control"-->
                            <!--        placeholder="Profile Form">-->
                            <!--</div>-->
                            <!--<div class="form-group col-md-6">-->
                            <!--    <label>Form Element </label><br>-->
                            <!--    <input type="text" name="Form_Element" id="formelement" class="form-control"-->
                            <!--        placeholder="Form Element">-->
                            <!--</div>-->
                            <!--<div class="form-group col-md-6">-->
                            <!--    <label>Form Type </label><br>-->
                            <!--    <input type="text" name="Form_Type" id="formtype" class="form-control"-->
                            <!--        placeholder="Form Type">-->
                            <!--</div>-->

                            <!--<div class="form-group col-md-6">-->
                            <!--    <label>Label Name </label><br>-->
                            <!--    <input type="text" name="Label_Name" id="labelname" class="form-control"-->
                            <!--        placeholder="Label Name">-->
                            <!--</div>-->

                            <!--<div class="form-group col-md-6">-->
                            <!--    <label>Form Min-length </label><br>-->
                            <!--    <input type="text" name="Form_Min_Length" id="minlength" class="form-control"-->
                            <!--        placeholder="Form Min-length">-->
                            <!--</div>-->

                            <!--<div class="form-group col-md-6">-->
                            <!--    <label>Form Max-length </label><br>-->
                            <!--    <input type="text" name="Form_Max_Length" id="maxlength" class="form-control"-->
                            <!--        placeholder="Form Max-length">-->
                            <!--</div>-->

                            <!--<div class="form-group col-md-6">-->
                            <!--    <label>Class Name </label><br>-->
                            <!--    <input type="text" name="Class_Name" id="classname" class="form-control"-->
                            <!--        placeholder="Class Name">-->
                            <!--</div>-->
                            <!--<span id="jerror"></span>-->
                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add" value="add" class="btn btn-primary">Add</button>
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
function selectcat(catid, name, count) {
    $('#cat' + count + '').val(name);
    $('#catt' + count + '').val(catid);

}


function cats(counts) {
    // var values = $("input[name='cat[]']").map(function() {
    //     return $(this).val().trim();
    // }).get();
    var certificate = $('#cat' + counts).val();
    $("#catt" + counts).val('');
    $(".dropping" + counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
    if (certificate.trim() != '') {
        $(".dropping" + counts).show();
        $.ajax({
            type: 'post',
            url: 'getcat',
            data: {
                'name': certificate,
                'counts': counts
            },
            success: function(succccc) {
                $(".dropping" + counts).html(succccc);


                $('#getskill' + counts).val(certificate);
                //   $('#certificatee'+counts).val(certificate);
            }

        })
    } else {
        $(".dropping" + counts).hide();
    }
}

function selectsubcat(subcatid, name, count) {

    $('#subcat' + count + '').val(name);
    $('#subcatt' + count + '').val(subcatid);

}

function subcats(counts) {
    // var values = $("input[name='cat[]']").map(function() {
    //     return $(this).val().trim();
    // }).get();
    var certificate = $('#subcat' + counts).val();

    $("#subcatt" + counts).val('');
    $(".droppingone" + counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
    if (certificate.trim() != '') {
        $(".droppingone" + counts).show();
        $.ajax({
            type: 'post',
            url: 'getsubcat',
            data: {
                'name': certificate,
                'counts': counts
            },
            success: function(succccc) {
                $(".droppingone" + counts).html(succccc);


                $('#getskill' + counts).val(certificate);
                //   $('#certificatee'+counts).val(certificate);
            }

        })
    } else {
        $(".droppingone" + counts).hide();
    }
}


$('.addsss').click(function() {

    var numItems = $('.prsentjobparent div.row').length;
    $('.prsentjobparent .alllanguages').addClass('single remove');
    $('.single .btn-remove-customer').remove();
    $('.prsentjobparent').append(
        '<div class="row remove"><div class=" col-md-3 form-group position-relative"> <label>Category </label><br> <input type="text" class="form-input form-control" maxlength="50" id="cat' +
        numItems + '" onkeyup="return cats(' +
        numItems +
        ');" name="cat[]" value="" Placeholder="Select category"><div class="droping-lists dropping' +
        numItems +
        '" id="droping-lists" style="display:none"></div> <input type="hidden" name="selectcat[]" id="catt' +
        numItems +
        '" value=""></div>  <div class="col-md-4 form-group position-relative"><label>Sub Category </label><br><input type="text" class="form-input form-control" maxlength="50" id="subcat' +
        numItems + '" onkeyup="return subcats(' +
        numItems +
        ');" name="subcat[]" value=""Placeholder="Select sub category"><div class="droping-lists droppingone' +
        numItems +
        '" id="droping-lists" style="display:none"></div><input type="hidden" name="selectsubcat[]" id="subcatt' +
        numItems +
        '" value=""> </div>  <div class="col-md-4 form-group position-relative"><label>Profile </label><br><input type="text" class="form-input form-control" maxlength="50" id="profile" name="profile[]" value=""Placeholder="Select profile"><div class="droping-lists droppingtwo' +
        numItems +
        '" id="droping-lists" style="display:none"></div><input type="hidden" name="selectprofile[]" id="profilee' +
        numItems +
        '" value=""> </div><a href="#" class="remove-field btn-remove-customer removeall addadmin"><i class="far fa-trash-alt"></i></a><div class="col-md-1"></div></div></div>'
    );
});
$(document).on('click', '.remove-field', function(e) {
    $(this).parent('.remove').remove();
    e.preventDefault();
});

getdata();

function getdata() {
    $('.loader').show();
    var loadpage = "load_aspprofile.php";
    var model = "getallprofile";
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
            text: "Once deleted, you will not be able to recover this Profile!",
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
            text: "You want to active this Profile!",
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
            text: "You want to deactive this Profile!",
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
    $('#Category_ID').change(function() {
        var cat = $(this).val();
        // AJAX request
        $.ajax({
            url: 'getSubCategoryData',
            method: 'POST',
            data: {
                cat: cat
            },
            success: function(data) {


                // $('#Sub_Category_ID').val('<option>SHIPPED</option>');
                $("#Sub_Category_ID").html(data);


                // console.log($("#Sub_Category_ID").val());
            }
        });
    });

});

// function load_details() {
//     var cat = $("#Category_ID").val();
//     var formData = "cat=" + cat;
//     $.ajax({
//         url: "<?php echo base_url(); ?>admin/getSubCategoryData",
//         type: "POST",
//         data: formData,
//         dataType: "json",
//         success: function(html) {

//             var option = '<option value="0" disable>select</option>';
//             $.each(html, function(i) {
//                 option += '<option value="' + html[i]['Sub_Category_ID'] + '">' + html[i][
//                     'Sub_Category_Name'
//                 ] + '</option>';

//             })
//             //  $('select[name=Sub_Category_ID]').html(option);

//             $("#Sub_Category_ID").append(new Option("option text", "value"));
//         },
//         error: function(XMLHttpRequest, textStatus, errorThrown) {
//             alert("some error");
//         }
//     });
// }
</script>
</body>

</html>