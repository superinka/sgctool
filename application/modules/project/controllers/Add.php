<?php
Class Add extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login/login_model','',TRUE);
		$this->load->model('home/home_model');
		$this->load->model('home/employee_model');
		$this->load->model('home/acc_model');
		$this->load->model('home/role_model');
		$this->load->model('project_model');



		$this->form_validation->set_error_delimiters('<div class="error" style="color:red; font-weight:600">', '</div>'); 

		if($this->session->userdata('logged_in'))
	    {
	      $session_data = $this->session->userdata('logged_in');
	      $this->data_layout['username'] = $session_data['username'];
	      $this->data_layout['id'] = $session_data['id'];
	      $id = $this->data_layout['id'];
	      $this->data_layout['account_type'] = $session_data['account_type'];
	      //echo '0';
	    }
	    else
	    {
	      //If no session, redirect to login page
	      redirect(base_url('login'), 'refresh');
		}

	}
	
	function index() {

		$id = $this->data_layout['id'];

		if($this->input->post()){
			$this->form_validation->set_rules('project_name', 'Tên dự án', 'trim');
			$this->form_validation->set_rules('description', 'description', 'trim');
			$this->form_validation->set_rules('short_name', 'Tên viết tắt', 'trim|callback_check_shortname');
			$this->form_validation->set_rules('start_date', 'Ngày bắt đầu');
			$this->form_validation->set_rules('end_date', 'Ngày kết thúc');
			$this->form_validation->set_rules('status', 'Tình Trạng');
			$this->form_validation->set_rules('progress', 'Tiến độ', 'numeric',
				array('numeric' => '%s Phải là số')
			);

			if($this->form_validation->run()){
				$project_name = $this->input->post('project_name');
				$description = $this->input->post('description');
				$short_name = $this->input->post('short_name');
				$start_date = $this->input->post('start_date');
				$end_date = $this->input->post('end_date');
				$status = $this->input->post('status');
				$progress = $this->input->post('progress');

				$update_id = $id;
				$create_id = $id;
				if ($progress < 0 ) {$progress =0;}
				else if ($progress > 100) {$progress=100;}

				$start_date = strtotime($start_date);
				$newformat_start_date = date('Y-m-d',$start_date);
				$end_date = strtotime($end_date);
				$newformat_end_date = date('Y-m-d',$end_date);

				$data_project = array(
					'project_name'  => $project_name,
					'description'   => $description,
					'short_name'    => $short_name,
					'start_date'    => $newformat_start_date,
					'end_date'      => $newformat_end_date,
					'status'        => $status,
					'create_date'   => date_create('now')->format('Y-m-d'),
					'update_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
					'update_by'     => $update_id,
					'create_by'     => $create_id,
					'progress'      => $progress
				);

				$holidays = array();

				$nwd = networkdays($start_date, $end_date, $holidays); 

				//pre($data);

				if($this->project_model->create($data_project)){
					$this->session->set_flashdata('message','Thêm dữ liệu thành công');
				}
				else {
					$this->session->set_flashdata('message','Thêm dữ liệu không thành công');
				}

				redirect(base_url('project/index'));
			}
		}

		

		$this->data_layout['temp'] = 'add';
	    $this->load->view('layout/main', $this->data_layout);
	}

	

	function check_shortname($short_name){
		$short_name = $this->input->post('short_name');
		$where = array('short_name' => $short_name, );
		if($this->project_model->check_exists($where)) {
			$this->form_validation->set_message('check_username', 'Tên viết tắt này đã tồn tại !');
			return false;
		}
		else return TRUE;

	}
}