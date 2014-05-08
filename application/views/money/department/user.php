<?php $this->load->view("_header");?>
<style>
.bl{
	border-left:1px solid #ccc !important;
}
.br{
	border-right:1px solid #ccc !important;
}
</style>
<div id="main-header" class="page-header">
	<ul class="breadcrumb">
		<li>
	    	<i class="icon-home"></i><?php getHeader();?>
	        <span class="divider">&raquo;</span>
	    </li>
	    <li>
	    	<a href="<?php echo site_url("money/department");?>">บัญชี</a>
			&nbsp;<span class="divider">&raquo;</span>
	    </li>
		<li>
			<a href="<?php echo site_url("money/department/goto/".$this->uri->segment(4));?>">จัดเก็บหน่วยงาน <?php echo $dep_name;?></a>
			&nbsp;<span class="divider">&raquo;</span>
		</li>
		<?php
		$year = $this->uri->segment(6);
		$year_th = $year + 543;
		?>
		<li>
			<a href="<?php echo site_url("money/department/goto/".$this->uri->segment(4));?>">ประจำเดือน <?=$month->month_name;?> ปี <?=$year_th;?></a>
		</li>
	</ul>
	
	<h1 id="main-heading">
		บัญชี <span>เรียกเก็บเงินแยกหน่วยงาน ของหน่วยงาน <?php echo $dep_name;?></span>
	</h1>
</div>

	
	<div id="main-content">
	
		<?php echo form_open();?>
		<div class="row-fluid">
			<div class="span12 widget">

				<div class="widget-header">
					<span class="title">
						<i class="icol-table"></i>ข้อมูลสมาชิกหน่วยงาน <?php echo $dep_name;?> เรียกเก็บเงิน ประจำเดือน <?=$month->month_name;?> ปี <?=$year_th;?></span>
					<div class="toolbar">
						<div class="btn-group">
							<button type="submit" name="confirmsave" class="btn"><i class='icol-add'></i> บันทึก  </button>
							<input type="hidden" name="hsave" value="save"/>
						</div>
					</div>
				</div>
				<div class="widget-content table-container">
					<div class="dataTables_wrapper form-inline">
						
						<table id="" class="table table-striped dataTable"><!-- demo-dtable-01-->
							<thead>
								<tr>
									<th rowspan='2' align='center' style="vertical-align: middle;" >เลขทะเบียน</th>
									<th rowspan='2' align='center' style="vertical-align: middle;" >ชื่อ - นามสกุล</th>
									<th colspan='2'  class='bl'  style="text-align: center;">เงินสมทบ</th>
									<th  colspan='4' style="text-align: center;">เงินกู้ระยะสั้น</th>
									<th  colspan='4' style="text-align: center;">เงินกู้ระยะยาว</th>
									<th  colspan='4' style="text-align: center;">เงินกู้การศึกษา</th>
									<th rowspan='2' width='80' style="width:80px;vertical-align: middle;text-align: center;" class='br bl' >ใบเสร็จ</th>
								</tr>
								
								<tr>
									<th width="80">เรียกเก็บ</th>
									<th  width="80">จ่ายจริง</th>
									
									<th class='bl' width="30">งวด</th>
									<th  width="50">ค่างวด</th>
									<th width="50">ดอกเบี้ย</th>
									<th class='br'   width="50">จ่ายจริง</th>
									
									<th class='bl'  width="30">งวด</th>
									<th  width="50">เรียกเก็บ</th>
									<th width="50">ดอกเบี้ย</th>
									<th  class='br'  width="50">จ่ายจริง</th>
									
									<th class='bl'  width="30">งวด</th>
									<th  width="50">เรียกเก็บ</th>
									<th width="50">ดอกเบี้ย</th>
									<th class='br'   width="50">จ่ายจริง</th>
								</tr>
								
							</thead>
							<tbody>
								<?php
								if(count($rs)==0){
									echo"<tr><td colspan='9'>ไม่มีข้อมูล</td></tr>";
								}else{
									
									$no=1;
									foreach($rs as $r):?>
									<tr>
										<td><?php echo sprintf("%05d",$r->register_no);?></td>
										<td><?php echo $r->register_name." ".$r->register_surname;?></td>										

										<?php
										// ตรวจสอบ จ่ายเงินสมทบ
										$chk = check_money_store($r->register_no,$month->month_id,$year);
										if($chk){
											?>
											<td class='bl'>
												<?=$chk['money'];?>
											</td>
											<td class='br'>
												<input type="text" name="pay[<?=$r->register_no;?>][0]" class='span12' value="<?php echo $chk['money'];?>"/>
											</td>
											<?php
										}else{
											?>
											<td class='bl'>-</td>
											<td class='br'>-</td>
											<?php
										}
										
										// ตรวจสอบ เงินกู้ ระยะสั้น
										$chk = check_money_loan($r->register_no,$month->month_id,$year,1);
										if($chk){
											?>
											<td class='bl'><?=$chk['no'];?></td>
											<td>
												<?=$chk['pay_per_month'];?>
											</td>
											<td>
												<?=$chk['increase'];?>
											</td>
											<td class='br'>
												<input type="text" name="pay[<?=$r->register_no;?>][1]" class='span12' value="<?php echo $chk['pay'];?>"/>
											</td>
											<?php
										}else{
											?>
											<td class='bl'>&nbsp;</td>
											<td>-</td>
											<td>-</td>
											<td class='br'>-</td>
											<?php
										}
										
										// ตรวจสอบ เงินกู้ ระยะยาว
										$chk = check_money_loan($r->register_no,$month->month_id,$year,2);
										if($chk){
											?>
											<td class='bl'><?=$chk['no'];?></td>
											<td>
												<?=$chk['pay_per_month'];?>
											</td>
											<td>
												<?=$chk['increase'];?>
											</td>
											<td class='br'>
												<input type="text" name="pay[<?=$r->register_no;?>][1]" class='span12' value="<?php echo $chk['pay'];?>"/>
											</td>
											<?php
										}else{
											?>
											<td class='bl'>&nbsp;</td>
											<td>-</td>
											<td>-</td>
											<td class='br'>-</td>
											<?php
										}
										
										// ตรวจสอบ เงินกู้ ศึกษา
										$chk = check_money_loan($r->register_no,$month->month_id,$year,3);
										if($chk){
											?>
											<td class='bl'><?=$chk['no'];?></td>
											<td>
												<?=$chk['pay_per_month'];?>
											</td>
											<td>
												<?=$chk['increase'];?>
											</td>
											<td class='br'>
												<input type="text" name="pay[<?=$r->register_no;?>][1]" class='span12' value="<?php echo $chk['pay'];?>"/>
											</td>
											<?php
										}else{
											?>
											<td class='bl'>&nbsp;</td>
											<td>-</td>
											<td>-</td>
											<td class='br'>-</td>
											<?php
										}
										?>
										
										
										<td width='80'><input type="text" class='span12' name="pay[<?=$r->register_no;?>]['bill']" value=""/></td>										
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
		<?php echo form_close();?>
		
	</div>
<?php $this->load->View("_footer");?>
