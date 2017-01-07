<?php
Class View_Report extends MY_Controller {
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
		$this->load->model('view_report_model');

	}
	
	function index() {
		//$this->load->view('home/index');

		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

	    $my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $today = date("Y-m-d"); 
	    $this->data_layout['today'] = $today;

	    if ($this->data_layout['account_type'] > 2) {
			$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('my_report/index'));
		}
		else {
			$input = array();
		    $input['where']['create_date'] = $today;
			$list_report_today = $this->my_report_model->get_list($input);

			//pre($list_report_today);
			$this->data_layout['list_report_today'] = $list_report_today;

			$input_checked_today = array();
			$input_checked_today['where']['create_date'] = $today;
			$input_checked_today['where']['review_status'] = '1';
			$list_report_checked_today = $this->my_report_model->get_list($input_checked_today);


			$input_uncheck_today = array();
			$input_uncheck_today['where']['create_date'] = $today;
			$input_uncheck_today['where']['review_status'] = '0';
			$list_report_uncheck_today = $this->my_report_model->get_list($input_uncheck_today);
			$this->data_layout['list_report_uncheck_today'] = $list_report_uncheck_today;

			//pre($list_report_uncheck_today);
			$total_report_today = 0; $total_report_checked =0; $total_report_uncheck =0;

			if($list_report_today!=null){


				//pre($list_report_today);

				foreach ($list_report_today as $key => $value) {
					$task_id = $value->task_id;
					$reporter_id = $value->create_by;

					$reporter_fullname = $this->home_model->get_info_rule($where=array('user_id'=>$reporter_id,'fullname'));
					$reporter_level = $this->acc_model->get_info_rule($where=array('id'=>$reporter_id));
					$reporter_level = $reporter_level->account_type;
					$reporter_fullname = $reporter_fullname->fullname;

					$task_info = $this->task_model->get_columns('tb_task',$where=array('id'=>$task_id));
					if($task_info==null) {
						unset($list_report_today[$key]);
					}
					else if($task_info !=null) {
						$mission_id = $task_info[0]->mission_id;
						$mission_info = $this->mission_model->get_columns('tb_mission',$where=array('id'=>$mission_id));
						$mission_name = $mission_info[0]->name;
						$department_id = $mission_info[0]->department_id;

						$project_id = $task_info[0]->project_id;

						// add reporter name
						$value->reporter = $reporter_fullname;
						// add reporter level
						$value->reporter_level = $reporter_level;
						// add department_id and room
						$value->department_id = $department_id;
						// add mission name
						$value->mission_name = $mission_name;

						$list_room = $this->proportion_department_model->get_columns('tb_proportion_department',$where = array('project_id'=>$project_id));
					}

				}
				//pre($list_report_today);
				foreach ($list_report_uncheck_today as $key => $value) {
					$task_id = $value->task_id;
					$reporter_id = $value->create_by;

					$reporter_fullname = $this->home_model->get_info_rule($where=array('user_id'=>$reporter_id,'fullname'));
					$reporter_level = $this->acc_model->get_info_rule($where=array('id'=>$reporter_id));
					$reporter_level = $reporter_level->account_type;
					$reporter_fullname = $reporter_fullname->fullname;

					$task_info = $this->task_model->get_columns('tb_task',$where=array('id'=>$task_id));
					if($task_info==null) {
						unset($list_report_uncheck_today[$key]);
					}
					else if($task_info !=null) {
						$mission_id = $task_info[0]->mission_id;
						$mission_info = $this->mission_model->get_columns('tb_mission',$where=array('id'=>$mission_id));
						$mission_name = $mission_info[0]->name;
						$department_id = $mission_info[0]->department_id;

						$project_id = $task_info[0]->project_id;

						// add reporter name
						$value->reporter = $reporter_fullname;
						// add reporter level
						$value->reporter_level = $reporter_level;
						// add department_id and room
						$value->department_id = $department_id;
						// add mission name
						$value->mission_name = $mission_name;

						$list_room = $this->proportion_department_model->get_columns('tb_proportion_department',$where = array('project_id'=>$project_id));
					}
				}
				//pre($list_report_uncheck_today);
				foreach ($list_report_checked_today as $key => $value) {
					$task_id = $value->task_id;
					$reporter_id = $value->create_by;

					$reporter_fullname = $this->home_model->get_info_rule($where=array('user_id'=>$reporter_id,'fullname'));
					$reporter_level = $this->acc_model->get_info_rule($where=array('id'=>$reporter_id));
					$reporter_level = $reporter_level->account_type;
					$reporter_fullname = $reporter_fullname->fullname;

					$task_info = $this->task_model->get_columns('tb_task',$where=array('id'=>$task_id));
					if($task_info==null) {
						unset($list_report_checked_today[$key]);
					}
					else if($task_info !=null) {
						$mission_id = $task_info[0]->mission_id;
						$mission_info = $this->mission_model->get_columns('tb_mission',$where=array('id'=>$mission_id));
						$mission_name = $mission_info[0]->name;
						$department_id = $mission_info[0]->department_id;

						$project_id = $task_info[0]->project_id;

						// add reporter name
						$value->reporter = $reporter_fullname;
						// add reporter level
						$value->reporter_level = $reporter_level;
						// add department_id and room
						$value->department_id = $department_id;
						// add mission name
						$value->mission_name = $mission_name;

						$list_room = $this->proportion_department_model->get_columns('tb_proportion_department',$where = array('project_id'=>$project_id));
					}
				}

				$total_report_today = count($list_report_today);

				//pre($list_report_today);




				if($list_report_checked_today != null) {
					$total_report_checked = count($list_report_checked_today);
				} 

				$total_report_uncheck = $total_report_today - $total_report_checked;
				//echo $total_report_today;
				//pre($list_report_checked_today);
			}

			if($list_report_today==null){
				$total_report_today = 0;
			}
			if($list_report_uncheck_today== null) {
				$total_report_uncheck = 0;
			}

			if($list_report_checked_today == null) {
				$total_report_checked = 0;
				
			}
		}

		$this->data_layout['list_report_checked_today'] = $list_report_checked_today;
		$this->data_layout['total_report_today'] = $total_report_today;
		$this->data_layout['total_report_checked'] = $total_report_checked;
		$this->data_layout['total_report_uncheck'] = $total_report_uncheck;

		$c = array($total_report_checked,$total_report_uncheck);
		$this->data_layout['c'] = $c;

		$this->data_layout['temp'] = 'index';
	    $this->load->view('layout/main', $this->data_layout);
	}

}