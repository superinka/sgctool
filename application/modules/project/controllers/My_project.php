<?php
Class My_Project extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login/login_model','',TRUE);
		$this->load->model('home/home_model');
		$this->load->model('home/acc_model');
		$this->load->model('home/role_model');
		$this->load->model('home/department_model');
		$this->load->model('project_model');
		$this->load->model('project_user_model');
		$this->load->model('proportion_department_model');

		global $account_type;
		
		$holidays = array();

		$this->data_layout['holidays'] = $holidays;



	}
	
	function index() {

		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

	    $my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $today = date("Y-m-d"); 
	    $this->data_layout['today'] = $today;

	    if ($this->data_layout['account_type'] < 3 ) {
	    	$this->session->set_flashdata('message','Cấp của bạn không vào mục này');
	    	redirect(base_url('project/index'));	
	    }

	    else if ($this->data_layout['account_type'] == 4 ){
	    	$input['where'] = array('user_id'=>$my_id);

	    	$list_project = $this->project_user_model->get_list($input);

		    foreach ($list_project as $key => $value) {
		    	$project_info = $this->project_model->get_info($value->project_id);
		    	$value->project_info = $project_info;
		    	$value->type = 'Thành viên';
		    }

		    //pre($list_project);

		    
	    }

	    else if ($this->data_layout['account_type'] == 3 ){
	    	$input['where'] = array('user_id'=>$my_id);
	    	$list_depart = $this->role_model->get_list($input);
	    	//pre($list_depart);

	    	foreach ($list_depart as $key => $value) {
	    		
	    		$p = $this->proportion_department_model->get_info_rule($where = array('department_id'=>$value->department_id));

	    		$ar[] = $p->project_id;

	    	}
	    	//pre($ar);

	    	$ar =array_unique($ar);
	    	$ar =array_values($ar);

	    	$list_project = array();


	    	foreach ($ar as $key => $value) {
	    		$list_project[$key] = new stdClass;
	    		$list_project[$key]->project_id = $value;
	    		$project_info = $this->project_model->get_info($value);
	    		$list_project[$key]->project_info = $project_info;
	    		$list_project[$key]->type = '<strong>Trưởng nhóm<strong>';
	    		//$list_project[$key]['list_project'] = $project_info;
	    	}

	    	//pre($list_project);
	    }

	    //pre($list_project);

	    $this->data_layout['list_project'] = $list_project;




		$this->data_layout['temp'] = 'my_project';
	    $this->load->view('layout/main', $this->data_layout);
	}
}