<?php
function control_url($url=""){
	return base_url("static/control/".$url);
}
function getHeader(){
	echo "ระบบเงินทุนสวัสดิการข้าราชการและลูกจ้างกรุงเทพมหานคร";
}
function userLogo(){
	echo base_url("assets/images/user.png");
}
function getName(){
	$ci=& get_instance();
	$id = $ci->session->userdata("user_id");
	$rs = $ci->db->where("id",$id)->get("users");
	return $rs->row()->name;
}
function savecomplete(){
	$ci=& get_instance();
	if($ci->session->flashdata("save")!=NULL){
		?>
		<div class="alert alert-success fade in">
            <a data-dismiss="alert" class="close" href="#">×</a>
            <strong>บันทึกข้อมูลเรียบร้อย</strong><br>
            ระบบ ได้ทำการบันทึกข้อมูลของท่าน เรียบร้อยแล้ว 
        </div>
		<?php
	}
}
function thaidate($date){
	if($date=="" || $date=="0")
	{
		$date=date("Y-m-d");
	}

	$_month_name = array("01"=>"มกราคม",  "02"=>"กุมภาพันธ์",  "03"=>"มีนาคม","04"=>"เมษายน",  "05"=>"พฤษภาคม",  "06"=>"มิถุนายน", "07"=>"กรกฎาคม",  "08"=>"สิงหาคม",  "09"=>"กันยายน","10"=>"ตุลาคม", "11"=>"พฤศจิกายน",  "12"=>"ธันวาคม","00"=>"");
		$yy=substr($date,0,4);
		$mm=substr($date,5,2);
		$dd=substr($date,8,2);
		$yy += 543;
		if($yy==543)
		{
			$dateT = "-";
		}else{
			$dateT=$dd." ".$_month_name[$mm]."  ".$yy;
		}
		return $dateT;
}

function check_money_store($register_no,$month,$year){
	$ci=& get_instance();	
	$rs = $ci->db->where("month_id",$month)->where("set_active","1")->get("months");
	if($rs->num_rows()==0){
		return false;
	}else{
		// get money 
		$member = $ci->db->select("date_register,earning,(YEAR( NOW( ) ) - YEAR( date_register )) AS y",false)->where("register_no",$register_no)->get("members_info");
		
		$percent = 0;
		
		switch($member->row()->y){
			case $member->row()->y < 5 :
				$percent = 0.02;
				break;
			case $member->row()->y >= 5 && $member->row()->y < 10 :
				$percent = 0.03;
				break;
			case $member->row()->y >= 10 :
				$percent = 0.04;
				break;
			default:
				$percent = 0.02;
				break;			
		}
		
		//$pay = $member->row()->earning * $percent;
		
		$pay = $member->row()->earning / 30;
		
		$rs2 = $ci->db->where("register_no",$register_no)->where("month_id",$month)->where("year_id",$year)->get("pay");
		if($rs2->num_rows()==0){
			$ar = array(
				"type_loan_id"=>"0",
				"money"=>$pay,
				"pay_money"=>$pay
			);
		}else{
			$ar = $rs2->row_array();
		}
		return $ar;
	}	
}

function check_money_loan($register_no,$month,$year,$type){
	//  กู้สั้น  90 สตาง / เดือน , ยาว 80 / เืดนอ  , ศึกษา 42 / เดือน
	switch($type){
		case"1":
			$percent = 0.90;
			break;
		case"2":
			$percent = 0.80;
			break;
		case"3":
			$percent = 0.42;
			break;
		default:
			$percent = 0.90;
			break;
	}
	$ci=& get_instance();	
	$rs = $ci->db->where("loan_status",0)->where("register_no",$register_no)->where("type_loan_id",$type)->get("loan");
	if($rs->num_rows()==0){
		return false;
	}else{
		$pay_month = $rs->row()->pay_per_month;
		$rs_pay = $ci->db->where("loan_id",$rs->row()->loan_id)->count_all_results("pay");
		$rs2 = $ci->db->where("loan_id",$rs->row()->loan_id)->where("pay_status",2)->get("pay");
		$increase = $percent;
		if($rs2->num_rows()==0){
			$increase = $increase * ($rs->row()->loan_money / 100);
			$ar = array(
				"no"=>$rs_pay+1,
				"pay_per_month"=>$pay_month,
				"increase"=>$increase,
				"pay"=>$pay_month + $increase
			);
		}else{
			
			$increase *= $rs2->num_rows(); // * 
			$increase = $increase * $rs->row()->loan_money / 100;
			$no = $rs_pay - $rs2->num_rows();
			$ar=array(
				"no"=>$no++,
				"pay_per_month"=>$pay_month,
				"increase"=>$increase,
				"pay"=>$pay_month + $increase
			);
			
		}
		return $ar;
	}

}

?>