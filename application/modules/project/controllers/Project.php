<?php
Class Project extends MY_Controller {
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
		//$this->load->view('home/index');
		$id = $this->data_layout['id'];




		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;
		

		$input = array();
		$where = array('user_id' => $id);

		$input['where']['created_by'] = $id;
		$total = $this->project_model->get_total();


		$list_project = $this->project_model->get_list();
		$numberproject = count($list_project);

		

		//pre($list_project);

		foreach ($list_project as $key => $value) {
			# code...
			$project_id = $value->id;
			//echo $project_id;
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

			$value->emp = $list_emp;

		//pre($list_project);

		}

		$this->data_layout['total'] = $total;
		$this->data_layout['numberproject'] = $numberproject;

		$list = $this->project_model->get_list();
		$this->data_layout['list'] = $list;
		$this->data_layout['list_project'] = $list_project;

		$this->data_layout['temp'] = 'index';
	    $this->load->view('layout/main', $this->data_layout);
	}


	function proportion_department() {

		if ($this->data_layout['account_type']>2) {
			$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('project/index'));
		}

		else {
			
			//lay id du an can sua
			$project_id = $this->uri->segment(3);
			$project_id = intval($project_id);
			$this->data_layout['project_id'] = $project_id;

			$input = array();
			$input['where']['project_id'] = $project_id;

			$list_proportion_department = $this->proportion_department_model->get_list($input);
			
			//pre($list_proportion_department);

			if ($list_proportion_department==null) {
				$this->session->set_flashdata('message','Không tồn tại thông tin');
				redirect(base_url('project/index'));

			}


			else {
				$c = count($list_proportion_department);
				foreach ($list_proportion_department as $key => $value) {
					$department = $this->department_model->get_info($value->department_id);
					$value->department = $department->name;

				}
				//pre($list_proportion_department);
				if($this->input->post()){
					//$this->form_validation->set_rules('0', '0', 'trim|numeric');
					for ($i=0; $i < $c ; $i++) { 
						//echo $list_proportion_department[$i]->department;
						$this->form_validation->set_rules('room['.$i.']', 'Trường '.$list_proportion_department[$i]->department , 'trim|numeric|callback_check_percent',
							array('numeric' => '%s Phải là số','check_percent' => 'Tính lại tỉ lệ')
							);
					}

					if($this->form_validation->run()){
						for ($i=0; $i < $c ; $i++) { 
							$a[] = $this->input->post('room['.$i.']');
							//echo $i;
							$list_proportion_department[$i]->new = $a[$i];
						}
						//pre($list_proportion_department);

						foreach ($list_proportion_department as $key => $value) {
							$data = array(
								'proportion' => $value->new
								);

							if($this->proportion_department_model->update_rule($where=array('department_id'=>$value->department_id), $data)) {
								$this->session->set_flashdata('message','Sửa dữ liệu thành công');
							}
							else {
								$this->session->set_flashdata('message','Sửa dữ liệu không thành công');
								redirect(base_url('project/mission/index/'.$project_id), 'refresh');
							}

						}

						redirect(base_url('project/mission/index/'.$project_id),'refresh');

						//pre($a);

						//redirect(base_url('project/index'));

						//pre($a);
						//pre($list_proportion_department);
					}

				}


			}


		}


		
		$this->data_layout['list_proportion_department'] = $list_proportion_department;
		$this->data_layout['temp'] = 'project/proportion';
	    $this->load->view('layout/main', $this->data_layout);

	}

	function check_percent(){
		$list_proportion_department = $this->proportion_department_model->get_column_distinct('tb_proportion_department', array('department_id','proportion'));
		$c = count($list_proportion_department);
		$percent =0;
		for ($i=0; $i < $c ; $i++) { 
			$a[] = $this->input->post('room['.$i.']');
			$percent = $percent + $a[$i];
		}
		if($percent==100) {
			return true;
		}
		else {
			return false;
			$this->form_validation->set_message('check_percent', 'Tỉ lệ không đúng');
		}
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

				$old_data =null;

				if ($list_emp!=null) {
						foreach ($list_emp as $k => $v) {

						$emp_name = $this->home_model->get_column('tb_employee', 'fullname',$where=array('user_id'=>$v->user_id));
						//pre($room_name[0]->name);
						$v->emp_name = $emp_name[0]->fullname;
						//$this->data_layout['room_name'] = $room_name;
						//pre($room_name);
						$old_data[] = $v->user_id;
						}

					}

				//pre($old_data);
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
						//pre($old_data);

						if($this->project_model->update($project_id, $data_project)) {

							$this->session->set_flashdata('message','Sửa dữ liệu thành công');

							$pid = $this->project_user_model->get_column('tb_project_user', 'id',$where=array('project_id'=>$project_id));

							//pre($pid);
							if ($project_users==null) {
								$this->project_user_model->del_rule($where=array('project_id'=>$project_id));
								$this->proportion_department_model->del_rule($where=array('project_id'=>$project_id));
								redirect(base_url('project/index'));
							}
							else {

								if($list_emp==null){

									$arr_depart = array();

									//pre($project_users);


									for ($i=0; $i < count($project_users) ; $i++) { 
										$data_project_user = array(
											'project_id'     => $project_id,
											'user_id'     => $project_users[$i],
											'update_time'  => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s')
										);

										if($this->project_user_model->create($data_project_user)) {

											$this->session->set_flashdata('message','Sửa dữ liệu thành công');
											//redirect(base_url('project/index'));
											$department_id = $this->role_model->get_column('tb_role','department_id',$where=array('user_id'=>$project_users[$i]));

											//pre($department_id);

											$d_id = $department_id[0]->department_id;


											$dat =  $this->proportion_department_model->get_column('tb_proportion_department','id',$where=array('project_id'=>$project_id,'department_id'=>$d_id));

											

											if ($dat ==null) {
												$data = array(
													'department_id' => $department_id[0]->department_id,
													'proportion'    => '0',
													'project_id'    => $project_id,
													'update_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
												);
												$this->proportion_department_model->create($data);
											}


										}

										else {
												

											$this->session->set_flashdata('message','Sửa dữ liệu không thành công');

										}
									}
									redirect(base_url('project/index'));
								}
								else if ($list_emp!=null){

									if(identical_values( $old_data , $project_users )==true){
										redirect(base_url('project/index'));
									}

									else {
										foreach ($old_data as $key => $value) {
										$this->project_user_model->del_rule($where = array('user_id' => $value , 'project_id'=>$project_id ));

										}
										for ($i=0; $i < count($project_users) ; $i++) { 
											$data_project_user = array(
												'project_id'     => $project_id,
												'user_id'     => $project_users[$i],
												'update_time'  => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s')
											);

											$this->project_user_model->create($data_project_user);

											$department = $this->role_model->get_column('tb_role', 'department_id',$where=array('user_id'=>$project_users[$i]));

											$depart_id[] = $department[0]->department_id;										
										}

										$this->proportion_department_model->del_rule($where = array('project_id'=>$project_id ));

										$depart_new = array_unique($depart_id);

										for ($i=0; $i < count($depart_new) ; $i++) { 
											$data = array(
												'department_id' => $depart_new[$i],
												'proportion'    => '0',
												'project_id'    => $project_id,
												'update_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
											);
											$this->proportion_department_model->create($data);
										}
									}




								
								}
									redirect(base_url('project/index'));
							}
								

						}

						
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

	function check_shortname($short_name){
		$short_name = $this->input->post('short_name');
		$where = array('short_name' => $short_name, );
		if($this->project_model->check_exists($where)) {
			$this->form_validation->set_message('check_shortname', 'Tên viết tắt này đã tồn tại !');
			return false;
		}
		else return TRUE;

	}
}