<script src="<?php echo control_url("assets/js/libs/jquery-1.8.2.min.js");?>"></script>
<script src="<?php echo control_url("assets/jquery.validate.js");?>"></script>
<script src="<?php echo control_url("assets/jui/js/jquery-ui-1.8.24.min.js");?>"></script>
<script src="<?php echo control_url("assets/jui/jquery-ui.custom.min.js");?>"></script>
<script src="<?php echo control_url("assets/jui/timepicker/jquery-ui-timepicker.min.js");?>"></script>
<script>
$(document).ready(function($){
	$.validator.messages.required = "* กรุณากรอกข้อมูล";
	$.validator.messages.number = "* กรอกเฉพาะตัวเลข";
	$("form").validate(); 
	$("#datepicker").datepicker();
});
</script>