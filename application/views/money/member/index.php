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
		บัญชี <span>เรียกเก็บเงินแยกบุคคล</span>
	</h1>
</div>

	<div id="main-content">
	
	
		<div class="row-fluid">
			<div class="span12 widget">

				<div class="widget-header">
					<span class="title">
						<i class="icol-table"></i>บัญชี เรียกเก็บเงินแยกบุคคล</span>
				</div>
				<div class="widget-content table-container">
					<div class="dataTables_wrapper form-inline">
						<table id="" class="table table-striped">
							<thead>
								<tr>
									<th width='50'>ลำดับ</th>
									<th>เลขทะเบียนสมาชิก</th>
									<th>ชื่อ - นามสกุล</th>
									<th>ตำแหน่ง</th>
									<th>หน่วยงาน</th>
									<th>สังกัด</th>
									<th width='70'>สัญญากู้</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if(count($rs)==0){
									echo"<tr><td colspan='5'>ไม่มีข้อมูล</td></tr>";
								}else{
									$no=$this->uri->segment(3)==""?0:$this->uri->segment(3);
									$no++;
									foreach($rs as $r):?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $r->register_no;?></td>
										<td><?php echo $r->register_name." ".$r->register_surname;?></td>
										<td><?php echo $r->jobs_name;?></td>
										<td><?php echo $r->departments_name;?></td>
										<td><?php echo $r->office_name;?></td>
										<td class='action-col'>
											<a class='btn btn-small' href="<?php echo site_url("member/loan/".$r->register_no);?>"><i class="icos-abacus"></i></a>
										</td>
									</tr>
									<?php
									$no++;
									endforeach;
								}
								?>
							</tbody>
						</table>
						<?php echo $this->pagination->create_links();?>	
					</div>
					
				 </div>
			</div>
		</div>
		
		
	</div>
<?php $this->load->View("_footer");?>
