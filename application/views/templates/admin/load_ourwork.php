<table id="example1" class="table table-striped table-bordered " width='100%'>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;foreach($row as $index)  {?>
                                <tr >
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $index['title']; ?></td>
                                    <td><?php echo $index['content']; ?></td>
                                    <td class="text-center"><?php if($index['status']=='Y'){ echo "Active";}else{echo "Deactive";} ?><br> 
                                    <?php if($index['status']=='Y'){ ?>
                                    <a href="#" title="Click here to deactive" data-toggle="modal"  onclick="return unverify('<?php echo $index['id']; ?>','N','ourwork');" class="rounded btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                                    <?php }else{ ?>
                                    <a href="#" title="Click here to active" data-toggle="modal"  onclick="return verify('<?php echo $index['id']; ?>','Y','ourwork');" class="rounded btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                                    <?php } ?>
                                    </td>
                                    <td><a href="#" title="edit" data-toggle="modal" data-target="#update" onclick="return update('<?php echo $index['id']; ?>','<?php echo base64_encode($index['title']); ?>','<?php echo base64_encode($index['content']); ?>');" class="rounded btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></a>  
                                    <a href="#" title="delete" data-toggle="modal"  onclick="return btnclickdelete('<?php echo $index['id']; ?>','ourwork');" class="rounded btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
                                </tr>
                                <?php $i++;} ?>







                            </tbody>

                        </table>
                        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
                        <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

                        <script>
                            $(document).ready(function() {
                                //$("#gridview").load('load_artist.php');
                                $('#example1').DataTable();
                                $('.dataTables_length').css('display', 'inline-block');
                                $('.dataTables_filter').css({
                                    'display': 'inline-block',
                                    'float': 'right'
                                });


                            });
                        </script>