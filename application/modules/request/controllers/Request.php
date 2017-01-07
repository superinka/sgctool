<?php
Class Request extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login/login_model','',TRUE);
		$this->load->model('home/home_model');
		$this->load->model('home/acc_model');
		$this->load->model('home/role_model');
		$this->load->model('home/department_model');
		$this->load->model('project/project_model');
		$this->load->model('project/project_user_model');
		$this->load->model('project/mission_model');
		$this->load->model('project/task_model');
		$this->load->model('project/mission_user_model');
		$this->load->model('project/proportion_department_model');
		$this->load->model('my_mission/my_mission_model');
		$this->load->model('my_report/my_report_model');
		$this->load->model('request_model');


	}
	
	function index() {
		//$this->load->view('home/index');

		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;
		$my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	   	$this->data_layout['temp'] = 'index';
	    $this->load->view('layout/main', $this->data_layout);

	    //all types of request
	    //more_time_task employee: 101
	    //

	}

	function request_time_task() {

		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;
		$my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $code = $this->uri->segment(3);

	    $str = explode('-', $code);

	    $code_edit = $str[0];
	    $code = $str[1];

	    switch ($code_edit) {
	    	case 'c101':
	    		{
	    			$old_info = $this->task_model->get_info_rule($where=array('code'=>$code));
	    			$type='<strong>của công việc</strong>';
	    			$level ='4';
	    			$mission_id = $old_info->mission_id;
	    			$depart = $this->mission_model->get_info($mission_id);
	    			$department_id = $depart->department_id;
	    			$project_id = $depart->project_id;
	    		}
	    		break;
	    	
	    	default:
	    		# code...
	    		break;
	    }
	    //pre($old_info);

	    if($this->input->post()){

	    	//pre($old_info);
			$this->form_validation->set_rules('old_start_date', 'Ngày bắt đầu','trim');
			$this->form_validation->set_rules('old_end_date', 'Ngày kết thúc','trim');
			$this->form_validation->set_rules('new_start_date', 'Ngày bắt đầu','trim');
			$this->form_validation->set_rules('new_end_date', 'Ngày kết thúc','trim');
			$this->form_validation->set_rules('new_note', 'Note','trim');
			$this->form_validation->set_rules('old_name', 'Tên cũ','trim');
			$this->form_validation->set_rules('new_name', 'Tên mới','trim');

			if($this->form_validation->run()){

				$new_start_date = $this->input->post('new_start_date');
				$new_end_date = $this->input->post('new_end_date');
				$new_note = $this->input->post('new_note');

				$new_start_date = strtotime($new_start_date);
				$newformat_start_date = date('Y-m-d',$new_start_date);
				$new_end_date = strtotime($new_end_date);
				$newformat_end_date = date('Y-m-d',$new_end_date);

				$a1 = $old_info->start_date;
				$a2 = $old_info->end_date;
				$a3 = 'eof';

				$content_old = $a1.'^'.$a2.'^'.$a3;

				$content_new = $newformat_start_date.'^'.$newformat_end_date.'^'.$new_note;

				//echo $content_old;

				$data_request = array(
					'code'          => $code,
					'create_by'     => $my_id,
					'review_by'     => '53',
					'note'          => $new_note,
					'department_id' => $department_id,
					'review_status' => '0',
					'level_creater' => $level,
					'type'          => $code_edit,
					'create_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
					'review_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
					'content_old'   => $content_old,
					'content_new'   => $content_new,
					'status'        => '0' //0 : unread, 1: dismiss, 2:solved
				);

				//pre($data_request);
				//redirect(base_url('project/index'));

				if($this->request_model->create($data_request)) {
					$this->session->set_flashdata('message','Gửi request thành công');

				}
				else {
					$this->session->set_flashdata('message','Gửi request không thành công');
				}
				redirect(base_url('project/mission/view_detail/'.$project_id.'/'.$mission_id));
			}

			else {
				//pre($old_info);
			}




	    }

	    $this->data_layout['old_info'] = $old_info;
	    $this->data_layout['type'] = $type;
	    //pre($old_info);

	    //$this->session->set_flashdata('message','Đã gửi request');
		
	    $this->data_layout['temp'] = 'request_time';
	    $this->load->view('layout/main', $this->data_layout);

	}

}
