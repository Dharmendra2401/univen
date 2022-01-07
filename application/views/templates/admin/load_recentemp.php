<table id="example1" class="table table-striped table-bordered " width='100%'>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Image</th>
                                    <th>Url</th>
                                    <th>Updated Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr <?php $i=1; foreach($row as $index)  {?>>
                                    <td><?php echo $i; ?></td>
                                    <td class="text-uppercase"><img src="<?php echo base_url().'uploads/emp/'.$index['logo'];?>" width="70px">
                                    <td><a class="bg-success btn-sm text-white" href="<?php if($index['url']==''){
                                    echo "#";
                                    }else{
                                    echo $index['url'];
                                    }  ?>">Click here to redirect</a></td>
                                    <td>
                                   <?php echo date('d-M-Y H:i:s',strtotime($index['record_inserted_dttm'])); ?>
                                   </td>
                                    <td class="text-center"><?php if($index['status']=='Y'){ echo "<label class='text-white bg-success btn-sm'>Active</label>";}else{echo "<label class='text-white bg-danger btn-sm'>Deactive<label>";} ?> 
                                   </td>
                                   
                                    <td class="tablebutton"> 
                                    <a href="#" title="edit" data-toggle="modal" data-target="#update" onclick="return update('<?php echo base64_encode($index['id']); ?>','<?php echo base64_encode($index['logo']); ?>','<?php echo base64_encode($index['url']); ?>');" class="rounded btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    
                                    <?php if($index['status']=='Y'){ ?>
                                    <a href="#" title="Click here to deactive" data-toggle="modal"  onclick="return unverify('<?php echo $index['id']; ?>','N','recentemp');" class="rounded btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                                    <?php }else{ ?>
                                    <a href="#" title="Click here to active" data-toggle="modal"  onclick="return verify('<?php echo $index['id']; ?>','Y','recentemp');" class="rounded btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                                    <?php } ?>
                                    <a href="#" title="delete" data-toggle="modal"  onclick="return btnclickdelete('<?php echo $index['id']; ?>','recentemp');" class="rounded btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                     
                                    
                                    
                                    </td>
                                   
                                </tr <?php $i++; } ?>>






                            </tbody>


                        </table>
                        

                      
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
                        