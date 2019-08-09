<?php
class Templates extends MX_Controller
{

function __construct() {
parent::__construct();
}



//Login Page
function login($data)
{
	if (!isset($data['view_module'])) {
		# code...
		$data['view_module'] = $this->uri->segment(1);
	}
	$this->load->view('login', $data);
}



//Public Page
function public_bootstrap($data)
{
	if (!isset($data['view_module'])) {
		# code...
		$data['view_module'] = $this->uri->segment(1);
	}

	$this->load->module('site_security');
	$data['user_id'] = $this->site_security->_get_user_id();

	$this->load->view('public_bootstrap', $data);
}

//Admin Page
function admin($data)
{
	if (!isset($data['view_module'])) {
		# code...
		$data['view_module'] = $this->uri->segment(1);
	}
	$this->load->view('admin', $data);
}


public function Home()
{
	$data['view_file'] = "home";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
}


}
