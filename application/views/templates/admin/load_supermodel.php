<table id="example1" class="table table-striped table-bordered " width='100%'>
                            <thead>
                                <tr>
                                    <th >S.No</th>
                                    <th >Full Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;foreach($row as $index)  { 
                                ?>
                            
                                <tr class="row<?php echo $i; ?>">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $index['name']; ?></td>
                                    <td><?php echo $index['email']; ?></td>
                                    <td><?php echo $index['mobile_no']; ?></td>
                                   
                                    <td class="tablebutton">
                                    
                                    <a data-toggle="modal" data-target="#view" href="#" onclick="return update('<?php echo base64_encode($index['name']); ?>','<?php echo base64_encode($index['email']); ?>','<?php echo base64_encode($index['address']); ?>','<?php echo $index['city']; ?>','<?php echo $index['state']; ?>','<?php echo $index['pincode']; ?>','<?php echo $index['birth_place']; ?>','<?php echo base64_encode($index['height']); ?>','<?php echo $index['mobile_no']; ?>','<?php echo date('d-M-Y',strtotime($index['birth_date'])); ?>','<?php echo $index['birth_date']; ?>','<?php echo $index['occupation']; ?>','<?php echo $index['agent']; ?>','<?php echo $index['found_us']; ?>','<?php echo date('d-M-Y h:i:s A',strtotime($index['date_created'])); ?>')" title="View message" class="rounded btn btn-sm btn-success"><i class="fas fa-eye"></i></a>  

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
                        