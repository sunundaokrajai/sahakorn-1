<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class member extends CI_CONTROLLER{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		
		$this->load->library('pagination');
		
		$this->session->set_userdata("url",uri_string());	

		$config['base_url'] = site_url('member/index/');
		$config['total_rows'] = $this->db->count_all_results("members_info");
		
		$config['uri_segment'] = 3;
		$config['per_page']=50;

		$config['full_tag_open'] = '<div class="dt_footer"><div class="row-fluid"><div class="span12"><div class="dataTables_paginate paging_bootstrap pagination"><ul>';
		$config['full_tag_close'] = '</ul></div></div></div></div><!--pagination-->';
		 
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		 
		// $config['display_pages'] = FALSE;
		// 
		$config['anchor_class'] = 'follow_link ';
		
		
		
		
		
		//$query = $this->db->limit($config['per_page'],$this->uri->segment(3))->get('members_info');
		
		if($this->input->post("submitsearch")!=NULL){
			
			
			if($this->input->post("department")=="0" && $this->input->post("office")=="0" && $this->input->post("full_name")==""){
				redirect("member");
			}
			
			$dep = $this->input->post("department")==""?"0":$this->input->post("department");
			$office = $this->input->post("office")==""?"0":$this->input->post("office");
			
			if($dep!="0" && $office=="0"){
				$this->db->where("members_info.departments",$dep);
			}
			
			if($dep=="0" && $office!="0"){
				$this->db->where("members_info.office",$office);
			}
			
			if($dep!="0" && $office!="0"){
				$this->db->where("members_info.departments",$this->input->post("department"));
				$this->db->where("members_info.office",$this->input->post("office"));
			}
			
			if($this->input->post("full_name")!=""){
				$this->db->like("register_name",$this->input->post("full_name"));
				$this->db->or_like("register_surname",$this->input->post("full_name"));
			}

			//$query = $this->db->order_by("register_no","asc")->join("members_info_jobs","members_info.jobs=members_info_jobs.jobs_id","LEFT")->join("members_info_departments","members_info.departments=members_info_departments.departments_id","LEFT")->join("members_info_office","members_info.office=members_info_office.office_id","LEFT")->get('members_info');
			
			$query = $this->db->order_by("CAST(register_no as unsigned)","asc")
			->join("members_info_jobs","members_info.jobs=members_info_jobs.jobs_id","LEFT")
			->join("members_info_departments","members_info.departments=members_info_departments.departments_id","LEFT")
			->join("members_info_office","members_info.office=members_info_office.office_id","LEFT")
			->join("members_sub_departments","members_info.sub_department_id=members_sub_departments.sub_department_id","LEFT")
			->get('members_info');
		
		 
			//echo $this->db->last_query();
			
			$config['total_rows'] = $query->num_rows();
			$config['uri_segment'] = 3;
			$config['per_page']=$query->num_rows();
			
			
			
		}else{
			$query = $this->db->order_by("CAST(register_no as unsigned)","asc")
			->join("members_info_jobs","members_info.jobs=members_info_jobs.jobs_id","LEFT")
			->join("members_info_departments","members_info.departments=members_info_departments.departments_id","LEFT")
			->join("members_info_office","members_info.office=members_info_office.office_id","LEFT")
			->join("members_sub_departments","members_info.sub_department_id=members_sub_departments.sub_department_id","LEFT")
			->limit($config['per_page'],$this->uri->segment(3))->get('members_info');
			
		}
		
		$this->pagination->initialize($config);
		$data['rs'] = $query->result();
		
		$office=$this->db->get("members_info_departments")->result();
		$ddmenu = array();
		if(count($office)>0){

			foreach($office as $ofc){
				$ddmenu[$ofc->departments_id] = $ofc->departments_name;
			}
		}
		$data['departments']=$ddmenu;
		
		
		
		$office=$this->db->get("members_info_office")->result();
		$ddmenu = array();
		if(count($office)>0){

			foreach($office as $ofc){
				$ddmenu[$ofc->office_id] = $ofc->office_name;
			}
		}
		$data['office']=$ddmenu;
		
		
		$this->load->view("member/listmember",$data);
	}
	
	public function add(){
		
		
		$office=$this->db->get("members_info_jobs")->result();
		$ddmenu = array();
		if(count($office)>0){
			foreach($office as $ofc){
				$ddmenu[$ofc->jobs_id] = $ofc->jobs_name;
			}
		}
		$data['jobs']=$ddmenu;
		
		
		$office=$this->db->get("members_info_departments")->result();
		$ddmenu = array();
		if(count($office)>0){
			foreach($office as $ofc){
				$ddmenu[$ofc->departments_id] = $ofc->departments_name;
			}
		}
		$data['departments']=$ddmenu;
		
		$office=$this->db->get("members_sub_departments")->result();
		$ddmenu = array();
		if(count($office)>0){

			foreach($office as $ofc){
				$ddmenu[$ofc->sub_department_id] = $ofc->sub_department_name;
			}
		}
		$data['sub_department']=$ddmenu;
		
		$office=$this->db->get("members_info_office")->result();
		$ddmenu = array();
		if(count($office)>0){
			foreach($office as $ofc){
				$ddmenu[$ofc->office_id] = $ofc->office_name;
			}
		}
		$data['office']=$ddmenu;
		
		
		$type_jobs=$this->db->get("type_jobs")->result();
		$ddmenu = array();
		if(count($type_jobs)>0){
			foreach($type_jobs as $ofc){
				$ddmenu[$ofc->type_jobs_id] = $ofc->type_jobs_name;
			}
		}
		$data['type_jobs']=$ddmenu;
		
		$type_jobs=$this->db->order_by("province_name","asc")->get("province")->result();
		$ddmenu = array();
		if(count($type_jobs)>0){
			foreach($type_jobs as $ofc){
				$ddmenu[$ofc->province_id] = $ofc->province_name;
			}
		}
		$data['province']=$ddmenu;
		
		
		$type_jobs=$this->db->get("relationship")->result();
		$ddmenu = array();
		if(count($type_jobs)>0){
			foreach($type_jobs as $ofc){
				$ddmenu[$ofc->relationship_id] = $ofc->relationship_name;
			}
		}
		$data['relation']=$ddmenu;
		
		if($this->input->post("commit")!=NULL){
			$ar=array(
				"register_no"=>$this->input->post("register_no"),
				"retirement_year"=>$this->input->post("retirement_year"),
				"date_register"=>$this->input->post("years_regis")."-".$this->input->post("month_regis")."-".$this->input->post("date_regis"),
				"register_name"=>$this->input->post("register_name"),
				"register_surname"=>$this->input->post("register_surname"),
				"type_jobs"=>$this->input->post("type_jobs"),
				"identification_number"=>$this->input->post("identification_number"),
				"birthday"=>$this->input->post("years")."-".$this->input->post("month")."-".$this->input->post("date"),
				"jobs"=>$this->input->post("jobs"),
				"departments"=>$this->input->post('departments'),
				"sub_department_id"=>$this->input->post("sub_department_id"),
				"office"=>$this->input->post("office"),
				"tel_work"=>$this->input->post("tel_work"),
				"fax_work"=>$this->input->post("fax_work"),
				"address"=>$this->input->post("address"),
				"village_number"=>$this->input->post("village_number"),
				"alley"=>$this->input->post("alley"),
				"road"=>$this->input->post("road"),
				"distric"=>$this->input->post("distric"),
				"county"=>$this->input->post("county"),
				"province_id"=>$this->input->post("province_id"),
				"tel_home"=>$this->input->post("tel_home"),
				"earning"=>$this->input->post("earning")			
			);
			$this->db->insert("members_info",$ar);
			
			if(count($this->input->post("re_name")>1)){
				$rename = $this->input->post("re_name");
				$resurname = $this->input->post("re_surname");
				$relationid=$this->input->post("relation_id");
				
				$i=0;
				foreach($rename as $r =>$val){
					if($i>0){
						//echo $rename[$i]."  / ".$resurname[$i]." : ".$relationid[$i]." <hr>";
						$this->db->insert("members_relationship",array(
							"register_no"=>$this->input->post("register_no"),
							"re_name"=>$rename[$i],
							"re_surname"=>$resurname[$i],
							"relationship_id"=>$this->input->post("relationship_id")
						));
					}
					$i++;
				}
				
				
			}
			$this->savecomplete();
			redirect($this->session->userdata("url"));
		}
		
		$this->load->view("member/add",$data);
	}
	
	
	public function edit($id){
		
		
		$office=$this->db->get("members_info_jobs")->result();
		$ddmenu = array();
		if(count($office)>0){
			foreach($office as $ofc){
				$ddmenu[$ofc->jobs_id] = $ofc->jobs_name;
			}
		}
		$data['jobs']=$ddmenu;
		
		
		$office=$this->db->get("members_info_departments")->result();
		$ddmenu = array();
		if(count($office)>0){
			foreach($office as $ofc){
				$ddmenu[$ofc->departments_id] = $ofc->departments_name;
			}
		}
		$data['departments']=$ddmenu;
		
		$office=$this->db->get("members_sub_departments")->result();
		$ddmenu = array();
		if(count($office)>0){

			foreach($office as $ofc){
				$ddmenu[$ofc->sub_department_id] = $ofc->sub_department_name;
			}
		}
		$data['sub_department']=$ddmenu;
		
		$office=$this->db->get("members_info_office")->result();
		$ddmenu = array();
		if(count($office)>0){
			foreach($office as $ofc){
				$ddmenu[$ofc->office_id] = $ofc->office_name;
			}
		}
		$data['office']=$ddmenu;
		
		
		$type_jobs=$this->db->get("type_jobs")->result();
		$ddmenu = array();
		if(count($type_jobs)>0){
			foreach($type_jobs as $ofc){
				$ddmenu[$ofc->type_jobs_id] = $ofc->type_jobs_name;
			}
		}
		$data['type_jobs']=$ddmenu;
		
		$type_jobs=$this->db->order_by("province_name","asc")->get("province")->result();
		$ddmenu = array();
		if(count($type_jobs)>0){
			foreach($type_jobs as $ofc){
				$ddmenu[$ofc->province_id] = $ofc->province_name;
			}
		}
		$data['province']=$ddmenu;
		
		
		$type_jobs=$this->db->get("relationship")->result();
		$ddmenu = array();
		if(count($type_jobs)>0){
			foreach($type_jobs as $ofc){
				$ddmenu[$ofc->relationship_id] = $ofc->relationship_name;
			}
		}
		$data['relation']=$ddmenu;
		
		if($this->input->post("commit")!=NULL){
			$ar=array(
				"register_no"=>$this->input->post("register_no"),
				"retirement_year"=>$this->input->post("retirement_year"),
				"date_register"=>$this->input->post("years_regis")."-".$this->input->post("month_regis")."-".$this->input->post("date_regis"),
				"register_name"=>$this->input->post("register_name"),
				"register_surname"=>$this->input->post("register_surname"),
				"type_jobs"=>$this->input->post("type_jobs"),
				"identification_number"=>$this->input->post("identification_number"),
				"birthday"=>$this->input->post("years")."-".$this->input->post("month")."-".$this->input->post("date"),
				"jobs"=>$this->input->post("jobs"),
				"departments"=>$this->input->post('departments'),
				"sub_department_id"=>$this->input->post("sub_department_id"),
				"office"=>$this->input->post("office"),
				"tel_work"=>$this->input->post("tel_work"),
				"fax_work"=>$this->input->post("fax_work"),
				"address"=>$this->input->post("address"),
				"village_number"=>$this->input->post("village_number"),
				"alley"=>$this->input->post("alley"),
				"road"=>$this->input->post("road"),
				"distric"=>$this->input->post("distric"),
				"county"=>$this->input->post("county"),
				"province_id"=>$this->input->post("province_id"),
				"tel_home"=>$this->input->post("tel_home"),
				"earning"=>$this->input->post("earning")				
			);
			$this->db->where("register_no",$id)->update("members_info",$ar);
			
			if(count($this->input->post("re_name")>1)){
				$rename = $this->input->post("re_name");
				$resurname = $this->input->post("re_surname");
				$relationid=$this->input->post("relation_id");
				
				$this->db->where("register_no",$id)->delete("members_relationship");
				
				$i=0;
				foreach($rename as $r =>$val){
					if($i>0){
						//echo $rename[$i]."  / ".$resurname[$i]." : ".$relationid[$i]." <hr>";
						$this->db->insert("members_relationship",array(
							"register_no"=>$this->input->post("register_no"),
							"re_name"=>$rename[$i],
							"re_surname"=>$resurname[$i],
							"relationship_id"=>$this->input->post("relationship_id")
						));
					}
					$i++;
				}
				
				
			}
			$this->savecomplete();
			redirect($this->session->userdata("url"));
		}
		
		$data['r']=$this->db->where("register_no",$id)->get("members_info")->row();
		$data['r_relation']=$this->db->where("register_no",$id)->get("members_relationship")->result();
		$this->load->view("member/edit",$data);
	}
	public function del($id){
		$this->db->where("register_no",$id)->delete("members_info");
		$this->db->where("register_no",$id)->delete("members_relationship");
		redirect("member","refresh");
	}
	public function loan($id,$method="",$sid=""){
		switch($method){
			case"add":
				if($this->input->post("commit")!=NULL){
					$ar=array(
						"register_no"=>$id,
						"loan_no"=>$this->input->post("loan_no"),
						"loan_money"=>$this->input->post("loan_money"),
						"type_loan_id"=>$this->input->post("type_loan"),
						"loan_years"=>$this->input->post("loan_years"),
						"loan_other"=>$this->input->post("loan_other"),
						"loan_date"=>$this->input->post("year")."-".$this->input->post("month")."-".$this->input->post("date")
					);
					$this->db->insert("loan",$ar);
					$loan_id = $this->db->insert_id();
					if($this->input->post("member")!=NULL){
						foreach($this->input->post("member") as $inx=>$val){
							$this->db->insert("loan_member",array(
								"loan_id"=>$loan_id,
								"insurance"=>$val
							));
						}
					}
					$this->savecomplete();
					redirect("member/loan/".$id."/add");
				}
				$data['rs']=array();
				$ddmenu=array();
				
				$data['member']=$this->db->where("register_no",$id)->get("members_info")->row();
				
				$rs = $this->db->get("type_loan");			
				foreach($rs->result() as $r){
					$ddmenu[$r->type_loan_id] = $r->type_loan_name;
				}
				$data['type_loan']=$ddmenu;
				
				$ddmenu = array();
				$rs = $this->db->where_not_in("register_no",$id)->get("members_info");
				$ddmenu[""] = " เลือกข้อมูล  ";
				foreach($rs->result() as $r){
					$ddmenu[$r->register_no] = $r->register_name." ".$r->register_surname;
				}
				$data['members'] = $ddmenu;
				
				$ddmenu = array();
				$rs = $this->db->get("months");
				$ddmenu[""] = " เดือน  ";
				foreach($rs->result() as $r){
					$ddmenu[$r->month_id] = $r->month_name;
				}
				$data['month'] = $ddmenu;
				
				$ddmenu = array();
				$rs = $this->db->order_by("year_id","asc")->get("years");
				$ddmenu[""] = " ปี  ";
				foreach($rs->result() as $r){
					$ddmenu[$r->year_id] = $r->year_name;
				}
				$data['year'] = $ddmenu;

				
				
				$this->load->view("member/loan/add",$data);
				break;
			case"edit":
				if($this->input->post("commit")!=NULL){
					$ar=array(
						"register_no"=>$id,
						"loan_no"=>$this->input->post("loan_no"),
						"loan_money"=>$this->input->post("loan_money"),
						"type_loan_id"=>$this->input->post("type_loan"),
						"loan_years"=>$this->input->post("loan_years"),
						"loan_other"=>$this->input->post("loan_other"),
						"loan_date"=>$this->input->post("year")."-".$this->input->post("month")."-".$this->input->post("date")
					);
					$this->db->where("loan_id",$this->input->post("loan_id"))->update("loan",$ar);
					$loan_id = $this->input->post("loan_id");
					if($this->input->post("member")!=NULL){
						$this->db->where("loan_id",$this->input->post("loan_id"))->delete("loan_member");
						foreach($this->input->post("member") as $inx=>$val){
							if($val!=""){
								$this->db->insert("loan_member",array(
									"loan_id"=>$loan_id,
									"insurance"=>$val
								));
							}
						}
					}
					$this->savecomplete();
					redirect("member/loan/".$id."/edit/".$sid);

					//print_r($this->input->post("member"));
				}
				$data['member']=$this->db->where("register_no",$id)->get("members_info")->row();
				$data['f'] = $this->db->where("loan_id",$sid)->get("loan")->row();
				$data['f2']=$this->db->where("loan_id",$sid)->get("loan_member")->result();
				$ddmenu=array();
				$rs = $this->db->get("type_loan");			
				foreach($rs->result() as $r){
					$ddmenu[$r->type_loan_id] = $r->type_loan_name;
				}
				$data['type_loan']=$ddmenu;
				
				$ddmenu = array();
				$rs = $this->db->where_not_in("register_no",$id)->get("members_info");
				$ddmenu[""] = " เลือกข้อมูล  ";
				foreach($rs->result() as $r){
					$ddmenu[$r->register_no] = $r->register_name." ".$r->register_surname;
				}
				$data['members'] = $ddmenu;
				
				$ddmenu = array();
				$rs = $this->db->get("months");
				$ddmenu[""] = " เดือน  ";
				foreach($rs->result() as $r){
					$ddmenu[$r->month_id] = $r->month_name;
				}
				$data['month'] = $ddmenu;
				
				$ddmenu = array();
				$rs = $this->db->order_by("year_id","asc")->get("years");
				$ddmenu[""] = " ปี  ";
				foreach($rs->result() as $r){
					$ddmenu[$r->year_id] = $r->year_name;
				}
				$data['year'] = $ddmenu;
				
				$this->load->view("member/loan/edit",$data);
				
				break;
			case"del":
				$this->db->where("loan_id",$sid)->delete("loan");
				$this->db->where("loan_id",$sid)->delete("loan_member");
				redirect("member/loan/".$id);
				break;

			default:
				$data['member']=$this->db->where("register_no",$id)->get("members_info")->row();
				$data['rs']=$this->db->join("type_loan","loan.type_loan_id=type_loan.type_loan_id")->where("register_no",$id)->get('loan')->result();
				$this->load->view("member/loan/index",$data);
				break;
		}	
	}
	public function saveloan($id,$type){
		if($type=="add"){
			$ar=array(
				"register_no"=>$id,
				"loan_no"=>$this->input->post("loan_no"),
				"loan_money"=>$this->input->post("loan_money"),
				"type_loan_id"=>$this->input->post("type_loan"),
				"loan_years"=>$this->input->post("loan_years"),
				"loan_other"=>$this->input->post("loan_other")
			);
			$this->db->insert("loan",$ar);
			$loan_id = $this->db->insert_id();
			if($this->input->post("member")!=NULL){
				foreach($this->input->post("member") as $inx=>$val){
					$this->db->insert("loan_member",array(
						"loan_id"=>$loan_id,
						"register_no"=>$val
					));
				}
			}
		}else{
			
		}
	}	
	public function import(){
		
		
		$this->load->view("member/import");
		
			
	}
	
	public function update_data(){
		require_once APPPATH.'libraries/Excel/reader.php';			
		// ExcelFile($filename, $encoding);
		$data = new Spreadsheet_Excel_Reader();


		// Set output Encoding.
		$data->setOutputEncoding('utf-8');
		$data->setUTFEncoder('iconv');
		
		$data->read(FCPATH."upload/data.xls");
		
		
		
		for ($i = 4; $i <= $data->sheets[0]['numRows']; $i++) {
			$regis_no = empty($data->sheets[0]['cells'][$i][5])?"":trim($data->sheets[0]['cells'][$i][5]);
			$ex_date_regis =  empty($data->sheets[0]['cells'][$i][9])?"":trim($data->sheets[0]['cells'][$i][9]);
			
			$ex_date_regis = explode("/",$ex_date_regis);
			
			$date_regis = $ex_date_regis[2]."-".$ex_date_regis[1]."-".$ex_date_regis[0];
			
			$rs = $this->db->where("register_no",$regis_no)->get("members_info");
			if($rs->num_rows()>0){				
				$this->db->where("register_no",$regis_no)->update("members_info",array(
					"date_register"=>$date_regis
				));
			}else{
				
				$type_job =  empty($data->sheets[0]['cells'][$i][13])?"":trim($data->sheets[0]['cells'][$i][13]);
				echo $data->sheets[0]['cells'][$i][13];
				if($type_job==""){
					$type_jobs_id = 0;
				}else{
					$rs = $this->db->where("type_jobs_name",$type_job)->get("type_jobs");
					if($rs->num_rows()==0){
						$this->db->insert("type_jobs",array("type_jobs_name"=>$type_job));
						$type_jobs_id = $this->db->insert_id();
					}else{
						$type_jobs_id = $rs->row()->type_jobs_id;
					}
				}
				
				// check jobs
				$jobs =  empty($data->sheets[0]['cells'][$i][14])?"":trim($data->sheets[0]['cells'][$i][14]);
				echo $data->sheets[0]['cells'][$i][14];
				if($jobs==""){
					$jobs_id = 0;
				}else{
					$rs = $this->db->where("jobs_name",$jobs)->get("members_info_jobs");
					if($rs->num_rows()==0){
						$this->db->insert("members_info_jobs",array("jobs_name"=>$jobs));
						$jobs_id = $this->db->insert_id();
					}else{
						$jobs_id = $rs->row()->jobs_id;
					}
				}
				
				// check department
				$department =  empty($data->sheets[0]['cells'][$i][15])?"":trim($data->sheets[0]['cells'][$i][15]);
				echo $data->sheets[0]['cells'][$i][15];
				if($department==""){
					$department_id = 0;
				}else{
					$rs = $this->db->where("departments_name",$department)->get("members_info_departments");
					if($rs->num_rows()==0){
						$this->db->insert("members_info_departments",array("departments_name"=>$department));
						$department_id = $this->db->insert_id();
					}else{
						$department_id = $rs->row()->departments_id;
					}
				}
				
				// check office
				$office =  empty($data->sheets[0]['cells'][$i][16])?"":trim($data->sheets[0]['cells'][$i][16]);
				echo $data->sheets[0]['cells'][$i][16];
				if($office==""){
					$office_id = 0;
				}else{
					$rs = $this->db->where("office_name",$office)->get("members_info_office");
					if($rs->num_rows()==0){
						$this->db->insert("members_info_office",array("office_name"=>$office));
						$office_id = $this->db->insert_id();
					}else{
						$office_id = $rs->row()->office_id;
					}
				}
				
				$name = preg_replace("/\s+/"," ",trim($data->sheets[0]['cells'][$i][2]));
				$ex_name = explode(" ",$name);
				$ar=array(
					"register_no"=>$data->sheets[0]['cells'][$i][5],
					"register_name"=>$ex_name[0],
					"register_surname"=>$ex_name[1],
					"identification_number"=>empty($data->sheets[0]['cells'][$i][6])?"":$data->sheets[0]['cells'][$i][6],
					"date_register"=>$date_regis,
					"type_jobs"=>$type_jobs_id,
					"jobs"=>$jobs_id,
					"departments"=>$department_id,
					"office"=>$office_id					
				);
				$this->db->insert("members_info",$ar);
			}
			echo $date_regis." : ";
		}
	}
	
	public function do_import(){
		
		$config['upload_path'] = 'upload/';
		$config['allowed_types'] = 'xls';
		$config['max_size']	= '100000';
	
		$this->load->library('upload', $config);
		$error = false;
	
		if ( $this->upload->do_upload("excel"))
		{	
			$ar = $this->upload->data();
			$name = date("YmdHis").$ar['file_ext'];
			rename($ar['full_path'],$ar['file_path'].$name);
			
			require_once APPPATH.'libraries/Excel/reader.php';
			
			// ExcelFile($filename, $encoding);
			$data = new Spreadsheet_Excel_Reader();


			// Set output Encoding.
			$data->setOutputEncoding('utf-8');
			$data->setUTFEncoder('iconv');
			
			$data->read(FCPATH."upload/".$name);

			for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
				
				/*
				for ($j = 1; $j <= $q->sheets[0]['numCols']; $j++) {
					echo "\"".$q->sheets[0]['cells'][$i][$j]."\",";
				}
				*/
				// check type jobs
				$type_job =  empty($data->sheets[0]['cells'][$i][7])?"":trim($data->sheets[0]['cells'][$i][7]);
				echo $data->sheets[0]['cells'][$i][7];
				if($type_job==""){
					$type_jobs_id = 0;
				}else{
					$rs = $this->db->where("type_jobs_name",$type_job)->get("type_jobs");
					if($rs->num_rows()==0){
						$this->db->insert("type_jobs",array("type_jobs_name"=>$type_job));
						$type_jobs_id = $this->db->insert_id();
					}else{
						$type_jobs_id = $rs->row()->type_jobs_id;
					}
				}
				
				// check jobs
				$jobs =  empty($data->sheets[0]['cells'][$i][8])?"":trim($data->sheets[0]['cells'][$i][8]);
				echo $data->sheets[0]['cells'][$i][8];
				if($jobs==""){
					$jobs_id = 0;
				}else{
					$rs = $this->db->where("jobs_name",$jobs)->get("members_info_jobs");
					if($rs->num_rows()==0){
						$this->db->insert("members_info_jobs",array("jobs_name"=>$jobs));
						$jobs_id = $this->db->insert_id();
					}else{
						$jobs_id = $rs->row()->jobs_id;
					}
				}
				
				// check department
				$department =  empty($data->sheets[0]['cells'][$i][9])?"":trim($data->sheets[0]['cells'][$i][9]);
				echo $data->sheets[0]['cells'][$i][9];
				if($department==""){
					$department_id = 0;
				}else{
					$rs = $this->db->where("departments_name",$department)->get("members_info_departments");
					if($rs->num_rows()==0){
						$this->db->insert("members_info_departments",array("departments_name"=>$department));
						$department_id = $this->db->insert_id();
					}else{
						$department_id = $rs->row()->departments_id;
					}
				}
				
				// check office
				$office =  empty($data->sheets[0]['cells'][$i][10])?"":trim($data->sheets[0]['cells'][$i][10]);
				echo $data->sheets[0]['cells'][$i][10];
				if($office==""){
					$office_id = 0;
				}else{
					$rs = $this->db->where("office_name",$office)->get("members_info_office");
					if($rs->num_rows()==0){
						$this->db->insert("members_info_office",array("office_name"=>$office));
						$office_id = $this->db->insert_id();
					}else{
						$office_id = $rs->row()->office_id;
					}
				}
				
				$name = preg_replace("/\s+/"," ",trim($data->sheets[0]['cells'][$i][2]));
				$ex_name = explode(" ",$name);
				$ar=array(
					"register_no"=>$data->sheets[0]['cells'][$i][3],
					"register_name"=>$ex_name[0],
					"register_surname"=>$ex_name[1],
					"identification_number"=>empty($data->sheets[0]['cells'][$i][4])?"":$data->sheets[0]['cells'][$i][4],
					"date_register"=>empty($data->sheets[0]['cells'][$i][6])?"0000-00-00":$data->sheets[0]['cells'][$i][6],
					"type_jobs"=>$type_jobs_id,
					"jobs"=>$jobs_id,
					"departments"=>$department_id,
					"office"=>$office_id					
				);
				$this->db->insert("members_info",$ar);
			}
			
			
			$join("members_info_departments","members_info.departments=members_info_departments.departments_id")->join("members_info_office","members_info.office=members_info_office.office_id")->get('members_info');
	
			//$s['q'] = $data;
			//$this->load->view("member/do_import",$s);
		}
	}
	private function savecomplete(){
		$this->session->set_flashdata("save",TRUE);
	}
}