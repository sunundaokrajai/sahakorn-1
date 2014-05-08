<?php $this->load->view("_header");?>


<div id="main-header" class="page-header">
		<ul class="breadcrumb">
			<li>
				<i class="icon-home"></i><?php getHeader();?>
				<span class="divider">&raquo;</span>
			</li>
			<li>
				<a href="<?php echo site_url("member");?>">ข้อมูลสมาชิก</a>
				<span class="divider">&raquo;</span>
			</li>
			<li>
				<a href="<?php echo site_url("member/loan/".$member->register_no);?>">ข้อมูลเงินกู้สมาชิก</a>
				<span class="divider">&raquo;</span>

			</li>
			<li>
				<a href="">ทำสัญญาเงินกู้</a>
			</li>
		</ul>
		
		<h1 id="main-heading">
			ข้อมูลเงินกู้สมาชิก<span>ข้อมูลเงินกู้สมาชิก <?php echo $member->register_name;?>&nbsp;<?php echo $member->register_surname;?></span>
		</h1>
	</div>


<div id="main-content">

	<div class="row-fluid">
		<div class="span12">
			
			<?php echo savecomplete();?>
			<div class="widget">
			    <div class="widget-header">
			    	<span class="title">ทำรายการสัญญาเงินกู้</span>
			    </div>
			     
			    <div class="widget-content form-container">
				    <?php echo form_open("",array("id"=>"frm","class"=>"form-horizontal"));?>
					    <div class="control-group">
					    	<label class="control-label">เลขที่สัญญา</label>
						    <div class="controls">
						    	<input type="text" name="loan_no" id="loan_no" value="" class="required">
						    </div>
					    </div>
					     <div class="control-group">
					    	<label class="control-label">ประเภทสัญญา</label>
						    <div class="controls">
						    	<?php echo form_dropdown("type_loan",$type_loan,"","class='required'");?>
						    </div>
					    </div>
					     <div class="control-group">
					    	<label class="control-label">จำนวนเงินกู้</label>
						    <div class="controls">
						    	<input type="text" name="loan_money" value="" class="required number">
						    </div>
					    </div>
					     <div class="control-group">
					    	<label class="control-label">ระยะเวลา</label>
						    <div class="controls">
						    	<input type="text" name="loan_years" value="" class="required number">&nbsp;งวด
						    </div>
					    </div>
					    <div class="control-group">
					    	<label class="control-label">วันที่ทำสัญญา</label>
						    <div class="controls">
						    	<select name="date" class='span2 required'>
						    	<option value="">  วัน </option>
						    	<?php
						    	for($i=1;$i<=31;$i++){
							    	echo"<option value='".sprintf("%02d",$i)."'>".$i."</option>";
						    	}
						    	?>
						    	</select>&nbsp;
						    	
						    	<?php echo form_dropdown("month",$month,"","class='required span2'");?>&nbsp;
						    	<?php echo form_dropdown("year",$year,"","class='required span2'");?>&nbsp;


						    </div>
					    </div>
					    
					    <div class='control-group'>
					    	<label class='control-label'>ผู้ค้ำประกัน</label>
					    	<div class='controls'>
					    		<span class="btn btn-mini" id="input_cloning_add" onclick="clone()" style="display: inline-block;"><i class="icon-plus"></i></span><br>
					    	</div>
					    	<div class='controls loan'>
					    		<div class='box'>
					    			<div>
										<input type="text" name="member[]" value="" class='required member'>&nbsp;<a href='javascript:void(0);' class='del' onclick='del(this)'>x</a>
					    			</div>
					    		</div>
					    	</div>
					    </div>
					     <div class="control-group">
					    	<label class="control-label">รายละเอียดเพิ่มเติม</label>
						    <div class="controls">
						    	<textarea name="loan_other" rows="5"></textarea>
						    </div>
					    </div>
					    <div class="form-actions">
					    	<input type="submit" name="commit" value="Submit" class="btn btn-primary">
					    </div>
				    <?php echo form_close();?>
			    </div>
			</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view("_footer");?>
<script>
function clone(){
	$(".box").children().clone().appendTo(".loan").addClass("box2");
}
function del(obj){
	var del = $("a.del").size();
	if(del>1){
		$(obj).parent().remove();
	}
}
</script>