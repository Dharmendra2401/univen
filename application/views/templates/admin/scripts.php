<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
function isNumeric(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

$(document).ready(function() {
    $(function() {
        setTimeout(function() {
            $(".alert.alert-success.alert-dismissible.fade.show").hide();
        }, 3000);
    });
    $("#notifications").load("<?php echo base_url();?>admin/loadnotication");

});
$('.modal').on('hidden.bs.modal', function(e) {
    $(this)
        .find("input,textarea,select")
        .val('')
        .end()
        .find("input[type=checkbox], input[type=radio]")
        .prop("checked", "")
        .end();
})

$(document).mouseup(function(e) {
    if ($(e.target).closest(".droping-list").length ===
        0) {
        $('.droping-list').hide();
        $('.droping-lists').hide();
    }
});
</script>