<?php
class Site_settings extends MX_Controller
{

function __construct() {
parent::__construct();
}




//get cookies
function _get_cookie_name()
{
  $cookie_name = 'hwefcdsdfhz';
  return $cookie_name;
}

function _get_paypal_email()
{
  $email = 'rahulkumarr2080@gmail.com';
  return $email;
}

//for currency settings
function _get_currency_symbol()
{
    $symbol = "&#8360;";
    return $symbol;
}

//for currency settings
function _get_currency_code()
{
    $code = "INR";
    return $code;
}



function _get_page_not_found_msg()
{


}

}
