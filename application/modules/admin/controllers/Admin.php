<?php
class Admin extends MX_Controller
{

function __construct() {
parent::__construct();
$this->load->library('form_validation');
$this->form_validation->CI =& $this;
}

//login_page
function index()
{
  $data['username'] = $this->input->post('username', TRUE);
  $this->load->module('templates');
  $this->templates->login($data);
}

function submit_login()
{
  $submit = $this->input->post('submit', TRUE);

  if ($submit=="Submit") {

      $this->load->library('form_validation');
      $this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[5]|max_length[50]|callback_username_check');
      $this->form_validation->set_rules('pword', 'Password', 'trim|required|min_length[7]|max_length[35]');

      if ($this->form_validation->run() == TRUE){
        $this->_in_you_go();

      } else {
        $this->index();
      }
  }
}

function _in_you_go()
{
  $this->session->set_userdata('is_admin', '1');

  //send the user to the private admin page
  redirect('dashboard/home');
}

//logout
function logout()
{
  unset($_SESSION['is_admin']);
  redirect(base_url());
}

//callback_username_check
function username_check($str)
{

    $this->load->module('site_security');

    $error_msg = "You did not Enter Correct Username and/or Password";
    $pword = $this->input->post('pword', TRUE);

    $result = $this->site_security->_check_admin_login_details($str, $pword);

    if ($result==FALSE) {
      $this->form_validation->set_message('username_check', $error_msg);
      return FALSE;
    } else {
      return TRUE;
    }

  }




}
