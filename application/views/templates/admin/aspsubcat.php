<!DOCTYPE html>
<html lang="en">
<?php
    include "top_head.php";
    $title="Aspirant Sub Category/Section/Form";
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-sub-cat">Add
                            Sub Category
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
                        <h5 class="modal-title" id="">Import Sub Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo base_url();?>admin/aspsubcat" name="upload_excel"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label><span class="text-danger">*</span> Import</label><br>
                                <input type="file" name="file" id="file" accept=".xlsx">
                            </div>
                            <div class="form-group">
                                <small>Please click <i><a
                                            href="<?php echo base_url();?>samples/subcategory.xlsx">here</a></i> to
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
        <div class="modal fade" id="add-sub-cat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Add Sub Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo base_url();?>admin/aspsubcat" class="row">
                            <div class="form-group col-md-6">
                                <label><span class="text-danger">*</span>Category </label><br>
                                <select name="Category_ID" class="form-control selectpicker" data-hide-disabled="true"
                                    data-live-search="true">
                                    <option selected="true" disabled="disabled">Select Category</option>
                                    <?php $getcategory = $this->db->get('category')->result();
                                        if ($getcategory) { foreach ($getcategory as $key ) {?>
                                    <option value="<?= $key->Category_ID?>"><?= $key->Category_Name?> </option>
                                    <?php }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label><span class="text-danger">*</span>Sub Category</label><br>
                                <input type="text" name="Sub_Category_Name" placeholder="Enter Sub Category"
                                    class="form-control" maxlength="50">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Sub Category Section </label><br>
                                <input type="text" name="Section_Name" id="sectionname" class="form-control"
                                    placeholder="Profile Section">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Sub Category Form </label><br>
                                <input type="text" name="Sub_Category_form" id="catform" class="form-control"
                                    placeholder="Profile Form">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Form Element </label><br>
                                <input type="text" name="Form_Element" id="formelement" class="form-control"
                                    placeholder="Form Element">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Form Type </label><br>
                                <input type="text" name="Form_Type" id="formtype" class="form-control"
                                    placeholder="Form Type">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Label Name </label><br>
                                <input type="text" name="Label_Name" id="labelname" class="form-control"
                                    placeholder="Label Name">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Form Min-length </label><br>
                                <input type="text" name="Form_Min_Length" id="minlength" class="form-control"
                                    placeholder="Form Min-length">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Form Max-length </label><br>
                                <input type="text" name="Form_Max_Length" id="maxlength" class="form-control"
                                    placeholder="Form Max-length">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Class Name </label><br>
                                <input type="text" name="Class_Name" id="classname" class="form-control"
                                    placeholder="Class Name">
                            </div>
                            <span id="jerror"></span>
                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add" value="add" class="btn btn-primary">Add</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Update Sub-Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo base_url();?>admin/aspsubcat" class="row">
                            <div class="form-group col-md-6">
                                <label><span class="text-danger">*</span>Category </label><br>
                                <select name="Category_ID" class="form-control selectpicker" data-hide-disabled="true"
                                    data-live-search="true">
                                    <option selected="true" disabled="disabled">Select Category</option>
                                    <?php $getcategory = $this->db->get('category')->result();
                                        if ($getcategory) { foreach ($getcategory as $key ) {?>
                                    <option value="<?= $key->Category_ID?>"><?= $key->Category_Name?> </option>
                                    <?php }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label><span class="text-danger">*</span>Sub Category</label><br>
                                <input type="text" name="Sub_Category_Name" id="Sub_Category_Name"
                                    placeholder="Enter Sub Category" class="form-control" maxlength="50">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Sub Category Section </label><br>
                                <input type="text" name="Section_Name" id="sectionname" class="form-control"
                                    placeholder="Profile Section">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Sub Category Form </label><br>
                                <input type="text" name="Sub_Category_form" id="catform" class="form-control"
                                    placeholder="Profile Form">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Form Element </label><br>
                                <input type="text" name="Form_Element" id="formelement" class="form-control"
                                    placeholder="Form Element">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Form Type </label><br>
                                <input type="text" name="Form_Type" id="formtype" class="form-control"
                                    placeholder="Form Type">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Label Name </label><br>
                                <input type="text" name="Label_Name" id="labelname" class="form-control"
                                    placeholder="Label Name">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Form Min-length </label><br>
                                <input type="text" name="Form_Min_Length" id="minlength" class="form-control"
                                    placeholder="Form Min-length">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Form Max-length </label><br>
                                <input type="text" name="Form_Max_Length" id="maxlength" class="form-control"
                                    placeholder="Form Max-length">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Class Name </label><br>
                                <input type="text" name="Class_Name" id="classname" class="form-control"
                                    placeholder="Class Name">
                            </div>
                            <span id="jerror"></span>
                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" value="update" class="btn btn-primary"
                            onclick="return validate();">update</button>
                    </div>
                    <input type="hidden" id="Category_ID" name="uid" />
                    </form>
                </div>
            </div>
        </div>
        <?php include "footer.php";  ?>
    </div>
</div>
<?php include "scripts.php";  ?>
<script>
getdata();

function getdata() {
    $('.loader').show();
    var loadpage = "load_aspsubcat.php";
    var model = "aspsubcat";
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

function update(uid, subcategory) {
    $('#Category_ID').val(atob(uid));
    $('#Sub_Category_Name').val(atob(subcategory));

}

function btnclickdelete(id, table) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Category!",
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
            text: "You want to active this Sub Category!",
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
            text: "You want to deactive this Sub Category!",
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