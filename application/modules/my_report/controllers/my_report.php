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

	    $today = date("Y-m-d"); 
	    $this->data_layout['today'] = $today;

	    if($this->data_layout['account_type'] < 3){
			$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('view_report/index'));	    	
	    }

	    if($this->data_layout['account_type']==4){
	    	$department = $this->role_model->get_column('tb_role', 'department_id', $where=array('user_id'=>$my_id));
	    	foreach ($department as $key => $value) {
	    	$department_id = $department[0]->department_id;
	    	$department_name_info = $this->department_model->get_info($department_id);

	    	$list_room_by_me['department'][$key]['name'] = $department_name_info->name;
	    	$list_room_by_me['department'][$key]['id'] = $department_id;

			$list_miss = $this->mission_model->get_columns('tb_mission',$where=array('department_id'=>$department_id, 'level'=>4));
	    		if($list_miss!=null){
	    			foreach ($list_miss as $k => $v) {
	    				$mission_id = $v->id;
	    				$project_id = $v->project_id;
	    				$project = $this->project_model->get_info($project_id);

	    				if($project) {
		    				$project_name = $project->project_name;
		    				$v->project_name = $project_name;

		    				if($v->end_date >= $today) {
			    				$list_task = $this->mission_model->get_columns('tb_task',$where=array('mission_id'=>$mission_id, 'status'=>0));
			    				foreach ($list_task as $x => $y) {
			    					if($y->end_date < $today){
			    						unset($list_task[$x]);
			    					}
			    				}
			    				$list_task = array_values($list_task);

			    				foreach ($list_task as $x => $y) {

			    					$list_reported_today =  $this->my_report_model->get_columns('tb_daily_report',$where=array('task_id'=>$y->id, 'create_date'=>$today,'create_by'=>$my_id, 'review_status'=>1));

			    					if($list_reported_today!=null){
			    						$list_task[$x]->list_reported_today = $list_reported_today;
			    					}

			    					$list_un_report_today = $this->my_report_model->get_columns('tb_daily_report',$where=array('task_id'=>$y->id, 'create_date'=>$today,'create_by'=>$my_id, 'review_status'=>0));

			    					if($list_un_report_today!=null){
			    						$list_task[$x]->list_un_report_today = $list_un_report_today;
			    					}

			    					$list_report_today = $this->my_report_model->get_columns('tb_daily_report',$where=array('task_id'=>$y->id, 'create_date'=>$today,'create_by'=>$my_id));

			    					if($list_report_today!=null){
			    						$list_task[$x]->list_report_today = $list_report_today;
			    					}
			    					
			    				}
			    				$v->list_task = $list_task;	    					
		    				}
	    				}


	    			}

	    			$list_room_by_me['department'][$key]['list_miss'] = $list_miss;
	    		}
	    		}


	    } 

	    else if($this->data_layout['account_type']==3){
	    	$department = $this->role_model->get_column('tb_role', 'department_id', $where=array('user_id'=>$my_id));
	    	foreach ($department as $key => $value) {
	    		$department_id = $value->department_id;
	    		$department_name_info = $this->department_model->get_info($department_id);
	    		$list_room_by_me['department'][$key]['name'] = $department_name_info->name;
	    		$list_room_by_me['department'][$key]['id'] = $department_id;

	    		$list_miss = $this->mission_model->get_columns('tb_mission',$where=array('department_id'=>$department_id, 'level'=>3));
	    		if($list_miss!=null){
	    			foreach ($list_miss as $k => $v) {
	    				$mission_id = $v->id;
	    				$project_id = $v->project_id;
	    				$project = $this->project_model->get_info($project_id);
	    				$project_name = $project->project_name;
	    				$v->project_name = $project_name;

	    				if($v->end_date >= $today) {
		    				$list_task = $this->mission_model->get_columns('tb_task',$where=array('mission_id'=>$mission_id, 'status'=>0));
		    				foreach ($list_task as $x => $y) {
		    					if($y->end_date < $today){
		    						unset($list_task[$x]);
		    					}
		    				}
		    				$list_task = array_values($list_task);

		    				foreach ($list_task as $x => $y) {

		    					$list_reported_today =  $this->my_report_model->get_columns('tb_daily_report',$where=array('task_id'=>$y->id, 'create_date'=>$today,'create_by'=>$my_id, 'review_status'=>1));

		    					if($list_reported_today!=null){
		    						$list_task[$x]->list_reported_today = $list_reported_today;
		    					}

		    					$list_un_report_today = $this->my_report_model->get_columns('tb_daily_report',$where=array('task_id'=>$y->id, 'create_date'=>$today,'create_by'=>$my_id, 'review_status'=>0));

		    					if($list_un_report_today!=null){
		    						$list_task[$x]->list_un_report_today = $list_un_report_today;
		    					}

		    					$list_report_today = $this->my_report_model->get_columns('tb_daily_report',$where=array('task_id'=>$y->id, 'create_date'=>$today,'create_by'=>$my_id));

		    					if($list_report_today!=null){
		    						$list_task[$x]->list_report_today = $list_report_today;
		    					}
		    					
		    				}
		    				$v->list_task = $list_task;	    					
	    				}

	    			}

	    			$list_room_by_me['department'][$key]['list_miss'] = $list_miss;
	    		}
	    	}

	 	}

	 	$all_report_by_me = null;

	 	$input_my_report['where'] = array('create_by'=>$my_id);
	 	$input_my_report['order'] = array('id','ASC');
	 	$all_report_by_me = $this->my_report_model->get_list($input_my_report); 

	 	//pre($all_report_by_me);
	 	$task_name = $mission_name = $project_name = 'chưa rõ'; $department_name='chưa rõ';

	 	foreach ($all_report_by_me as $key => $value) {
	 		$task_id = $value->task_id;
	 		$task_id = intval($task_id);
	 		$task_info = $this->task_model->get_info($task_id);
	 		if($task_info) {
	 			$task_name = $task_info->name;
	 			$mission_id = $task_info->mission_id;
	 			$mission_id = intval($mission_id);
				$mission_info = $this->mission_model->get_info($mission_id);
				if($mission_info) {
					$mission_name = $mission_info->name;
			 		$project_id = $mission_info->project_id;
			 		$project_id = intval($project_id);
			 		$department_id = $mission_info->department_id;
			 		$department_id = intval($department_id);
			 		$department_info = $this->department_model->get_info($department_id);
			 		$department_name = $department_info->name;
			 		$project_info = $this->project_model->get_info($project_id);
			 		if($project_info){
			 			$project_name = $project_info->project_name;
			 		}
			 							
				}
		 		
	 		}
	 		
	 		$value->task_name = $task_name;
	 		$value->mission_name = $mission_name;
	 		$value->project_name = $project_name;
	 		$value->department_name = $department_name; 
	 	}

	 	//pre($all_report_by_me);
	 	$this->data_layout['all_report_by_me'] = $all_report_by_me;

	 	//pre($list_room_by_me);
	 	$this->data_layout['list_room_by_me'] = $list_room_by_me;



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

		//pre($list_task_active);

	    foreach ($list_task_active as $key => $value) {
	    	if($value->end_date < $today) {
	    		unset($list_task_active[$key]);
	    	}
	    }

	    foreach ($list_task_active as $key => $value) {
	    	$mission_id = $value->mission_id;
	    	$mission = $this->mission_model->get_info($mission_id);
	    	if($mission){
	    		if($mission->end_date < $today) {
	    			unset($list_task_active[$key]);
	    		}
	    	}
	    }

	    //pre($list_task_active);

	    //$list_task_active = array_unique($list_task_active);

	    //pre($list_task_active);

	    $this->data_layout['list_task_active'] = $list_task_active;

	    if($this->input->post()){
			$this->form_validation->set_rules('description', 'description', 'trim');
			$this->form_validation->set_rules('message', 'Mô tả', 'trim');
			$this->form_validation->set_rules('progress', 'Tình Trạng');

			$this->form_validation->set_rules('time_spend', 'Thời gian làm');

			if($this->form_validation->run()){
				$description = $this->input->post('description');
				$message = $this->input->post('message');
				$progress = $this->input->post('progress');
				$time_spend = $this->input->post('time_spend');
				$task = $this->input->post('task');

				$mission_id = $this->task_model->get_info($task,'mission_id');

				//pre($mission_id);

				$mission_id = $mission_id->mission_id;

				$project_id = $this->mission_model->get_info($mission_id,'project_id');

				$project_id = $project_id->project_id;

				$code = $project_id. $mission_id .rand(0,9999). md5($task);
				$code = strtolower($code);

				$data_report = array(
					'description'   => $description,
					'note'          => $message,
					'status'        => '1',
					'time_spend'    => $time_spend,
					'task_id'       => $task,
					'create_by'     => $my_id,
					'create_date'   => date_create('now')->format('Y-m-d'),
					'update_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
					'create_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
					'progress'      => $progress,
					'review_by'     => $my_id,
					'review_status' => '0',
					'code'          => $code

				);

				if($this->my_report_model->create($data_report)) {
					$this->session->set_flashdata('message','Tạo dữ liệu thành công');

				}
				else {
					$this->session->set_flashdata('message','Tạo dữ liệu không thành công');
				}
				redirect(base_url('my_report/index'));

			}
	    }

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

			$list_report_checked_today = array();

			$input_checked = array();
		    $input_checked['where']['review_status'] = 1;
		    $input_checked['where']['create_date'] = $today;
		    //$list_report_checked_today = $this->my_report_model->get_list($input_checked);

		    $input_checked_all = array();
		    $input_checked_all['where']['review_status'] = 1;
		    $list_report_checked_all = $this->my_report_model->get_list($input_checked_all);

		    $input_unchecked_all = array();
		    $input_unchecked_all['where']['review_status'] = 0;
		    $list_report_checked_all = $this->my_report_model->get_list($input_unchecked_all);

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


						$list_miss = $this->mission_model->get_columns('tb_mission',$where = array('department_id'=>$department_id, 'status'=>'1'));

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
									$list_task = $this->task_model->get_columns('tb_task',$where=array('mission_id'=>$mission_id, 'status'=>'0'));
									//pre($list_task);
									
									foreach ($list_task as $x => $z) {
										$list_report = $this->my_report_model->get_columns('tb_daily_report',$where=array(
												'task_id'=>$z->id, 
												'review_status'=>'0', 
												'create_date'=>$today
											));
										$list_report_all = $this->my_report_model->get_columns('tb_daily_report',$where=array(
												'task_id'=>$z->id, 
												'review_status'=>'0'
											));

										if($list_report!=null) {
											$z->list_report = $list_report;
										}
										
										if($list_report_all!=null) {
											$z->list_report_all = $list_report_all;
										}										
									}
									//$list_report = 
									$list_miss[$i]->task = $list_task;
									$v->list_miss[] = $list_miss[$i];
								}
							}
						$list_room_manager[$key]['list_miss'] = $list_miss;
						}
						// $list_pro = $this->proportion_department_model->get_columns('tb_proportion_department',$where = array('department_id'=>$department_id));
						// if($list_pro!=null) {
						// 	foreach ($list_pro as $k => $v) {
						// 		$project_id = $v->project_id;
						// 		$project_name = $this->project_model->get_info($project_id,'project_name');
						// 		$project_name = $project_name->project_name;
						// 		$v->project_name = $project_name;
						// 		$list_room_manager[$key]['project'][] = $v;


						// 		$list_miss = $this->mission_model->get_columns('tb_mission',$where = array('project_id'=>$project_id, 'status'=>'1', 'department_id'=>$department_id));
						// 		//$v->mission = $list_miss;
						// 		//$list_room_manager[$key]['mission'][] = $v;
						// 		//pre($list_miss);
						// 		if($list_miss!=null) {
						// 			for ($i=0;  $i < count($list_miss)  ; $i++)  { 
						// 				$mission_id = $list_miss[$i]->id;
						// 				$uid = $this->mission_user_model->get_columns('tb_mission_user',$where=array('mission_id'=>$mission_id));
						// 				//pre($uid);
						// 				$uid = $uid[0]->user_id;

						// 				if($this->role_model->check_exists($where=array('user_id'=>$uid, 'department_id'=>$department_id))==true){
						// 					$mission_for_id = $uid;
						// 					$mission_for_name = $this->home_model->get_column('tb_employee','fullname',$where=array('user_id'=>$mission_for_id));
						// 					$list_miss[$i]->mission_for = $mission_for_name[0]->fullname;
						// 					$list_task = $this->task_model->get_columns('tb_task',$where=array('mission_id'=>$mission_id, 'status'=>'0'));
											
						// 					foreach ($list_task as $x => $z) {
						// 						$list_report = $this->my_report_model->get_columns('tb_daily_report',$where=array(
						// 								'task_id'=>$z->id, 
						// 								'review_status'=>'0', 
						// 								'create_date'=>$today
						// 							));

						// 						if($list_report!=null) {
						// 							$z->list_report = $list_report;
						// 						}
												
						// 					}
						// 					//$list_report = 
						// 					$list_miss[$i]->task = $list_task;
						// 					$v->list_miss[] = $list_miss[$i];
						// 				}
						// 			}
						// 		}

						// 	}
						// }
					}

					//pre($list_room_manager);

					foreach ($list_room as $key => $value) {
						$department_id = $value->department_id;
						$department_name = $this->department_model->get_info($department_id,'name');
						$department_name = $department_name->name;
						$list_report_checked_today[$key]['department_name'] = $department_name;
						$list_report_checked_today[$key]['department_id'] = $department_id;

						$list_miss = $this->mission_model->get_columns('tb_mission',$where = array('department_id'=>$department_id, 'status'=>'1'));

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
									$list_task = $this->task_model->get_columns('tb_task',$where=array('mission_id'=>$mission_id, 'status'=>'0'));
									//pre($list_task);
									
									foreach ($list_task as $x => $z) {
										$list_report = $this->my_report_model->get_columns('tb_daily_report',$where=array(
												'task_id'=>$z->id, 
												'review_status'=>'1', 
												'create_date'=>$today
											));
										$list_report_all = $this->my_report_model->get_columns('tb_daily_report',$where=array(
												'task_id'=>$z->id, 
												'review_status'=>'1'
											));

										if($list_report!=null) {
											$z->list_report = $list_report;
										}
										if($list_report_all!=null) {
											$z->list_report_all = $list_report_all;
										}
										
									}
									//$list_report = 
									$list_miss[$i]->task = $list_task;
									$v->list_miss[] = $list_miss[$i];
								}
							}
						$list_report_checked_today[$key]['list_miss'] = $list_miss;
						}

						//pre($list_miss);
						

						//$list_pro = $this->proportion_department_model->get_columns('tb_proportion_department',$where = array('department_id'=>$department_id));
						// if($list_pro!=null) {
						// 	foreach ($list_pro as $k => $v) {
						// 		$project_id = $v->project_id;
						// 		$project_name = $this->project_model->get_info($project_id,'project_name');
						// 		$project_name = $project_name->project_name;
						// 		$v->project_name = $project_name;
						// 		$list_report_checked_today[$key]['project'][] = $v;

						// 		//pre($list_miss);

						// 		$list_miss = $this->mission_model->get_columns('tb_mission',$where = array('project_id'=>$project_id, 'status'=>'1'));
						// 		//$v->mission = $list_miss;
						// 		//$list_room_manager[$key]['mission'][] = $v;
						// 		//pre($list_miss);
						// 		if($list_miss!=null) {
						// 			for ($i=0;  $i < count($list_miss)  ; $i++)  { 
						// 				$mission_id = $list_miss[$i]->id;
						// 				$uid = $this->mission_user_model->get_columns('tb_mission_user',$where=array('mission_id'=>$mission_id));
						// 				//pre($uid);
						// 				$uid = $uid[0]->user_id;

						// 				if($this->role_model->check_exists($where=array('user_id'=>$uid, 'department_id'=>$department_id))==true){
						// 					$mission_for_id = $uid;
						// 					$mission_for_name = $this->home_model->get_column('tb_employee','fullname',$where=array('user_id'=>$mission_for_id));
						// 					$list_miss[$i]->mission_for = $mission_for_name[0]->fullname;
						// 					$list_task = $this->task_model->get_columns('tb_task',$where=array('mission_id'=>$mission_id, 'status'=>'0'));
											
						// 					foreach ($list_task as $x => $z) {
						// 						$list_report = $this->my_report_model->get_columns('tb_daily_report',$where=array(
						// 								'task_id'=>$z->id, 
						// 								'review_status'=>'1', 
						// 								'create_date'=>$today
						// 							));

						// 						if($list_report!=null) {
						// 							$z->list_report = $list_report;
						// 						}
												
						// 					}
						// 					//$list_report = 
						// 					$list_miss[$i]->task = $list_task;
						// 					$v->list_miss[] = $list_miss[$i];
						// 				}
						// 			}
						// 		}

						// 	}
						// }
					}
				}
			//pre($list_room_manager);
			$this->data_layout['list_room_manager'] = $list_room_manager;
			$this->data_layout['list_report_checked_today'] = $list_report_checked_today;

			//pre($list_report_checked_today);
			}
			
		}

		$this->data_layout['temp'] = 'check_report';
	    $this->load->view('layout/main', $this->data_layout);
	}

	function check(){
		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

	    $my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $today = date("Y-m-d"); 
	    $this->data_layout['today'] = $today;

	    if ($this->data_layout['account_type'] > 3) {
	    	echo $this->data_layout['account_type'];
			$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('my_report/index'));
		}
		else {
			$report_id = $this->uri->segment(3);
			$report_id = intval($report_id);

			//lay thong tin report

			$info_report = $this->my_report_model->get_info($report_id);

			if(!$info_report) {
				$this->session->set_flashdata('message','Không tồn tại thông tin report');
				redirect(base_url('my_report/index'));
			}
			else {
				if($my_id==1) {$i = '53';}
				else {$i = $my_id;}
				$data_report = array ('review_status'=>'1','review_by'=>$i);

				if ($this->data_layout['account_type'] == 3){
					//pre($info_report);
					$create_by = $info_report->create_by;
					if ($create_by == $my_id) {
						$this->session->set_flashdata('message','Bạn không check được report của chính mình');
						redirect(base_url('my_report/check_report'));
					}
					else {
						if($this->my_report_model->update($report_id,$data_report)){
							$this->session->set_flashdata('message','Update thành công');
							redirect(base_url('my_report/check_report'), 'refresh');
						}
						else {
							$this->session->set_flashdata('message','Update không thành công');
							redirect(base_url('my_report/check_report'), 'refresh');
						}
					}
				}

				else if($this->data_layout['account_type'] < 3){

					if($this->my_report_model->update($report_id,$data_report)){
						$this->session->set_flashdata('message','Update thành công');
						redirect(base_url('view_report/index'), 'refresh');
					}
					else {
						$this->session->set_flashdata('message','Update không thành công');
						redirect(base_url('view_report/index'), 'refresh');
					}					
				}


			}
		}
	}

	function uncheck(){
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
			$report_id = $this->uri->segment(3);
			$report_id = intval($report_id);

			//lay thong tin report

			$info_report = $this->my_report_model->get_info($report_id);

			if(!$info_report) {
				$this->session->set_flashdata('message','Không tồn tại thông tin report');
				redirect(base_url('my_report/index'));
			}
			else {
				if($my_id==1) {$i = '53';}
				else {$i = $my_id;}
				$data_report = array ('review_status'=>'0','review_by'=>$i);

				if ($this->data_layout['account_type'] == 3){
					//pre($info_report);
					$create_by = $info_report->create_by;
					if ($create_by == $my_id) {
						$this->session->set_flashdata('message','Bạn không check được report của chính mình');
						redirect(base_url('my_report/check_report'));
					}
					else {
						if($this->my_report_model->update($report_id,$data_report)){
							$this->session->set_flashdata('message','Update thành công');
							redirect(base_url('my_report/check_report'), 'refresh');
						}
						else {
							$this->session->set_flashdata('message','Update không thành công');
							redirect(base_url('my_report/check_report'), 'refresh');
						}
					}
				}

				else if($this->data_layout['account_type'] < 3){
					
					if($this->my_report_model->update($report_id,$data_report)){
						$this->session->set_flashdata('message','Update thành công');
						redirect(base_url('view_report/index'), 'refresh');
					}
					else {
						$this->session->set_flashdata('message','Update không thành công');
						redirect(base_url('view_report/index'), 'refresh');
					}					
				}
			}
		}
	}

	function check_report_leader(){
		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

	    $my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $today = date("Y-m-d"); 
	    $this->data_layout['today'] = $today;

	    if ($this->data_layout['account_type'] > 2) {
			//$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('my_report/index'));
		}
		else {
			$list_mission_leader = $this->mission_model->get_columns('tb_mission', $where=array('level'=>3,'status'=>1));
			foreach ($list_mission_leader as $key => $value) {
				if($value->end_date >= $today) {
					$list_mission_leader_today[] = $value;
				}
			}

			//pre($list_mission_leader_today);

			foreach ($list_mission_leader_today as $key => $value) {
				$list_task = $this->task_model->get_columns('tb_task', $where = array('mission_id'=>$value->id,'status'=>0));
				$department_id = $value->department_id;
				$department_name = $this->department_model->get_info($department_id,'name');
				$department_name = $department_name->name;
				$value->department_name = $department_name;

				$project_id = $value->project_id;
				$project_name = $this->project_model->get_info($project_id,'project_name');
				if($project_name){
					$project_name = $project_name->project_name;
					$value->project_name = $project_name;

					foreach ($list_task as $k => $v) {
						if($v->end_date >= $today){
							$list_task_today[] = $v;
							$value->list_task_today[] = $v;
						}
					}
				}


				//$list_mission_leader_today[$key]->list_task_today = $list_task_today;

			}

			foreach ($list_mission_leader_today as $key => $value) {
				if(array_key_exists('list_task_today',$value)){

					foreach ($value->list_task_today as $k => $v) {
						$list_report = $this->my_report_model->get_columns('tb_daily_report',$where=array('task_id'=>$v->id, 'review_status'=>0));
						//pre($list_report);
						foreach ($list_report as $m => $n) {
							if($n->create_date == $today){
								$list_report_today[] = $n;
								$v->list_report_today[] = $n;
							}
						}
						//$value->list_task_today[$k]->list_report_today = $list_report_today;						
					}
					
				}

				
			}

			//pre($list_mission_leader_today);

			// list report uncheck
			$list_mission_leader_checked = $this->mission_model->get_columns('tb_mission', $where=array('level'=>3,'status'=>1));
			//pre($list_mission_leader_uncheck);
			foreach ($list_mission_leader_checked as $key => $value) {
				if($value->end_date >= $today) {
					$list_mission_leader_checked_today[] = $value;
				}
			}

			//pre($list_mission_leader_uncheck_today);

			foreach ($list_mission_leader_checked_today as $key => $value) {
				$list_task = $this->task_model->get_columns('tb_task', $where = array('mission_id'=>$value->id,'status'=>0));
				$department_id = $value->department_id;
				$department_name = $this->department_model->get_info($department_id,'name');
				$department_name = $department_name->name;
				$value->department_name = $department_name;

				$project_id = $value->project_id;
				$project_name = $this->project_model->get_info($project_id,'project_name');
				if($project_name) {
					$project_name = $project_name->project_name;
					$value->project_name = $project_name;

					foreach ($list_task as $k => $v) {
						if($v->end_date >= $today){
							$list_task_checked_today[] = $v;
							$value->list_task_checked_today[] = $v;
						}
					}					
				}


				//$list_mission_leader_today[$key]->list_task_today = $list_task_today;

			}
			//pre($list_mission_leader_uncheck_today);

			foreach ($list_mission_leader_checked_today as $key => $value) {
				if(array_key_exists('list_task_checked_today',$value)){

					foreach ($value->list_task_checked_today as $k => $v) {
						$list_report = $this->my_report_model->get_columns('tb_daily_report',$where=array('task_id'=>$v->id, 'review_status'=>'1'));
						//pre($list_report);
						foreach ($list_report as $m => $n) {
							if($n->create_date == $today){
								$list_report_checked_today[] = $n;
								$v->list_report_checked_today[] = $n;
							}
						}
						//$value->list_task_today[$k]->list_report_today = $list_report_today;						
					}
					
				}

				
			}

			//pre($list_mission_leader_checked_today);
			$this->data_layout['list_mission_leader_today'] = $list_mission_leader_today;
			$this->data_layout['list_mission_leader_checked_today'] = $list_mission_leader_checked_today;
		}
		$this->data_layout['temp'] = 'check_report_leader';
	    $this->load->view('layout/main', $this->data_layout);
	}

	function edit() {


		$report_id = $this->uri->segment(3);

		$report_info = $this->my_report_model->get_info($report_id);

		$this->data_layout['report_info'] = $report_info;

		$today = date("Y-m-d"); 
	    $this->data_layout['today'] = $today;

		if(!$report_info) {
			$this->session->set_flashdata('message','Không tồn tại thông tin');
			redirect(base_url('my_report/index'));	
		}

		else {
			//pre($my_id);
			$my_id = $this->data_layout['id'];
	    	$this->data_layout['my_id'] = $my_id;

			if ($report_info->create_by!= $my_id){
				$this->session->set_flashdata('message','Không phải report của bạn');
				redirect(base_url('my_report/index'));	
			}
			else {
				if ($report_info->review_status== 1){
					$this->session->set_flashdata('message','Không thể sửa vì chưa được duyệt !');
					redirect(base_url('my_report/index'));	
				}
				else{

					$old_note = $report_info->note;

					$input_task = array();
				    $input_task['where']['create_by'] = $my_id;
				    $input_task['where']['status'] = 0;

				    $list_task_active  = $this->task_model->get_list($input_task);

					//pre($list_task_active);

				    foreach ($list_task_active as $key => $value) {
				    	if($value->end_date < $today) {
				    		unset($list_task_active[$key]);
				    	}
				    }

				    foreach ($list_task_active as $key => $value) {
				    	$mission_id = $value->mission_id;
				    	$mission = $this->mission_model->get_info($mission_id);
				    	if($mission){
				    		if($mission->end_date < $today) {
				    			unset($list_task_active[$key]);
				    		}
				    	}
				    }

				    //pre($list_task_active);

				    //$list_task_active = array_unique($list_task_active);

				    //pre($list_task_active);

				    $this->data_layout['list_task_active'] = $list_task_active;


				    if($this->input->post()){
						$this->form_validation->set_rules('description', 'description', 'trim');
						$this->form_validation->set_rules('message', 'Mô tả', 'trim');
						$this->form_validation->set_rules('progress', 'Tình Trạng');

						$this->form_validation->set_rules('time_spend', 'Thời gian làm');

						if($this->form_validation->run()){
							$description = $this->input->post('description');
							$message = $this->input->post('message');
							$progress = $this->input->post('progress');
							$time_spend = $this->input->post('time_spend');
							$task = $this->input->post('task');

							if($message == null) {
								$message = $old_note;
							}

							$data_report = array(
								'description'   => $description,
								'note'          => $message,
								'status'        => '1',
								'time_spend'    => $time_spend,
								'task_id'       => $task,
								'update_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
								'progress'      => $progress,
								'review_by'     => $my_id

							);

							if($this->my_report_model->update($report_id, $data_report)) {
								$this->session->set_flashdata('message','Sửa dữ liệu thành công');

							}
							else {
								$this->session->set_flashdata('message','Sửa dữ liệu không thành công');
							}
							redirect(base_url('my_report/index'));

						}
				    }
				}

			}
		}

		$this->data_layout['temp'] = 'edit_report';
	    $this->load->view('layout/main', $this->data_layout);

	}
}
