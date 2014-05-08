<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Config extends CI_CONTROLLER{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		
	}
	public function office($method="",$id=""){
		switch($method){
			case"add":
				if($this->input->post("commit")!=NULL){
					$this->db->insert("members_info_office",array("office_name"=>$this->input->post("office_name")));
					$this->savecomplete();
					redirect("config/office/add");
				}
				$this->load->view("config/office/add");
				break;
			case"edit":
				if($this->input->post("commit")!=NULL){
					$this->db->where("office_id",$id)->update("members_info_office",array("office_name"=>$this->input->post("office_name")));
					$this->savecomplete();
					redirect("config/office/edit/".$id);
				}
				$data['r']=$this->db->where("office_id",$id)->get("members_info_office")->row();
				$this->load->view("config/office/edit",$data);
				break;
			case"del":
				$this->db->where('office_id',$id)->delete("members_info_office");
				redirect("config/office");
				break;
			default:
				$data['rs']=$this->db->get("members_info_office")->result();
				$this->load->view("config/office/index",$data);
				break;
		}
	}
	public function department($method="",$id=""){
		switch($method){
			case"add":
				
				if($this->input->post("commit")!=NULL){
					$this->db->insert("members_info_departments",array("departments_name"=>$this->input->post("departments_name")));
					$this->savecomplete();
					redirect("config/department/add");
				}
				
				$this->load->view("config/department/add");
				break;
			case"edit":
				if($this->input->post("commit")!=NULL){
					$this->db->where("departments_id",$id)->update("members_info_departments",array("departments_name"=>$this->input->post("departments_name")));
					$this->savecomplete();
					redirect("config/department/edit/".$id);
				}
				$data['r']=$this->db->where("departments_id",$id)->get("members_info_departments")->row();
				$this->load->view("config/department/edit",$data);
				break;
				
			case"del":
				$this->db->where('departments_id',$id)->delete("members_info_departments");
				redirect("config/department");
				break;
			default:
				$data['rs']=$this->db->get("members_info_departments")->result();
				$this->load->view("config/department/index",$data);
				break;
		}
	}
	
	public function sub_department($method="",$id=""){
		switch($method){
			case"add":
				
				if($this->input->post("commit")!=NULL){
					$this->db->insert("members_sub_departments",array("sub_department_name"=>$this->input->post("sub_department_name")));
					$this->savecomplete();
					redirect("config/sub_department/add");
				}
				
				$this->load->view("config/sub_department/add");
				break;
			case"edit":
				if($this->input->post("commit")!=NULL){
					$this->db->where("sub_department_id",$id)->update("members_sub_departments",array("sub_department_name"=>$this->input->post("sub_department_name")));
					$this->savecomplete();
					redirect("config/sub_department/edit/".$id);
				}
				$data['r']=$this->db->where("sub_department_id",$id)->get("members_sub_departments")->row();
				$this->load->view("config/sub_department/edit",$data);
				break;
				
			case"del":
				$this->db->where('sub_department_id',$id)->delete("members_sub_departments");
				redirect("config/sub_department");
				break;
			default:
				$data['rs']=$this->db->get("members_sub_departments")->result();
				$this->load->view("config/sub_department/index",$data);
				break;
		}
	}

	
	public function jobs($method="",$id=""){
		switch($method){
			case"add":
				if($this->input->post("commit")!=NULL){
					$this->db->insert("members_info_jobs",array("jobs_name"=>$this->input->post("jobs_name")));
					$this->savecomplete();
					redirect("config/jobs/add");
				}
				$this->load->view("config/jobs/add");
				
				break;
			case"edit":
				if($this->input->post("commit")!=NULL){
					$this->db->where("jobs_id",$id)->update("members_info_jobs",array("jobs_name"=>$this->input->post("jobs_name")));
					$this->savecomplete();
					redirect("config/jobs/edit/".$id);
				}
				$data['r']=$this->db->where("jobs_id",$id)->get("members_info_jobs")->row();
				$this->load->view("config/jobs/edit",$data);
				
				break;
			case"del":
				$this->db->where("jobs_id",$id)->delete("members_info_jobs");
				$this->savecomplete();
				redirect("config/jobs");
				
				break;
			default:
				$data['rs']=$this->db->get("members_info_jobs")->result();
				$this->load->view("config/jobs/index",$data);
				break;
		}
	}
	public function users($method="",$id=""){
		switch($method){
			case"add":
				if($this->input->post("commit")!=NULL){
					$ar=array(
						"name"=>$this->input->post("name"),
						"username"=>$this->input->post("username"),
						"password"=>md5($this->input->post("passwordfix")),
						"password_fix"=>$this->input->post("passwordfix")
					);
					$this->db->insert("users",$ar);
					$this->savecomplete();
					redirect("config/users/add");
				}
				$this->load->view("config/users/add");
				break;
			case"edit":
				if($this->input->post("commit")!=NULL){
					$ar=array(
						"name"=>$this->input->post("name"),
						"username"=>$this->input->post("username"),
						"password"=>md5($this->input->post("passwordfix")),
						"password_fix"=>$this->input->post("passwordfix")
					);
					$this->db->where("id",$id)->update("users",$ar);
					$this->savecomplete();
					redirect("config/users/edit/".$id);
				}
				$data['r']=$this->db->where("id",$id)->get("users")->row();
				$this->load->view("config/users/edit",$data);
				break;
			case"del":
				$this->db->where("id",$id)->delete("users");
				redirect("config/users");
				break;
			default:
				$data['rs']=$this->db->get("users")->result();
				$this->load->view("config/users/index",$data);
				break;
		}
	}
	
	public function relation($method="",$id=""){
		switch($method){
			case"add":
				if($this->input->post("commit")!=NULL){
					$ar=array("relationship_name"=>$this->input->post("relationship_name"));
					$this->db->insert("relationship",$ar);
					$this->savecomplete();
					redirect("config/relation/add");
					
				}
				$this->load->view("config/relation/add");
				break;
			case"edit":
				if($this->input->post("commit")!=NULL){
					$ar=array("relationship_name"=>$this->input->post("relationship_name"));
					$this->db->where("relationship_id",$id)->update("relationship",$ar);
					$this->savecomplete();
					redirect("config/relation/edit/".$id);
					
				}
				$data['r']=$this->db->where("relationship_id",$id)->get("relationship")->row();
				$this->load->view("config/relation/edit",$data);
				break;
			case"del":
				$this->db->where("relationship_id",$id)->delete("relationship");
				redirect("config/relation");
				break;
			default:
				$data['rs']=$this->db->get("relationship")->result();
				$this->load->view("config/relation/index",$data);
				break;
		}
	}
	
	public function month_expire(){
		if($this->input->post("commit")!=NULL){
			$this->db->update("months",array("set_active"=>"0"));
			if($this->input->post("month_id")!=NULL){
				foreach($this->input->post("month_id") as $inx=>$val){
					$this->db->where("month_id",$inx)->update("months",array(
						"set_active"=>"1"
					));
				}
			}
			$this->savecomplete();
			redirect("config/month_expire");
		}
		$rs = $this->db->get("months");
		$data['rs'] = $rs->result();
		$this->load->view('config/month_expire/index',$data);
	}
	
	private function savecomplete(){
		$this->session->set_flashdata("save",TRUE);
	}
}