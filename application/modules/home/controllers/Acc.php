<?php
Class Acc extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login/login_model','',TRUE);
		$this->load->model('home/home_model');
		$this->load->model('home/employee_model');
		$this->load->model('home/acc_model');
		$this->load->model('home/role_model');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red; font-weight:600">', '</div>'); 

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

		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

		$total_acc = $this->acc_model->get_total();
		$this->data_layout['total_acc'] = $total_acc;

		$input = array();
		$list_acc = $this->acc_model->get_list($input);
		$this->data_layout['list_acc'] = $list_acc;

		//pre($list_center[0]['child_room']['name']);
		//pre($list_center);

		//$this->data_layout['list_center'] = $list_center;


		$this->data_layout['temp'] = 'home/acc';
	    $this->load->view('layout/main', $this->data_layout);
	}

	function add(){

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

		$this->data_layout['list_center'] = $list_center;

		if($this->input->post()){
			
			$this->form_validation->set_rules('nusername', 'Tên', 'trim|callback_check_username');
			$this->form_validation->set_rules('fullname', 'Tên đầy đủ', 'trim');
			$this->form_validation->set_rules('npassword', 'Mật khẩu', 'trim|min_length[8]');
			$this->form_validation->set_rules('nemail', 'Email', 'trim|valid_email');
			$this->form_validation->set_rules('nphone', 'Số điện thoại', 'trim|is_numeric');
			$this->form_validation->set_rules('nskype', 'Skype', 'trim');
			$this->form_validation->set_rules('nfacebook', 'Link facebook', 'trim');
			$this->form_validation->set_rules('nbirthday', 'Ngày sinh');
			$this->form_validation->set_rules('account_type', 'Cấp nhân viên');
			
			if($this->form_validation->run()){
				$username = $this->input->post('nusername');
				$fullname = $this->input->post('nfullname');
				$password = $this->input->post('npassword');
				$email = $this->input->post('nemail');
				$phone = $this->input->post('nphone');
				$skype = $this->input->post('nskype');
				$facebook = $this->input->post('nfacebook');
				$birthday = $this->input->post('nbirthday');
				$account_type = $this->input->post('account_type');
				$sex = $this->input->post('sex');
				$address = $this->input->post('address');

				$time = strtotime($birthday);
				$newformat_birthday = date('Y-m-d',$time);



				$password = md5($password);

				//$rooms = array("chicken","steak","turkey");

				$rooms = $this->input->post('rooms');

				$f2 = $this->input->post('rooms');

				$f1 = $this->input->post('room');

				$f3 = $this->input->post('lead');

				//pre($f3);

				if ($account_type==4) {
					$fn = array('0' => $f1);
				}

				if ($account_type==3) {
					$fn = $f2;
				}
				if ($account_type==2) {
					$fn = array('0'=>'1');
				}
				//pre($f1);
				
				//pre ($fn);
				
				$data=array(
						'username'    => $username,
						'fullname'    => $fullname,
						'password'    => $password,
						'email'       => $email,
						'phone'       => $phone,
						'skype'       => $skype,
						'facebook'    => $facebook,
						'birthday'    => $birthday,
						'account_type'=> $account_type,
						'rooms'       => $fn
				);

				//pre($data);

				$data_user = array(
						'username'     => $username,
						'password'     => $password,
						'create_date'  => date_create('now')->format('Y-m-d'),
						'status'       => '1',
						'account_type' => $account_type
					);

				//pre($data_user);

				if($this->acc_model->create($data_user)){
					
					$uid = $this->acc_model->get_column('tb_user', 'id',$where=array('username'=>$username));

					//echo $uid[0]->id;

					$data_employee = array(
							'user_id'  => $uid[0]->id,
							'fullname' => $fullname,
							'email'    => $email,
							'phone'    => $phone,
							'skype'    => $skype,
							'facebook' => $facebook,
							'birthday' => $newformat_birthday,
							'sex'      => $sex,
							'address'  => $address
						);

					//pre($data_employee);

					if($this->employee_model->create($data_employee)){

						$eid = $this->acc_model->get_column('tb_user', 'id',$where=array('username'=>$username));

						//pre($fn);

						for ($i=0; $i < count($fn) ; $i++) { 
							# code...
							$data_role = array(
								'user_id'     => $uid[0]->id,
								'department_id'     => $fn[$i],
								'desciption'  => ''
							);

							//pre($data_role);

							if($this->role_model->create($data_role)) {

								$this->session->set_flashdata('message','Thêm dữ liệu thành công');
							}

							else {
								

								$this->employee_model->delete($eid[0]->id);

								$this->session->set_flashdata('message','Thêm dữ liệu không thành công');
							}
						}


						$this->session->set_flashdata('message','Thêm dữ liệu thành công');


					}

					else {

						$this->acc_model->delete($uid[0]->id);

						$this->session->set_flashdata('message','Thêm dữ liệu không thành công');
					}

					
				}
				else {
					$this->session->set_flashdata('message','Thêm dữ liệu không thành công');
				}
				
				redirect(base_url('home/acc'));
				
				

			}
		}
		
		// $c = array();
		// $c['order'] = array('canchi_nam','DESC');
		// $canchi = $this->canchi_model->get_list($c);
		// $this->data_layout['canchi'] = $canchi;

		$this->data_layout['temp'] = 'home/add_acc';
		$this->load->view('layout/main', $this->data_layout);

	}

	function check_username($nusername){
		$nusername = $this->input->post('nusername');
		$where = array('username' => $nusername, );
		if($this->acc_model->check_exists($where)) {
			$this->form_validation->set_message('check_username', 'Tên đăng nhập đã tồn tại !');
			return false;
		}
		else return TRUE;

	}
}