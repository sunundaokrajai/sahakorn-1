
                        </section>
                    </div>
                </div>
            </div>
        </div>
        
        <footer id="footer">
            <div class="footer-left">ระบบการจัดการ กองทุนสวัสดิการข้าราชการและลูกจ้างกรุงเทพมหานคร</div>
            <div class="footer-right"><p>Copyright 2010. All Rights Reserved.</p></div>
        </footer>
        
    </div>

    <!-- Core Scripts -->
    <script src="<?php echo control_url("assets/js/libs/jquery-1.8.2.min.js");?>"></script>
    <script src="<?php echo control_url("bootstrap/js/bootstrap.min.js");?>"></script>
    <script src="<?php echo control_url("assets/js/libs/jquery.placeholder.min.js");?>"></script>
    <script src="<?php echo control_url("assets/js/libs/jquery.mousewheel.min.js");?>"></script>
    
    <!-- Template Script -->
    <script src="<?php echo control_url("assets/js/template.js");?>"></script>
    <script src="<?php echo control_url("assets/js/setup.js");?>"></script>

    <!-- Customizer, remove if not needed -->
    <script src="<?php echo control_url("assets/js/customizer.js");?>"></script>

    <!-- Uniform Script -->
    <script src="<?php echo control_url("plugins/uniform/jquery.uniform.min.js");?>"></script>
    
    <!-- jquery-ui Scripts -->
    <script src="<?php echo control_url("assets/jui/js/jquery-ui-1.8.24.min.js");?>"></script>
    <script src="<?php echo control_url("assets/jui/jquery-ui.custom.min.js");?>"></script>
    <script src="<?php echo control_url("assets/jui/timepicker/jquery-ui-timepicker.min.js");?>"></script>
    <script src="<?php echo control_url("assets/jui/jquery.ui.touch-punch.min.js");?>"></script>
    <script src="<?php echo control_url("assets/jquery.validate.js");?>"></script>
    
    <!-- Plugin Scripts -->
    
    <!-- Flot -->
    <!--[if lt IE 9]>
    <script src="assets/js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="<?php echo control_url("plugins/flot/jquery.flot.min.js");?>"></script>
    <script src="<?php echo control_url("plugins/flot/plugins/jquery.flot.tooltip.min.js");?>"></script>
    <script src="<?php echo control_url("plugins/flot/plugins/jquery.flot.pie.min.js");?>"></script>
    <script src="<?php echo control_url("plugins/flot/plugins/jquery.flot.resize.min.js");?>"></script>

    <!-- Circular Stat -->
    <script src="<?php echo control_url("custom-plugins/circular-stat/circular-stat.min.js");?>"></script>

    <!-- SparkLine -->
    <script src="<?php echo control_url("plugins/sparkline/jquery.sparkline.min.js");?>"></script>
    
    <!-- iButton -->
    <script src="<?php echo control_url("plugins/ibutton/jquery.ibutton.min.js");?>"></script>

   
    <!-- DataTables -->
    <script src="<?php echo control_url("plugins/datatables/jquery.dataTables.min.js");?>"></script>
    <script src="<?php echo control_url("plugins/datatables/TableTools/js/TableTools.min.js");?>"></script>
    <script src="<?php echo control_url("plugins/datatables/dataTables.bootstrap.js");?>"></script>
    
    <!-- Demo Scripts -->
    <script src="<?php echo control_url("assets/js/demo/dashboard.js");?>"></script>
	<script src="<?php echo control_url("assets/js/demo/dataTables.js");?>"></script>
	<script src="<?php echo control_url("assets/js/demo/jquery.sheepit.js");?>"></script>
    <script src="<?php echo base_url("assets/fancybox/jquery.fancybox.js");?>"></script>
	<script src="<?php echo base_url("assets/js/bootstrap-combobox.js");?>"></script>
    <script>
    $(document).ready(function(){
    	$.validator.messages.required = "* กรุณากรอกข้อมูล";
		$.validator.messages.number = "* กรอกเฉพาะตัวเลข";
	   $("form").validate(); 
	   $("#datepicker").datepicker();
	    $('.combobox').combobox();
	  
	   
    });
	</script>

</body>

</html>
