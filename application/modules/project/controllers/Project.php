<?php
Class Project extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login/login_model','',TRUE);
		$this->load->model('home/home_model');
		$this->load->model('project_model');

		global $account_type;
		
		$holidays = array();

		$this->data_layout['holidays'] = $holidays;

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
		$id = $this->data_layout['id'];

		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;
		

		$input = array();
		$where = array('user_id' => $id);

		$input['where']['created_by'] = $id;
		$total = $this->project_model->get_total();


		$list_project = $this->project_model->get_list();
		$numberproject = count($list_project);

		

		//pre($list_project);

		$this->data_layout['total'] = $total;
		$this->data_layout['numberproject'] = $numberproject;

		$list = $this->project_model->get_list();
		$this->data_layout['list'] = $list;
		$this->data_layout['list_project'] = $list_project;

		$this->data_layout['temp'] = 'index';
	    $this->load->view('layout/main', $this->data_layout);
	}

	function add(){

		$id = $this->data_layout['id'];
		//echo $id;
		$account_type = $this->data_layout['account_type'];

		$this->data_layout['temp'] = 'add';
	    $this->load->view('layout/main', $this->data_layout);

	}
}