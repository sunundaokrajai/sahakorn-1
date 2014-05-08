<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Control extends CI_CONTROLLER{
	private $user_id;
	public function __construct(){
		parent::__construct();
		$this->user_id=$this->session->userdata("user_id");
	}
	public function index(){
		$this->load->view("control/dashboard");
	}
	public function login(){
		if($this->input->post("username")!=NULL){
			$chkadmin = $this->db->where("username",$this->input->post("username"))
						->where("password",md5($this->input->post("pw")))
						->where("permit","1")
						->get("users");
			if($chkadmin->num_rows()==0){
				redirect("control/login");
			}else{
				$this->session->set_userdata("permit",$chkadmin->row()->permit);
				$this->session->set_userdata("user_id",$chkadmin->row()->id);
				redirect("control");
			}
		}
		$this->load->view("control/login");
	}
	public function edit_profile(){
		if($this->input->post("commit")!=NULL){
			$ar=array(
				"name"=>$this->input->post("name"),
				"password"=>md5($this->input->post("password")),
				"password_fix"=>$this->input->post("password")
			);
			$this->db->where("id",$this->user_id)->update("users",$ar);
			$this->savecomplete();
			redirect("control/edit_profile");
		}
		$data['r']=$this->db->where("id",$this->user_id)->get("users")->row();
		$this->load->view("editprofile",$data);
	}
	public function logout(){
		$this->session->set_userdata("permit","");
		$this->session->set_userdata("user_id","");
		redirect("control");
	}
	private function savecomplete(){
		$this->session->set_flashdata("save",TRUE);
	}
}