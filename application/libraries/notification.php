<?php
Class Notification extends MY_Controller {
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
		$this->load->model('my_report_model');

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

	}

	function get_list_notification(){
		return 100;
	}

}
