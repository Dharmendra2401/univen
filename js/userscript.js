

// addscript


function addlanguage(counts){
  var getname=$('#getlanguages'+counts).val();
  var type='Language Known';
  $.ajax({
    type:'Post',
    url:"adddropdown",
    data:{'getname':getname,'type':type},
    success:function(addassociate){
      $("#lang"+counts).val(getname);
      language(counts);
      $("#languagee"+counts).val(getname);
      $('.droping'+counts).hide();
    }
  })
}


function addcertificate(counts){
  var getname=$('#getcertificatee'+counts).val();
  var type='Other Ceritificate Courses';
  $.ajax({
    type:'Post',
    url:"adddropdown",
    data:{'getname':getname,'type':type},
    success:function(addassociate){
      $("#cert"+counts).val(getname);
      certificate(counts);
      $('#certificatee'+counts).val(getname);
      $('.dropingg'+counts).hide();
    }
  })
}

function addsoftware(counts){
  var getname=$('#getsoftware'+counts).val();
  var type='Softwares';
  $.ajax({
    type:'Post',
    url:"adddropdown",
    data:{'getname':getname,'type':type},
    success:function(addassociate){
      $("#soft"+counts).val(getname);
      softwares(counts);
      $('#softwaress'+counts).val(getname);
      $('.dropinggone'+counts).hide();
    }
  })
}

function addsoftwaress(counts){
  var getname=$('#getsoftwares'+counts).val();
  var type='Softwares';
  $.ajax({
    type:'Post',
    url:"adddropdown",
    data:{'getname':getname,'type':type},
    success:function(addassociate){
      $("#softs"+counts).val(getname);
      softwaress(counts);
      $('#softwaresss'+counts).val(getname);
      $('.dropinggones'+counts).hide();
    }
  })
}


function addpreviouspresentjob(counts){
  var getname=$('#getpresentjobrolesr'+counts).val();
  var type='Previous Present Job Roles';
  $.ajax({
    type:'Post',
    url:"adddropdown",
    data:{'getname':getname,'type':type},
    success:function(addassociate){
      $('#ppjr'+counts).val(getname);
      presentjobroles(counts);
      $('#presentjobroless'+counts).val(getname);
      $('.dropinggtwo'+counts).hide();
    }
  })
}

function addprocertificate(counts){
  var getname=$('#getprocertificate'+counts).val();
  var type='Google Certificate';
  $.ajax({
    type:'Post',
    url:"adddropdown",
    data:{'getname':getname,'type':type},
    success:function(addassociate){
      $('#procertificate'+counts).val(getname);
    //  presentjobroles(counts);
      $('#procertificatee'+counts).val(getname);
      $('.dropinggthree'+counts).hide();
    }
  })
}

function addassociative(counts){
var getname=$('#getassociative'+counts).val();
var type='Association Name';
$.ajax({
  type:'Post',
  url:"adddropdown",
  data:{'getname':getname,'type':type},
  success:function(addassociate){
    $('#associatename'+counts).val(getname);
    associatenames(counts);
    $('#associatenamee'+counts).val(getname);
    $('.dropinggfour'+counts).hide();
  }
})
}


function addclientworkwith(counts){
var getname=$('#getclientworkwith'+counts).val();
var type='Clients Worked With';
$.ajax({
  type:'Post',
  url:"adddropdown",
  data:{'getname':getname,'type':type},
  success:function(addassociate){
    $('#clientworkwith'+counts).val(getname);
    clientworkwithhs(counts);
    $('#clientworkwithh'+counts).val(getname);
    $('.dropinggfive'+counts).hide();
  }
})
}


function addinterests(counts){
var getname=$('#getinterests'+counts).val();
var type='Interests';
$.ajax({
  type:'Post',
  url:"adddropdown",
  data:{'getname':getname,'type':type},
  success:function(addassociate){
    $('#interest'+counts).val(getname);
    interestss(counts);
    $('#interesttt'+counts).val(getname);
    $('.dropinggsix'+counts).hide();
  }
})
}

function addhobby(counts){
var getname=$('#gethobby'+counts).val();
var type='Hobby';
$.ajax({
  type:'Post',
  url:"adddropdown",
  data:{'getname':getname,'type':type},
  success:function(addassociate){
    $('#hobbys'+counts).val(getname);
    hobbies(counts);
    $('#hobbyy'+counts).val(getname);
    $('.dropinggseven'+counts).hide();
  }
})
}

