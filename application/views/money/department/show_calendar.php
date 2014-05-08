<?php $this->load->view("_header");?>
<div id="main-header" class="page-header">
	<ul class="breadcrumb">
		<li>
	    	<i class="icon-home"></i><?php getHeader();?>
	        <span class="divider">&raquo;</span>
	    </li>
	    <li>
	    	<a href="<?php echo site_url("money/department");?>">บัญชี</a>
			&nbsp;<span class="divider">&raquo;</span>
	    </li>
		<li>
			<a href="#">จัดเก็บหน่วยงาน <?php echo $dep_name;?></a>
		</li>
	</ul>
	
	<h1 id="main-heading">
		บัญชี <span>เรียกเก็บเงินแยกหน่วยงาน ของหน่วยงาน <?php echo $dep_name;?></span>
	</h1>
</div>

<div id="main-content">

<div class="row-fluid">
	<div class="row-fluid">
		<div class="span12">
				
		    <div class="widget">
			    <div class="widget-header">
			    	<span class="title">เลือกเดือน ปีที่ต้องการ</span>
			    </div>
			     
			    <div class="widget-content form-container">
				    <?php echo form_open("",array("class"=>"form-horizontal"));?>
					    <div class="control-group">
					    	<label class="control-label">เดือน</label>
						    <div class="controls">
						    	<?php echo form_dropdown("month",$months,date("m"),'class="span4 required"');?>
						    </div>
					    </div>
						<div class="control-group">
					    	<label class="control-label">ปี</label>
						    <div class="controls">
						    	<?php echo form_dropdown("year",$years,date("Y"),'class="span4 required"');?>
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