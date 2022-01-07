<table id="example1" class="table table-striped table-bordered " width='100%'>
                            <thead>
                                <tr>
                                    <th >S.No</th>
                                    <th >Full Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;foreach($row as $index)  { 
                                
                                ?>
                            
                                <tr class="row<?php echo $i; ?>">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $index['firstname'].' '.$index['lastname']; ?></td>
                                    <td><?php echo $index['email']; ?></td>
                                    <td><?php echo $index['contact_no']; ?></td>
                                   
                                </tr>
                                <?php $i++;} ?>







                            </tbody>

                        </table>
                        


                        