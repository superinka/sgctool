<?php
Class My_Report extends MY_Controller {
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
		//$this->load->view('home/index');

		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

	    $my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $where = array('user_id' => $my_id);
	    $input = array();
	    $input['where']['user_id'] = $my_id;



		$this->data_layout['temp'] = 'index';
	    $this->load->view('layout/main', $this->data_layout);
	}

	function add_report() {

		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

	    $my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $today = date("Y-m-d"); 
	    $this->data_layout['today'] = $today;

	    //echo $today; 

	    $input = array();
	    $input['where']['create_by'] = $my_id;
	    $input['where']['create_date'] = $today;

	    $list_report_today = $this->my_report_model->get_list($input);
	    //pre($list_report_today);

	    $this->data_layout['list_report_today'] = $list_report_today;

	    $input_task = array();
	    $input_task['where']['create_by'] = $my_id;
	    $input_task['where']['status'] = 0;

	    $list_task_active  = $this->task_model->get_list($input_task);
	    $this->data_layout['list_task_active'] = $list_task_active;

	    //pre($list_task_active);

		$this->data_layout['temp'] = 'add_report';
	    $this->load->view('layout/main', $this->data_layout);
	}

	function check_report(){
		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

	    $my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $today = date("Y-m-d"); 
	    $this->data_layout['today'] = $today;

	    if ($this->data_layout['account_type'] > 3) {
			$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('my_report/index'));
		}
		else {

			$input = array();
		    $input['where']['review_status'] = 0;
		    $input['where']['create_date'] = $today;
			$list_report_nid_check_today = $this->my_report_model->get_list($input);

			$list_room_manager = array();

			if($this->data_layout['account_type'] = 3) {
				$list_room = $this->role_model->get_columns('tb_role',$where = array('user_id'=>$my_id));
				if ($list_room==null) {
					$this->session->set_flashdata('message','Bạn không quản lí phòng ban nào !');
					redirect(base_url('my_report/index'));
				}
				//pre($list_room);

				if ($list_room!=null) {
					foreach ($list_room as $key => $value) {
						$department_id = $value->department_id;
						$department_name = $this->department_model->get_info($department_id,'name');
						$department_name = $department_name->name;
						$list_room_manager[$key]['department_name'] = $department_name;
						$list_room_manager[$key]['department_id'] = $department_id;

						$list_pro = $this->proportion_department_model->get_columns('tb_proportion_department',$where = array('department_id'=>$department_id));
						if($list_pro!=null) {
							foreach ($list_pro as $k => $v) {
								$project_id = $v->project_id;
								$project_name = $this->project_model->get_info($project_id,'project_name');
								$project_name = $project_name->project_name;
								$v->project_name = $project_name;
								$list_room_manager[$key]['project'][] = $v;


								$list_miss = $this->mission_model->get_columns('tb_mission',$where = array('project_id'=>$project_id, 'status'=>'1'));
								//$v->mission = $list_miss;
								//$list_room_manager[$key]['mission'][] = $v;
								//pre($list_miss);
								if($list_miss!=null) {
									for ($i=0;  $i < count($list_miss)  ; $i++)  { 
										$mission_id = $list_miss[$i]->id;
										$uid = $this->mission_user_model->get_columns('tb_mission_user',$where=array('mission_id'=>$mission_id));
										//pre($uid);
										$uid = $uid[0]->user_id;

										if($this->role_model->check_exists($where=array('user_id'=>$uid, 'department_id'=>$department_id))==true){
											$mission_for_id = $uid;
											$mission_for_name = $this->home_model->get_column('tb_employee','fullname',$where=array('user_id'=>$mission_for_id));
											$list_miss[$i]->mission_for = $mission_for_name[0]->fullname;
											$list_miss[$i]->task = $this->task_model->get_columns('tb_task',$where=array('mission_id'=>$mission_id, 'status'=>'0'));
											$v->list_miss[] = $list_miss[$i];
										}
									}
								}

							}
						}
					}
				}
			//pre($list_room_manager);
			$this->data_layout['list_room_manager'] = $list_room_manager;
			}
			
		}

		$this->data_layout['temp'] = 'check_report';
	    $this->load->view('layout/main', $this->data_layout);
	}
}