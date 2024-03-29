<?php
class Site_security extends MX_Controller
{

function __construct() {
parent::__construct();
}

//
function _get_user_id()
{
	//attempt to get the ID of the User

	//Start by checking for a session variables
	$user_id = $this->session->userdata('user_id');

	if(!is_numeric($user_id)){
		//check for a valid cookies
		$this->load->module('site_cookies');
		$user_id = $this->site_cookies->_attempt_get_user_id();
	}

	return $user_id;

}

//check Admin
function _check_admin_login_details($username, $pword)
{
	$target_username = "admin";
	$target_pass = "password";

	if (($username==$target_username) && ($pword==$target_pass)) {
		return TRUE;
	} else {
		return FALSE;
	}
}

//make sure logged in
function _make_sure_logged_in()
{
	$user_id = $this->_get_user_id();
	if (!is_numeric($user_id)) {
		redirect('accounts/login');
	}
}



function generate_random_string($length)
{
	$characters = '23456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	for ($i=0; $i <$length ; $i++) {
		$randomString .=$characters[rand(0,strlen($characters) - 1)];
	}

	return $randomString;
}

function _hash_string($str)
{
	$hashed_string = password_hash($str, PASSWORD_BCRYPT, array(
		'cost'=>11
	));
	return $hashed_string;
}

function _verify_hash($plain_text_str, $hashed_string)
{
	$result = password_verify($plain_text_str,$hashed_string);
	return $result;
}

function _encrypt_string($str)
{
	$this->load->library('encryption');
	$encrypted_string = $this->encryption->encrypt($str);
	return $encrypted_string;
}

function _decrypt_string($str)
{
	$this->load->library('encryption');
	$decrypted_string = $this->encryption->decrypt($str);
	return $decrypted_string;
}

function _make_sure_is_admin()
{
    $is_admin = $this->session->userdata('is_admin');
		if ($is_admin==1) {
			return TRUE;
		} else {
			redirect('site_security/not_allowed');
    }
}

function not_allowed()
{
    redirect('admin');
}

}
