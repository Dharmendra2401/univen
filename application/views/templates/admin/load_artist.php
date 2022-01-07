<table id="example1" class="table table-striped table-bordered " width='100%'>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;foreach($row as $index)  {?>
                                <tr >
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $index['name']; ?></td>
                                    <td><?php echo $index['position']; ?></td>
                                    <td><img src="<?php echo base_url().'uploads/artist/'.$index['image']; ?>" width="70px"></td>
                                    <td class="text-center"><?php if($index['status']==1){ echo "Active";}else{echo "Deactive";} ?><br> 
                                    <?php if($index['status']==1){ ?>
                                    <a href="#" title="Click here to deactive" data-toggle="modal"  onclick="return unverify('<?php echo $index['id']; ?>','0','artist');" class="rounded btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                                    <?php }else{ ?>
                                    <a href="#" title="Click here to active" data-toggle="modal"  onclick="return verify('<?php echo $index['id']; ?>','1','artist');" class="rounded btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                                    <?php } ?>
                                    </td>
                                    <td><a href="#" title="edit" data-toggle="modal" data-target="#update" onclick="return update('<?php echo $index['id']; ?>','<?php echo base64_encode($index['name']); ?>','<?php echo base64_encode($index['position']); ?>','<?php echo base64_encode($index['image']); ?>');" class="rounded btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></a>  
                                    <a href="#" title="delete" data-toggle="modal"  onclick="return btnclickdelete('<?php echo $index['id']; ?>','artist');" class="rounded btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
                                </tr>
                                <?php $i++;} ?>







                            </tbody>

                        </table>
                      
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

                        <script>
                            $(document).ready(function() {
                                //$("#gridview").load('load_artist.php');
                                $('#example1').DataTable({searching: false, paging: true, info: false});
                                $('#example2').DataTable({searching: false, paging: true, info: false});
                                $('.dataTables_length').css('display', 'inline-block');
                                $('.dataTables_filter').css({
                                    'display': 'inline-block',
                                    'float': 'right'
                                });


                            });
                        </script>
                        