<?php
class Conference extends MX_Controller
{

function __construct() {
parent::__construct();
}

//get id from url
function get_id_from_url($url)
{
  $data = $this->fetch_data_from_url($url);
  if ($data==""){
    $id = "0";
  } else {
    $id = $data['id'];
  }

  return $id;
}

function _get_user_mobile($email)
{
  $data = $this->fetch_data_for_application($email);
  if ($data==""){
    $user_mobile = "Unknown";
  } else {
    $mobile = trim($data['mobile']);

    $user_mobile = $mobile;
  }

  return $user_mobile;
}

//show all conference

public function view()
{

    $this->load->module('programs');
    $conference_slug = $this->uri->segment(3);
    $day = $this->uri->segment(4);
    $url_id = $this->get_id_from_url($conference_slug);
    //$data['get_conferences_video'] = $this->programs->get_where_custom('conference_id', $url_id);
    //SELECT DISTINCT day from programs
    $data['days'] = $this->Mdl_Conference->get_all_days($url_id);
    $data['get_conferences_video'] = $this->Mdl_Conference->get_day1_videos($url_id,$day);
    $data['view_module'] = "conference";
    $data['view_file'] = "conference";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
}

public function all()
{

    $data['get_conferences'] = $this->get_where_custom('status', 1);
    $data['view_module'] = "conference";
    $data['view_file'] = "index";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
}



//Add Conferences
function create()
{

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit', TRUE);

    if ($submit=="Cancel"){
      redirect('conference/manage');
    }

    if ($submit=="Submit") {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('conference_name', 'Conference Name', 'trim|required');


        if ($this->form_validation->run() == TRUE){

           //get the variables
            $data = $this->fetch_data_from_post();
            $data['slug'] = url_title(strtolower($data['conference_name']));

            if (is_numeric($update_id)) {
              $data['date_created'] = time();
               //update a item
                $this->_update($update_id, $data);
                $flash_msg = "The Conference Successfully Updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">×</button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('conference/create/'.$update_id);

            } else {
                $data['date_created'] = time();
                $data['image'] = $this->do_upload();
                //insert new item
                $this->_insert($data);
                $update_id = $this->get_max(); // get the id of the new item

                $flash_msg = "The Conference Successfully Added   .";
                $value = '<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">×</button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('conference/manage');
            }

        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {

        $data = $this->fetch_data_from_db($update_id);
    } else{

        $data = $this->fetch_data_from_post();
    }

    if (!is_numeric($update_id)) {

        $data['headline'] = "Add Conference";
    } else {

        $data['headline'] = "Update Conference";
    }

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_module'] = "conference";
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

//Manage Conferences

function manage()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
    $data['headline'] = "All Conferences";
    $data['flash'] = $this->session->flashdata('item');

    $data['query'] = $this->get_where_custom('status', 1);
    $data['create_abstract_type'] = base_url()."conference/create";
    $data['edit'] = base_url()."conference/create/";

    $data['view_module'] = "conference";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);
}

//Upload Image
public function do_upload()
{
        $config['upload_path']          = './assets/images/conferences/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 100000;
        $config['max_width']            = 1920;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('upload_form', $error);
        }
        else
        {

            $data = array('upload_data' => $this->upload->data());
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            $image = $file_name;
            return $image;


        }
}

function fetch_data_from_post()
{
    $data['conference_name'] = $this->input->post('conference_name', TRUE);
    $data['venue'] = $this->input->post('venue', TRUE);
    $data['conference_start_date'] = $this->input->post('conference_start_date', TRUE);
    $data['conference_end_date'] = $this->input->post('conference_end_date', TRUE);
    $data['slug'] = $this->input->post('slug', TRUE);
    $data['date_created'] = $this->input->post('date_created', TRUE);


    return $data;
}

function fetch_data_from_db($update_id)
{

    if (!is_numeric($update_id)) {
      redirect('site_security/not_allowed');
    }
    $query = $this->get_where($update_id);
    foreach($query->result() as $row)
    {
        $data['conference_name'] = $row->conference_name;
        $data['venue'] = $row->venue;
        $data['conference_start_date'] = $row->conference_start_date;
        $data['conference_end_date'] = $row->conference_end_date;
        $data['slug'] = $row->slug;
        $data['image'] = $row->image;
        $data['status'] = $row->status;
        $data['date_created'] = $row->date_created;
    }

    if(!isset($data))
    {
        $data="";
    }
    return $data;
}

function fetch_data_from_url($url)
{
    $query = $this->get_where_url($url);
    foreach($query->result() as $row)
    {
      $data['id'] = $row->id;
      $data['conference_name'] = $row->conference_name;
      $data['venue'] = $row->venue;
      $data['conference_start_date'] = $row->conference_start_date;
      $data['conference_end_date'] = $row->conference_end_date;
      $data['slug'] = $row->slug;
      $data['image'] = $row->image;
      $data['status'] = $row->status;
      $data['date_created'] = $row->date_created;
    }

    if(!isset($data))
    {
        $data="";
    }
    return $data;
}

function get_where_url($url)
{
    $this->load->model('Mdl_Conference');
    $query = $this->Mdl_Conference->get_where_url($url);
    return $query;
}

function get($order_by)
{
    $this->load->model('Mdl_Conference');
    $query = $this->Mdl_Conference->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by)
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_Conference');
    $query = $this->Mdl_Conference->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_Conference');
    $query = $this->Mdl_Conference->get_where($id);
    return $query;
}

function get_where_custom($col, $value)
{
    $this->load->model('Mdl_Conference');
    $query = $this->Mdl_Conference->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('Mdl_Conference');
    $this->Mdl_Conference->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_Conference');
    $this->Mdl_Conference->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_Conference');
    $this->Mdl_Conference->_delete($id);
}

function count_where($column, $value)
{
    $this->load->model('Mdl_Conference');
    $count = $this->Mdl_Conference->count_where($column, $value);
    return $count;
}

function get_max()
{
    $this->load->model('Mdl_Conference');
    $max_id = $this->Mdl_Conference->get_max();
    return $max_id;
}

function _custom_query($mysql_query)
{
    $this->load->model('Mdl_Conference');
    $query = $this->Mdl_Conference->_custom_query($mysql_query);
    return $query;
}

}
