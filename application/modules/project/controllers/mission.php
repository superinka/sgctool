<?php
Class Mission extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login/login_model','',TRUE);
		$this->load->model('home/home_model');
		$this->load->model('home/acc_model');
		$this->load->model('home/role_model');
		$this->load->model('home/department_model');
		$this->load->model('project_model');
		$this->load->model('project_user_model');
		$this->load->model('mission_model');
		$this->load->model('proportion_department_model');

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
		
		//lay id du an can sua
		$project_id = $this->uri->segment(4);
		$project_id = intval($project_id);
		$this->data_layout['project_id'] = $project_id;

		$info_project = $this->project_model->get_info($project_id);
		$this->data_layout['info_project'] = $info_project;

		//$info_proportion_department = $this->proportion_department_model->get_info($project_id);

		//pre($info_project);

		$list_emp = $this->project_user_model->get_columns('tb_project_user',$where=array('project_id'=>$project_id));
		$list_proportion_department = $this->proportion_department_model->get_columns('tb_proportion_department',$where=array('project_id'=>$project_id));

		//$department_id = $this->get_column('tb_department', 'id',$where=array('name'=>$department_name));

		//$users_id = $this->get_column('tb_role', 'user_id',$where=array('department_id'=>$department_id[0]->department_id));
		$total_member = 0;

		if ($list_emp!=null) {
				foreach ($list_emp as $k => $v) {

				$emp_name = $this->home_model->get_column('tb_employee', 'fullname',$where=array('user_id'=>$v->user_id));
				$info_role = $this->role_model->get_column('tb_role', 'department_id',$where=array('user_id'=>$v->user_id));
				$info_room = $this->department_model->get_info($info_role[0]->department_id);

				$list_emp['member'][] =  array($emp_name[0]->fullname,  $info_room->name);

				$list_emp['room-member'][] = $info_room->name;
				$list_emp['room-member'] = array_unique($list_emp['room-member']);
				$list_emp['room-member'] = array_values($list_emp['room-member']);


				$users_id = $this->role_model->get_column('tb_role', 'user_id',$where=array('department_id'=>$info_role[0]->department_id));
					foreach ($users_id as $k => $v) {
						$info_user = $this->acc_model->get_info($v->user_id);
						if ($info_user->account_type==3) {
							$name = $this->home_model->get_column('tb_employee', 'fullname',$where=array('user_id'=>$info_user->id));
							$info_user->fullname = $name[0]->fullname;
							$list_emp['leader'][] = $name[0]->fullname;
							$list_emp['room-leader'][] = $info_room->name;
							$list_emp['room-leader'] = array_unique($list_emp['room-leader']);
							$list_emp['leader'] = array_unique($list_emp['leader']);
						}
					}

				}

				$total_member =  count($list_emp['leader']) + count($list_emp['member']);
				$total_room = count($list_emp['room-member']);

				$proportion = $this->proportion_department_model->get_columns('tb_proportion_department',$where=array('project_id'=>$project_id));
				//pre($proportion);
				if ($proportion==null) {$check =true;}
				if($proportion!=null) {$check=false;}
				foreach ($list_emp['room-member'] as $k => $v) {
					//echo $v['name'];
					//pre($proportion);
					//echo 100/$total_room;
					$list_emp['room-color'][$k] = color_room($v);
					if ($proportion==null) {$list_emp['proportion-room'][$k] = (100/$total_room);}
					else {
						if($proportion[$k]){
							$list_emp['proportion-room'][$k] = $proportion[$k]->proportion;
						}
						else {
							$list_emp['proportion-room'][$k] = 0;
							$proportion[$k] = array();
						}
					}
				}
				//pre($proportion);

		}

		//pre($list_emp);

		//echo $total_room;
		$this->data_layout['check'] = $check;
		$this->data_layout['total_member'] = $total_member;
		//$this->data_layout['total_room'] = $total_room;

		$this->data_layout['list_emp'] = $list_emp;

		$this->data_layout['temp'] = 'mission';
	    $this->load->view('layout/main', $this->data_layout);
	}

	function add_pro(){

		if ($this->data_layout['account_type']>2) {
			$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('project/index'));
		}

		else {
			$project_id = $this->uri->segment(4);
			$project_id = intval($project_id);

			//lay thong tin project

			$info_project = $this->project_model->get_info($project_id);
			$this->data_layout['info_project'] = $info_project;
			if(!$info_project) {
				$this->session->set_flashdata('message','Không tồn tại thông tin dự án');
				redirect(base_url('project/index'));
			}
			else {
				$list_emp = $this->project_user_model->get_columns('tb_project_user',$where=array('project_id'=>$project_id));
				//pre($list_emp);

				if ($list_emp!=null) {
					foreach ($list_emp as $k => $v) {

					$emp_name = $this->home_model->get_column('tb_employee', 'fullname',$where=array('user_id'=>$v->user_id));
					$info_role = $this->role_model->get_column('tb_role', 'department_id',$where=array('user_id'=>$v->user_id));
					$info_room = $this->department_model->get_info($info_role[0]->department_id);

					$list_emp['member'][] =  array($emp_name[0]->fullname,  $info_room->name);

					$list_emp['room-member'][] = $info_room->name;
					$list_emp['room-member'] = array_unique($list_emp['room-member']);
					$list_emp['room-member'] = array_values($list_emp['room-member']);


					$users_id = $this->role_model->get_column('tb_role', 'user_id',$where=array('department_id'=>$info_role[0]->department_id));
						foreach ($users_id as $k => $v) {
							$info_user = $this->acc_model->get_info($v->user_id);
							if ($info_user->account_type==3) {
								$name = $this->home_model->get_column('tb_employee', 'fullname',$where=array('user_id'=>$info_user->id));
								$info_user->fullname = $name[0]->fullname;
								$list_emp['leader'][] = $name[0]->fullname;
								$list_emp['room-leader'][] = $info_room->name;
								$list_emp['room-leader'] = array_unique($list_emp['room-leader']);
								$list_emp['leader'] = array_unique($list_emp['leader']);
							}
						}

					}
					$total_member =  count($list_emp['leader']) + count($list_emp['member']);
					$total_room = count($list_emp['room-member']);

					$proportion = $this->proportion_department_model->get_columns('tb_proportion_department',$where=array('project_id'=>$project_id));
					//pre($proportion);
					if ($proportion==null) {$check =true;}
					if($proportion!=null) {$check=false;}
					foreach ($list_emp['room-member'] as $k => $v) {
						//echo $v['name'];
						//pre($proportion);
						//echo 100/$total_room;
						$list_emp['room-color'][$k] = color_room($v);
						if ($proportion==null) {$list_emp['proportion-room'][$k] = (100/$total_room);}
						else {
						$list_emp['proportion-room'][$k] = $proportion[$k]->proportion;
						}
					}

					$c = count($list_emp['room-member']);

					if($this->input->post()){

						for ($i=0; $i < $c ; $i++) { 
							//echo $list_proportion_department[$i]->department;
							//
							$this->form_validation->set_rules('room['.$i.']', 'Trường ', 'trim|numeric',
								array('numeric' => '%s Phải là số')
								);
							//echo $i;
						}
						if($this->form_validation->run()){
							for ($i=0; $i < $c ; $i++) { 
								$a[] = $this->input->post('room['.$i.']');
								//echo $i;
								$list_emp['new'][$i]['pro'] = $a[$i];
								$department_id = $this->department_model->get_column('tb_department', 'id',$where=array('name'=>$list_emp['room-member'][$i]));
								$list_emp['new'][$i]['department_id'] = $department_id[0]->id;
								$list_emp['new'][$i]['project_id'] = $project_id;

							}

							//pre($list_emp);

							foreach ($list_emp['new'] as $k => $v) {
								$data = array(
									'department_id' => $v['department_id'],
									'proportion'    => $v['pro'],
									'project_id'    => $v['project_id'],
									'update_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
								);

								//pre($data);
								if($this->proportion_department_model->create($data)) {
									$this->session->set_flashdata('message','Sửa dữ liệu thành công');
								}
								else {
									$this->session->set_flashdata('message','Sửa dữ liệu không thành công');
									redirect(base_url('project/index'));
								}
							}

							redirect(base_url('project/index'));
						}
					}


				

				}

				//pre($list_emp);
			}

		}


		$this->data_layout['list_emp'] = $list_emp;
		$this->data_layout['temp'] = 'project/add_pro';
	    $this->load->view('layout/main', $this->data_layout);

	}


	function edit(){
		if ($this->data_layout['account_type']>2) {
			$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('project/index'));
		}

		else {

			//lay id du an can sua
			$project_id = $this->uri->segment(3);
			$project_id = intval($project_id);

			$now_user_id = $this->data_layout['id'];


			//lay thong tin project

			$info_project = $this->project_model->get_info($project_id);
			if(!$info_project) {
				$this->session->set_flashdata('message','Không tồn tại thông tin dự án');
				redirect(base_url('project/index'));
			}

			else {
				$now_project_shortname = $info_project->short_name;

				//echo $now_project_shortname;

				$this->data_layout['info_project'] = $info_project;

				$tab = 'tb_role'; $col = 'department_id';

				$list_department_employee = $this->role_model->get_column_distinct($tab,$col);

				foreach ($list_department_employee as $key => $value) {
					# code...

					$dip = $value->department_id;
					$dname = $this->department_model->get_column('tb_department', 'name',$where=array('id'=>$dip));
					$list_emp = $this->role_model->get_column('tb_role','user_id',$where=array('department_id'=>$dip));
					$value->department_name = $dname[0]->name;


					foreach ($list_emp as $k => $v) {
						# code...

						$u = $this->home_model->get_column(
							'tb_employee',
							array('user_id', 'fullname'), 
							$where=array('user_id'=>$v->user_id)
						);
						$acc_type = $this->acc_model->get_column('tb_user', 'account_type',$where=array('id'=>$v->user_id));
						//$value->emp[] = $u[0];
						if ($acc_type[0]->account_type==4) {
							# code...
							$value->emp[] = $u[0];
							//unset($list_department_employee[$key]);
						}
						
					}
					//pre($list_emp);
				}

				$list_emp = $this->project_user_model->get_columns('tb_project_user',$where=array('project_id'=>$project_id));

				if ($list_emp!=null) {
						foreach ($list_emp as $k => $v) {

						$emp_name = $this->home_model->get_column('tb_employee', 'fullname',$where=array('user_id'=>$v->user_id));
						//pre($room_name[0]->name);
						$v->emp_name = $emp_name[0]->fullname;
						//$this->data_layout['room_name'] = $room_name;
						//pre($room_name);
						}

					}

				//pre($list_emp);
				$this->data_layout['list_emp'] = $list_emp;

				if($this->input->post()){
					$this->form_validation->set_rules('project_name', 'Tên dự án', 'trim');
					$this->form_validation->set_rules('description', 'description', 'trim');
					
					$this->form_validation->set_rules('start_date', 'Ngày bắt đầu');
					$this->form_validation->set_rules('end_date', 'Ngày kết thúc');
					$this->form_validation->set_rules('status', 'Tình Trạng');
					$this->form_validation->set_rules('progress', 'Tiến độ', 'numeric',
						array('numeric' => '%s Phải là số')
					);

					$short_name = $this->input->post('short_name');

					if($short_name!=$now_project_shortname) {
						$this->form_validation->set_rules('short_name', 'Tên viết tắt', 'trim|callback_check_shortname');	
					}

					if($this->form_validation->run()){

						

						$project_name = $this->input->post('project_name');
						$description = $this->input->post('description');
						$status = $this->input->post('status');
						$progress = $this->input->post('progress');
						$start_date = $this->input->post('start_date');
						$end_date = $this->input->post('end_date');


						$start_date = strtotime($start_date);
						$newformat_start_date = date('Y-m-d',$start_date);
						$end_date = strtotime($end_date);
						$newformat_end_date = date('Y-m-d',$end_date);

						$data_project = array(
							'project_name'  => $project_name,
							'description'   => $description,
							'short_name'    => $short_name,
							'start_date'    => $newformat_start_date,
							'end_date'      => $newformat_end_date,
							'status'        => $status,
							'update_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
							'update_by'     => $now_user_id,
							'progress'      => $progress
						);

						$project_users = $this->input->post('project_users');

						//$uid = $this->acc_model->get_column('tb_user', 'id',$where=array('username'=>$username));

						//pre($project_users);

						if($this->project_model->update($project_id, $data_project)) {

							$this->session->set_flashdata('message','Sửa dữ liệu thành công');

							$pid = $this->project_user_model->get_column('tb_project_user', 'id',$where=array('project_id'=>$project_id));

							//pre($pid);

							if ($pid) {

								foreach ($pid as $k => $v) {

									$info_project_user = $this->project_user_model->get_info($v->id);
									//echo $v->id;
									//$role_id = intval($v->id);
									$this->project_user_model->delete($v->id);
								}
							}
							
							for ($i=0; $i < count($project_users) ; $i++) { 
								# code...

								//echo $i;
								$data_project_user = array(
									'project_id'     => $project_id,
									'user_id'     => $project_users[$i],
									'update_time'  => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s')
								);

								if($this->project_user_model->create($data_project_user)) {

									$this->session->set_flashdata('message','Sửa dữ liệu thành công');
									//redirect(base_url('project/index'));

								}

								else {
										

									$this->session->set_flashdata('message','Sửa dữ liệu không thành công');

								}
							}

						redirect(base_url('project/index'));

						
						}
						else {
							$this->session->set_flashdata('message','Sửa dữ liệu không thành công');
							redirect(base_url('project/index'));
						}

						//redirect(base_url('project/index'));
					}
				}


				//pre($list_department_employee);
				$this->data_layout['list_department_employee'] = $list_department_employee;
			}



		}

		$this->data_layout['temp'] = 'edit';
	    $this->load->view('layout/main', $this->data_layout);

	}

	function delete(){
		if ($this->data_layout['account_type']>2) {
			$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('project/index'));
		}
		else {
			//lay id du an can sua
			$project_id = $this->uri->segment(3);
			$project_id = intval($project_id);

			$now_user_id = $this->data_layout['id'];


			//lay thong tin project

			$info_project = $this->project_model->get_info($project_id);

			if(!$info_project) {
				$this->session->set_flashdata('message','Không tồn tại thông tin dự án');
				redirect(base_url('project/index'));
			}
			else {
				$pid = $this->project_model->get_column('tb_project', 'id',$where=array('id'=>$project_id));
				$info_project_user = $this->project_user_model->get_info($pid[0]->id);

				if($info_project_user) {
					$this->project_model->delete($project_id);

					$puid = $this->role_model->get_column('tb_project_user', 'id',$where=array('project_id'=>$project_id));

					foreach ($puid as $key => $value) {
						# code...
						$this->project_user_model->delete($value->id);
					}
				}
				else {
					$this->project_model->delete($project_id);
					$this->session->set_flashdata('message','Xóa dữ liệu thành công ');
					redirect(base_url('project/index'), 'refresh');
				}

				$this->session->set_flashdata('message','Xóa dữ liệu thành công ');
			}

			redirect(base_url('project/index'), 'refresh');

		}
	}

	private function check_shortname($short_name){
		$short_name = $this->input->post('short_name');
		$where = array('short_name' => $short_name, );
		if($this->project_model->check_exists($where)) {
			$this->form_validation->set_message('check_shortname', 'Tên viết tắt này đã tồn tại !');
			return false;
		}
		else return TRUE;

	}
}