<?php $this->load->view("_header");?>
	<div id="main-header" class="page-header">
		<ul class="breadcrumb">
			<li>
				<i class="icon-home"></i><?php getHeader();?>
				<span class="divider">&raquo;</span>
			</li>
			<li>
				<a href="#">ข้อมูลสมาชิก</a>
			</li>
		</ul>
		
		<h1 id="main-heading">
			ข้อมูลสมาชิก <span>รายนามสมาชิก กองทุนสวัสดิการข้าราชการและลูกจ้างกรุงเทพมหานคร</span>
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
							<a class="btn" href="<?php echo site_url("member/add");?>"><i class='icol-add'></i>
								เพิ่มข้อมูล                    </a>
						</div>
					</div>
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
											<?php echo form_dropdown("department",$departments,'','class="combobox"');?>&nbsp;
											<?php echo form_dropdown("office",$office,'','class="combobox"');?>&nbsp; 
											ชื่อ
											<input type="text" name="full_name" value="">&nbsp;<input type="submit" name="submitsearch" class='btn btn-info' value="ค้นหา"/>
										<?php echo form_close();?>
									</div>
								</div>
							</div>
						</div>
						<table id="" class="table table-striped dataTable"><!-- demo-dtable-01-->
							<thead>
								<tr>
									<th width='50'>ลำดับ</th>
									<th>เลขทะเบียนสมาชิก</th>
									<th>ชื่อ - นามสกุล</th>
									<th>ตำแหน่ง</th>
									<th>หน่วยงาน</th>
									<th>สังกัด</th>
									<th>กลุ่ม/กลุ่มงาน</th>
									<th width='70'>ประวัติการกู้</th>
									
									<th width='60'></th>
								</tr>
							</thead>
							<tbody>
								<?php
								if(count($rs)==0){
									echo"<tr><td colspan='9'>ไม่มีข้อมูล</td></tr>";
								}else{
									$no=$this->uri->segment(3)==""?0:$this->uri->segment(3);
									$no++;
									foreach($rs as $r):?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo sprintf("%05d",$r->register_no);?></td>
										<td><?php echo $r->register_name." ".$r->register_surname;?></td>
										<td><?php echo $r->jobs_name;?></td>
										<td><?php echo $r->departments_name;?></td>
										<td><?php echo $r->office_name;?></td>
										<td><?php echo $r->sub_department_name;?></td>
										<td class='action-col'>
											<a class='btn btn-small' href="<?php echo site_url("member/loan/".$r->register_no);?>"><i class="icos-abacus"></i></a>
										</td>
										<td class="action-col">
											<span class="btn-group">
												<a href="<?php echo site_url("member/edit/".$r->register_no);?>" class="btn btn-small"><i class="icon-pencil"></i></a>
												<a href="<?php echo site_url("member/del/".$r->register_no);?>" class="btn btn-small" onclick="javascript:return confirm('ต้องการลบหรือไม่');"><i class="icon-trash"></i></a>
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
						<?php echo $this->pagination->create_links();?>	
					</div>
				 </div>
			</div>
		</div>
		
		
	</div>
<?php $this->load->View("_footer");?>
