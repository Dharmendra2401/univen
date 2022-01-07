<table id="example1" class="table table-striped table-bordered " width='100%'>
    <thead>
        <tr>
            <th>S.No</th>
            <th>Category</th>
            <th>Sub Category</th>
            <th>Profile</th>
            <th>Created Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
         $i=1;foreach($row as $index)  {
             $PROFILE_IDd = $this->db->get_where('profile', array('PROFILE_ID'=> $index['ID']))->row()->PROFILE_NAME;
                 ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td style="width:20%">
                <?php
                   echo $Category_ID = $this->db->get_where('category', array('Category_ID'=> $index['Category_ID']))->row()->Category_Name;
                   
                ?>
            </td>
            <td style="width:20%">
                <?php
                   echo $Sub_Category_ID = $this->db->get_where('sub_category', array('Sub_Category_ID'=> $index['Sub_Category_ID']))->row()->Sub_Category_Name;
                   
                ?>

            </td>
            <td style="width:20%">
                <?php
                  echo $PROFILE_IDd ;
                   
                ?>
            </td>
            <td><?php echo date('d-M-Y h:i:s A',strtotime($index['RECORD_INSERTED_DTTM'])); ?></td>
            <td class="text-center">
                <?php if($index['ACTIVE_FLAG']=='Y'){ echo "<label class='text-white bg-success btn-sm'>Active</label>";}else{echo "<label class='text-white bg-danger btn-sm'>Deactive<label>";} ?>

            </td>
            <td class="tablebutton">
                <a href="#" title="Update" class="rounded btn btn-sm btn-primary"
                    onclick="update('<?php echo base64_encode($index['ID']);?>','<?php echo base64_encode($index['Image']);?>','<?php echo base64_encode($Category_ID);?>','<?php echo base64_encode($Sub_Category_ID);?>','<?php echo base64_encode($PROFILE_ID);?>','<?php echo base64_encode($index['Category_ID']);?>','<?php echo base64_encode($index['Sub_Category_ID']);?>','<?php echo base64_encode($PROFILE_IDd);?>')"
                    data-toggle="modal" data-target="#update"><i class="fas fa-edit"></i></a>

                <?php if($index['ACTIVE_FLAG']=='Y'){ ?>
                <a href="#" title="Click here to deactive" data-toggle="modal"
                    onclick="return unverify('<?php echo $index['ID']; ?>','N','sub_cat_pofile_narration');"
                    class="rounded btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                <?php }else{ ?>
                <a href="#" title="Click here to active" data-toggle="modal"
                    onclick="return verify('<?php echo $index['ID']; ?>','Y','sub_cat_pofile_narration');"
                    class="rounded btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                <?php } ?>
                <a href="#" title="delete" data-toggle="modal"
                    onclick="return btnclickdelete('<?php echo $index['ID']; ?>','sub_cat_narration');"
                    class="rounded btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php $i++;} ?>







    </tbody>

</table>

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
</script>