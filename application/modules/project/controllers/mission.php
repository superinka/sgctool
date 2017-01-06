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
		$this->load->model('task_model');
		$this->load->model('mission_user_model');
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

		if($this->data_layout['account_type']==3){
			$list_emp = $this->project_user_model->get_columns('tb_project_user',$where=array('project_id'=>$project_id));
			foreach ($list_emp as $key => $value) {
				$user_can_access[] = $value->user_id;

				$depart = $this->role_model->get_columns('tb_role',$where=array('user_id'=>$value->user_id));
				$department_id = $depart[0]->department_id;
				$room_can_access[] = $department_id;
			}

			//pre($room_can_access);
			$my_room_access = $this->role_model->get_columns('tb_role',$where=array('user_id'=>$id));
			$k = false;
			foreach ($my_room_access as $x => $y) {
				$my_room = $y->department_id;
				if(in_array($my_room, $room_can_access)){
					$k = true;
				}
			}

			if($k==false){
				$this->session->set_flashdata('message','Bạn không được vào dự án này');
				redirect(base_url('project/index'));	
			}
		}





		$info_project = $this->project_model->get_info($project_id);
		$this->data_layout['info_project'] = $info_project;

		if(!$info_project) {
			$this->session->set_flashdata('message','Không tồn tại dữ liệu');
			redirect(base_url('project/index'));	
		}
		else {
			//$info_proportion_department = $this->proportion_department_model->get_info($project_id);

			//pre($info_project);

			$list_emp = $this->project_user_model->get_columns('tb_project_user',$where=array('project_id'=>$project_id));
			$list_proportion_department = $this->proportion_department_model->get_columns('tb_proportion_department',$where=array('project_id'=>$project_id));



			//$department_id = $this->get_column('tb_department', 'id',$where=array('name'=>$department_name));

			//$users_id = $this->get_column('tb_role', 'user_id',$where=array('department_id'=>$department_id[0]->department_id));
			$total_member = 0;

			$check = true;
			if ($list_emp!=null) {
					foreach ($list_emp as $k => $v) {

					$emp_name = $this->home_model->get_columns('tb_employee',$where=array('user_id'=>$v->user_id));
					$info_role = $this->role_model->get_column('tb_role', 'department_id',$where=array('user_id'=>$v->user_id));
					$info_room = $this->department_model->get_info($info_role[0]->department_id);

					

					$list_emp['member'][] =  array($emp_name[0]->fullname,$emp_name[0]->user_id,$info_room->name);

					$all_mission_by_id = $this->mission_user_model->get_columns('tb_mission_user',$where=array('user_id'=>$emp_name[0]->user_id));
					//pre($all_mission_by_id);
					foreach ($all_mission_by_id as $ke => $va) {
						# code...
						$mission_by_project = $this->mission_model->get_columns('tb_mission',$where=array('id'=>$va->mission_id, 'project_id'=>$project_id));

						if($mission_by_project!=null) {
							$list_emp['member'][$k]['mission'][$ke]['name'] = $mission_by_project[0]->name;
							$list_emp['member'][$k]['mission'][$ke]['progress'] = $mission_by_project[0]->progress;
						}

						
					}



					$list_emp['room-member'][] = $info_room->name;
					$list_emp['room-member'] = array_unique($list_emp['room-member']);
					$list_emp['room-member'] = array_values($list_emp['room-member']);


					$users_id = $this->role_model->get_column('tb_role', 'user_id',$where=array('department_id'=>$info_role[0]->department_id));

						if($users_id!=null) {
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
							if(array_key_exists('leader', $list_emp)) {
								$total_member =  count($list_emp['leader']) + count($list_emp['member']);
							}
							if(array_key_exists('leader', $list_emp)==false) {
								$total_member = count($list_emp['member']);
							}
						}


					}

					
					$list_room_by_project = array();
					//
					//pre($list_room_by_project);

					//$total_member =  count($list_emp['leader']) + count($list_emp['member']);
					$total_room = count($list_emp['room-member']);

					$proportion = $this->proportion_department_model->get_columns('tb_proportion_department',$where=array('project_id'=>$project_id));
					//pre($proportion);
					if ($proportion==null) {$check =true;}
					if($proportion!=null) {$check=false;}

					//pre($proportion);
					foreach ($list_emp['room-member'] as $k => $v) {
						//pre($proportion[$k]);
						//echo $v['name'];
						//pre($proportion);
						//echo 100/$total_room;
						$list_emp['room-color'][$k] = color_room($v);
						if (!$proportion) {$list_emp['proportion-room'][$k] = (100/$total_room);}
						else if($proportion){
							//pre($proportion);
							//pre($proportion[$k]);
							if($proportion[$k]!=null){
								//echo '0';
								$list_emp['proportion-room'][$k] = $proportion[$k]->proportion;
								//pre($list_emp['proportion-room']);
								$list_room_by_project[$k]['proportion']  = $list_emp['proportion-room'][$k];

							}
							else if ($proportion[$k]==null){
								//echo '1';
								$list_emp['proportion-room'][$k] = 0;
								$list_room_by_project[$k]['proportion'] = 0;
							}
						}


					}
					//pre($list_room_by_project);

					foreach ($list_emp['room-member'] as $key => $value) {
						$list_room_by_project[$key]['name'] = $value;
						$department = $this->department_model->get_columns('tb_department',$where=array('name'=>$value));
						$department_id = $department[0]->id;
						$list_room_by_project[$key]['score'] =0;
						$list_room_by_project[$key]['department_id'] = $department_id;
						$score = 0;

						for ($i=0; $i < count($list_emp['member']) ; $i++) { 
							if(($value == $list_emp['member'][$i][2]) && ((array_key_exists('mission',$list_emp['member'][$i]))) ) {
								$list_room_by_project[$key]['mission'] = $list_emp['member'][$i]['mission'];
								$count_mission = count($list_emp['member'][$i]['mission']);
								//echo $count_mission;

							}
						}

					}

					//pre($list_room_by_project);

					//$score =0;

					foreach ($list_room_by_project as $key => $value) {
						$department_id = $value['department_id'];
						$mission_leaders = $this->mission_model->get_columns('tb_mission',$where=array('department_id'=>$department_id, 'project_id'=>$project_id, 'level'=>3));
						if($mission_leaders!=null) {
							foreach ($mission_leaders as $k => $v) {
								//$x = array($v->name, $v->progress);
								//$list_room_by_project[$key]['mission'] = $x;
								if(array_key_exists('mission',$value)==false) {
									$list_room_by_project[$key]['mission'][] = array('name'=>$v->name, 'progress'=>$v->progress);
								}

								if(array_key_exists('mission',$value)) {
									array_push($list_room_by_project[$key]['mission'], array('name'=>$v->name, 'progress'=>$v->progress));
								}

							}
							$list_room_by_project[$key]['mission-leader'] = $mission_leaders;
						}
					}

					//pre($list_room_by_project);

					foreach ($list_room_by_project as $key => $value) {
						$score =0;
						# code...
						if(array_key_exists('mission',$value)) {
							$count_mission = count($value['mission']);
							foreach ($value['mission'] as $k => $v) {
								# code...
								$a = intval($v['progress']);
								$score = $score + (1/$count_mission)*($a/100);
								
							}
							$list_room_by_project[$key]['score'] =$score;
						}

					}
					//pre($proportion);
					//pre($list_emp);
					//pre($list_room_by_project);
					$this->data_layout['list_room_by_project'] = $list_room_by_project;



			}


			$list_mission = $this->mission_model->get_columns('tb_mission',$where=array('project_id'=>$project_id,'status'=>'1'));

			//pre($list_mission);


			foreach ($list_mission as $key => $value) {
				$uid = $this->mission_user_model->get_column('tb_mission_user','user_id',$where=array('mission_id'=>$value->id));
				$uid = $uid[0]->user_id;
				$depart = $this->mission_model->get_column('tb_mission','department_id',$where=array('id'=>$value->id));
				$department_id = $depart[0]->department_id;
				$department_name = $this->department_model->get_info($department_id, 'name');

				$value->department_name = $department_name->name;

			}

			//pre($list_mission);

			$this->data_layout['list_mission'] = $list_mission;


			//pre($list_emp);

			//echo $total_room;
			$this->data_layout['check'] = $check;
			$this->data_layout['total_member'] = $total_member;
			//$this->data_layout['total_room'] = $total_room;

			$this->data_layout['list_emp'] = $list_emp;

		}

		

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

						if(array_key_exists('leader', $list_emp)) {
							$total_member =  count($list_emp['leader']) + count($list_emp['member']);
						}
						if(array_key_exists('leader', $list_emp)==false) {
							$total_member = count($list_emp['member']);
						}

					}
					
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

			if($this->data_layout['account_type']==3){

				$list_emp = $this->project_user_model->get_columns('tb_project_user',$where=array('project_id'=>$project_id));
				foreach ($list_emp as $key => $value) {
					$user_can_access[] = $value->user_id;

					$depart = $this->role_model->get_columns('tb_role',$where=array('user_id'=>$value->user_id));
					$department_id = $depart[0]->department_id;
					$room_can_access[] = $department_id;
				}

				//pre($room_can_access);
				$my_room_access = $this->role_model->get_columns('tb_role',$where=array('user_id'=>$now_user_id));
				$k = false;
				foreach ($my_room_access as $x => $y) {
					$my_room = $y->department_id;
					if(in_array($my_room, $room_can_access)){
						$k = true;
					}
				}

				if($k==false){
					$this->session->set_flashdata('message','Bạn không được vào dự án này');
					redirect(base_url('project/index'));	
				}
			}


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

			if($this->data_layout['account_type']==3){ 

				$list_emp = $this->project_user_model->get_columns('tb_project_user',$where=array('project_id'=>$project_id));
				foreach ($list_emp as $key => $value) {
					$user_can_access[] = $value->user_id;

					$depart = $this->role_model->get_columns('tb_role',$where=array('user_id'=>$value->user_id));
					$department_id = $depart[0]->department_id;
					$room_can_access[] = $department_id;
				}

				//pre($room_can_access);
				$my_room_access = $this->role_model->get_columns('tb_role',$where=array('user_id'=>$now_user_id));
				$k = false;
				foreach ($my_room_access as $x => $y) {
					$my_room = $y->department_id;
					if(in_array($my_room, $room_can_access)){
						$k = true;
					}
				}

				if($k==false){
					$this->session->set_flashdata('message','Bạn không được vào dự án này');
					redirect(base_url('project/index'));	
				}
			}

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


	function add_mission(){

		if ($this->data_layout['account_type']>3) {
			$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('project/index'));
		}
		else {

			//lay id du an can sua
			$project_id = $this->uri->segment(4);
			$project_id = intval($project_id);
			$this->data_layout['project_id'] = $project_id;
			$now_user_id = $this->data_layout['id'];

			if($this->data_layout['account_type']==3){

				$list_emp = $this->project_user_model->get_columns('tb_project_user',$where=array('project_id'=>$project_id));
				foreach ($list_emp as $key => $value) {
					$user_can_access[] = $value->user_id;

					$depart = $this->role_model->get_columns('tb_role',$where=array('user_id'=>$value->user_id));
					$department_id = $depart[0]->department_id;
					$room_can_access[] = $department_id;
				}

				//pre($room_can_access);
				$my_room_access = $this->role_model->get_columns('tb_role',$where=array('user_id'=>$now_user_id));
				$k = false;
				foreach ($my_room_access as $x => $y) {
					$my_room = $y->department_id;
					if(in_array($my_room, $room_can_access)){
						$k = true;
					}
				}

				if($k==false){
					$this->session->set_flashdata('message','Bạn không được vào dự án này');
					redirect(base_url('project/index'));	
				}

			}

			$info_project = $this->project_model->get_info($project_id);
			if(!$info_project) {
				$this->session->set_flashdata('message','Không tồn tại thông tin dự án');
				redirect(base_url('project/index'),'refresh');
			}

			else {
				// /pre($info_project);
				$this->data_layout['info_project'] = $info_project;
				$account_type = $this->data_layout['account_type'];

				$tab = 'tb_role'; $col = 'department_id';

				$list_department_employee_all = $this->role_model->get_column_distinct($tab,$col);

				$list_department_employee_by_id = $this->role_model->get_column('tb_role','department_id',$where=array('user_id'=>$now_user_id));

				if ($account_type==3) {
					$list_department_employee = $list_department_employee_by_id;
				}

				else if ($account_type<3) {
					$list_department_employee = $list_department_employee_all;
				}

				//pre($list_department_employee);
				$list_department_of_project = $this->proportion_department_model->get_column('tb_proportion_department','department_id',$where=array('project_id'=>$project_id));
				//pre($list_department_of_project);

				$list_department_id_of_project = array();
				foreach ($list_department_of_project as $key => $value) {
					$list_department_id_of_project[$key] = $value->department_id;
				}

				//pre($list_department_id_of_project);
				

				foreach ($list_department_employee as $key => $value) {
					if(in_array($value->department_id, $list_department_id_of_project)==false) {
						unset($list_department_employee[$key]);
					}
				}

				//pre($list_department_employee);

				foreach ($list_department_employee as $key => $value) {
					$department_info = $this->department_model->get_info($value->department_id);
					$value->department_name = $department_info->name;

					$list_user_id_of_department = $this->role_model->get_column('tb_role','user_id',$where=array('department_id'=>$department_info->id));

					foreach ($list_user_id_of_department as $k => $v) {
						$info_user = $this->home_model->get_columns('tb_employee',$where=array('user_id'=>$v->user_id));
						$level = $this->acc_model->get_columns('tb_user',$where=array('id'=>$v->user_id));
						$level = $level[0]->account_type;
						$info_user[0]->level = $level;
						$value->list_employee[$k] = $info_user[0];
					}
				}

				//pre($list_department_employee);

				$this->data_layout['list_department_employee'] = $list_department_employee;


				if($this->input->post()){

					$this->form_validation->set_rules('mission_name', 'Tên nhiệm vụ', 'trim');
					$this->form_validation->set_rules('description', 'description', 'trim');
					
					$this->form_validation->set_rules('start_date', 'Ngày bắt đầu');
					$this->form_validation->set_rules('end_date', 'Ngày kết thúc');
					$this->form_validation->set_rules('mission_user', 'Nhân viên');

					if($this->form_validation->run()){ 

						$mission_name = $this->input->post('mission_name');
						$description = $this->input->post('description');
						$start_date = $this->input->post('start_date');
						$end_date = $this->input->post('end_date');

						$mission_user_id_and_room = $this->input->post('mission_user');

						$m = explode('/', $mission_user_id_and_room);
						//pre($m);

						$mission_user_id = $m[0];
						$mission_department_id = $m[1];
						$ulevel = $m[2];

						$start_date = strtotime($start_date);
						$newformat_start_date = date('Y-m-d',$start_date);
						$end_date = strtotime($end_date);
						$newformat_end_date = date('Y-m-d',$end_date);

						$code = $project_id .rand(0,9999). md5($mission_name);
						$code = strtolower($code);

						//pre($code);

						$data_mission = array(
							'name'          => $mission_name,
							'description'   => $description,
							'start_date'    => $newformat_start_date,
							'end_date'      => $newformat_end_date,
							'update_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
							'update_by'     => $now_user_id,
							'create_by'     => $now_user_id,
							'create_date'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d'),
							'progress'      => '0',
							'status'        => '1',
							'project_id'    => $project_id,
							'code'          => $code,
							'department_id' => $mission_department_id,
							'level'         => $ulevel
						);

						//pre($data_mission);
						if($this->mission_model->create($data_mission)) {
							$this->session->set_flashdata('message','Tạo dữ liệu thành công');

							$mid = $this->mission_model->get_info_rule($where=array('code'=>$code));

							//pre($mid);

							$data_mission_user = array(
								'mission_id' => $mid->id,
								'user_id'    => $mission_user_id,
								'update_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
							);
							if($this->mission_user_model->create($data_mission_user)) {
								$this->session->set_flashdata('message','Tạo dữ liệu thành công');


							}
							else {
								$this->session->set_flashdata('message','Tạo dữ liệu không thành công');
							}
						}
						else {
							$this->session->set_flashdata('message','Tạo dữ liệu không thành công');
							redirect(base_url('project/mission/index/'.$project_id));
						}
					redirect(base_url('project/mission/index/'.$project_id));
					}

				}
			}
		}

		$this->data_layout['temp'] = 'add_mission';
	    $this->load->view('layout/main', $this->data_layout);

	}

	function view_detail(){

		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

	    $now_user_id = $this->data_layout['id'];
	    $account_type = $this->data_layout['account_type'];
	    $this->data_layout['now_user_id'] = $now_user_id;
		
		//lay id du an và mission cần sửa
		$mission_view_id = $this->uri->segment(5);
		$mission_view_id = intval($mission_view_id);

		$project_id = $this->uri->segment(4);
		$project_id = intval($project_id);
		$this->data_layout['project_id'] = $project_id;
		$info_project = $this->project_model->get_info($project_id);
		$this->data_layout['info_project'] = $info_project;

		$this->data_layout['mission_view_id'] = $mission_view_id;

		$info_mission = $this->mission_model->get_info($mission_view_id);
		$this->data_layout['info_mission'] = $info_mission;

		//pre($info_mission);

		if(!$info_mission) {
			$this->session->set_flashdata('message','Không tồn tại thông tin nhiệm vụ');
			redirect(base_url('project/mission/index/'.$project_id));
		}

		else {
			$info_mission_employee = $this->mission_user_model->get_columns('tb_mission_user',$where=array('mission_id'=>$mission_view_id));
			$mission_user_id = $info_mission_employee[0]->user_id;
			$mission_user_info = $this->home_model->get_columns('tb_employee',$where=array('user_id'=>$mission_user_id));
			$mission_user_name = $mission_user_info[0]->fullname;
			$mission_user_id = $mission_user_info[0]->user_id;
			$info_mission->mission_user_name = $mission_user_name;
			$info_mission->mission_user_id = $mission_user_id;
			//pre($info_mission);
		}


		$list_task = $this->task_model->get_columns('tb_task',$where=array('mission_id'=>$mission_view_id));;
		$this->data_layout['list_task'] = $list_task;

		$input = array();
		$input['where']['mission_id'] = $mission_view_id;
		$input['where']['create_by'] = $info_mission->mission_user_id;
		$count_task = $this->task_model->get_total($input);
		if($count_task==0) {
			$progress_task = 0;
		}

		$input_success = array();
		$input_success['where']['mission_id'] = $mission_view_id;
		$input_success['where']['create_by'] = $info_mission->mission_user_id;
		$input_success['where']['status'] = 100;
		$count_task_success = $this->task_model->get_total($input_success);

		if($count_task_success==0) {
			$progress_task = 0;
		}

		if($count_task>0 && $count_task_success>0) {
			$progress_task = (round($count_task_success/$count_task,2)*100);
		}

		//pre($list_task);

		
		

		$this->data_layout['progress_task'] = $progress_task;


		$this->data_layout['count_task'] = $count_task;

		$this->data_layout['temp'] = 'view_detail';
	    $this->load->view('layout/main', $this->data_layout);


	}

	function edit_mission(){

		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

	    $now_user_id = $this->data_layout['id'];
	    $account_type = $this->data_layout['account_type'];
	    $project_id = $this->uri->segment(4);

	    if ($account_type > 3) {
			$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('project/mission/index/'.$project_id));
		}
		else {

			//lay id du an can sua
			$mission_edit_id = $this->uri->segment(5);
			$mission_edit_id = intval($mission_edit_id);
			$project_id = intval($project_id);
			$this->data_layout['mission_id'] = $mission_edit_id;

			//echo $mission_id;

			$info_mission = $this->mission_model->get_info($mission_edit_id);
			$this->data_layout['info_mission'] = $info_mission;

			if(!$mission_edit_id) {
				$this->session->set_flashdata('message','Không tồn tại thông tin nhiệm vụ');
				redirect(base_url('project/mission/index/'.$project_id));
			}
			else {

				
				$info_mission_employee = $this->mission_user_model->get_columns('tb_mission_user',$where=array('mission_id'=>$mission_edit_id));
				$mission_user_id = $info_mission_employee[0]->user_id;
				$mission_user_info = $this->home_model->get_columns('tb_employee',$where=array('user_id'=>$mission_user_id));
				$mission_user_name = $mission_user_info[0]->fullname;
				$mission_user_id = $mission_user_info[0]->user_id;
				$info_mission->mission_user_name = $mission_user_name;
				$info_mission->mission_user_id = $mission_user_id;
				//pre($info_mission);

				$tab = 'tb_role'; $col = 'department_id';

				$list_department_employee_all = $this->role_model->get_column_distinct($tab,$col);

				$list_department_employee_by_id = $this->role_model->get_column('tb_role','department_id',$where=array('user_id'=>$now_user_id));

				if ($account_type==3) {
					$list_department_employee = $list_department_employee_by_id;
				}

				else if ($account_type<3) {
					$list_department_employee = $list_department_employee_all;
				}

				//pre($list_department_employee);
				$list_department_of_project = $this->proportion_department_model->get_column('tb_proportion_department','department_id',$where=array('project_id'=>$project_id));
				//pre($list_department_of_project);

				$list_department_id_of_project = array();
				foreach ($list_department_of_project as $key => $value) {
					$list_department_id_of_project[$key] = $value->department_id;
				}

				//pre($list_department_id_of_project);
				

				foreach ($list_department_employee as $key => $value) {
					if(in_array($value->department_id, $list_department_id_of_project)==false) {
						unset($list_department_employee[$key]);
					}
				}

				//pre($list_department_employee);

				foreach ($list_department_employee as $key => $value) {
					$department_info = $this->department_model->get_info($value->department_id);
					$value->department_name = $department_info->name;

					$list_user_id_of_department = $this->role_model->get_column('tb_role','user_id',$where=array('department_id'=>$department_info->id));

					foreach ($list_user_id_of_department as $k => $v) {
						$info_user = $this->home_model->get_columns('tb_employee',$where=array('user_id'=>$v->user_id));
						$value->list_employee[$k] = $info_user[0];
					}
				}

				//pre($list_department_employee);
				$mid = $this->mission_user_model->get_info_rule($where=array('mission_id'=>$mission_edit_id));
				//pre($mid);
				$old_user_id = $mid->user_id;

				$this->data_layout['list_department_employee'] = $list_department_employee;
				if($this->input->post()){

					$this->form_validation->set_rules('mission_name', 'Tên nhiệm vụ', 'trim');
					$this->form_validation->set_rules('description', 'description', 'trim');
					
					$this->form_validation->set_rules('start_date', 'Ngày bắt đầu');
					$this->form_validation->set_rules('end_date', 'Ngày kết thúc');
					$this->form_validation->set_rules('mission_user', 'Nhân viên');

					if($this->form_validation->run()){ 

						$mission_name = $this->input->post('mission_name');
						$description = $this->input->post('description');
						$start_date = $this->input->post('start_date');
						$end_date = $this->input->post('end_date');

						$new_user_id = $this->input->post('mission_user');

						$start_date = strtotime($start_date);
						$newformat_start_date = date('Y-m-d',$start_date);
						$end_date = strtotime($end_date);
						$newformat_end_date = date('Y-m-d',$end_date);

						//pre($code);


						$code = $info_mission->code;

						$data_mission = array(
							'name'          => $mission_name,
							'description'   => $description,
							'start_date'    => $newformat_start_date,
							'end_date'      => $newformat_end_date,
							'update_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
							'update_by'     => $now_user_id,
							'status'        => '1',
						);

						//pre($data_mission);
						if($this->mission_model->update($mission_edit_id,$data_mission)) {
							$this->session->set_flashdata('message','Sửa dữ liệu thành công');


							//pre($mi);

							if ($old_user_id == $new_user_id) {
								$this->session->set_flashdata('message','Sửa dữ liệu thành công');
								redirect(base_url('project/mission/index/'.$project_id));

							}

							else {
								$data_mission_user = array(
									'user_id'    => $new_user_id,
									'update_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
								);
								if($this->mission_user_model->update_rule($where=array('mission_id'=>$mission_edit_id),$data_mission_user)) {
									$this->session->set_flashdata('message','Sửa dữ liệu thành công');


								}
								else {
									$this->session->set_flashdata('message','Sửa dữ liệu không thành công');
								}								

							}

							
						}
						else {
							$this->session->set_flashdata('message','Tạo dữ liệu không thành công');
							redirect(base_url('project/mission/index/'.$project_id));
						}
					redirect(base_url('project/mission/index/'.$project_id));
					}

				}

			}

			$this->data_layout['temp'] = 'edit_mission';
	    	$this->load->view('layout/main', $this->data_layout);


		}
		

	}

	function add_task(){

		$now_user_id = $this->data_layout['id'];
	    $account_type = $this->data_layout['account_type'];
	    $project_id = $this->uri->segment(4);
	    $project_id = intval($project_id);
	    $mission_id = $this->uri->segment(5);
	    $mission_id = intval($mission_id);

	    $info_project = $this->project_model->get_info($project_id);
		$this->data_layout['info_project'] = $info_project;

		if(!$info_project) {
			$this->session->set_flashdata('message','Không tồn tại dữ liệu');
			redirect(base_url('project/mission/view_detail/'.$project_id.'/'.$mission_id));
		}

		else {
			if ($account_type < 3 ) {
				$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
				redirect(base_url('project/mission/view_detail/'.$project_id.'/'.$mission_id));
			}

			else if($account_type == 4 || $account_type == 3) {

				$info_mission = $this->mission_model->get_info($mission_id);
				$this->data_layout['info_mission'] = $info_mission;

				if(!$info_mission) {
					$this->session->set_flashdata('message','Không tồn tại thông tin nhiệm vụ');
					redirect(base_url('project/mission/index/'.$project_id));
				}
				else {
					$info_mission_employee = $this->mission_user_model->get_columns('tb_mission_user',$where=array('mission_id'=>$mission_id));
					//pre($info_mission_employee);
					$mission_user_id = $info_mission_employee[0]->user_id;
					$mission_user_info = $this->home_model->get_columns('tb_employee',$where=array('user_id'=>$mission_user_id));
					$mission_user_name = $mission_user_info[0]->fullname;
					$mission_user_id = $mission_user_info[0]->user_id;
					$info_mission->mission_user_name = $mission_user_name;
					$info_mission->mission_user_id = $mission_user_id;

					//pre($info_mission);

					if ($now_user_id != $info_mission->mission_user_id ) {
						$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
						redirect(base_url('project/mission/view_detail/'.$project_id.'/'.$mission_id));
					}

					else {
						if($this->input->post()){
							$this->form_validation->set_rules('task_name', 'Tên nhiệm vụ', 'trim');
							$this->form_validation->set_rules('description', 'description', 'trim');
							
							$this->form_validation->set_rules('start_date', 'Ngày bắt đầu');
							$this->form_validation->set_rules('end_date', 'Ngày kết thúc');
							$this->form_validation->set_rules('status','Tiến độ');

							if($this->form_validation->run()){
								$task_name = $this->input->post('task_name');
								$description = $this->input->post('description');
								$start_date = $this->input->post('start_date');
								$end_date = $this->input->post('end_date');
								$status = $this->input->post('status');
								$code = $this->input->post('code_task');


								$start_date = strtotime($start_date);
								$newformat_start_date = date('Y-m-d',$start_date);
								$end_date = strtotime($end_date);
								$newformat_end_date = date('Y-m-d',$end_date);

								$data_task = array(
									'name'          => $task_name,
									'description'   => $description,
									'start_date'    => $newformat_start_date,
									'end_date'      => $newformat_end_date,
									'create_by'     => $now_user_id,
									'create_date'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d'),
									'status'        => $status,
									'mission_id'    => $mission_id,
									'project_id'    => $project_id,
									'code'          => $code
								);

								//pre($data_task);

								if($this->task_model->create($data_task)) {
									
										$input = array();
										$input['where']['mission_id'] = $mission_id;
										$input['where']['create_by'] = $info_mission->mission_user_id;
										$count_task = $this->task_model->get_total($input);
										if($count_task==0) {
											$progress_task = 0;
										}

										$input_success = array();
										$input_success['where']['mission_id'] = $mission_id;
										$input_success['where']['create_by'] = $info_mission->mission_user_id;
										$input_success['where']['status'] = 100;
										$count_task_success = $this->task_model->get_total($input_success);

										if($count_task_success==0) {
											$progress_task = 0;
										}

										if($count_task>0 && $count_task_success>0) {
											$progress_task = (round($count_task_success/$count_task,2)*100);
										}

										$data_mission_new = array('progress' => $progress_task);
										//pre($data_mission_new);
										if($this->mission_model->update($mission_id,$data_mission_new)){
											$this->session->set_flashdata('message','Tạo dữ liệu thành công');

										}
										else {
											$this->session->set_flashdata('message','Tạo dữ liệu không thành công');
											redirect(base_url('project/mission/view_detail/'.$project_id.'/'.$mission_id));
										}


								}

								else {
									$this->session->set_flashdata('message','Tạo dữ liệu không thành công');
								}
							redirect(base_url('project/mission/view_detail/'.$project_id.'/'.$mission_id));

							} 
						}
					}				
				}

			}

		}




		$this->data_layout['temp'] = 'add_task';
	    $this->load->view('layout/main', $this->data_layout);

	}
}