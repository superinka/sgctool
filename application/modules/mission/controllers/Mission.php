<?php
Class Mission extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login/login_model','',TRUE);
		$this->load->model('home/home_model');

		if($this->session->userdata('logged_in'))
	    {
	      $session_data = $this->session->userdata('logged_in');
	      $this->data_layout['username'] = $session_data['username'];
	      $this->data_layout['id'] = $session_data['id'];
	      //echo '0';
	    }
	    else
	    {
	      //If no session, redirect to login page
	      redirect(base_url('login'), 'refresh');
		}
		$this->load->model('mission_model');

	}
	
	function index() {
		//$this->load->view('home/index');


		$total = $this->mission_model->get_total();
		$this->data_layout['total'] = $total;

		$id = $this->data_layout['id'];

		$input['where'] = array('user_id'=>$id); //$input['where']['user_id'] = $id;
		$where = array('user_id' => $id);

		//$female = $this->home_model->get_sum('id', $where = array('sex' =>'0'));
		//$male = $this->home_model->get_sum($field='sex',$where);
		$yourtask = $this->mission_model->get_total($input);

		$this->data_layout['yourtask'] = $yourtask;

		$list = $this->mission_model->get_list($input);
		//pre($list);
		$this->data_layout['list'] = $list;

		$this->data_layout['temp'] = 'index';
	    $this->load->view('layout/main', $this->data_layout);
	}
}