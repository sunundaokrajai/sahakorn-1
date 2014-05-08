<?php $this->load->view("_header");?>
<div id="main-header" class="page-header">
	<ul class="breadcrumb">
		<li>
	    	<i class="icon-home"></i><?php getHeader();?>
	        <span class="divider">&raquo;</span>
	    </li>
	    <li>
	    	<a href="#">จัดการเดือนเรียกเก็บเงินสมทบ</a>
	    </li>
	</ul>
	
	<h1 id="main-heading">
		จัดการเดือนเรียกเก็บเงินสมทบ
	</h1>
</div>

<div id="main-content">
<?php echo form_open("");?>
<div class="row-fluid">
	<div class="span12 widget">
		
		<?php echo savecomplete();?>
		
        <div class="widget-header">
            <span class="title">
                <i class="icol-table"></i>จัดการเดือนเรียกเก็บเงินสมทบ        
			</span>
			
			<div class="toolbar">
				<div class="btn-group">
					<button type="submit" class='btn'><i class='icol-drawer'></i> บันทึก </button>
					<input type="hidden" name="commit" value="save"/>
				</div>
			</div>
				
        </div>
        <div class="widget-content table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width='20'>ลำดับ</th>
                        <th>เลือก</th>
						<th>เดือน</th>
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
	                		<td width="20"><?php echo $no;?></td>
							<td width='40'><input type="checkbox" name="month_id[<?=$r->month_id;?>]" value="1" <?=$r->set_active=="1"?"checked":"";?>/></td>
	                		<td><?php echo $r->month_name;?></td>
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
<?php echo form_close();?>
</div>
<?php $this->load->view("_footer");?>