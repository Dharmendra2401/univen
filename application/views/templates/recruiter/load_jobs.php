
<table id="example1" class="table table-striped table-bordered " width='100%'>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Applied</th>
                                    <th>Last Date</th>
                                    <th>Date Created</th>
                                    <th>Admin Approval</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;foreach($row as $index)  { if($index['admin_approval']=='N'){$status="<label class='text-white bg-danger btn-sm'>Disapproved</label>";}else{$status="<label class='text-white bg-success btn-sm'>Approved</label>";}
                            $getprofile= explode(',',$index['profile_ids']);
                            $getallprofiles='';
                            foreach($getprofile as $profiless){
                                foreach($prof as $setprofiles){
                                    if($setprofiles['id']==$profiless){
                                        $getallprofiles.= rtrim($setprofiles['name'].',');

                                    }

                                }

                            }
                            ?>
                                <tr >
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $index['old_title']; ?></td>
                                    <td>  <?php  echo "<label class='text-white bg-success btn-sm'>".$index['app_count']."</label>"; ?></td>
                                    <td><?php echo date('d-M-Y',strtotime($index['last_date'])); ?></td>
                                    <td><?php echo date('d-M-Y',strtotime($index['date_created'])).'<br>'.date('h:i:s A',strtotime($index['date_created'])); ?></td>
                                    
                                    <td><input type="hidden" id="allid" value="<?php echo $index['profile_ids']; ?>"><?php echo $status; ?></td>
                                    
                                    <td class="tablebutton"> 
                                    <a href="#" title="update" data-toggle="modal" data-target="#update"  onclick="return update('<?php echo $index['id']; ?>','<?php echo $index['old_title']; ?>','<?php echo $index['type']; ?>','<?php echo $index['location']; ?>','<?php echo $index['last_date']; ?>','<?php echo base64_encode($index['content']); ?>','<?php echo base64_encode($index['profile_ids']); ?>','<?php echo base64_encode(rtrim($getallprofiles,',')); ?>');" class="rounded btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></a>

                                    <a href="<?php echo base_url();?>recruiter/view_job?token=<?php echo base64_encode($index['id']); ?>" title="view" class="rounded btn btn-sm btn-info"><i class="fas fa-eye"></i></a>

                                    <a href="#" title="delete" data-toggle="modal"  onclick="return btnclickdelete('<?php echo $index['id']; ?>','event_category');" class="rounded btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
                                </tr>
                                <?php $i++;} ?>







                            </tbody>

                        </table>
                      
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

                        <script>
                            $(document).ready(function() {
                                
                                //$("#gridview").load('load_artist.php');
                                $('#example1').DataTable({searching: true, paging: true, info: false});
                              
                                $('.dataTables_length').css('display', 'inline-block');
                                $('.dataTables_filter').css({
                                    'display': 'inline-block',
                                    'float': 'right'
                                });
                                
                            });

                           
                        </script>
                        