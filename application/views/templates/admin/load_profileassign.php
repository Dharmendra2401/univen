<table id="example1" class="table table-striped table-bordered " width='100%'>
                            <thead>
                                <tr>
                                    <th width="10%">S.No</th>
                                    <th >Profile Name</th>
                                    <th class="text-center">Template Name</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;foreach($row as $index)  {
                                                                
                                
                                ?>
                            
                                <tr >
                                    <td><?php echo $i; ?></td>
                                    <td  style="width:20%"><?php echo $index['proname']; ?></td>
                                    <td class="text-center"><?php if($index['HTML_Sample_Form']=='1'){ echo "Form 1 (On Screen)";}elseif ($index['HTML_Sample_Form']=='2') {
                                       echo "Form 2 (Off Screen)";
                                    }else{
                                        echo "Form 3 (Event and Photography)";
                                    } ?> 
                                   
                                    </td>
                                    <td class="tablebutton">
                                    <a href="#" title="Update"  class="rounded btn btn-sm btn-primary" onclick="update('<?php echo base64_encode($index['ID']);?>','<?php echo base64_encode($index['Profile_Name']);?>','<?php echo base64_encode($index['HTML_Sample_Form']);?>')"  data-toggle="modal" data-target="#update"><i class="fas fa-edit"></i></a>
                                    
                                    <!-- <?php if($index['ACTIVE_STATUS']=='Y'){ ?>
                                    <a href="#" title="Click here to deactive" data-toggle="modal"  onclick="return unverify('<?php echo $index['Id']; ?>','N','dropdown_profile');" class="rounded btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                                    <?php }else{ ?>
                                    <a href="#" title="Click here to active" data-toggle="modal"  onclick="return verify('<?php echo $index['Id']; ?>','Y','dropdown_profile');" class="rounded btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                                    <?php } ?> 
                                    <a href="#" title="delete" data-toggle="modal"  onclick="return btnclickdelete('<?php echo $index['Id']; ?>','dropdown_profile');" class="rounded btn btn-sm btn-danger"><i class="fas fa-trash"></i></a><br>  -->
                                
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
                        