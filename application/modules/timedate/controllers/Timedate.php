<?php
class Timedate extends MX_Controller
{

function __construct() {
parent::__construct();
}

function get_nice_date($timestamp, $format)
{
    switch ($format){
        case 'cool':
        $the_date = date('l jS \of F Y', $timestamp);
        break;
        case 'mini':
        $the_date = date('jS M Y',$timestamp);
        break;
        case 'full';
        $the_date = date('l jS \of F Y \a\t h:i:s A', $timestamp);
        break;
        case 'mydate';
        $the_date = date('Y-m-d H:i:s', $timestamp);
        break;
    }
    return $the_date;
}

}
