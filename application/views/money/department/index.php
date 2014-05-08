<?php $this->load->view("_header");?>
<div id="main-header" class="page-header">
	<ul class="breadcrumb">
		<li>
	    	<i class="icon-home"></i><?php getHeader();?>
	        <span class="divider">&raquo;</span>
	    </li>
	    <li>
	    	<a href="#">บัญชี</a>
	    </li>
	</ul>
	
	<h1 id="main-heading">
		บัญชี <span>เรียกเก็บเงินแยกหน่วยงาน</span>
	</h1>
</div>

<div id="main-content">

<div class="row-fluid">
	<div class="span12 widget">

        <div class="widget-header">
            <span class="title">
                <i class="icol-table"></i>บัญชี เรียกเก็บเงินแยกหน่วยงาน   
        </div>
        <div class="widget-content table-container">
			<div class="dataTables_wrapper form-inline">
				<div class="dt_header">
					<div class="row-fluid">
						<div class='span2'>
						</div>
						<div class="span10">
							<div class="dataTables_filter" id="demo-dtable-01_filter">
								<?php echo form_open("",array("class"=>"pull-right form-inline"));?>
									ค้นหา 
									<input type="text" name="departments_name" value="">&nbsp;<input type="submit" name="submitsearch" class='btn btn-info' value="ค้นหา"/>
								<?php echo form_close();?>
							</div>
						</div>
					</div>
				</div>
				<table class="table table-striped dataTable">
					<thead>
						<tr>
							<th width='100'>ลำดับ</th>
							<th>ชื่อหน่วยงาน</th>
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
								<td><?php echo $r->departments_name;?></td>
								<td class="action-col">
									<span class="btn-group">
										<a href="<?php echo site_url("money/department/goto/".$r->departments_id);?>" class="btn btn-small"><i class="icos-abacus"></i></a>
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
</div>
<?php $this->load->view("_footer");?>