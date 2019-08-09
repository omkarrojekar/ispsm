<?php
class Abstarct extends MX_Controller {

function __construct() {
parent::__construct();
}


public function callforabstract()
 {
    $data['view_module'] = "abstarct";
    $data['view_file'] = "callforabstract";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);

}

}