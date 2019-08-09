<?php
class Gallery extends MX_Controller 
{

function __construct() {
parent::__construct();
}

public function index()
{
    $data['view_module'] = "gallery";
    $data['view_file'] = "galleryday1";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
} 

public function gallery2()
{

    $data['view_module'] = "gallery";
    $data['view_file'] = "galleryday2";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);

} 


public function gallery3()
{
    $data['view_module'] = "gallery";
    $data['view_file'] = "galleryday3";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);

} 


public function videos()
{
    $data['view_module'] = "gallery";
    $data['view_file'] = "video";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
} 

public function ispsm()
{
    $data['view_module'] = "gallery";
    $data['view_file'] = "ispsm";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
 
}

}