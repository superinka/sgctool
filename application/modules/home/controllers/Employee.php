<?php
Class Employee extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login/login_model','',TRUE);
		$this->load->model('home/home_model');
		$this->load->model('home/employee_model');
		$this->load->model('home/acc_model');

		if($this->session->userdata('logged_in'))
	    {
	      $session_data = $this->session->userdata('logged_in');
	      $this->data_layout['username'] = $session_data['username'];
	      $this->data_layout['id'] = $session_data['id'];
	      $id = $this->data_layout['id'];
	      $this->data_layout['account_type'] = $session_data['account_type'];
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
		$account_type = $this->data_layout['account_type'];

		$input = array();
		$where = array('user_id' => $id);

		$input['where']['created_by'] = $id;
		$total = $this->employee_model->get_total();


		$list_employee = $this->employee_model->get_employees($id);

		$numberemployee = count($list_employee);

		
		//pre($list_project['0']->pm);

		foreach ($list_employee as $key => $value) {
			# code...
			$list_employee[$key] = (array) $value;
			$pm_id = $value->pm;
			$pm_name = $this->home_model->get_pm_name($pm_id);
			$list_employee[$key]['pm_name'] = (array) $pm_name[0];
		}

		//pre($list_project);

		$this->data_layout['total'] = $total;
		//$this->data_layout['numberproject'] = $numberproject;

		//$list = $this->project_model->get_list();
		//$this->data_layout['list'] = $list;
		//$this->data_layout['list_project'] = $list_project;

		$list_center = $this->employee_model->get_columns('tb_department',$where=array('parent_id'=>'1'));
		

		foreach ($list_center as $key => $value) {
			# code...
			$list_center[$key] = (array) $value;
			$room_id = $value->id;
			$list_room = $this->employee_model->get_columns('tb_department',$where=array('parent_id'=>$room_id));
			//pre($list_room);
			foreach ($list_room as $k => $v) {
				$list_center[$key]['child_room'][] =(array)$v;
				//pre($v);
			}
			//$pm_name = $this->home_model->get_pm_name($pm_id);
			
		}

		$total_acc = $this->acc_model->get_total();
		$this->data_layout['total_acc'] = $total_acc;

		//pre($list_center[0]['child_room']['name']);
		//pre($list_center);

		$this->data_layout['list_center'] = $list_center;


		$this->data_layout['temp'] = 'home/employee';
	    $this->load->view('layout/main', $this->data_layout);
	}

	function add(){

		$id = $this->data_layout['id'];

		if($this->input->post()){
			
			$this->form_validation->set_rules('nusername', 'Tên');
			$this->form_validation->set_rules('fullname', 'Số Điện Thoại', 'is_numeric');
			
			
			
			if($this->form_validation->run()){
				$name = $this->input->post('nusername');
				$fullname = $this->input->post('fullname');

				
				//echo $diachitinh;
				
				$data=array(
						'username' => $name,
						'fullname' => $fullname,
				);

				pre($data);
				
				

			}
		}
		
		// $c = array();
		// $c['order'] = array('canchi_nam','DESC');
		// $canchi = $this->canchi_model->get_list($c);
		// $this->data_layout['canchi'] = $canchi;
		//$this->data_layout['temp'] = 'home/add_employee';
		//$this->load->view('layout/main', $this->data_layout);

	}
}