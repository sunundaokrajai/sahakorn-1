<?php $this->load->view("_header");?>
<div id="main-header" class="page-header">
	<ul class="breadcrumb">
		<li>
	    	<i class="icon-home"></i><?php getHeader();?>
	        <span class="divider">&raquo;</span>
	    </li>
	    <li>
	    	<a href="#">จัดการผู้ใช้งานระบบ</a>
	    </li>
	</ul>
	
	<h1 id="main-heading">
		จัดการผู้ใช้งานระบบ<span>ส่วนของการจัดการผู้ใช้งานระบบ</span>
	</h1>
</div>

<div id="main-content">

<div class="row-fluid">
	<div class="span12 widget">

        <div class="widget-header">
            <span class="title">
                <i class="icol-table"></i>ข้อมูลผู้ใช้งานระบบ            </span>
            <div class="toolbar">
                <div class="btn-group">
                    <a class="btn" href="<?php echo site_url("config/users/add");?>"><i class='icol-add'></i>
                        เพิ่มข้อมูล                    </a>
                </div>
            </div>
        </div>
        <div class="widget-content table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width='100'>ลำดับ</th>
                        <th>ชื่อผู้ใช้งาน</th>
						<th>Username</th>
						<th>Password</th>
                        <th width='100'></th>
                    </tr>
                </thead>
                <tbody>
                	<?php
                	if(count($rs)==0){
	                	echo"<tr><td colspan='5'>ไม่มีข้อมูล</td></tr>";
                	}else{
                		$no=1;
	                	foreach($rs as $r):?>
	                	<tr>
	                		<td><?php echo $no;?></td>
	                		<td><?php echo $r->name;?></td>
							<td><?php echo $r->username;?></td>
							<td><?php echo $r->password_fix;?></td>
	                		<td class="action-col">
	                            <span class="btn-group">
	                                <a href="<?php echo site_url("config/users/edit/".$r->id);?>" class="btn btn-small"><i class="icon-pencil"></i></a>
	                                <a href="<?php echo site_url("config/users/del/".$r->id);?>" class="btn btn-small" onclick="javascript:return confirm('ต้องการลบหรือไม่');"><i class="icon-trash"></i></a>
	                            </span>
	                        </td>

	                	</tr>
	                	<?php
	                	$no++;
	                	endforeach;
                	}
                	?>
                </tbody>
            </table>
         </div>
	</div>
</div>

</div>
<?php $this->load->view("_footer");?>