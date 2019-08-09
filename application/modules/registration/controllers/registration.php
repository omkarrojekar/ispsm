<?php
class Registration extends MX_Controller 
{

function __construct() {
parent::__construct();
}

public function registrationdetails()
{
    $data['view_module'] = "registration";
    $data['view_file'] = "registrationdetails";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);


}

}