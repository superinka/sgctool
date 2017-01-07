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

	}

	function get_list_notification(){
		return 100;
	}
}
