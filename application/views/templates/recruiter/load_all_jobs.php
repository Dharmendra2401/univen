<input type="hidden" name="counts" id="counts" value="<?php echo $counts;?>">
<ul id="listPage" class="row" >

<?php $i=0; shuffle($users); foreach($users as $index) { ?>

      <li class="col-md-2 item">  <div class="job_profile card"><div class="card-body"> <div class="image-top"><?php if($index['profile_pic']!=''){?> <a data-lightbox="example-<?php echo $i; ?>" href="<?php echo base_url();?>uploads/profile/<?php echo $index['profile_pic'];?>"> <img src="<?php echo base_url();?>uploads/profile/<?php echo $index['profile_pic'];?>" alt="" title="<?php echo $index['firstname'].''.$index['lastname']; ?>" width="100%"></a> <?php }else{?> <img src="<?php echo base_url();?>images/img_264157.png" title="<?php echo $index['firstname'].''.$index['lastname']; ?>" width="100%"> <?php } ?></div></div> <div class="card-footer"> <h6 class="text-info"><?php echo $index['firstname'].' '.$index['lastname'];?></h6>
      <p class="profiles"><strong>Profile:</strong> 
      <?php 
      $sql="SELECT pro.user_id,pro.profile_id,profil.name,profil.delete_flag from user_profiles as pro RIGHT JOIN profiles as profil on pro.profile_id=profil.id  where pro.user_id=$index[id] order by profil.id ";
      $query=$this->db->query($sql);
      $profiless='';
      if ($query->num_rows() > 0) {

            foreach ($query->result() as $rows) {?>
                 <?php $profiless.=$rows->name;
    ?>
             <?php }

      }
      if (strlen($profiless)>10){echo substr($profiless, 0, 20) . '...';}else{echo $profiless;}
      

      
      
      ?> 
      </p>
      <p><strong>ID: </strong>CIU<?php echo $index['id'];?></p></div><a href="<?php echo base_url()?>recruiter/view_app_detail?token=<?php echo base64_encode($index['id']);?>" class=" btn-sm bg-success text-white">View details</a></div></li>

      <?php $i= $i+1;  } if($i==0) {?>
      <h6 class="col-md-12"><p class="alert bg-light text-center">No Records Found</p></h6>
      <?php  }?>
      
</ul>