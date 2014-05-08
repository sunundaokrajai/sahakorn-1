<?php $this->load->view("_header");?>


<div id="main-header" class="page-header">
	<ul class="breadcrumb">
		<li>
	    	<i class="icon-home"></i><?php getHeader();?>
	        <span class="divider">&raquo;</span>
	    </li>
	    <li>
	    	<a href="<?php echo site_url("config/sub_department");?>">จัดการกลุ่ม/กลุ่มงาน</a><span class="divider">&raquo;</span>

	    </li>
	    <li>
	    	<a href="#">แก้ไขข้อมูลกลุ่ม/กลุ่มงาน</a>
	    </li>
	</ul>
	
	<h1 id="main-heading">
		ข้อมูลจัดการกลุ่ม / กลุ่มงาน <span>จัดการข้อมูลกลุ่ม / กลุ่มงาน</span>
	</h1>
</div>




<div id="main-content">

	<div class="row-fluid">
		<div class="span12">
			
			<?php echo savecomplete();?>
		
		    <div class="widget">
			    <div class="widget-header">
			    	<span class="title">แก้ไขข้อมูลกลุ่ม / กลุ่มงาน</span>
			    </div>
			     
			    <div class="widget-content form-container">
				    <?php echo form_open("",array("class"=>"form-horizontal"));?>
					    <div class="control-group">
					    	<label class="control-label">กลุ่ม / กลุ่มงาน</label>
						    <div class="controls">
						    	<input type="text" name="sub_department_name" value="<?php echo $r->sub_department_name;?>" class="span6 required">
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


<?php $this->load->view("_footer");?>