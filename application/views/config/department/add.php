<?php $this->load->view("_header");?>


<div id="main-header" class="page-header">
	<ul class="breadcrumb">
		<li>
	    	<i class="icon-home"></i><?php getHeader();?>
	        <span class="divider">&raquo;</span>
	    </li>
	    <li>
	    	<a href="<?php echo site_url("config/department");?>">จัดการหน่วยงาน</a><span class="divider">&raquo;</span>

	    </li>
	    <li>
	    	<a href="#">เพิ่มข้อมูลหน่วยงาน</a>
	    </li>
	</ul>
	
	<h1 id="main-heading">
		ข้อมูลหน่วยงาน <span>จัดการข้อมูลหน่วยงาน</span>
	</h1>
</div>



<div id="main-content">

	<div class="row-fluid">
		<div class="span12">
			
			<?php echo savecomplete();?>
		
		    <div class="widget">
			    <div class="widget-header">
			    	<span class="title">เพิ่มข้อมูลหน่วยงาน</span>
			    </div>
			     
			    <div class="widget-content form-container">
				    <?php echo form_open("",array("class"=>"form-horizontal"));?>
					    <div class="control-group">
					    	<label class="control-label">หน่วยงาน</label>
						    <div class="controls">
						    	<input type="text" name="departments_name" value="" class="span6 required">
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