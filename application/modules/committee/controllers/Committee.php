<?php
class Committee extends MX_Controller 
{

function __construct() {
parent::__construct();
}

public function ispsmmembers()
{
    $data['view_module'] = "committee";
    $data['view_file'] = "international";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);

}

public function ispsmnational()
{

    $data['view_module'] = "committee";
    $data['view_file'] = "ispsmnational";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);

}

public function agoimembers()
{
    $data['view_module'] = "committee";
    $data['view_file'] = "agoinational";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
}

}