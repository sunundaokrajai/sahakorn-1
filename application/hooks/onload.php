<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Onload{
	public $CI;
	private $adm;
	function __construct()
	{
		$this->CI =& get_instance();		

		//$this->CI->load->model("admin_model");
		//$this->adm=$this->CI->admin_model;
	}
	public function check_login(){
		$cont = $this->CI->router->class;
		$med = $this->CI->router->method;
		if($med=="logout"){
			
		}else{
			if($cont=="control"){
				if($med=="login"){
					if($this->CI->session->userdata("user_id")!=NULL && $this->session->userdata("permit")=="1"){
						redirect("control");
					}
				}else{
					if($this->CI->session->userdata("user_id")==NULL){
						redirect("control/login");
					}
				}
				
			}
			if($cont=="config" && $cont=="money" && $cont=="member" && $cont=="loan"){
				if($this->CI->session->userdata("user_id")==NULL){
					redirect("control/login");
				}
				
			}
			
		}
	}
	/*
	function check_login()
	{
		$cont=$this->CI->router->class;
		$met=$this->CI->router->method;


		if($cont=="welcome")
		{
			if($met=="index")
			{
				redirect("main","refresh");
			}
		}
		else
		{
			if($cont=="backend" || $cont=="admin")
			{
				if($this->CI->session->userdata("login_id")==null)
				{
					if($met!="login" && $met!="checklogin")
					{
						redirect($this->CI->uri->segment(1)."/backend/login","refresh");
						exit();
					}
				}
				else
				{
					if($this->CI->session->userdata("login_super")=="1")
					{		

						if($met=="login" || $met=="checklogin")
						{
							redirect("admin","refresh");
							exit();
						}
						elseif($met=="index" && $cont=="backend")
						{
							redirect('admin','refresh');
						}
					}
					else
					{						
						$rs=$this->CI->db->join("tb_url_type","tb_url.type_url_id=tb_url_type.type_url_id")->where("url_name",$this->CI->uri->segment(1))->get('tb_url')->row_array();
						redirect($rs['type_url_path']."_backend","refresh");
						exit();
						
					}
					
				}
			}
			elseif($cont=="group_backend")
			{
				if($this->CI->session->userdata("login_id")==null)
				{
					if($met!="login" && $met!="checklogin")
					{
						redirect(getUrlBackend()."login","refresh");
						exit();
					}
				}
			}
			elseif($cont=="area_backend")
			{
				if($this->CI->session->userdata("login_id")==null)
				{
					if($met!="login" && $met!="checklogin")
					{
						redirect(getUrlBackend()."login","refresh");
						exit();
					}
				}
				else
				{
					
				}
			}
			elseif($cont=="school_backend")
			{
				if($this->CI->session->userdata("login_id")==null)
				{
					if($met!="login" && $met!="checklogin")
					{
						redirect(getUrlBackend()."login","refresh");
						exit();
					}
				}
				else
				{
					
				}
			}
			elseif($cont=="web")
			{
				
			}
		}
	}
	*/
}
?>