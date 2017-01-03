<?php
Class My_Mission extends MY_Controller {
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
		$this->load->model('my_mission_model');

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

	    $where = array('user_id' => $my_id);
	    $input = array();
	    $input['where']['user_id'] = $my_id;

	    $list_project_by_me = $this->project_user_model->get_list($input);


	    $this->data_layout['list_project_by_me'] = $list_project_by_me;

	    foreach ($list_project_by_me as $key => $value) {
	    	# code...

	    	$info_project = $this->project_model->get_info_rule($where=array('id'=>$value->project_id));
	    	$value->info = $info_project;
	    }

	    //pre($list_project_by_me);

	    $list_project_active_by_me = $this->project_user_model->get_list($input);
	    foreach ($list_project_active_by_me as $key => $value) {
	    	# code...

	    	$info_project = $this->project_model->get_info_rule($where=array('id'=>$value->project_id,'status'=>'1'));
	    	if($info_project==null){
	    		unset($list_project_active_by_me[$key]);
	    	}
	    	else if($info_project!=null) {
	    		$value->info = $info_project;
	    		$info_mission = $this->mission_model->get_columns('tb_mission',$where=array('project_id'=>$value->project_id,'status'=>'1'));
	    		//pre($info_mission);

	    		if($info_mission!=null){
	    			foreach ($info_mission as $k => $v) {
	    				# code...
	    				$id_mission = $v->id;
	    				if($this->mission_user_model->check_exists($where=array('mission_id'=>$id_mission, 'user_id'=>$my_id)) == true) {
	    					$value->mission[$k] = $v;
	    				}
	    			}
	    		}

	    		
	    	}
	    	
	    }

	    //pre($list_project_active_by_me);
 		$this->data_layout['list_project_active_by_me'] = $list_project_active_by_me;


		$this->data_layout['temp'] = 'index';
	    $this->load->view('layout/main', $this->data_layout);
	}
}