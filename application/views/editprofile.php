<?php $this->load->view("_header");?>
<div id="main-header" class="page-header">
	<ul class="breadcrumb">
		<li>
	    	<i class="icon-home"></i><?php getHeader();?>
	        <span class="divider">&raquo;</span>
	    </li>
	    <li>
	    	<a href="#">แก้ไขข้อมูลส่วนตัว</a>
	    </li>
	</ul>
	
	<h1 id="main-heading">
		แก้ไขข้อมูลส่วนตัว <span>จัดการข้อมูลส่วนตัวของผู้มีหน้าที่จัดการระบบ</span>
	</h1>
</div>

<div id="main-content">

	<div class="row-fluid">
		<div class="span12">
			
			<?php echo savecomplete();?>
		
		    <div class="widget">
			    <div class="widget-header">
			    	<span class="title">แก้ไขข้อมูลส่วนตัว</span>
			    </div>
			     
			    <div class="widget-content form-container">
				    <?php echo form_open("",array("class"=>"form-horizontal"));?>
					    <div class="control-group">
					    	<label class="control-label">Username : </label>
						    <div class="controls">
						    	<input type="text" disabled name="username" value="<?php echo $r->username;?>" class="span6 required">
						    </div>
					    </div>
					    <div class="control-group">
					    	<label class="control-label">Password : </label>
						    <div class="controls">
						    	<input type="text" name="password" value="<?php echo $r->password_fix;?>" class="span6 required">
						    </div>
					    </div>
					     <div class="control-group">
					    	<label class="control-label">ชื่อผู้ใช้งาน  : </label>
						    <div class="controls">
						    	<input type="text" name="name" value="<?php echo $r->name;?>" class="span6 required">
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