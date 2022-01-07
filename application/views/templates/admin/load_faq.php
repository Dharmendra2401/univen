<table id="example1" class="table table-striped table-bordered " width='100%'>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Question</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;foreach($row as $index)  {
                                                                
                                
                                ?>
                            
                                <tr >
                                    <td><?php echo $i; ?></td>
                                    <td  style="width:20%"><?php echo $index['question']; ?></td>
                                    <td><?php echo date('d-M-Y h:i:s A',strtotime($index['date_created'])); ?></td>
                                    <td class="text-center"><?php if($index['status']=='Y'){ echo "<label class='text-white bg-success btn-sm'>Active</label>";}else{echo "<label class='text-white bg-danger btn-sm'>Deactive<label>";} ?> 
                                   
                                    </td>
                                    <td class="tablebutton">
                                    <a href="#" title="Update"  class="rounded btn btn-sm btn-primary" onclick="update('<?php echo base64_encode($index['id']);?>','<?php echo base64_encode($index['question']);?>','<?php echo base64_encode($index['answer']);?>')"  data-toggle="modal" data-target="#update"><i class="fas fa-edit"></i></a>
                                    
                                    <?php if($index['status']=='Y'){ ?>
                                    <a href="#" title="Click here to deactive" data-toggle="modal"  onclick="return unverify('<?php echo $index['id']; ?>','N','faq');" class="rounded btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                                    <?php }else{ ?>
                                    <a href="#" title="Click here to active" data-toggle="modal"  onclick="return verify('<?php echo $index['id']; ?>','Y','faq');" class="rounded btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                                    <?php } ?> 
                                    <a href="#" title="delete" data-toggle="modal"  onclick="return btnclickdelete('<?php echo $index['id']; ?>','faq');" class="rounded btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>  </td>
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
                        