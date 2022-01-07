
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <script src="<?php echo base_url(); ?>js/popper.min.js"></script>
       <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>css/admincss/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>css/admincss/js/chart.min.js"></script>
        <script src="<?php echo base_url(); ?>css/admincss/js/shorting.js"></script>
        <script type="text/javascript" src="https://cdn.ckeditor.com/4.15.0/standard-all/ckeditor.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/sweetalert.min.js"></script>
        <script src="<?php echo base_url(); ?>js/lightbox.js"></script>
        <script src="<?php echo base_url(); ?>js/BsMultiSelect.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap-select.min.js"></script>
        

        


        <script>
        
        $(document).ready(function(){
         recruiterdata();
         $("#notifications").load("<?php echo base_url();?>recruiter/loadnotication");

         });
        function recruiterdata(){
           $.ajax({
              type:'GET',
              url:'<?php echo base_url();?>recruiter/top_head',
              //dataType:'Json',
              success:function(success){
               const obj = JSON.parse(success);
               $('#recfullname').html(obj.det.firstname);
               $('#reclastname').html(obj.det.lastname);
               var smess= obj.det.send_new_message;
               var wmail= obj.det.weekly_statistics;
               var hprof= obj.det.hide_profile;
               var amail= obj.det.application_mail;
             
               if(smess=='Y'){
                  $("input[name='emailsendtorec'").attr('checked','checked');
               }
               if(wmail=='Y'){
                  $("input[name='statisticssettings'").attr('checked','checked');
               }
               if(hprof=='Y'){
                  $("input[name='profilesettings'").attr('checked','checked');
               }
               if(amail=='Y'){
                  $("input[name='jobssettings'").attr('checked','checked');
               }
              }
           })
        }

        


        

           function settings(){
              var sendemail=$('input[name=emailsendtorec]:checked').val();
              var statistics=$('input[name=statisticssettings]:checked').val();
              var profilesettings=$('input[name=profilesettings]:checked').val();
              var jobsettings=$('input[name=jobssettings]:checked').val();
              $('.loader').fadeIn();
              
             $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>recruiter/updatesettings',
                data:{'sendemail':sendemail,'statistics':statistics,'profilesettings':profilesettings,'jobsettings':jobsettings},
                success:function(getupdates){
                   recruiterdata();
                   if(getupdates.trim()=='true'){
                     $('.loader').fadeOut();
                     // $('.messagesettings').html('<div class="alert alert-success alert-dismissible fade show" role="alert">Your profile settings is successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                     return true;
                   }
                   if(getupdates.trim()=='false'){
                     $('.loader').fadeOut();
                     $('.messagesettings').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please try again <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                     return false;
                   }

                }


             })
           }

       function isNumeric (evt) {
var theEvent = evt || window.event;
var key = theEvent.keyCode || theEvent.which;
key = String.fromCharCode (key);
var regex = /[0-9]|\./;
if ( !regex.test(key) ) {
theEvent.returnValue = false;
if(theEvent.preventDefault) theEvent.preventDefault();
}
}

// $(document).ready(function(){
// $('.modal').on('hidden.bs.modal', function (e) {
//   $(this)
//     .find("input,textarea,select")
//        .val('')
//        .end()
//     .find("input[type=checkbox], input[type=radio]")
//        .prop("checked", "")
//        .end();
// })
// });
</script>
        

        
        
        

        

        


        

        