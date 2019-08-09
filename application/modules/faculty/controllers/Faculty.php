<?php
class Faculty extends MX_Controller 
{

function __construct() {
parent::__construct();
}

public function internationalfaculty()
{
    $data['view_module'] = "faculty";
    $data['view_file'] = "internationalfaculty";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
}

public function nationalfaculty()
{
    $data['view_module'] = "faculty";
    $data['view_file'] = "nationalfaculty";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
}

}