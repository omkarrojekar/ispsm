<?php
class Aboutus extends MX_Controller 
{

function __construct() {
parent::__construct();
}

public function index()
{



    $data['view_module'] = "aboutus";
    $data['view_file'] = "index";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);

    
}



}