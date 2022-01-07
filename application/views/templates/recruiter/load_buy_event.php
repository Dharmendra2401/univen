<table id="example1" class="table table-striped table-bordered " width='100%'>
                            <thead>
                                <tr>
                                    <th >S.No</th>
                                    <th >Full Name</th>
                                    <th >Email</th>
                                    <th >Event Type</th>
                                    <th >Applyied Date/ Time</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;foreach($eventsuser as $index)  { 
                                if($index['email_verified']=='Y'){ 
                                    $emailstatus="<label class='text-white bg-success btn-sm'>Verified</label>";}
                                else{
                                    $emailstatus="<label class='text-white bg-danger btn-sm'>Unverify</label>";}

                                 if($index['admin_approval']=='Y'){ 
                                    $status="<label class='text-white bg-success btn-sm '>Approved</label>";}
                                else{
                                    $status="<label class='text-white bg-danger btn-sm ' >Disapproved</label>";}
                                
                                ?>
                            
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $index['name']; ?></td>
                                    <td><?php echo $index['email']; ?></td>
                                    <td class="text-capitalize"><?php echo $index['event_type']; ?></td>
                                    <td><?php echo date('d-M-Y h:i:s A',strtotime($index['date_created'])); ?></td>
                                </tr>
                                <?php  $i++;} ?>
                            </tbody>

                        </table>
                        


                        