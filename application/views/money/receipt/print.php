<?php $this->load->view("_headerprint");?>
<div id="print" style="width:860px;margin:0 auto;">
	<table border='0' class='' style="width:100%;">
		<tr>
			<td width="100"><h1><?php echo img(array("src"=>"assets/images/logoslipt.jpg","height"=>"100px"));?></h1></td>
			<td>
				<div align='center'>
					<h4>สวัสดิการข้าราชการและลูกจ้าง</h4>
					<h4>กรุงเทพมหานคร</h4>
					<br><h3>ใบเสร็จรับเงิน</h3>
				</div>
			</td>
			<td width="200">
				<p>ฝ่ายสวัสดิการ</p>
				<p>กองการเจ้าหน้าที่</p>
				<p>กรุงเทพมหานคร</p>
				<p>โทร. 0 2224 3001</p>
				<p>โทร. 0 2221 2141-69 ต่อ 1326</p>
			</td>
		</tr>
		<tr>
			<td colspan='3'></td>
		</tr>
		<tr>
			<td>เลขที่ &nbsp;&nbsp;<strong><?=$rs->rec_id;?></td>
			<td>วันที่ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><?=$rs->ondate=="0000-00-00"?thaidate(date("Y-m-d")):thaidate($rs->ondate);?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			สมาชิกเลขที่ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <strong><?=$rs->register_no;?></strong></td>
		</tr>
		<tr>
			<td colspan='3'>ได้รับเงินจาก &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?=$rs->full_name;?></strong> </td>
		</tr>
		<tr>
			<td colspan='3'>สังกัด &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?=$rs->office;?></strong></td>
		</tr>
	</table>
	<br>
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>รายการ</th>
				<th>งวดที่</th>
				<th>เงินต้น</th>
				<th>ดอกเบี้ย</th>
				<th>จำนวนเงิน</th>
				<th>เงินต้นคงเหลือ</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>กู้ระยะสั้น</td>
				<td><div align='right'><?=$rs->period_short;?></div></td>
				<td><div align='right'><?=$rs->capital_short;?></div></td>
				<td><div align='right'><?=$rs->increase_short;?></div></td>
				<td><div align='right'><?=$rs->capital_short + $rs->increase_short;?></div></td>
				<td><div aling='right'></div></td>
			</tr>
			<tr>
				<td>กู้ระยะยาว</td>
				<td><div align='right'><?=$rs->period_long;?></div></td>
				<td><div align='right'><?=$rs->capital_long;?></div></td>
				<td><div align='right'><?=$rs->increase_long;?></div></td>
				<td><div align='right'><?=$rs->capital_long + $rs->increase_long;?></div></td>
				<td><div aling='right'></div></td>
			</tr>
			<tr>
				<td>กู้เพื่อการศึกษา</td>
				<td><div align='right'><?=$rs->period_edu;?></div></td>
				<td><div align='right'><?=$rs->capital_edu;?></div></td>
				<td><div align='right'><?=$rs->increase_edu;?></div></td>
				<td><div align='right'><?=$rs->capital_edu + $rs->increase_edu;?></div></td>
				<td><div aling='right'></div></td>
			</tr>
			<tr>
				<td>ค่าบำรุงสมัครใหม่</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><div align='right'><?=$rs->member_register;?></div></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>ค่าบำรุงประจำปีครั้งที่</td>
				<td><div align='right'><?=$rs->money_maintain_no;?></div></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><div align='right'><?=$rs->money_maintain_month;?></div></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan='3'>&nbsp;</td>
				<td>รวม</td>
				<td><div align='right'><?=$rs->capital_short + $rs->increase_short + $rs->capital_long + $rs->increase_long + $rs->capital_edu + $rs->increase_edu + $rs->member_register + $rs->money_maintain_month;?></div></td>
				<td>&nbsp;</td>
			</tr>
		</tbody>
	</table>
	<table class='table table-bordered'>
		<tbody>
			<tr>
				<td height="50px;"><div align='center'><?=$rs->money_string;?></div></td>
			</tr>
		</tbody>
	</table>
	<br>
	<table style="width:100%">
		<tr>
			<td width="33%" align='center'><p>......................................................</p><p>กรรมการและเลขานุการ</p></td>
			<td width="33%" align='center'><p>......................................................</p><p>กรรมการและเหรัญญิก</p></td>
			<td width="33%" align='center'><p>......................................................</p><p>ผู้รับเงิน</p></td>
		</tr>
	</table>
</div>
</body>
<script>
	window.print();
</script>
</html>