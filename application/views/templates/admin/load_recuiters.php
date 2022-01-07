<table id="example1" class="table table-striped table-bordered " width='100%'>
                            <thead>
                                <tr>
                                    <th >S.No</th>
                                    <th >Full Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;foreach($row as $index)  { 
                                if($index['email_verified']=='Y'){ 
                                    $emailstatus="<label class='text-white bg-success btn-sm'>Verified</label>";}
                                else{
                                    $emailstatus="<label class='text-white bg-danger btn-sm'>Unverify</label>";}

                                 if($index['admin_approval']=='Y'){ 
                                    $status="<label class='text-white bg-success btn-sm '>Approved</label>";}
                                else{
                                    $status="<label class='text-white bg-danger btn-sm ' >Disapproved</label>";}
                                
                                ?>
                            
                                <tr class="row<?php echo $i; ?>">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $index['firstname'].' '.$index['lastname']; ?></td>
                                    <td><?php echo $index['email']; ?></td>
                                    <td><?php echo $index['contact_no']; ?></td>
                                    <td class="text-center"><?php if($index['admin_approval']=='Y'){ echo "<label class='text-white bg-success btn-sm'>Approved</label>";}else{echo "<label class='text-white bg-danger btn-sm'>Disapproved<label>";} ?> 
                                   
                                    </td>
                                    <td class="tablebutton">
                                    <a href="#" title="Send Email" data-toggle="modal" data-target="#mail" onclick="return sendemailssss('<?php echo $index['id']; ?>','<?php echo $index['email']; ?>','<?php echo $index['firstname']; ?>','<?php echo $index['lastname']; ?>');" class="rounded btn btn-sm btn-info"><i class="fas fa-envelope"></i></a> 

                                    <a href="<?php echo base_url();?>admin/view_recruiter?token=<?php echo base64_encode($index['id']);?>" title="View details"  class="rounded btn btn-sm btn-success"><i class="fas fa-eye"></i></a> <br> 

                                    <a href="#" title="delete" data-toggle="modal"  onclick="return btnclickdelete('<?php echo $index['id']; ?>','recruiter');" class="rounded btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>  <?php if($index['admin_approval']=='Y'){ ?>
                                    <a href="#" title="Click here to disapprove" data-toggle="modal"  onclick="return unverify('<?php echo $index['id']; ?>','N','recruiter');" class="rounded btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                                    <?php }else{ ?>
                                    <a href="#" title="Click here to approve" data-toggle="modal"  onclick="return verify('<?php echo $index['id']; ?>','Y','recruiter');" class="rounded btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                                    <?php } ?></td>
                                </tr>
                                <?php $i++;} ?>







                            </tbody>

                        </table>
                        

<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
                      
<script>

$(document).ready(function() {
                                //$("#gridview").load('load_artist.php');
                                var table =$('#example1').DataTable({searching: true, paging: true, info: false});
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
                        