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

	}

}
