<?php $this->load->view("_header");?>
<div id="main-header" class="page-header">
	<ul class="breadcrumb">
		<li>
	    	<i class="icon-home"></i><?php getHeader();?>
	        <span class="divider">&raquo;</span>
	    </li>
	    <li>
	    	<a href="#">ตั้งค่าข้อมูลความสัมพันธ์</a>
	    </li>
	</ul>
	
	<h1 id="main-heading">
		ตั้งค่าข้อมูลความสัมพันธ์ <span>ส่วนของการจัดการตั้งค่าข้อมูลความสัมพันธ์</span>
	</h1>
</div>

<div id="main-content">

<div class="row-fluid">
	<div class="span12 widget">

        <div class="widget-header">
            <span class="title">
                <i class="icol-table"></i>ตั้งค่าข้อมูลความสัมพันธ์
            </span>
            <div class="toolbar">
                <div class="btn-group">
                    <a class="btn" href="<?php echo site_url("config/relation/add");?>"><i class='icol-add'></i>
                        เพิ่มข้อมูล                    </a>
                </div>
            </div>
        </div>
        <div class="widget-content table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width='100'>ลำดับ</th>
                        <th>ชื่อความสัมพันธ์</th>
                        <th width='100'></th>
                    </tr>
                </thead>
                <tbody>
                	<?php
                	if(count($rs)==0){
	                	echo"<tr><td colspan='3'>ไม่มีข้อมูล</td></tr>";
                	}else{
                		$no=1;
	                	foreach($rs as $r):?>
	                	<tr>
	                		<td><?php echo $no;?></td>
	                		<td><?php echo $r->relationship_name;?></td>
	                		<td class="action-col">
	                            <span class="btn-group">
	                                <a href="<?php echo site_url("config/relation/edit/".$r->relationship_id);?>" class="btn btn-small"><i class="icon-pencil"></i></a>
	                                <a href="<?php echo site_url("config/relation/del/".$r->relationship_id);?>" onclick="javascript:return confirm('ต้องการลบหรือไม่');" class="btn btn-small"><i class="icon-trash"></i></a>
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