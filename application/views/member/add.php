<?php $this->load->view("_header");?>
	<div id="main-header" class="page-header">
		<ul class="breadcrumb">
			<li>
				<i class="icon-home"></i><?php getHeader();?>
				<span class="divider">&raquo;</span>
			</li>
			<li>
				<a href="<?php echo site_url("member");?>">ข้อมูลสมาชิก</a><span class="divider">&raquo;</span>
			</li>
			<li>
				<a href="#">เพิ่มข้อมูลสมาชิก</a>
			</li>
		</ul>
		
		<h1 id="main-heading">
			เพิ่มข้อมูลสมาชิก <span>รายนามสมาชิก กองทุนสวัสดิการข้าราชการและลูกจ้างกรุงเทพมหานคร</span>
		</h1>
	</div>
	
	<div id="main-content">
	
	<?php echo savecomplete();?>
	
	
	<div id="dashboard-demo" class="tabbable analytics-tab paper-stack">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#" data-target="#profile" data-toggle="tab"><i class="icos-admin-user-2"></i> ข้อมูลส่วนตัว</a></li>
			<li class=""><a href="#" data-target="#relation" data-toggle="tab"><i class="icos-archive"></i> ผู้รับผลประโยชน์</a></li>
		</ul>
		<?php echo form_open("",array("class"=>"form-horizontal"));?>
		
		
		
		<div class="tab-content">
			<div id="profile" class="tab-pane active">
				
				<div class="analytics-tab-content">
					<div id="demo-chart-01" style="padding: 0px; position: relative;">
						<div class="control-group">
					    	<label class="control-label">ทะเบียนเลขที่ : </label>
						    <div class="controls">
						    	<input type="text" name="register_no" value="" maxlength="10" class="span4 number required">
						    </div>
					    </div>
						<div class="control-group">
					    	<label class="control-label">ชื่อ: </label>
						    <div class="controls">
						    	<input type="text" name="register_name" value="" class="span4 required">
						    </div>
					    </div>
						<div class="control-group">
					    	<label class="control-label">นามสกุล: </label>
						    <div class="controls">
						    	<input type="text" name="register_surname" value="" class="span4 required">
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">อัตราเงินเดือน : </label>
						    <div class="controls">
						    	<input type="text" name="earning" value="" class="span2 number required"> บาท
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">วันที่สมัครสมาชิก: </label>
							
						    <div class="controls">
						    	<select name="date_regis">
								<?php
								for($i=1;$i<=31;$i++){
									$date=  sprintf("%02d",$i);
									$sl="";
									
									echo"<option value=\"".$date."\"".$sl.">".$date."</option>";
								}
								?>
								</select>
								
								<select name="month_regis">
								<option value="01">มกราคม</option>
								<option value="02">กุมภาพันธ์</option>
								<option value="03">มีนาคม</option>
								<option value="04">เมษายน</option>
								<option value="05">พฤษภาคม</option>
								<option value="06">มิถุนายน</option>
								<option value="07">กรกฏาคม</option>
								<option value="08">สิงหาคม</option>
								<option value="09">กันยายน</option>
								<option value="10">ตุลาคม</option>
								<option value="11">พฤศจิกายน</option>
								<option value="12">ธันวาคม</option>
								</select>
								
								<select name="years_regis">
								<?php
								for($i=1900;$i<=2020;$i++){
									$year = $i;
									$show=$year+543;
									$sl="";
									
									echo"<option value=\"".$year."\"".$sl.">".$show."</option>";
								}
								?>
								</select>
								
								
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">ปีเกษียณอายุราชการ: </label>
						    <div class="controls">
						    	<input type="text" name="retirement_year" value="" minlength="4" maxlength="4" class="span2 number minlength maxlength required">
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">หมายเลขบัตรประชาชน : </label>
						    <div class="controls">
						    	<input type="text" name="identification_number" value="" minlength="13" maxlength="13" class="span2 number minlength maxlength required">
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">วันเดือนปีเกิด : </label>
						    <div class="controls">
						    	<select name="date">
								<?php
								for($i=1;$i<=31;$i++){
									$date=  sprintf("%02d",$i);
									echo"<option value=\"".$date."\">".$date."</option>";
								}
								?>
								</select>
								
								<select name="month">
								<option value="01">มกราคม</option>
								<option value="02">กุมภาพันธ์</option>
								<option value="03">มีนาคม</option>
								<option value="04">เมษายน</option>
								<option value="05">พฤษภาคม</option>
								<option value="06">มิถุนายน</option>
								<option value="07">กรกฏาคม</option>
								<option value="08">สิงหาคม</option>
								<option value="09">กันยายน</option>
								<option value="10">ตุลาคม</option>
								<option value="11">พฤศจิกายน</option>
								<option value="12">ธันวาคม</option>
								</select>
								
								<select name="years">
								<?php
								for($i=1900;$i<=2020;$i++){
									$year = $i;
									$show=$year+543;
									echo"<option value=\"".$year."\">".$show."</option>";
								}
								?>
								</select>
								
								
						    </div>
					    </div>
						
						
						
						<div class="control-group">
					    	<label class="control-label">ประเภทสมาชิก: </label>
						    <div class="controls">
						    	<?php echo form_dropdown("type_jobs",$type_jobs,'','class="span4 required"');?>
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">ตำแหน่ง : </label>
						    <div class="controls">
						    	<?php echo form_dropdown("jobs",$jobs,'','class="span4 required combobox"');?>
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">หน่วยงาน : </label>
						    <div class="controls">
						    	<?php echo form_dropdown("departments",$departments,'','class="span4 required combobox"');?>
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">สำนัก/สำนักงานเขต : </label>
						    <div class="controls">
						    	<?php echo form_dropdown("office",$office,'','class="span4 required combobox"');?>
						    </div>
					    </div>
					    
					    <div class="control-group">
					    	<label class="control-label">กลุ่ม / กลุ่มงาน : </label>
						    <div class="controls">
						    	<?php echo form_dropdown("sub_department_id",$sub_department,'','class="span4 required combobox"');?>
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">โทรศัพท์ ( ที่บ้าน ): </label>
						    <div class="controls">
						    	<input type="text" name="tel_home" value="" maxlength="10" minlength="9" class="span2 minlength maxlength number">
						    </div>
					    </div>
						
						
						<div class="control-group">
					    	<label class="control-label">โทรศัพท์ ( ที่ทำงาน ): </label>
						    <div class="controls">
						    	<input type="text" name="tel_work" value="" maxlength="10" minlength="9" class="span2 minlength maxlength number">
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">โทรสาร ( ที่ทำงาน ): </label>
						    <div class="controls">
						    	<input type="text" name="fax_work" value="" maxlength="10" minlength="9" class="span2 minlength maxlength number">
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">ที่อยู่ ( ปัจจุบัน ): </label>
						    <div class="controls">
						    	<!--<textarea class='required span6' name='address'></textarea>-->
								<input type="text" name="address" value="" class=''/>
						    </div>
					    </div>
						
						
						<div class="control-group">
					    	<label class="control-label">หมู่ที่ : </label>
						    <div class="controls">
						    	<input type="text" name="village_number" value="" class=''/>
						    </div>
					    </div>
						<div class="control-group">
					    	<label class="control-label">ตรอก/ซอย: </label>
						    <div class="controls">
						    	<input type="text" name="alley" value="" class=''/>
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">ถนน: </label>
						    <div class="controls">
						    	<input type="text" name="road" value="" class=''/>
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">ตำบล/แขวง: </label>
						    <div class="controls">
						    	<input type="text" name="distric" value="" class=''/>
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">อำเภอ/เขต: </label>
						    <div class="controls">
						    	<input type="text" name="county" value="" class=''/>
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">จังหวัด: </label>
						    <div class="controls">
						    	<?php echo form_dropdown("province_id",$province,'','class="span4 required"');?>
						    </div>
					    </div>
		
						
						
						
					</div>
				</div>
				<div class='divider'></div>
				<div class="analytics-tab-content">
					<div class="row-fluid">
						<div class="span12">
							
							<input type="submit" name="commit" class='btn btn-info' value="Save">
						</div>
					</div>
				</div>

			</div>
			<div id="relation" class="tab-pane">
				
				<div class="analytics-tab-content">
				
				
				
				<div class="widget">
					<div class="widget-header">
						<span class="title">ข้อมูลผู้รับผลประโยชน์</span>
					</div>
					<div class="widget-content form-container">
	
							<fieldset id="input_cloning" class="sheepit-form" style="display: block;">
								<legend>
									ผู้รับผลประโยชน์
									<span id="input_cloning_controls" class="pull-right">
										<span class="btn btn-mini" id="input_cloning_add" style="display: inline-block;"><i class="icon-plus"></i></span>
									</span>
								</legend>
								
								<div class="template" id="template" style="display:none;">
									<div class="control-group">
										<label for="" class="control-label">ชื่อ : </label>
										<div class="controls">
											<input type="text" name="re_name[]" value="">
										</div>
										
										<br>
										
										<label for="" class="control-label">นามสกุล : </label>
										<div class="controls">
											<input type="text" name="re_surname[]" value="">
										</div>
										
										<br>
										
										<label for="" class="control-label">ความเกี่ยวข้อง : </label>
										<div class="controls">
											<?php echo form_dropdown("relation_id[]",$relation);?>
										</div>
										
									</div>
									<span class="btn btn-danger close" id="input_cloning_remove_current" style="display: inline;">×</span>
								</div>
								
							</fieldset>
	
					</div>
				</div>	
			</div>
			</div>	
		</div>
		<?php echo form_close();?>
		
	</div>
		
</div>
<?php $this->load->view("_footer");?>
<script>
$(document).ready(function(){
	$("#input_cloning_add").live("click",function(){
		var html = $("#template");
		$(html).clone().appendTo(".sheepit-form").show();
	});
	$(".close").live("click",function(){
		$(this).parent().remove();
	});
	$("select[name=year]").change(function(){
		var val = $(this).val();
		var total = 0;
		total = parseInt(val) + 60;
		total = parseInt(total) + 543
		$("input[name=retirement_year]").val(total);
	});
});
</script>