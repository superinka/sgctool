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
		$this->load->model('login/login_model','',TRUE);

		global $account_type;

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

	function get_my_request() {

		$my_id = $this->data_layout['id'];
		$input_request['where'] = array('create_by'=>$my_id);
		$list_request_by_me = $this->request_model->get_list($input_request);
		//$this->data_layout['list_request_by_me'] = $list_request_by_me;
		return $list_request_by_me;
	}

	function logout()
    {
	    $this->session->unset_userdata('logged_in');
	    session_destroy();
	    redirect(base_url('login'), 'refresh');
    }

}
