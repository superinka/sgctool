<?php
Class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login/login_model','',TRUE);
		$this->load->model('home_model');
		$this->load->model('home/acc_model');
		$this->load->model('home/role_model');
		$this->load->model('home/department_model');

		global $account_type;

		if($this->session->userdata('logged_in'))
	    {
	      $session_data = $this->session->userdata('logged_in');
	      $this->data_layout['username'] = $session_data['username'];
	      $this->data_layout['account_type'] = $session_data['account_type'];
	      $this->data_layout['id'] = $session_data['id'];
	      //echo $session_data['account_type'];
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


		$total = $this->home_model->get_total();
		$this->data_layout['total'] = $total;

		$input['where'] = array('sex'=>'1');
		$where = array('sex' => '1');
		//$female = $this->home_model->get_sum('id', $where = array('sex' =>'0'));
		//$male = $this->home_model->get_sum($field='sex',$where);
		$male = $this->home_model->get_total($input);
		$female = $total - $male;

		
		//$account_type = $session_data['account_type'];

		$input = array();
		$list_employee = $this->home_model->get_list($input);
		$this->data_layout['list_employee'] = $list_employee;
		//pre($list_employee);

		foreach ($list_employee as $key => $value) {
			# them account_type
			$list_employee[$key] = (array) $value;
			$acc_type = $this->acc_model->get_column('tb_user', 'account_type',$where=array('id'=>$value->user_id));
			$list_employee[$key]['account_type'] = (string) $acc_type[0]->account_type;

			# them rooms
			$list_room = $this->role_model->get_columns('tb_role',$where=array('user_id'=>$value->user_id));
			//pre($list_room);
			if($list_room==null) {$list_employee[$key]['rooms'][] = null;}
			else {
				foreach ($list_room as $k => $v) {

					$room_name = $this->department_model->get_column('tb_department', 'name',$where=array('id'=>$v->department_id));
					//pre($room_name[0]->name);
					$list_employee[$key]['rooms'][] = (string) $room_name[0]->name;
				}

			}

		}

		//pre($list_employee);
		$this->data_layout['list_employee'] = $list_employee;

		$this->data_layout['male'] = $male;
		$this->data_layout['female'] = $female;

		$this->data_layout['temp'] = 'index';
	    $this->load->view('layout/main', $this->data_layout);
	}

	function delete(){
		if ($this->data_layout['account_type']!=1) {
			$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
		}

		else {
			// lay id can xoa
			$user_id = $this->uri->segment(3);
			$user_id = intval($user_id);
			//echo $user_id;
			// lay thong tin user can xoa
			$info_user = $this->acc_model->get_info($user_id);

			if(!$info_user) {
				$this->session->set_flashdata('message','Không tồn tại thông tin tài khoản');
			}

			else {
				$eid = $this->home_model->get_column('tb_employee', 'id',$where=array('user_id'=>$user_id));

				$info_employee = $this->home_model->get_info($eid[0]->id);

				if($info_employee) {
					//pre($info_employee);

					$this->acc_model->delete($user_id);

					$this->home_model->delete($eid[0]->id);

					$rid = $this->role_model->get_column('tb_role', 'id',$where=array('user_id'=>$user_id));

					$this->session->set_flashdata('message','Xóa dữ liệu thành công ');

					foreach ($rid as $k => $v) {

						$info_role = $this->role_model->get_info($v->id);
						//echo $v->id;
						$role_id = intval($v->id);
						$this->role_model->delete($role_id);

						if($info_role) {
							//$role_id = intval($v->id);
							//echo $role_id;
							//$this->role_model->delete($role_id);
						}
					}

				}
				else {
					$this->session->set_flashdata('message','Không tồn tại thông tin tài khoản');
				}
				//pre($info_employee);
			}
		}

		//pre($info);

		redirect(base_url('home/index'), 'refresh');

	}

	function edit(){
		if ($this->data_layout['account_type'] > 2) {
			$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('home/index'));
		}

		else {
			// lay id can xoa
			$user_id = $this->uri->segment(3);
			$user_id = intval($user_id);
			//echo $user_id;
			// lay thong tin user can xoa
			$info_user = $this->acc_model->get_info($user_id);

			if(!$info_user) {
				$this->session->set_flashdata('message','Không tồn tại thông tin tài khoản');
				redirect(base_url('home/index'));
			}
			else {
				$this->data_layout['info_user'] = $info_user;

				$eid = $this->home_model->get_column('tb_employee', 'id',$where=array('user_id'=>$user_id));

				$info_employee = $this->home_model->get_info($eid[0]->id);

				if(!$info_employee) {
					$this->session->set_flashdata('message','Không tồn tại thông tin tài khoản');
					//redirect(base_url('home/index'), 'refresh');
				}

				else {
					//pre($info_employee);
					$this->data_layout['info_employee'] = $info_employee;

					$rid = $this->role_model->get_column('tb_role', 'id',$where=array('user_id'=>$user_id));

					$list_room = $this->role_model->get_columns('tb_role',$where=array('user_id'=>$user_id));
					//pre($list_room);

					if ($list_room!=null) {
						foreach ($list_room as $k => $v) {

						$room_name = $this->department_model->get_column('tb_department', 'name',$where=array('id'=>$v->department_id));
						//pre($room_name[0]->name);
						$v->department_name = $room_name[0]->name;
						//$this->data_layout['room_name'] = $room_name;
						//pre($room_name);
						}

					}
					//pre($list_room);
					$this->data_layout['list_room'] = $list_room;


				}
			}

			$list_center = $this->home_model->get_columns('tb_department',$where=array('parent_id'=>'1'));

			foreach ($list_center as $key => $value) {
				# code...
				$list_center[$key] = (array) $value;
				$room_id = $value->id;
				$list_room = $this->home_model->get_columns('tb_department',$where=array('parent_id'=>$room_id));
				//pre($list_room);
				foreach ($list_room as $k => $v) {
					$list_center[$key]['child_room'][] =(array)$v;
					//pre($v);
				}
				//$pm_name = $this->home_model->get_pm_name($pm_id);
				
			}

			$this->data_layout['list_center'] = $list_center;

			if($this->input->post()){

				$this->form_validation->set_rules('username', 'Tên', 'trim|callback_check_username');
				$this->form_validation->set_rules('fullname', 'Tên đầy đủ', 'trim');
				
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
				$this->form_validation->set_rules('phone', 'Số điện thoại', 'trim|is_numeric');
				$this->form_validation->set_rules('skype', 'Skype', 'trim');
				$this->form_validation->set_rules('facebook', 'Link facebook', 'trim');
				$this->form_validation->set_rules('birthday', 'Ngày sinh');
				$this->form_validation->set_rules('account_type', 'Cấp nhân viên');

				$password = $this->input->post('password');

				if($password) {
					$this->form_validation->set_rules('password', 'Mật khẩu', 'trim|min_length[8]');
				}


				if($this->form_validation->run()){
					$username = $this->input->post('username');
					$fullname = $this->input->post('fullname');
					$password = $this->input->post('password');
					$email = $this->input->post('email');
					$phone = $this->input->post('phone');
					$skype = $this->input->post('skype');
					$facebook = $this->input->post('facebook');
					$birthday = $this->input->post('birthday');
					$account_type_now = $this->input->post('account_type');
					$sex = $this->input->post('sex');
					$address = $this->input->post('address');
					$status = $this->input->post('status');


					

					$time = strtotime($birthday);
					$newformat_birthday = date('Y-m-d',$time);

					$data_user = array(
						'update_time'  => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
						'status'       => $status,
						'account_type' => $account_type_now,
						'update_by'    => $this->data_layout['id']
					);

					//pre($data_user);

					if($password) {
						$password = md5($password);
						$data_user['password'] = $password;
					}

					$rooms = $this->input->post('rooms');

					$f2 = $this->input->post('rooms');

					$f1 = $this->input->post('room');

					$f3 = $this->input->post('lead');

					//pre($f3);

					if ($account_type_now==4) {
						$fn = array('0' => $f1);
					}

					if ($account_type_now==3) {
						$fn = $f2;
					}
					if ($account_type_now==2) {
						$fn = array('0'=>'1');
					}

					if($this->acc_model->update($user_id, $data_user)) {

						$uid = $this->acc_model->get_column('tb_user', 'id',$where=array('username'=>$username));

						$empid = $this->home_model->get_column('tb_employee', 'id', $where=array('user_id'=>$user_id));



						//echo $uid[0]->id;

						$data_employee = array(
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

						//pre($fn);

						if($this->home_model->update($empid[0]->id,$data_employee)){


							$rid = $this->role_model->get_column('tb_role', 'id',$where=array('user_id'=>$user_id));

							if ($rid) {

								foreach ($rid as $k => $v) {

									$info_role = $this->role_model->get_info($v->id);
									//echo $v->id;
									$role_id = intval($v->id);
									$this->role_model->delete($role_id);
								}
							}

							//pre($fn);

							for ($i=0; $i < count($fn) ; $i++) { 
								# code...

								//echo $i;
								$data_role = array(
									'user_id'     => $uid[0]->id,
									'department_id'     => $fn[$i],
									'desciption'  => ''
								);

								//pre($data_role);


								if($this->role_model->create($data_role)) {

									$this->session->set_flashdata('message','Sửa dữ liệu thành công');

								}

								else {
									

									$this->session->set_flashdata('message','Sửa dữ liệu không thành công');

								}
								
							}


							redirect(base_url('home/acc'));
							//pre($data_role);


						}
						else {
							$this->session->set_flashdata('message','Sửa dữ liệu không thành công');
							redirect(base_url('home/acc'));
						}
					}

					else {
						$this->session->set_flashdata('message','Sửa dữ liệu không thành công');
						redirect(base_url('home/acc'));
					}

					

					
				}

			}

			$this->data_layout['temp'] = 'edit';
	    	$this->load->view('layout/main', $this->data_layout);
		}

		//pre($info);

		//redirect(base_url('home/index'), 'refresh');

	}


	function check_username($username){
		$username = $this->input->post('nusername');
		$where = array('username' => $username, );
		if($this->acc_model->check_exists($where)) {
			$this->form_validation->set_message('check_username', 'Tên đăng nhập đã tồn tại !');
			return false;
		}
		else return TRUE;

	}

	function view() {

		// lay id can xem
		$user_id = $this->uri->segment(3);
		$user_id = intval($user_id);

		$now_id = $this->data_layout['id'];
		$now_id = intval($now_id);

		$this->data_layout['now_id'] = $now_id;

		$this->data_layout['user_id'] = $user_id;

		$info_user = $this->acc_model->get_info($user_id);

		//pre($info_user);

		if(!$info_user) {
			$this->session->set_flashdata('message','Không tồn tại thông tin tài khoản');
			redirect(base_url('home/index'), 'refresh');
		}

		else {

			$this->data_layout['info_user'] = $info_user;

			$eid = $this->home_model->get_column('tb_employee', 'id',$where=array('user_id'=>$user_id));

			$info_employee = $this->home_model->get_info($eid[0]->id);

			if(!$info_employee) {
				$this->session->set_flashdata('message','Không tồn tại thông tin tài khoản');
				redirect(base_url('home/index'), 'refresh');
			}

			else {
				//pre($info_employee);
				$this->data_layout['info_employee'] = $info_employee;

				$rid = $this->role_model->get_column('tb_role', 'id',$where=array('user_id'=>$user_id));

				$list_room = $this->role_model->get_columns('tb_role',$where=array('user_id'=>$user_id));

				if ($list_room!=null) {
					foreach ($list_room as $k => $v) {

					$room_name = $this->department_model->get_column('tb_department', 'name',$where=array('id'=>$v->department_id));
					//pre($room_name[0]->name);
					$v->department_name = $room_name[0]->name;
					//pre($room_name);
					}

				}

				$this->data_layout['list_room'] = $list_room;


			}

		}


		$this->data_layout['temp'] = 'profile';
	    $this->load->view('layout/main', $this->data_layout);
	}

	function logout()
    {
	    $this->session->unset_userdata('logged_in');
	    session_destroy();
	    redirect(base_url('login'), 'refresh');
    }

}