function addfunctionalarea(counts){
var getname=$('#getfunctionalarea'+counts).val();
var type='Functional Area';
$.ajax({
  type:'Post',
  url:"adddropdown",
  data:{'getname':getname,'type':type},
  success:function(addassociate){
    $('#functionalarea'+counts).val(getname);
    functionalareas(counts);
    $('#functionalareaa'+counts).val(getname);
    $('.dropping1234'+counts).hide();
  }
})
}

function addfunctionalinterest(counts){
var getname=$('#getfunctionalintreset'+counts).val();
var type='Functional Interest';
$.ajax({
  type:'Post',
  url:"adddropdown",
  data:{'getname':getname,'type':type},
  success:function(addassociate){
    $('#functionalintreset'+counts).val(getname);
    functionalintresets(counts);
    $('#functionalintresett'+counts).val(getname);
    $('.dropping12345'+counts).hide();
  }
})
}

function addgetskill(counts){
var getname=$('#getskill'+counts).val();
var type='Skill';
$.ajax({
  type:'Post',
  url:"adddropdown",
  data:{'getname':getname,'type':type},
  success:function(addassociate){
    $('#skills'+counts).val(getname);
    skillsss(counts);
    $('#skillss'+counts).val(getname);
    $('.dropping123456'+counts).hide();
  }
})
}

function addexpertise(counts){
var getname=$('#getgetexpertise'+counts).val();
var type='Expertise';
$.ajax({
  type:'Post',
  url:"adddropdown",
  data:{'getname':getname,'type':type},
  success:function(addassociate){
    $('#expert'+counts).val(getname);
    $('#expertss'+counts).val(getname);
    
    //expertises(counts);
    $('#getgetexpertise'+counts).val(getname);
    $('.dropping11'+counts).hide();
  }
})
}
//select script
function selectgetskill(name,count){
$('#skills'+count).val(name);
$('.dropping123456'+count).hide();
skillsss(count);
$('#skillss'+count).val(name);
$('.dropping123456'+count).hide();
}



function selectfunctionalinterest(name,count){
  $('#functionalintreset'+count).val(name);
  $('.dropping12345'+count).hide();
  functionalintresets(count);
  $('#functionalintresett'+count).val(name);
  $('.dropping12345'+count).hide();
}

function selectexpertise(name,count){
  $('#expert'+count).val(name);
  $('.dropping11'+count).hide();
  expertises(count);
  $('#expertss'+count).val(name);
  $('.dropping11'+count).hide();
}


function selectfunctionalarea(name,count){
  $('#functionalarea'+count).val(name);
  $('.dropping1234'+count).hide();
  functionalareas(count);
  $('#functionalareaa'+count).val(name);
  $('.dropping1234'+count).hide();
}


function selectlanguage(name,count){
  $('#lang'+count).val(name);
  $('.droping'+count).hide();
  language(count);
  $('#languagee'+count).val(name);
  $('.droping'+count).hide();
}

function selectcertificate(name,count){
  $('#cert'+count).val(name);
  $('.dropingg'+count).hide();
  certificate(count);
  $('#certificatee'+count).val(name);
  $('.dropingg'+count).hide();
}

function selectsoftwares(name,count){
  $('#soft'+count).val(name);
  $('.dropinggone'+count).hide();
  //softwares(count);
  $('#softwaress'+count).val(name);
  $('.dropinggone'+count).hide();
}


function selectsoftwaress(name,count){
  $('#softs'+count).val(name);
  $('.dropinggones'+count).hide();
  //softwares(count);
  $('#softwaresss'+count).val(name);
  $('.dropinggones'+count).hide();
}



function selectpreviouspresentjob(name,count){
    $('#ppjr'+count).val(name);
    $('.dropinggtwo'+count).hide();
    presentjobroles(count);
    $('#presentjobroless'+count).val(name);
    $('.dropinggtwo'+count).hide();
}

function selectprocertificate(name,count){
    $('.dropinggthree'+count).hide();
    $('#procertificatee'+count).val(name);
    $('#procertificate'+count).val(name);
    $('.dropinggthree'+count).hide();
}

function selectassociative(name,count){
    $('.dropinggfour'+count).hide();
    associatenames(count);
    $('#associatename'+count).val(name);
    $('#associatenamee'+count).val(name);
    $('.dropinggfour'+count).hide();
}

function selectclientworkwith(name,count){
    $('.dropinggfive'+count).hide();
    clientworkwithhs(count);
    $('#clientworkwith'+count).val(name);
    $('#clientworkwithh'+count).val(name);
    $('.dropinggfive'+count).hide();
}

