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
				<a href="#">แก้ไขข้อมูลสมาชิก</a>
			</li>
		</ul>
		
		<h1 id="main-heading">
			แก้ไขข้อมูลสมาชิก <span>รายนามสมาชิก กองทุนสวัสดิการข้าราชการและลูกจ้างกรุงเทพมหานคร</span>
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
						    	<input type="text" name="register_no" value="<?php echo $r->register_no;?>" maxlength="10" class="span4">
						    </div>
					    </div>
						<div class="control-group">
					    	<label class="control-label">ชื่อ: </label>
						    <div class="controls">
						    	<input type="text" name="register_name" value="<?php echo $r->register_name;?>" class="span4 required">
						    </div>
					    </div>
						<div class="control-group">
					    	<label class="control-label">นามสกุล: </label>
						    <div class="controls">
						    	<input type="text" name="register_surname" value="<?php echo $r->register_surname;?>" class="span4 required">
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">อัตราเงินเดือน : </label>
						    <div class="controls">
						    	<input type="text" name="earning" value="<?php echo $r->earning;?>" class="span2 number required"> บาท
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">วันที่สมัครสมาชิก: </label>
							<!--
						    <div class="controls">
						    	<input id="datepicker" type="text" name="date_register" value="<?php echo $r->date_register;?>" class="span4 required">
						    </div>
							-->
							<?php
							$date_register = explode("-",$r->date_register);
							?>
						    <div class="controls">
						    	<select name="date_regis">
								<?php
								for($i=1;$i<=31;$i++){
									$date=  sprintf("%02d",$i);
									$sl="";
									if($date==$date_register[2]){
										$sl=" selected";
									}
									echo"<option value=\"".$date."\"".$sl.">".$date."</option>";
								}
								?>
								</select>
								
								<select name="month_regis">
								<option value="01"<?php echo $date_register[1]=="01"?" selected":"";?>>มกราคม</option>
								<option value="02"<?php echo $date_register[1]=="02"?" selected":"";?>>กุมภาพันธ์</option>
								<option value="03"<?php echo $date_register[1]=="03"?" selected":"";?>>มีนาคม</option>
								<option value="04"<?php echo $date_register[1]=="04"?" selected":"";?>>เมษายน</option>
								<option value="05"<?php echo $date_register[1]=="05"?" selected":"";?>>พฤษภาคม</option>
								<option value="06"<?php echo $date_register[1]=="06"?" selected":"";?>>มิถุนายน</option>
								<option value="07"<?php echo $date_register[1]=="07"?" selected":"";?>>กรกฏาคม</option>
								<option value="08"<?php echo $date_register[1]=="08"?" selected":"";?>>สิงหาคม</option>
								<option value="09"<?php echo $date_register[1]=="09"?" selected":"";?>>กันยายน</option>
								<option value="10"<?php echo $date_register[1]=="10"?" selected":"";?>>ตุลาคม</option>
								<option value="11"<?php echo $date_register[1]=="11"?" selected":"";?>>พฤศจิกายน</option>
								<option value="12"<?php echo $date_register[1]=="12"?" selected":"";?>>ธันวาคม</option>
								</select>
								
								<select name="years_regis">
								<?php
								for($i=1900;$i<=2020;$i++){
									$year = $i;
									$show=$year+543;
									$sl="";
									if($year==$date_register[0]){
										$sl=" selected";
									}
									echo"<option value=\"".$year."\"".$sl.">".$show."</option>";
								}
								?>
								</select>
								
								
						    </div>
					    </div>
						
						
						<div class="control-group">
					    	<label class="control-label">ปีเกษียณอายุราชการ: </label>
						    <div class="controls">
						    	<input type="text" name="retirement_year" value="<?php echo $r->retirement_year;?>" minlength="4" maxlength="4" class="span2 number minlength maxlength required">
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">หมายเลขบัตรประชาชน : </label>
						    <div class="controls">
						    	<input type="text" name="identification_number" value="<?php echo $r->identification_number;?>" minlength="13" maxlength="13" class="span2 number minlength maxlength required">
						    </div>
					    </div>
						
						<?php
						$ondate = explode("-",$r->birthday);
						?>
						<div class="control-group">
					    	<label class="control-label">วันเดือนปีเกิด : </label>
						    <div class="controls">
						    	<select name="date">
								<?php
								for($i=1;$i<=31;$i++){
									$date=  sprintf("%02d",$i);
									$sl="";
									if($date==$ondate[2]){
										$sl=" selected";
									}
									echo"<option value=\"".$date."\"".$sl.">".$date."</option>";
								}
								?>
								</select>
								
								<select name="month">
								<option value="01"<?php echo $ondate[1]=="01"?" selected":"";?>>มกราคม</option>
								<option value="02"<?php echo $ondate[1]=="02"?" selected":"";?>>กุมภาพันธ์</option>
								<option value="03"<?php echo $ondate[1]=="03"?" selected":"";?>>มีนาคม</option>
								<option value="04"<?php echo $ondate[1]=="04"?" selected":"";?>>เมษายน</option>
								<option value="05"<?php echo $ondate[1]=="05"?" selected":"";?>>พฤษภาคม</option>
								<option value="06"<?php echo $ondate[1]=="06"?" selected":"";?>>มิถุนายน</option>
								<option value="07"<?php echo $ondate[1]=="07"?" selected":"";?>>กรกฏาคม</option>
								<option value="08"<?php echo $ondate[1]=="08"?" selected":"";?>>สิงหาคม</option>
								<option value="09"<?php echo $ondate[1]=="09"?" selected":"";?>>กันยายน</option>
								<option value="10"<?php echo $ondate[1]=="10"?" selected":"";?>>ตุลาคม</option>
								<option value="11"<?php echo $ondate[1]=="11"?" selected":"";?>>พฤศจิกายน</option>
								<option value="12"<?php echo $ondate[1]=="12"?" selected":"";?>>ธันวาคม</option>
								</select>
								
								<select name="years">
								<?php
								for($i=1900;$i<=2020;$i++){
									$year = $i;
									$show=$year+543;
									$sl="";
									if($year==$ondate[0]){
										$sl=" selected";
									}
									echo"<option value=\"".$year."\"".$sl.">".$show."</option>";
								}
								?>
								</select>
								
								
						    </div>
					    </div>
						
						
						
						<div class="control-group">
					    	<label class="control-label">ประเภทสมาชิก: </label>
						    <div class="controls">
						    	<?php echo form_dropdown("type_jobs",$type_jobs,$r->type_jobs,'class="span4 required"');?>
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">ตำแหน่ง : </label>
						    <div class="controls">
						    	<?php echo form_dropdown("jobs",$jobs,$r->jobs,'class="span4 required combobox"');?>
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">หน่วยงาน : </label>
						    <div class="controls">
						    	<?php echo form_dropdown("departments",$departments,$r->departments,'class="span4 required combobox"');?>
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">สำนัก/สำนักงานเขต : </label>
						    <div class="controls">
						    	<?php echo form_dropdown("office",$office,$r->office,'class="span4 required combobox"');?>
						    </div>
					    </div>
					    
					    <div class="control-group">
					    	<label class="control-label">กลุ่ม / กลุ่มงาน : </label>
						    <div class="controls">
						    	<?php echo form_dropdown("sub_department_id",$sub_department,$r->sub_department_id,'class="span4 required combobox"');?>
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">โทรศัพท์ ( ที่บ้าน ): </label>
						    <div class="controls">
						    	<input type="text" name="tel_home" value="<?php echo $r->tel_home;?>" maxlength="10" minlength="9" class="span2 minlength maxlength number">
						    </div>
					    </div>
						
						
						<div class="control-group">
					    	<label class="control-label">โทรศัพท์ ( ที่ทำงาน ): </label>
						    <div class="controls">
						    	<input type="text" name="tel_work" value="<?php echo $r->tel_work;?>" maxlength="10" minlength="9" class="span2 minlength maxlength number">
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">โทรสาร ( ที่ทำงาน ): </label>
						    <div class="controls">
						    	<input type="text" name="fax_work" value="<?php echo $r->fax_work;?>" maxlength="10" minlength="9" class="span2 minlength maxlength number">
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">ที่อยู่ ( ปัจจุบัน ): </label>
						    <div class="controls">
						    	<!--<textarea class='required span6' name='address'><?php //echo $r->address;?></textarea>-->
								<input type="text" name="address" value="<?php echo $r->address;?>" class=''/>
						    </div>
					    </div>
						
						
						<div class="control-group">
					    	<label class="control-label">หมู่ที่ : </label>
						    <div class="controls">
						    	<input type="text" name="village_number" value="<?php echo $r->village_number;?>" class=''/>
						    </div>
					    </div>
						<div class="control-group">
					    	<label class="control-label">ตรอก/ซอย: </label>
						    <div class="controls">
						    	<input type="text" name="alley" value="<?php echo $r->alley;?>" class=''/>
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">ถนน: </label>
						    <div class="controls">
						    	<input type="text" name="road" value="<?php echo $r->road;?>" class=''/>
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">ตำบล/แขวง: </label>
						    <div class="controls">
						    	<input type="text" name="distric" value="<?php echo $r->distric;?>" class=''/>
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">อำเภอ/เขต: </label>
						    <div class="controls">
						    	<input type="text" name="county" value="<?php echo $r->county;?>" class=''/>
						    </div>
					    </div>
						
						<div class="control-group">
					    	<label class="control-label">จังหวัด: </label>
						    <div class="controls">
						    	<?php echo form_dropdown("province_id",$province,$r->province_id,'class="span4 required"');?>
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
									<span class="close" id="input_cloning_remove_current" style="display: inline;">×</span>
								</div>
								
								<?php if(count($r_relation)>0):?>
									<?php foreach($r_relation as $rl):?>
									
									<div class="template" id="template" style="">
										<div class="control-group">
											<label for="" class="control-label">ชื่อ : </label>
											<div class="controls">
												<input type="text" name="re_name[]" value="<?php echo $rl->re_name;?>">
											</div>
											
											<br>
											
											<label for="" class="control-label">นามสกุล : </label>
											<div class="controls">
												<input type="text" name="re_surname[]" value="<?php echo $rl->re_surname;?>">
											</div>
											
											<br>
											
											<label for="" class="control-label">ความเกี่ยวข้อง : </label>
											<div class="controls">
												<?php echo form_dropdown("relation_id[]",$relation,$rl->relationship_id);?>
											</div>
											
										</div>
										<span class="btn btn-danger close" id="input_cloning_remove_current" style="display: inline;">×</span>
									</div>
									
									<?php endforeach;?>
								<?php endif;?>
								
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
	
	$("select[name=years]").change(function(){
		var val = $(this).val();
		var total = 0;
		total = parseInt(val) + 60;
		total = parseInt(total) + 543
		$("input[name=retirement_year]").val(total);
	});
	
});
</script>