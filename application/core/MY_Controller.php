<?php

Class MY_Controller extends CI_Controller {
	
	public $data_layout = array();
	function __construct() {
		parent::__construct();
		$new_url = $this->uri->segment(1);
		switch ($new_url) {
			case 'admin' : {
				$this->load->helper('admin');
				break;
			}
			
			default: {
				//du lieu trang ngoai
			}
		}

		$this->CI = & get_instance();


		$this->load->model('request/request_model');
		$this->load->model('home/home_model');
		$this->load->model('login/login_model','',TRUE);

		global $account_type;

		date_default_timezone_set('Asia/Ho_Chi_Minh');

		if( $this->uri->segment(1) =='login'){

		}

		else{
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


	}

	function get_list_notification(){
		return 100;
	}

	function get_my_fullname() {
		$my_id = $this->data_layout['id'];
		if($my_id == 1){
			return 'Administrator';
		}
		else {
			$input['where'] = array('user_id'=>$my_id);
			$my_name = $this->home_model->get_info_rule($where=array('user_id'=>$my_id));
			return $my_name->fullname;
		}

	}

	function get_my_request() {

		$my_id = $this->data_layout['id'];
		$input_request['where'] = array('create_by'=>$my_id);
		//$input_request['limit'] = array('10' ,'0');
		$list_request_by_me = $this->request_model->get_list($input_request);
		//$this->data_layout['list_request_by_me'] = $list_request_by_me;
		return $list_request_by_me;
	}

	function get_my_order(){
		$my_id = $this->data_layout['id'];
		$my_account_level = $this->data_layout['account_type'];

		$list_order_for_me = array();

		if($my_account_level==3) {
			$input_room['where'] = array('user_id'=>$my_id);
			//$input_room['limit'] = array('10' ,'0');
			$list_my_room = $this->role_model->get_list($input_room);
			$list_order_for_me = array();
			foreach ($list_my_room as $key => $value) {
				$input_request['where'] = array('department_id'=>$value->department_id,'review_status'=>0);
				$list_request = $this->request_model->get_list($input_request);
				foreach ($list_request as $k => $v) {
					if($v->create_by == $my_id){
						unset($list_request[$k]);
					}
					else {
						$i = $this->home_model->get_fullname_employee($v->create_by);
						$v->creater_name = $i[0]->fullname;
						$list_order_for_me[] = $v;
					}
				}
			}
		}

		if($my_account_level==2 || $my_account_level == 1) {
			$list_order_for_me = array();
			
			$input_request['where'] = array('level_creater'=>3, 'review_status'=>0);
			//$input_request['limit'] = array('10' ,'0');
			$list_request = $this->request_model->get_list($input_request);
			foreach ($list_request as $k => $v) {
				if($v->create_by == $my_id){
					unset($list_request[$k]);
				}
				else {
					$i = $this->home_model->get_fullname_employee($v->create_by);
					if($i){
						$v->creater_name = $i[0]->fullname;
						$list_order_for_me[] = $v;
					}
				}
			}
			
		}
		return $list_order_for_me;
	}

	function logout()
    {
	    $this->session->unset_userdata('logged_in');
	    session_destroy();
	    redirect(base_url('login'), 'refresh');
    }

}
