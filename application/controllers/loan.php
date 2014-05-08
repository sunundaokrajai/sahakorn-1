<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class loan extends CI_CONTROLLER{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
	}
	public function set($type){
		if($type=="all"){
			$rs = $this->db->join("members_info","loan.register_no = members_info.register_no")->join("type_loan","loan.type_loan_id=type_loan.type_loan_id")->get('loan')->result();
		}else{
			if($type=="long"){
				$type_id = 1;
			}elseif($type=="short"){
				$type_id = 2;
			}else{
				$type_id = 3;
			}
			$rs = $this->db->join("members_info","loan.register_no = members_info.register_no")->join("type_loan","loan.type_loan_id=type_loan.type_loan_id")->where("loan.type_loan_id",$type_id)->get('loan')->result();
		}
		$data['rs'] = $rs;
		$data['show'] = $type;
		$this->load->view("loan/set/show",$data);
	}
	private function savecomplete(){
		$this->session->set_flashdata("save",TRUE);
	}
}