<a class="nav-link dropdown-toggle" id="notification" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell fa-fw"></i><span><?php  if($countalls!='0'){echo $countalls;};  ?></span></a>
                      
                       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notification" style="width: 23em;"><ul class="col-md-12">
                       <?php foreach($notify as $not) {?>
                       <li class="notified">
                        <?php if($not['type']=='recruiter'){ 

                           foreach($recc as $reccc){
                            if($reccc['id']==$not['type_id']){
                                ?>
                               <i class="fas fa-user-tie text-success"></i> <span><a href="<?php echo base_url();?>admin/view_recruiter?token=<?php echo base64_encode($not['type_id']);?>">A new recruiter named <strong><?php echo $reccc['firstname'].' '.$reccc['lastname'];?></strong> is registered.</a></span><small><p class="date-time">
                             <span class="float-left d-flex bg-light"><i class="fas fa-calendar-week"></i><?php echo date('d-M-Y',strtotime($not['date'])); ?></span>
                             <span class="float-right d-flex bg-light"><i class="fas fa-clock"></i><?php echo date('h:i:s A',strtotime($not['date'])); ?></span>
                             </p></small>
                                <?php
                            }  
                           }
                       } 
                       
                       else if($not['type']=='applicant'){ 
                       foreach($appp as $appppp){
                        if($appppp['id']==$not['type_id']){
                            ?>
                            <i class="fas fa-user text-success"></i> <a href="<?php echo base_url();?>admin/view_applicant?token=<?php echo base64_encode($not['type_id']);?>"><span> A new applicant named <strong><?php echo $appppp['firstname'].' '.$appppp['lastname'];?></strong> is registered.</span></a> <small><p class="date-time">
                             <span class="float-left d-flex bg-light"><i class="fas fa-calendar-week"></i><?php echo date('d-M-Y',strtotime($not['date'])); ?></span>
                             <span class="float-right d-flex bg-light"><i class="fas fa-clock"></i><?php echo date('h:i:s A',strtotime($not['date'])); ?></span>
                             </p></small>
                            <?php
                        }  
                       }
                    }

                    else if($not['type']=='event'){ 
                        foreach($evee as $eveeee){
                         if($eveeee['id']==$not['type_id']){
                             ?>
                             <i class="fas fa-calendar-week text-success"></i><span> <a href="<?php echo base_url();?>admin/detail_events?token=<?php echo base64_encode($not['type_id']);?>"> A new event title <strong><?php echo $eveeee['event_title'];?></strong> is created. </a> 
                             <small><p class="date-time">
                             <span class="float-left d-flex bg-light"><i class="fas fa-calendar-week"></i><?php echo date('d-M-Y',strtotime($not['date'])); ?></span>
                             <span class="float-right d-flex bg-light"><i class="fas fa-clock"></i><?php echo date('h:i:s A',strtotime($not['date'])); ?></span>
                             </p></small>
                             </span>
                             
                             <?php
                         }  
                        }
                     }
                     else if($not['type']=='job'){ 
                        foreach($jobb as $jobbb){
                         if($jobbb['id']==$not['type_id']){
                             ?>
                             <i class="fas fa-briefcase text-success"></i><span> <a href="<?php echo base_url();?>admin/job_details?token=<?php echo base64_encode($not['type_id']);?>"> A new job title <strong><?php echo $jobbb['title'];?></strong> is created. </a> <small><p class="date-time">
                             <span class="float-left d-flex bg-light"><i class="fas fa-calendar-week"></i><?php echo date('d-M-Y',strtotime($not['date'])); ?></span>
                             <span class="float-right d-flex bg-light"><i class="fas fa-clock"></i><?php echo date('h:i:s A',strtotime($not['date'])); ?></span>
                             </p></small></span>
                             <?php
                         }  
                        }
                     }
                    else{
                         echo "No notification found";
                     }
                }if($notify[0]==''){
                    echo "No notification found";

                }
                
                
                ?>  </li>
                      
                       </ul>