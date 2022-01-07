<table id="example1" class="table table-striped table-bordered " width='100%'>
                            <thead>
                                <tr>
                                    <th >S.No</th>
                                    <th >Event Id</th>
                                    <th>Event Title</th>
                                    <th>Created Date</th>
                                    <th>Admin Approval</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;foreach($row as $index)  { 
                                if($index['approve']=='Y'){ 
                                    $status="<label class='text-white bg-success btn-sm'>Approve</label>";}
                                else{
                                    $status="<label class='text-white bg-danger btn-sm'>Disapprove</label>";}

                                
                                
                                ?>
                            
                                <tr class="row<?php echo $i; ?>">
                                    <td><?php echo $i; ?></td>
                                    <td>EV0000<?php echo $index['id']; ?></td>
                                    <td><?php echo $index['event_title']; ?></td>
                                    
                                    <td><?php echo date('d-M-Y h:i:s A',strtotime($index['date_created'])); ?></td>
                                    <td class="text-center"><?php echo $status;?> 
                                   
                                    </td>
                                    <td class="tablebutton">
                                  
                                   

                                    <a href="#" title="delete" data-toggle="modal"  onclick="return btnclickdelete('<?php echo $index['id']; ?>','events');" class="rounded btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> 
                                    
                                    <a href="<?php echo base_url();?>recruiter/detail_events?token=<?php echo base64_encode($index['id'])?>" title="view details"   class="rounded btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                    
                                     </td>
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
                        