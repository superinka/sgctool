<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class verify_login extends MY_Controller {

 function __construct()
 {
   parent::__construct();

 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim');
   $this->form_validation->set_rules('password', 'Password', 'trim|callback_check_database');


   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login/index');
     echo '0';
   }
   else
   {
     //Go to private area
     redirect(base_url('home/index'), 'refresh');
    //echo '1';
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   $password = $this->input->post('password');

   //query the database
   $result = $this->login_model->login($username, $password);
   //echo $username . ' - ' . $password;

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
      //pre($row);
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username,
         'status' => $row->status,
         'account_type' => $row->account_type
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Sai tên đăng nhập hoặc mật khẩu');
     return false;
   }
 }
}
?>