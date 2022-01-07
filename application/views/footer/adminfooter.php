<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Write Mail</h4>
        </div>
		<form id="send_mail_form" method="post">
			<div class="modal-body">
				<div class="form-group">
					<label >Subject<span class="required">*</span></label> 
					<input type="text" class="form-control" class="form-control" id="subject" rows="3"  placeholder="Subject" name="subject"  required>
				</div>
				<div class="form-group">
					<label >Mail Content<span class="required">*</span></label> 
					<textarea class="form-control" id="mailcontent" rows="3"  placeholder="Description" name="mailcontent"  required></textarea>
					<span id="id_error_descrription" style="display:none"><font color="red">Description is Required</font></span>
				</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" style="float:left" data-dismiss="modal">Close</button>
			  <button class="btn btn-info" type="submit" id="">Send</button>
			</div>
		</form>
      </div>
      
    </div>
  </div>

 </div>
 </div>
 </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
   
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $module_url; ?>/admin/js/bootstrap.min.js"></script>

	<script>
		CKEDITOR.replace( 'mailcontent' , {
			toolbarGroups: [
					{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
					{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
					{ name: 'links', groups: [ 'links' ] },
					{ name: 'insert', groups: [ 'insert' ] },
					{ name: 'forms', groups: [ 'forms' ] },
					{ name: 'tools', groups: [ 'tools' ] },
					{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
					{ name: 'others', groups: [ 'others' ] },
					'/',
					{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
					{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
					{ name: 'styles', groups: [ 'styles' ] },
					{ name: 'colors', groups: [ 'colors' ] },
					{ name: 'about', groups: [ 'about' ] }
						]
					}
			);
			
			
	$('#send_mail_form').validate({
			ignore: [],
			debug: false,
			rules:
			{ 
		  		subject:
				{
					required: true,
					// notNumber : true
				},
				
				
			}, 
			
			messages: 
			{
				subject:
				{
					required : "Mail subject is Required",
					// notNumber : "Enter valid name"
				},	
				
					
			}, 
			submitHandler: function(form) {
				// do other things for a valid form
				
				//console.log($("#description").val());
				//var description = $("#description").val();
				var mailcontent = CKEDITOR.instances['mailcontent'].getData();
				
					if(mailcontent == "")
					{
						$("#id_error_descrription").show();
					}else{
						$("#id_error_descrription").hide();
						$(".loading").show();
						
						$.ajax({
						url:'<?php echo $module_url; ?>/adminpanel/sendmailtouser',
						type:"POST",
						data:{subject:$("#subject").val(), mailcontent:CKEDITOR.instances['mailcontent'].getData(),id:$("#id_sendmail").attr("data-id"),email:$("#id_sendmail").attr("data-email"),user_type:$("#id_sendmail").attr("data-user_type") },
						dataType:"json",
						success:function(result){
							console.log(result);
							// console.log(result.aa);
							if(result.status=="success"){
							// $("#id_"+type+"_c_name"+id).html(category_name);
							// $("#id_"+type+"_category_f_name"+id).val(category_name);
							swal('', result.msg, "success");
							$("#subject").val("");
							CKEDITOR.instances.mailcontent.setData('');
							$('#myModal').modal('hide');
						}else{
							swal("", result.msg, "error");
						
						}
						$(".loading").hide();
							
						} 
					})
					}
				
				
			  }
			
			  
		});
			
			
	</script>
	
</body>

</html>
