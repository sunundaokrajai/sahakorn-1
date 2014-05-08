<?php $this->load->view("_header");?>
	<?php
	if($show=="all"){
		$show = "แสดงทั้งหมด";
	}elseif($show=="long"){
		$show = "เงินกู้ระยะยาว";
	}elseif($show=="short"){
		$show = "เงินกู้ระยะสั้น";
	}else{
		$show = "เงินกู้เพื่อการศึกษา";
	}
	?>
	<div id="main-header" class="page-header">
		<ul class="breadcrumb">
			<li>
				<i class="icon-home"></i><?php getHeader();?>
				<span class="divider">&raquo;</span>
			</li>
			<li>
				<a href="<?php echo site_url("loan/set/all");?>">ข้อมูลสัญญาเงินกู้</a>
				<span class="divider">&raquo;</span>
			</li>
			<li>
				<a href="#"><?php echo $show;?></a>
			</li>
		</ul>
		
		<h1 id="main-heading">
			ข้อมูลสัญญาเงินกู้<span>ข้อมูลเงินกู้สมาชิก ของสัญญาเงินกู้ประเภท </span>
		</h1>
	</div>
	
	<div id="main-content">
	
	
		<div class="row-fluid">
			<div class="span12 widget">

				<div class="widget-header">
					<span class="title">
						<i class="icol-table"></i>ข้อมูล <?php echo $show;?>           </span>
				</div>
				<div class="widget-content table-container">
					<table id="demo-dtable-01" class="table table-striped">
						<thead>
							<tr>
								<th width='50'>ลำดับ</th>
								<th>เลขที่สัญญา</th>
								<th>ประเภทสัญญา</th>
								<th>ผู้กู้</th>
								<th>จำนวนเงินกู้</th>
								<th>ระยะเวลาชำระ</th>
								<th>วันทำสัญญา</th>
								<th>สถานะสัญญา</th>								
								<th width=''>ประวัติการชำระ</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if(count($rs)==0){
								echo"<tr><td colspan='10'>ไม่มีข้อมูล</td></tr>";
							}else{
								$no=1;
								foreach($rs as $r):?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $r->loan_no;?></td>
									<td><?php echo $r->type_loan_name;?></td>
									<td><?php echo $r->register_name." ".$r->register_surname;?></td>
									<td><?php echo $r->loan_money;?></td>
									<td><?php echo $r->loan_years;?></td>
									<td><?php echo thaidate($r->loan_date);?></td>
									<td>
									<?php
									if($r->loan_status=="0"){
										echo"ยังไม่สิ้นสุด";
									}else{
										echo"สิ้นสุด";
									}
									?>
									</td>
									<td class="action-col">
										<span class="btn-group">
											<a href="<?php echo site_url("loan/history/".$r->loan_id);?>" class="btn btn-small"><i class="icon-pencil"></i></a>
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
	<!-- Modal -->
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">สัญญาเงินกู้</h3>
	  </div>
	  <div class="modal-body">
	    <p>One fine body…</p>
	  </div>
	  <div class='modal-footer'>
        <button class='btn btn-danger' data-dismiss='modal' onclick="clearhtml()" aria-hidden='true'>Cancel</button>
        <button class='btn btn-info' id="save" onclick="save()">Save</button>
       </div>
	</div>​
<?php $this->load->View("_footer");?>
<script>
var url="add";
function clearhtml(){
	if(url=="add"){
		$("input[type=text").val("");
		$(".box2").remove();
	}
}
function add(){
	url="add";
}
function edit(){
	url="edit";
}
function save(){
	$.validator.messages.required = "* กรุณากรอกข้อมูล";
	$.validator.messages.number = "* กรอกเฉพาะตัวเลข";
	var valid = $("form").valid();
	if(valid){
		$.post("<?php echo site_url("member/saveloan/".$member->register_no);?>/"+url,$("form").serialize(),function(res){
			window.location.reload();
		});
	}
}
</script>
