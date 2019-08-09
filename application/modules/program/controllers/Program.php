<?php
class Program extends MX_Controller 
{

function __construct() {
parent::__construct();
}

public function highlights()
{
    $data['view_module'] = "program";
    $data['view_file'] = "highlights";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);

}
public function scientific()
{
    $data['view_module'] = "program";
    $data['view_file'] = "day1";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);

}

public function day1()
{
    $this->scientific();
   
}

public function day2()
{
    $data['view_module'] = "program";
    $data['view_file'] = "day2";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);    
}

public function day3()
{
    $data['view_module'] = "program";
    $data['view_file'] = "day3";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
 
}

public function d3halla()
{
    $data['view_module'] = "program";
    $data['view_file'] = "day3";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
  
}

public function d3hallb()
{
    $data['view_module'] = "program";
    $data['view_file'] = "day3hallb";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
  
}

}