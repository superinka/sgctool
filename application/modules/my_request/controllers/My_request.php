<?php
Class My_Request extends MY_Controller {
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
		$this->load->model('my_request_model');

		if($this->session->userdata('logged_in'))
	    {
	      $session_data = $this->session->userdata('logged_in');
	      $this->data_layout['username'] = $session_data['username'];
	      $this->data_layout['account_type'] = $session_data['account_type'];
	      $this->data_layout['id'] = $session_data['id'];
	      $id = $this->data_layout['id'];
	      //echo '0';
	    }
	    else
	    {
	      //If no session, redirect to login page
	      redirect(base_url('login'), 'refresh');
		}

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
	    //more_time_task : 101
	    //

	}

	function edit_time_task(){

		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;
		$my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $code = $this->uri->segment(3);

	    $this->session->set_flashdata('message','Đã gửi request');
		redirect(base_url('my_report/check_report_leader'), 'refresh');


	}

}
