
<table id="example1" class="table table-striped table-bordered " width='100%'>
                            <thead>
                                <tr>
                                    <th width="10%">S.No</th>
                                    <th>Profile Section</th>
                                    <th>Profile Form</th>
                                    <th class="text-center">Status</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php  $i=1;foreach($row as $index)  {
                                                                
                                
                                ?>
                            
                                <tr >
                                    <td><?php echo $i; ?></td>
                                    <td  style="width:20%"><?php echo $index['Section_Name']; ?></td>
                                    <td  style="width:20%"><?php echo $index['Profile_Form']; ?></td>

                                    
                                    <td class="text-center"><?php if($index['ACTIVE_FLAG_PROFILE_FORM']=='Y'){ echo "<label class='text-white bg-success btn-sm'>Active</label>";}else{echo "<label class='text-white bg-danger btn-sm'>Deactive<label>";} ?> 
                                   
                                    </td>
                                    <td class="tablebutton">
                                    <!-- <a href="#" title="Update"  class="rounded btn btn-sm btn-primary" onclick="update('<?php echo base64_encode($index['Sub_Category_ID']);?>','<?php echo base64_encode($index['Section_Name']);?>')"  data-toggle="modal" data-target="#update"><i class="fas fa-edit"></i></a> -->
                                    
                                    <?php if($index['ACTIVE_FLAG_PROFILE_FORM']=='Y'){ ?>
                                    <a href="#" title="Click here to deactive" data-toggle="modal"  onclick="return unverify('<?php echo $index['id']; ?>','N','profile_form_mapping');" class="rounded btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                                    <?php }else{ ?>
                                    <a href="#" title="Click here to active" data-toggle="modal"  onclick="return verify('<?php echo $index['id']; ?>','Y','profile_form_mapping');" class="rounded btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                                    <?php } ?>
                                    <!-- <a href="#" title="delete" data-toggle="modal"  onclick="return btnclickdelete('<?php echo $index['subcatid']; ?>','aspprofilesub_cat');" class="rounded btn btn-sm btn-danger"><i class="fas fa-trash"></i></a><br>  -->
                                    <a href="#" data-toggle="modal" data-target="#view"   onclick="return viewall('<?php echo base64_encode($index['Section_Name']); ?>','<?php echo base64_encode($index['Profile_Form']); ?>','<?php echo base64_encode($index['Form_Element']); ?>','<?php echo base64_encode($index['Form_Type']); ?>','<?php echo base64_encode($index['Label_Name']); ?>','<?php echo base64_encode($index['Form_Min_Length']); ?>','<?php echo base64_encode($index['Form_Max_Length']); ?>');" class="rounded btn btn-sm btn-primary"><i class="fas fa-eye"></i></a><br> 


                                    
                                
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
                        