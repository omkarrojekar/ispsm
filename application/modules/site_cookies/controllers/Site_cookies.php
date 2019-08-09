<?php
class Site_cookies extends MX_Controller
{

function __construct() {
parent::__construct();
}

//function test for cookies
function test()
{
  echo anchor('site_cookies/test_set', 'Set the Cookies');
  echo "<hr>";
  echo anchor('site_cookies/test_destroy', 'Destroy the Cookies');

  $user_id = $this->_attempt_get_user_id();

  if (is_numeric($user_id)) {
    echo "<h1>You are $user_id</h1>";
  }

}

function test_set()
{
  $user_id = 88;
  $this->_set_cookie($user_id);
  echo "The cookie ghas been set <br>";

  echo anchor('site_cookies/test','Get the cookie');
  echo "<hr>";
  echo anchor('site_cookies/test_destroy','Destroy Cookies');
}

function test_destroy()
{

  $this->_destroy_cookie();
  echo "The cookies has been destroyed <br>";

  echo anchor ('site_cookies/test', 'Attempt Get the Cookies');
  echo "<hr>";
  echo anchor ('site_cookies/test_set', 'Set the Cookies');
}


//set cookies for user id
function _set_cookie($user_id)
{
  $this->load->module('site_security');
  $this->load->module('site_settings');

  //setting tidy_get_html_ver
  $nowtime = time();
  $one_day = 86400;
  $two_weeks = $one_day*14;
  $two_weeks_ahead = $nowtime+$two_weeks;


  $data['cookie_code'] = $this->site_security->generate_random_string(128);
  $data['user_id'] = $user_id;

  //set expiry Date
  $data['expiry_date'] = $two_weeks_ahead;
  $this->_insert($data);

  $cookie_name = $this->site_settings->_get_cookie_name();

  setcookie($cookie_name, $data['cookie_code'], $data['expiry_date']);
  $this->_auto_delete_old();

}

//attempy top get the user id
function _attempt_get_user_id()
{
  $this->load->module('site_settings');
  $cookie_name = $this->site_settings->_get_cookie_name();

  //check for cookie_name
  if (isset($_COOKIE[$cookie_name])) {
    $cookie_code = $_COOKIE[$cookie_name];

    //the have the cookie but it is still on table ?
    $query = $this->get_where_custom('cookie_code', $cookie_code);
    $num_rows = $query->num_rows();
    if ($num_rows<1) {
      $user_id = '';
    }

    foreach ($query->result() as $row) {
      $user_id = $row->user_id;
    }
  } else {
    $user_id = '';
  }
  return $user_id;
}

//destry cookie
function _destroy_cookie()
{
  $this->load->module('site_settings');
  $cookie_name = $this->site_settings->_get_cookie_name();
  
  if (isset($_COOKIE[$cookie_name])) {
    $cookie_code = $_COOKIE[$cookie_name];
    $mysql_query = "delete from site_cookies where cookie_code='$cookie_code'";
    $query = $this->_custom_query($mysql_query);
  }


  setcookie($cookie_name, '' ,time() - 3600);


}

function _auto_delete_old()
{
  $nowtime = time();
  $mysql_query = "delete from site_cookies where expiry_date<$nowtime";
  $query = $this->_custom_query($mysql_query);
}


function get($order_by)
{
    $this->load->model('mdl_site_cookies');
    $query = $this->mdl_site_cookies->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by)
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_site_cookies');
    $query = $this->mdl_site_cookies->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_site_cookies');
    $query = $this->mdl_site_cookies->get_where($id);
    return $query;
}

function get_where_custom($col, $value)
{
    $this->load->model('mdl_site_cookies');
    $query = $this->mdl_site_cookies->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_site_cookies');
    $this->mdl_site_cookies->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_site_cookies');
    $this->mdl_site_cookies->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_site_cookies');
    $this->mdl_site_cookies->_delete($id);
}

function count_where($column, $value)
{
    $this->load->model('mdl_site_cookies');
    $count = $this->mdl_site_cookies->count_where($column, $value);
    return $count;
}

function get_max()
{
    $this->load->model('mdl_site_cookies');
    $max_id = $this->mdl_site_cookies->get_max();
    return $max_id;
}

function _custom_query($mysql_query)
{
    $this->load->model('mdl_site_cookies');
    $query = $this->mdl_site_cookies->_custom_query($mysql_query);
    return $query;
}

}
