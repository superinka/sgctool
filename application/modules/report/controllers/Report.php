<?php
Class Report extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('mission/mission_model');
		$this->load->model('login/login_model','',TRUE);
		$this->load->model('home/home_model');
		$this->load->model('report_model');


	}
	
	function index() {
		//$this->load->view('home/index');
		$id = $this->data_layout['id'];
		$input = array();
		$where = array('user_id' => $id);

		$input['where']['created_by'] = $id;
		$total = $this->report_model->get_total();
		$this->data_layout['total'] = $total;

		$task_id = 17;

		$task_name = $this->mission_model->get_task_name($task_id);

		$yourreport = $this->report_model->get_total($input);

		$this->data_layout['yourreport'] = $yourreport;
		$this->data_layout['task_name'] = $task_name;

		$list = $this->report_model->get_list($input);
		$new = array();
		foreach ($list as $key=>$value) {
			$list[$key] = (array) $value;
			$task_id = $value->task_id;
			if (($task_id==0) || ($task_id==null)) {
				unset($list[$key]);
			}
			if(($task_id!=null) && ($task_id!=0)){
			$task_name = $this->mission_model->get_task_name($task_id);
				if($task_name==null) { 
				unset($list[$key]); 
				}
				else {
					$list[$key]['task_name'] = (array) $task_name[0];
				}
			}
			//echo $task_id;
			$task_name = $this->mission_model->get_task_name($task_id);
			//pre($task_name);
			//pre($task_name[0]->name);
			//$task = $task_name[0]->name;
			$array_task =  (array) $task_name[0];
			//echo($array_task["0"]->name);
			//pre($array_task);

			//$key->task_name = 'abc';
			//pre($key->task_id);
		}

		//pre($list);

		$numberreport =  count($list);

		$list_task = $this->report_model->get_task(67);
		//pre($list_task);

		$this->data_layout['list'] = $list;
		$this->data_layout['numberreport'] = $numberreport;
		$this->data_layout['list_task'] = $list_task;
		//$female = $this->mission_model->get_sum('id', $where = array('sex' =>'0'));
		//$male = $this->mission_model->get_total($where = array('sex' =>'0'));

		$this->data_layout['temp'] = 'report/index';
	    $this->load->view('layout/main', $this->data_layout);
	}
}