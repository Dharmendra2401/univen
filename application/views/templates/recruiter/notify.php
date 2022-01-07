
<a class="nav-link dropdown-toggle" id="notification" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell fa-fw"></i><span><?php  if($alcounts!='0'){echo $alcounts;};  ?></span></a>
                      
                       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notification" style="width: 23em;"><ul class="col-md-12">
                       <?php foreach($getsall as $not) {?>
                       <li class="notified">
                        <?php 
                        if($not['type']=='event'){ 
                           
                           foreach($recc as $reccc){
                              
                            if(($reccc['id']==$not['type_id'])&& $reccc['approve']=='Y'){
                                ?>
                               <i class="fas fa-calendar-alt text-success"></i> <span><a href="<?php echo base_url();?>recruiter/detail_events?token=<?php echo base64_encode($not['type_id']);?>"> Event <strong>EV0000<?php echo $reccc['id'];?></strong> title <strong><?php echo $reccc['event_title'];?></strong> has been approved.</a>
                               <small><p class="date-time">
                             <span class="float-left d-flex bg-light"><i class="fas fa-calendar-week"></i><?php echo date('d-M-Y',strtotime($not['date'])); ?></span>
                             <span class="float-right d-flex bg-light"><i class="fas fa-clock"></i><?php echo date('h:i:s A',strtotime($not['date'])); ?></span>
                             </p></small>
                            
                            
                            </span>
                                <?php
                            }
                            if(($reccc['id']==$not['type_id'])&& $reccc['approve']=='N'){
                                ?>
                               <i class="fas fa-calendar-times text-danger"></i> <span><a href="<?php echo base_url();?>recruiter/detail_events?token=<?php echo base64_encode($not['type_id']);?>"> Event <strong>EV0000<?php echo $reccc['id'];?></strong> title <strong><?php echo $reccc['event_title'];?></strong> has been disapproved.</a><small><p class="date-time">
                             <span class="float-left d-flex bg-light"><i class="fas fa-calendar-week"></i><?php echo date('d-M-Y',strtotime($not['date'])); ?></span>
                             <span class="float-right d-flex bg-light"><i class="fas fa-clock"></i><?php echo date('h:i:s A',strtotime($not['date'])); ?></span>
                             </p></small></span>
                                <?php
                            }  
                           }
                       } 
                       
                     else if($not['type']=='job'){ 
                        foreach($jobss as $jobbb){
                         if(($jobbb['id']==$not['type_id'])&& $jobbb['admin_approval']=="Y"){
                             ?>
                             <i class="fas fa-check-circle text-success"></i><span> <a href="<?php echo base_url();?>recruiter/view_job?token=<?php echo base64_encode($not['type_id']);?>"> Job <strong>OP<?php echo $jobbb['id']; ?></strong> title <strong><?php echo $jobbb['title']; ?></strong> has been approved. </a> </span>
                             <?php
                         }if(($jobbb['id']==$not['type_id'])&& $jobbb['admin_approval']=="N"){
                             ?>
                              <i class="fas fa-times-circle text-danger"></i><span> <a href="<?php echo base_url();?>recruiter/view_job?token=<?php echo base64_encode($not['type_id']);?>"> Job <strong>OP<?php echo $jobbb['id']; ?></strong> title <strong><?php echo $jobbb['title']; ?></strong> has been disapproved. </a> 
                              <small><p class="date-time">
                             <span class="float-left d-flex bg-light"><i class="fas fa-calendar-week"></i><?php echo date('d-M-Y',strtotime($not['date'])); ?></span>
                             <span class="float-right d-flex bg-light"><i class="fas fa-clock"></i><?php echo date('h:i:s A',strtotime($not['date'])); ?></span>
                             </p></small>
                            
                            </span>
                             <?php
                         } 
                        }
                     }
                    else{
                         echo "No notification found";
                     }
                }if($getsall[0]==''){
                    echo "No notification found";

                }
                
                
                ?>  </li>
                      
                       </ul>