function selectinterests(name,count){
    $('.dropinggsix'+count).hide();
    interestss(count);
    $('#interest'+count).val(name);
    $('#interesttt'+count).val(name);
    $('.dropinggsix'+count).hide();

}

function selecthobbys(name,count){
    $('.dropinggseven'+count).hide();
    hobbies(count);
    $('#hobbys'+count).val(name);
    $('#hobbyy'+count).val(name);
    $('.dropinggseven'+count).hide();

}

//ajax search dropdown

function hobbies(counts){
  var values = $("input[name='hobby[]']").map(function(){return $(this).val().trim();}).get();
  var certificate=$('#hobbys'+counts).val();
  $('#hobbyy'+counts).val('');
  $(".dropinggseven"+counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
  if(certificate.trim()!=''){
    $(".dropinggseven"+counts).show();
    $.ajax({
      type:'post',
      url:'gethobbies',
      data:{'name':certificate,'counts':counts,'values':values},
      success:function(succccc){
        $(".dropinggseven"+counts).html(succccc);
        $('#gethobby'+counts).val(certificate);
      }

    })
  }else{
    $(".dropinggseven"+counts).hide();
  }
  
}


function interestss(counts){
  var values = $("input[name='interest[]']").map(function(){return $(this).val().trim();}).get();
  var certificate=$('#interest'+counts).val();
  $("#interesttt"+counts).val('');
  $(".dropinggsix"+counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
  if(certificate.trim()!=''){
    $(".dropinggsix"+counts).show();
    $.ajax({
      type:'post',
      url:'getinterests',
      data:{'name':certificate,'counts':counts,'values':values},
      success:function(succccc){
        $(".dropinggsix"+counts).html(succccc);
        
        
      $('#getinterests'+counts).val(certificate);
      //   $('#certificatee'+counts).val(certificate);
      }

    })
  }else{
    $(".dropinggsix"+counts).hide();
  }
  
}




function language(counts){
  var values = $("input[name='lang[]']").map(function(){return $(this).val().trim();}).get();
  var certificate=$('#lang'+counts).val();
  $('#languagee'+counts).val('');
  $(".droping"+counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
  if(certificate.trim()!=''){
    $(".droping"+counts).show();
    $.ajax({
      type:'post',
      url:'getlanguages',
      data:{'name':certificate,'counts':counts,'values':values},
      success:function(succccc){
        $(".droping"+counts).html(succccc);
        //$("#lang"+counts).val(certificate);
        $('#getlanguages'+counts).val(certificate);
      }

    })
  }else{
    $(".droping"+counts).hide();
  }
  
}

function certificatess(counts){
  var values = $("input[name='cert[]']").map(function(){return $(this).val().trim();}).get();
  var certificate=$('#cert'+counts).val();
  $('#certificatee'+counts).val('');
  $(".dropingg"+counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
  if(certificate.trim()!=''){
    $(".dropingg"+counts).show();
    $.ajax({
      type:'post',
      url:'educertificate',
      data:{'name':certificate,'counts':counts,'values':values},
      success:function(succccc){
        $(".dropingg"+counts).html(succccc);
        $("#getcertificatee"+counts).val(certificate);
      //   $('#cert'+counts).val(certificate);
      //   $('#certificatee'+counts).val(certificate);
      }

    })
  }else{
    $(".dropingg"+counts).hide();
  }
  
}

function softwares(counts){
  var values = $("input[name='soft[]']").map(function(){return $(this).val().trim();}).get();
  var certificate=$('#soft'+counts).val();
  $("#softwaress"+counts).val('');
  $(".dropinggone"+counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
  if(certificate.trim()!=''){
    $(".dropinggone"+counts).show();
    $.ajax({
      type:'post',
      url:'getsoftwares',
      data:{'name':certificate,'counts':counts,'values':values},
      success:function(succccc){
        $(".dropinggone"+counts).html(succccc);
        
        
      $('#getsoftware'+counts).val(certificate);
      //   $('#certificatee'+counts).val(certificate);
      }

    })
  }else{
    $(".dropinggone"+counts).hide();
  }
  
}

function softwaress(counts){
  
  var values = $("input[name='softs[]']").map(function(){return $(this).val().trim();}).get();
  var certificate=$('#softs'+counts).val();
  $("#softwaresss"+counts).val('');
  $(".dropinggones"+counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
  if(certificate.trim()!=''){
    $(".dropinggones"+counts).show();
    $.ajax({
      type:'post',
      url:'getsoftwaress',
      data:{'name':certificate,'counts':counts,'values':values},
      success:function(succccc){
        $(".dropinggones"+counts).html(succccc);
        
        
      $('#getsoftwares'+counts).val(certificate);
      //   $('#certificatee'+counts).val(certificate);
      }

    })
  }else{
    $(".dropinggones"+counts).hide();
  }
  
}

function presentjobroles(counts){
  var values = $("input[name='presentjobroles[]']").map(function(){return $(this).val().trim();}).get();
  var certificate=$('#ppjr'+counts).val();
  $("#presentjobroless"+counts).val('');
  $(".dropinggtwo"+counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
  if(certificate.trim()!=''){
    $(".dropinggtwo"+counts).show();
    $.ajax({
      type:'post',
      url:'getpreviouspresentjob',
      data:{'name':certificate,'counts':counts,'values':values},
      success:function(succccc){
        $(".dropinggtwo"+counts).html(succccc);
        
        
      $('#getpresentjobrolesr'+counts).val(certificate);
      //   $('#certificatee'+counts).val(certificate);
      }

    })
  }else{
    $(".dropinggtwo"+counts).hide();
  }
  
}

function procertificates(counts){
  var values = $("input[name='procertificate[]']").map(function(){return $(this).val().trim();}).get();
  var certificate=$('#procertificate'+counts).val();
  $("#procertificatee"+counts).val('');
  $(".dropinggthree"+counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
  if(certificate.trim()!=''){
    $(".dropinggthree"+counts).show();
    $.ajax({
      type:'post',
      url:'getprocertificate',
      data:{'name':certificate,'counts':counts,'values':values},
      success:function(succccc){
        $(".dropinggthree"+counts).html(succccc);
        
        
      $('#getprocertificate'+counts).val(certificate);
      //   $('#certificatee'+counts).val(certificate);
      }

    })
  }else{
    $(".dropinggthree"+counts).hide();
  }
  
}


function associatenames(counts){

  var values = $("input[name='associatename[]']").map(function(){return $(this).val().trim();}).get();
  var certificate=$('#associatename'+counts).val();
  $("#associatenamee"+counts).val('');
  $(".dropinggfour"+counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
  if(certificate.trim()!=''){
    $(".dropinggfour"+counts).show();
    $.ajax({
      type:'post',
      url:'getassociatename',
      data:{'name':certificate,'counts':counts,'values':values},
      success:function(succccc){
        $(".dropinggfour"+counts).html(succccc);
        
        
      $('#getassociative'+counts).val(certificate);
      //   $('#certificatee'+counts).val(certificate);
      }

    })
  }else{
    $(".dropinggfour"+counts).hide();
  }
  

}

function clientworkwithhs(counts){
  var values = $("input[name='clientworkwith[]']").map(function(){return $(this).val().trim();}).get();
  var certificate=$('#clientworkwith'+counts).val();
  $("#clientworkwithh"+counts).val('');
  $(".dropinggfive"+counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
  if(certificate.trim()!=''){
    $(".dropinggfive"+counts).show();
    $.ajax({
      type:'post',
      url:'getclientworkwith',
      data:{'name':certificate,'counts':counts,'values':values},
      success:function(succccc){
        $(".dropinggfive"+counts).html(succccc);
        
        
      $('#getclientworkwith'+counts).val(certificate);
      //   $('#certificatee'+counts).val(certificate);
      }

    })
  }else{
    $(".dropinggfive"+counts).hide();
  }
  
}


function functionalareas(counts){
  var values = $("input[name='functionalarea[]']").map(function(){return $(this).val().trim();}).get();
  var certificate=$('#functionalarea'+counts).val();
  $("#functionalareaa"+counts).val('');
  $(".dropping1234"+counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
  if(certificate.trim()!=''){
    $(".dropping1234"+counts).show();
    $.ajax({
      type:'post',
      url:'getfunctionalarea',
      data:{'name':certificate,'counts':counts,'values':values},
      success:function(succccc){
        $(".dropping1234"+counts).html(succccc);
        
        
      $('#getfunctionalarea'+counts).val(certificate);
      //   $('#certificatee'+counts).val(certificate);
      }

    })
  }else{
    $(".dropping1234"+counts).hide();
  }
}

function functionalintresets(counts){
  var values = $("input[name='functionalintreset[]']").map(function(){return $(this).val().trim();}).get();
  var certificate=$('#functionalintreset'+counts).val();
  $("#functionalintresett"+counts).val('');
  $(".dropping12345"+counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
  if(certificate.trim()!=''){
    $(".dropping12345"+counts).show();
    $.ajax({
      type:'post',
      url:'getfunctionalintreset',
      data:{'name':certificate,'counts':counts,'values':values},
      success:function(succccc){
        $(".dropping12345"+counts).html(succccc);
        
        
      $('#getfunctionalintreset'+counts).val(certificate);
      //   $('#certificatee'+counts).val(certificate);
      }

    })
  }else{
    $(".dropping12345"+counts).hide();
  }
}


function skillsss(counts){
  var values = $("input[name='skills[]']").map(function(){return $(this).val().trim();}).get();
  var certificate=$('#skills'+counts).val();
  $("#skillss"+counts).val('');
  $(".dropping123456"+counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
  if(certificate.trim()!=''){
    $(".dropping123456"+counts).show();
    $.ajax({
      type:'post',
      url:'getskills',
      data:{'name':certificate,'counts':counts,'values':values},
      success:function(succccc){
        $(".dropping123456"+counts).html(succccc);
        
        
      $('#getskill'+counts).val(certificate);
      //   $('#certificatee'+counts).val(certificate);
      }

    })
  }else{
    $(".dropping123456"+counts).hide();
  }
}

function expertises(counts){
  var values = $("input[name='expert[]']").map(function(){return $(this).val().trim();}).get();
  var certificate=$('#expert'+counts).val();
  $("#expertss"+counts).val('');
  $(".dropping11"+counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
  if(certificate.trim()!=''){
    $(".dropping11"+counts).show();
    $.ajax({
      type:'post',
      url:'getexpertises',
      data:{'name':certificate,'counts':counts,'values':values},
      success:function(succccc){
        $(".dropping11"+counts).html(succccc);
        
        
      $('#getgetexpertise'+counts).val(certificate);
      //   $('#certificatee'+counts).val(certificate);
      }

    })
  }else{
    $(".dropping11"+counts).hide();
  }
}


// append Html

$('.extra-fields-customer').click(function() {
  var numItems = $('.alllanguages_row div.form-group').length;
  $('.alllanguages_row .alllanguages').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.alllanguages_row').append('<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" id="lang'+numItems+'" onkeypress="return isString (event);" onkeyup="language('+numItems+')" name="lang[]"><div class="droping-lists droping'+numItems+'" id="droping-lists" style="display:none"></div><input type="hidden" name="langusgaess[]" id="languagee'+numItems+'" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>');
});

$('.addcertificates').click(function() {
  
  var numItems = $('.allcertificate div.form-group').length;
  $('.allcertificate .alllanguages').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.allcertificate').append('<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" id="cert'+numItems+'" onkeypress="return isString (event);" onkeyup="certificatess('+numItems+')" name="cert[]"><div class="droping-lists dropingg'+numItems+'" id="droping-lists" style="display:none"></div><input type="hidden" name="selectcertificateone[]" id="certificatee'+numItems+'" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>');
});

$('.addsoftwaress').click(function() {
  var numItems = $('.all_softwaress div.form-group').length;
  $('.all_softwaress .alllanguages').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.all_softwaress').append('<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" id="softs'+numItems+'" onkeypress="return isString (event);" onkeyup="softwaress('+numItems+')" name="softs[]"><div class="droping-lists dropinggones'+numItems+'" id="droping-lists" style="display:none"></div><input type="hidden" name="selectsoftwaress[]" id="softwaresss'+numItems+'" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>');
});

$('.jobbutton').click(function() {
  var numItems = $('.alljobs div.form-group').length;
  $('.alljobs .alllanguages').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.alljobs').append('<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" id="ppjr'+numItems+'" onkeypress="return isString (event);" onkeyup="presentjobroles('+numItems+')" name="presentjobroles[]"><div class="droping-lists dropinggtwo'+numItems+'" id="droping-lists" style="display:none"></div><input type="hidden" name="selectpresentjobroless[]" id="presentjobroless'+numItems+'" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>');
});


$('.procerticatebutton').click(function() {
  var numItems = $('.all_pro_cert div.form-group').length;
  $('.all_pro_cert .alllanguages').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.all_pro_cert').append('<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" id="procertificate'+numItems+'" onkeypress="return isString (event);" onkeyup="procertificates('+numItems+')" name="procertificate[]"><div class="droping-lists dropinggthree'+numItems+'" id="droping-lists" style="display:none"></div><input type="hidden" name="selectprocertificate[]" id="procertificatee'+numItems+'" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>');
});

$('.addaccosiate').click(function() {
  var numItems = $('.allassociate div.form-group').length;
  $('.allassociate .alllanguages').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.allassociate').append('<div class="remove form-group position-relative focused"><label class="form-label heading-title" for="associatename">Association name</label><input type="text" class="form-input form-control" maxlength="150" id="associatename'+numItems+'" onkeypress="return isString (event);" onkeyup="associatenames('+numItems+')" name="associatename[]"><div class="droping-lists dropinggfour'+numItems+'" id="droping-lists" style="display:none"></div><input type="hidden" name="selectassociatename[]" id="associatenamee'+numItems+'" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>');
});

$('.addclients').click(function() {
  var numItems = $('.all_client div.form-group').length;
  $('.all_client .alllanguages').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.all_client').append('<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" id="clientworkwith'+numItems+'" onkeypress="return isString (event);" onkeyup="clientworkwithhs('+numItems+')" name="clientworkwith[]"><div class="droping-lists dropinggfive'+numItems+'" id="droping-lists" style="display:none"></div><input type="hidden" name="selectclientworkwith[]" id="clientworkwithh'+numItems+'" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>');
});

$('.interestbutton').click(function() {
  var numItems = $('.all_interest div.form-group').length;
  $('.all_interest .alllanguages').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.all_interest').append('<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" id="interest'+numItems+'" onkeypress="return isString (event);" onkeyup="interestss('+numItems+')" name="interest[]"><div class="droping-lists dropinggsix'+numItems+'" id="droping-lists" style="display:none"></div><input type="hidden" name="selectinterest[]" id="interesttt'+numItems+'" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>');
});

$('.addhobby').click(function() {
  var numItems = $('.all_hobby div.form-group').length;
  $('.all_hobby .alllanguages').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.all_hobby').append('<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" id="hobbys'+numItems+'" onkeypress="return isString (event);" onkeyup="hobbies('+numItems+')" name="hobby[]"><div class="droping-lists dropinggseven'+numItems+'" id="droping-lists" style="display:none"></div><input type="hidden" name="selecthobby[]" id="hobbyy'+numItems+'" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>');
});

$('.addfuncarea').click(function() {
  var numItems = $('.all_functional_area div.form-group').length;
  $('.all_functional_area .alllanguages').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.all_functional_area').append('<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" id="functionalarea'+numItems+'" onkeypress="return isString (event);" onkeyup="functionalareas('+numItems+')" name="functionalarea[]"><div class="droping-lists dropping1234'+numItems+'" id="droping-lists" style="display:none"></div><input type="hidden" name="selectfunctionalarea[]" id="functionalareaa'+numItems+'" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>');
});

$('.addfunctinterest').click(function() {
  var numItems = $('.all_functional_intreset div.form-group').length;
  $('.all_functional_intreset .alllanguages').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.all_functional_intreset').append('<div class="remove form-group position-relative focused"><label class="form-label heading-title" for="functionalintreset">Functional Industry</label><input type="text" class="form-input form-control" maxlength="150" id="functionalintreset'+numItems+'" onkeypress="return isString (event);" onkeyup="functionalintresets('+numItems+')" name="functionalintreset[]"><div class="droping-lists dropping12345'+numItems+'" id="droping-lists" style="display:none"></div><input type="hidden" name="selectfunctionalintreset[]" id="functionalintresett'+numItems+'" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>');
});

$('.addskill').click(function() {
  var numItems = $('.all_skill div.form-group').length;
  $('.all_skill .alllanguages').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.all_skill').append('<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" id="skills'+numItems+'" onkeypress="return isString (event);" onkeyup="skillsss('+numItems+')" name="skills[]"><div class="droping-lists dropping123456'+numItems+'" id="droping-lists" style="display:none"></div><input type="hidden" name="selectskills[]" id="skillss'+numItems+'" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>');
});

$('.addexpertise').click(function() {
  var numItems = $('.all_expertise div.form-group').length;
  $('.all_expertise .alllanguages').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.all_expertise').append('<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" id="expert'+numItems+'" onkeypress="return isString (event);" onkeyup="expertises('+numItems+')" name="expert[]"><div class="droping-lists dropping11'+numItems+'" id="droping-lists" style="display:none"></div><input type="hidden" name="selectexpert[]" id="expertss'+numItems+'" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>');
});



$(document).on('click', '.remove-field', function(e) {
  $(this).parent('.remove').remove();
  e.preventDefault();
});


$('.addbutton').html('<i class="fas fa-plus"></i>');

