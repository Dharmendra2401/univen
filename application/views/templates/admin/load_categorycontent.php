<table id="example1" class="table table-striped table-bordered " width='100%'>
    <thead>
        <tr>
            <th>S.No</th>
            <th>Category</th>
            <th>Sub-Category</th>
            <th>Created Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1;foreach($row as $index)  {
                     $subcatname= $this->db->get_where('sub_category', array('Sub_Category_ID'=>$index['sub_category1']))->row()->Sub_Category_Name;             ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td style="width:20%"><?php echo $index['Category_Name']; ?></td>
            <td style="width:20%">
                <?php echo $subcatname;?>
            </td>
            <td><?php echo date('d-M-Y h:i:s A',strtotime($index['RECORD_INSERTED_DTTM'])); ?></td>
            <td class="text-center">
                <?php if($index['ACTIVE_FLAG']=='Y'){ echo "<label class='text-white bg-success btn-sm'>Active</label>";}else{echo "<label class='text-white bg-danger btn-sm'>Deactive<label>";} ?>

            </td>
            <td class="tablebutton">
                <a href="#" title="Update" class="rounded btn btn-sm btn-primary" onclick="update(
                '<?php echo base64_encode($index['ID']);?>',
                '<?php echo base64_encode($index['sub_category1']);?>',
                '<?php echo base64_encode($index['Image1']);?>',
                '<?php echo base64_encode($index['Category_Name']); ?>',
                '<?php echo base64_encode($subcatname); ?>'
                )" data-toggle="modal" data-target="#update"><i class="fas fa-edit"></i></a>

                <?php if($index['ACTIVE_FLAG']=='Y'){ ?>
                <a href="#" title="Click here to deactive" data-toggle="modal"
                    onclick="return unverify('<?php echo $index['sub_category1']; ?>','N','category_description');"
                    class="rounded btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                <?php }else{ ?>
                <a href="#" title="Click here to active" data-toggle="modal"
                    onclick="return verify('<?php echo $index['sub_category1']; ?>','Y','category_description');"
                    class="rounded btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                <?php } ?>
                <a href="#" title="delete" data-toggle="modal"
                    onclick="return btnclickdelete('<?php echo $index['sub_category1']; ?>','category_description');"
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