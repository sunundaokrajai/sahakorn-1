<?php $this->load->view("_header");?>
<div id="main-header" class="page-header">
	<ul class="breadcrumb">
		<li>
	    	<i class="icon-home"></i><?php getHeader();?>
	        <span class="divider">&raquo;</span>
	    </li>
		<li>
	    	<a href="">ข้อมูลใบเสร็จ</a>
	    </li>
	</ul>
	
	<h1 id="main-heading">
		บัญชี <span>ข้อมูลใบเสร็จรับเงิน</span>
		<span class='pull-right' style='border-left:0px;'><a href="<?=site_url("money/receipt/import");?>" class='btn'><i class='icol-doc-excel-table'></i>&nbsp;นำเข้าข้อมูล</a></span>
	</h1>
</div>

	<div id="main-content">
	
	
		<div class="row-fluid">
			<div class="span12 widget">

				<div class="widget-header">
					<span class="title">
						<i class="icol-table"></i>ข้อมูล ใบเสร็จรับเงิน</span>
				</div>
				<div class="widget-content table-container">
					<div class="dataTables_wrapper form-inline">
						<table id="" class="table table-striped">
							<thead>
								<tr>
									<th width='50'>ลำดับ</th>
									
									<th>เลขทะเบียนสมาชิก</th>
									<th>ชื่อ - นามสกุล</th>
									<th>สังกัด</th>
									<th>รวมเงิน</th>
									<th>เลขที่ใบเสร็จ</th>
									<th width='150'>Tools</th>
								</tr>
							</thead>
							<tbody>
								<?php if(count($rs)==0):?>
									<tr><td colspan='7'>- - - ไม่มีข้อมูล - - -</td></tr>
								<?php else:
									$no=$this->uri->segment(4)==""?0:$this->uri->segment(4);
									$no++;
									foreach($rs as $r):?>
									<tr>
										<td><?php echo $no;?></td>
										
										<td><?php echo $r->register_no;?></td>
										<td><?php echo $r->full_name;?></td>
										<td><?php echo $r->office;?></td>
										<td><div align='right'><?php echo number_format($r->money_total, 2, '.', ',');?></div></td>
										<td><?php echo $r->rec_no;?></td>
										<td class="action-col">
											
												<a target="_blank" href="<?php echo site_url("money/receipt/print/".$r->rec_id);?>" class="btn btn-small btn-info"><i class="icol-printer"></i></a>
												<a href="#" class="btn btn-small btn-success"><i class="icol-page-white-find"></i> ข้อมูลใบเสร็จ</a>
											
										</td>

									</tr>
									<?php
									$no++;
									endforeach;
								endif;?>
							</tbody>
						</table>
						<?php echo $this->pagination->create_links();?>	
					</div>
				 </div>
			</div>
		</div>
		
		
	</div>
<?php $this->load->View("_footer");?>
