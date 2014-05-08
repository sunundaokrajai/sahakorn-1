<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class money extends CI_CONTROLLER{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
	}
	public function department($method="",$dep_id="",$month="",$year=""){ // การจัดเก็บเงิน ตามหน่วยงาน
		
		switch($method){
			case"goto":

				$data['dep_name'] = $this->db->where("departments_id",$dep_id)->get("members_info_departments")->row()->departments_name;
				
				$months=$this->db->get("months")->result();
				$ddmenu = array();
				if(count($months)>0){
					foreach($months as $ofc){
						$ddmenu[$ofc->month_id] = $ofc->month_name;
					}
				}
				$data['months']=$ddmenu;
				
				$years=$this->db->get("years")->result();
				$ddmenu = array();
				if(count($years)>0){
					foreach($years as $ofc){
						$ddmenu[$ofc->year_id] = $ofc->year_name;
					}
				}
				$data['years']=$ddmenu;
				
				
				if($month=="" && $year==""){
					if($this->input->post("commit")!=NULL){
						$month = $this->input->post("month");
						$year = $this->input->post("year");
						redirect("money/department/goto/$dep_id/$month/$year");
					}
					$this->load->view("money/department/show_calendar",$data);
				}else{
					
					$data['rs'] = $this->db->where("departments",$dep_id)->get("members_info")->result();
					$data['month'] = $this->db->where("month_id",$month)->get("months")->row();
					
					// check Contribution store
					$chk = $this->db->where("month_id",$month)->where("set_active","1")->get("months");
					$ar = array();
					if($chk->num_rows()==0){
						$ar['store'] = array();
					}else{
						$ar['store'] = $data['rs'];
					}
									
					$this->load->view("money/department/user",$data);
				}
				
				
				break;
			default:
				if($this->input->post("submitsearch")!=NULL){
					if($this->input->post("departments_name")!="") $this->db->like("departments_name",$this->input->post("departments_name"));
				}
				$data['rs']=$this->db->from("members_info_departments")->get()->result();
				$this->load->view("money/department/index",$data);
				echo $this->benchmark->elapsed_time('code_start', 'code_end');
				break;
		}
	}
	public function member($method=""){
		switch($method){
			default:
				$this->load->library('pagination');

				$config['base_url'] = site_url('money/member/');
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
				
				$this->pagination->initialize($config);
				
				
				
				//$query = $this->db->limit($config['per_page'],$this->uri->segment(3))->get('members_info');
				
				$query = $this->db->order_by("register_no","asc")->join("members_info_jobs","members_info.jobs=members_info_jobs.jobs_id","LEFT")->join("members_info_departments","members_info.departments=members_info_departments.departments_id","LEFT")->join("members_info_office","members_info.office=members_info_office.office_id","LEFT")->limit($config['per_page'],$this->uri->segment(3))->get('members_info');
				
				$data['rs'] = $query->result();
				$this->load->view("money/member/index",$data);
				break;
		}
	}
	public function receipt($method="",$id=""){ // ใบเสร็จ
		switch($method){
			case"import":
			
				$config['upload_path'] = 'upload/';
				$config['allowed_types'] = 'xls';
				$config['max_size']	= '100000';
			
				$this->load->library('upload', $config);
				$error = false;
			
				if ( $this->upload->do_upload("excel"))
				{	
					$ar = $this->upload->data();
					$name = "money-".date("YmdHis").$ar['file_ext'];
					rename($ar['full_path'],$ar['file_path'].$name);
					
					require_once APPPATH.'libraries/Excel/reader.php';
					
					// ExcelFile($filename, $encoding);
					$data = new Spreadsheet_Excel_Reader();


					// Set output Encoding.
					$data->setOutputEncoding('utf-8');
					$data->setUTFEncoder('iconv');
					
					$data->read(FCPATH."upload/".$name);
					$no=1;
					for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
						$name = empty($data->sheets[0]['cells'][$i][2])?"":trim($data->sheets[0]['cells'][$i][2]); // ชื่อ
						$register_no = empty($data->sheets[0]['cells'][$i][3])?"":trim($data->sheets[0]['cells'][$i][3]);
						$office = empty($data->sheets[0]['cells'][$i][4])?"":trim($data->sheets[0]['cells'][$i][4]); 
						$money_maintain = empty($data->sheets[0]['cells'][$i][5])?"0":trim($data->sheets[0]['cells'][$i][5]); 
						$money_associated = empty($data->sheets[0]['cells'][$i][6])?"0":trim($data->sheets[0]['cells'][$i][6]); 
						$money_register = empty($data->sheets[0]['cells'][$i][7])?"0":trim($data->sheets[0]['cells'][$i][7]); 

						$money_maintain_month = empty($data->sheets[0]['cells'][$i][8])?"":trim($data->sheets[0]['cells'][$i][8]); 
						$money_maintain_no = empty($data->sheets[0]['cells'][$i][9])?"":trim($data->sheets[0]['cells'][$i][9]); 
						$money_maintain_year = empty($data->sheets[0]['cells'][$i][10])?"":(int)trim($data->sheets[0]['cells'][$i][10])-543; 
						
						$capital_short = empty($data->sheets[0]['cells'][$i][11])?"":trim($data->sheets[0]['cells'][$i][11]); 
						$increase_short = empty($data->sheets[0]['cells'][$i][12])?"":trim($data->sheets[0]['cells'][$i][12]); 
						$period_short = empty($data->sheets[0]['cells'][$i][13])?"":trim($data->sheets[0]['cells'][$i][13]); 
						$total_short = empty($data->sheets[0]['cells'][$i][14])?"":trim($data->sheets[0]['cells'][$i][14]); 
						
						$capital_long = empty($data->sheets[0]['cells'][$i][16])?"":trim($data->sheets[0]['cells'][$i][16]); 
						$increase_long = empty($data->sheets[0]['cells'][$i][17])?"":trim($data->sheets[0]['cells'][$i][17]); 
						$period_long = empty($data->sheets[0]['cells'][$i][15])?"":trim($data->sheets[0]['cells'][$i][15]); 
						$total_long = empty($data->sheets[0]['cells'][$i][18])?"":trim($data->sheets[0]['cells'][$i][18]);
						
						$capital_edu= empty($data->sheets[0]['cells'][$i][20])?"":trim($data->sheets[0]['cells'][$i][20]); 
						$increase_edu = empty($data->sheets[0]['cells'][$i][21])?"":trim($data->sheets[0]['cells'][$i][21]); 
						$period_edu = empty($data->sheets[0]['cells'][$i][19])?"":trim($data->sheets[0]['cells'][$i][19]); 
						$total_edu = empty($data->sheets[0]['cells'][$i][22])?"":trim($data->sheets[0]['cells'][$i][22]);
						
						$money_total = empty($data->sheets[0]['cells'][$i][23])?"":trim($data->sheets[0]['cells'][$i][23]);
						$money_string = empty($data->sheets[0]['cells'][$i][24])?"":trim($data->sheets[0]['cells'][$i][24]);
						
						$ondate = empty($data->sheets[0]['cells'][$i][25])?"":trim($data->sheets[0]['cells'][$i][25]);
						$status = empty($data->sheets[0]['cells'][$i][26])?"":trim($data->sheets[0]['cells'][$i][26]);
						$rec_no = empty($data->sheets[0]['cells'][$i][27])?"":trim($data->sheets[0]['cells'][$i][27]);
						
						$this->db->insert("receipt",array(
							"rec_no"=>$rec_no,
							"register_no"=>$register_no,
							"office"=>$office,
							"full_name"=>$name,
							"money_maintain"=>$money_maintain,
							"money_associated"=>$money_associated,
							"money_register"=>$money_register,
							"money_maintain_month"=>$money_maintain_month,
							"money_maintain_no"=>$money_maintain_no,
							"money_maintain_year"=>(int)$money_maintain_year,
							"capital_short"=>$capital_short,
							"increase_short"=>$increase_short,
							"period_short"=>$period_short,
							"total_short"=>$total_short,
							"capital_long"=>$capital_long,
							"increase_long"=>$increase_long,
							"period_long"=>$period_long,
							"total_long"=>$total_long,
							"capital_edu"=>$capital_edu,
							"increase_edu"=>$increase_edu,
							"period_edu"=>$period_edu,
							"total_edu"=>$total_edu,
							"money_total"=>$money_total,
							"money_string"=>$money_string,
							"ondate"=>$ondate,
							"status"=>$status,
							"rec_no"=>$rec_no
						));						
					}
					redirect("money/receipt");
				}
				
				
				
				$this->load->view("money/receipt/import");
				break;
			case"print":
				$data['rs'] = $this->db->where("rec_id",$id)->get("receipt")->row();
				$this->load->view("money/receipt/print",$data);
				break;
			default:
				$this->load->library('pagination');
		

				$config['base_url'] = site_url('money/receipt/index/');
				$config['total_rows'] = $this->db->count_all_results("receipt");
				
				$config['uri_segment'] = 4;
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
				
				$this->pagination->initialize($config);
				

				
				$query = $this->db->order_by("rec_id","asc")->limit($config['per_page'],$this->uri->segment(4))->get('receipt');
				
				$data['rs'] = $query->result();
				$this->load->view("money/receipt/index",$data);
				break;
		}
	}
	private function savecomplete(){
		$this->session->set_flashdata("save",TRUE);
	}
}