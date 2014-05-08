<?php $this->load->view("_header");?>


<div id="main-header" class="page-header">
	<ul class="breadcrumb">
		<li>
	    	<i class="icon-home"></i><?php getHeader();?>
	        <span class="divider">&raquo;</span>
	    </li>
	    <li>
	    	<a href="<?php echo site_url("config/jobs");?>">จัดการตำแหน่งงาน</a><span class="divider">&raquo;</span>

	    </li>
	    <li>
	    	<a href="#">แก้ไขข้อมูลตำแหน่งงาน </a>
	    </li>
	</ul>
	
	<h1 id="main-heading">
		จัดการตำแหน่งงาน  <span>ส่วนของการจัดการตำแหน่งงานของสมาชิก</span>
	</h1>
</div>



<div id="main-content">

	<div class="row-fluid">
		<div class="span12">
			
			<?php echo savecomplete();?>
		
		    <div class="widget">
			    <div class="widget-header">
			    	<span class="title">แก้ไขข้อมูลตำแหน่งงาน</span>
			    </div>
			     
			    <div class="widget-content form-container">
				    <?php echo form_open("",array("class"=>"form-horizontal"));?>
					    <div class="control-group">
					    	<label class="control-label">ตำแหน่งงาน</label>
						    <div class="controls">
						    	<input type="text" name="jobs_name" value="<?php echo $r->jobs_name;?>" class="span6 required">
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