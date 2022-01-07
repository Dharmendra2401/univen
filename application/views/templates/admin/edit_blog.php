<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Update Blog ";

?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php  include "left_menu.php"; ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><?php echo $title;  ?></h1>
                <ol class="bg-info text-light breadcrumb mb-4">
                    <li class="breadcrumb-item active"><?php echo $title;  ?></li>
                </ol>
                <a href="<?php echo base_url();?>admin/blog_list"
                    class="btn btn-sm bg-primary text-white float-right">Back</a>


                <br>

                <!-- <form class="row ">
                     <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br>
                    </div> 

                </form> -->
                <form role="form" class="form-validation" enctype="multipart/form-data" method="post"
                    action="<?php echo base_url('admin/update_blog/'.$edit_blog['id']);?>">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <div class="row">
                                <label class="col-md-4"><strong> Title:</strong></label>
                                <input type="text" placeholder="Enter title" id="title" name="blog_title"
                                    class="form-control" value="<?php echo $edit_blog['blog_title'];?>">
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <div class="row">
                                <label class="col-md-4"><strong>Meta Tag:</strong></label>
                                <input type="text" placeholder="Enter title" id="title" name="meta_tag"
                                    class="form-control" value="<?php echo $edit_blog['meta_tag'];?>" required>
                            </div>
                        </div>
                        <div class="col-md-1 form-group"></div>
                        <div class="col-md-4 form-group">
                            <div class="row">
                                <label class="col-md-4"><strong>Meta Keyword:</strong></label>
                                <input type="text" placeholder="Enter title" id="title" name="meta_key"
                                    class="form-control" value="<?php echo $edit_blog['meta_key'];?>" required>
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <div class="row">
                                <label class="col-md-4"><strong>Meta Url:</strong></label>
                                <input type="text" placeholder="Enter title" id="title" name="meta_url"
                                    class="form-control" value="<?php echo $edit_blog['meta_url'];?>" required>
                            </div>
                        </div>
                        <div class="col-md-1 form-group"></div>
                        <div class="col-md-4 form-group">
                            <div class="row">
                                <label class="col-md-8"><strong>Meta Description:</strong></label>
                                <input type="text" placeholder="Enter title" id="title" name="meta_desc"
                                    class="form-control" value="<?php echo $edit_blog['meta_desc'];?>" required>
                            </div>
                        </div>
                        <div class="col-md-1 form-group"></div>
                        <div class="col-md-4 form-group">
                            <div class="row">
                                <label class="col-md-4"><strong> Category :</strong></label>
                                <select class="form-control" name="blog_category_id">
                                    <?php $blog_category = $this->db->get_where('blog_category', array('delete_flag' => 'N','active' => 'Y'))->result();
                                    if ($blog_category) { 
                                      foreach ($blog_category as $key ) 
                                      {?>
                                    <option value="<?= $key->id; ?>"
                                        <?php if($key->id==$edit_blog['blog_category_id']){echo 'selected';}?>>
                                        <?= $key->name?> </option>
                                    <?php }
                                    }
                                ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4 form-group">
                            <div class="row">
                                <label class="col-md-12"><strong> Image:</strong><small style="color:red;"> (Image size
                                        :1200 X 710)</small></label>
                                <input type="file" class="form-control" name="blog_images"><br>
                            </div>
                        </div>
                        <div class="col-md-1 form-group"></div>
                        <div class="col-md-4 form-group">
                            <div class="row">
                                <img src="<?php echo base_url('images/blog/'.$edit_blog['blog_images'])?>" id="blah"
                                    class="user-auth-img img-circle"
                                    style="height: 150px!important;width: 150px!important;" />
                                <br>
                            </div>
                        </div>
                        <div class="col-md-1 form-group"></div>
                        <div class="col-md-4 form-group">
                            <div class="row">
                                <label class="col-md-12"><strong> Short Desc:<small style="color:red;"> (Max Character
                                            165 only)</small></strong></label>
                                <textarea placeholder="Enter desc" maxlength="165" name="short_desc"
                                    class="form-control" rows="3"><?php echo $edit_blog['short_desc']?></textarea>
                                <div id="the-count" style="
    text-align: right;
    width: 100%;
">
                                    <span id="current">0</span>
                                    <span id="maximum">/ 165</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 form-group"></div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <label class="col-md-12"><strong> Description: <small style="color:red;"> (min 200 words
                                            to 350 word max)</small></strong></label>
                                <textarea placeholder="Enter desc" name="description" class="form-control"
                                    rows="5"><?php echo $edit_blog['description']?></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="text-right form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
        </main>





        <span id="pageInfos"></span>
        <?php include "footer.php";  ?>
    </div>
</div>
<?php include "scripts.php";  ?>

<script type='text/javascript'>
function update(idu, ufirst_name) {

    $('#idu').val(idu);
    $('#ufirst_name').val(ufirst_name);

}



CKEDITOR.replace('editor', {});
</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    //$("#gridview").load('load_artist.php');
    var table = $('#example1').DataTable({
        searching: true,
        paging: true,
        info: false
    });
    $('.dataTables_length').css('display', 'inline-block');
    $('.dataTables_filter').css({
        'display': 'inline-block',
        'float': 'right'
    });
    // $('#example1').on( 'page.dt', function () {
    // var info = table.page.info();
    // $('#pageInfos').html( 'Showing page: '+1+info.page+' of '+info.pages );
    // } );

});
$('textarea').keyup(function() {

    var characterCount = $(this).val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#the-count');

    current.text(characterCount);


    /*This isn't entirely necessary, just playin around*/
    if (characterCount < 70) {
        current.css('color', '#666');
    }
    if (characterCount > 70 && characterCount < 90) {
        current.css('color', '#6d5555');
    }
    if (characterCount > 90 && characterCount < 100) {
        current.css('color', '#793535');
    }
    if (characterCount > 100 && characterCount < 120) {
        current.css('color', '#841c1c');
    }
    if (characterCount > 120 && characterCount < 139) {
        current.css('color', '#8f0001');
    }

    if (characterCount >= 140) {
        maximum.css('color', '#8f0001');
        current.css('color', '#8f0001');
        theCount.css('font-weight', 'bold');
    } else {
        maximum.css('color', '#666');
        theCount.css('font-weight', 'normal');
    }


});
</script>

</body>

</html>