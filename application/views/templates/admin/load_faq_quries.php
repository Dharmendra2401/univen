<table id="example1" class="table table-striped table-bordered " width='100%'>
                            <thead>
                                <tr>
                                    <th width="10%">S.No</th>
                                    <th >Question</th>
                                    <th class="text-center">Reply Status</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;foreach($row as $index)  {
                                                                
                                
                                ?>
                            
                                <tr >
                                    <td><?php echo $i; ?></td>
                                    <td  style="width:20%"><?php echo $index['question']; ?></td>
                                    <td class="text-center"><?php if($index['status']=='Y'){ echo "<label class='text-white bg-success btn-sm'>Send</label>";}else{echo "<label class='text-white bg-danger btn-sm'>Not Send<label>";} ?> 
                                   
                                    </td>
                                    <td class="tablebutton">
                                    <?php if($index['status']=='N'){?>
                                    <a href="#" title="Update"  class="rounded btn btn-sm btn-primary" onclick="update('<?php echo base64_encode($index['id']);?>','<?php echo base64_encode($index['email']);?>')"  data-toggle="modal" data-target="#update"><i class="fas fa-reply"></i></a>
                                    <?php } else{?>

                                    <a href="#" title="view reply" data-toggle="modal"  onclick="return view('<?php echo base64_encode($index['subject']); ?>','<?php echo base64_encode($index['email']); ?>','<?php echo base64_encode($index['answer']); ?>');" class="rounded btn btn-sm btn-primary"  data-toggle="modal" data-target="#view"><i class="fas fa-eye"></i></a>
                                    <?php } ?>

                                    <a href="#" title="delete" data-toggle="modal"  onclick="return btnclickdelete('<?php echo $index['id']; ?>','faq_question_ask');" class="rounded btn btn-sm btn-danger"><i class="fas fa-trash"></i></a><br> 

                                   
                                
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
                        