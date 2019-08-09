<?php
class Programs extends MX_Controller
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

//View Programs

function _get_program_id_from_program_url($url)
{
  $query = $this->get_where_custom('url', $url);
  foreach ($query->result() as $row) {
    $program_id = $row->id;
  }
  if (!isset($program_id)) {
    $program_id = 0;
  }
  return $program_id;
}


//Redirect the page to its detail view with seo friendly url
function topic()
{
    $url = $this->uri->segment(3);
    $this->load->module('programs');

    $program_id = $this->programs->_get_program_id_from_program_url($url);
    $this->programs->view($program_id);
}

function view($update_id)
{

    //fetch item details
    $this->load->module('conference');
    $data = $this->fetch_data_from_db($update_id);
    $data['update_id'] = $update_id;

    $data['get_conference_name'] = $this->conference->get_where_custom('status', 1);


    $data['view_module'] = "programs";
    $data['view_file'] = "view";
    $this->load->module('templates');
    $this->templates->public_bootstrap($data);
}

//Add Programss
function create()
{

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit', TRUE);

    if ($submit=="Cancel"){
      redirect('programs/manage');
    }

    if ($submit=="Submit") {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('conference_id', 'Conference Id', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('video_url', 'Video URL', 'trim|required');


        if ($this->form_validation->run() == TRUE){

           //get the variables
            $data = $this->fetch_data_from_post();
            $data['url'] = url_title(strtolower($data['title']));

            if (is_numeric($update_id)) {
              $data['date_created'] = time();
               //update a item
                $this->_update($update_id, $data);
                $flash_msg = "The Programs Successfully Updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">×</button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('programs/create/'.$update_id);

            } else {
                $data['date_created'] = time();
                $data['image'] = $this->do_upload();
                
                //insert new item
                $this->_insert($data);
                $update_id = $this->get_max(); // get the id of the new item

                $flash_msg = "The Programs Successfully Added   .";
                $value = '<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">×</button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('programs/manage');
            }

        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {

        $data = $this->fetch_data_from_db($update_id);
    } else{

        $data = $this->fetch_data_from_post();
    }

    if (!is_numeric($update_id)) {

        $data['headline'] = "Add Programs";
    } else {

        $data['headline'] = "Update Programs";
    }

    $this->load->module('conference');
    $data['get_conferences'] = $this->conference->get_where_custom('status', 1);

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_module'] = "programs";
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

//Manage Programss

function manage()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
    $data['headline'] = "All Programss";
    $data['flash'] = $this->session->flashdata('item');

    $data['query'] = $this->get_where_custom('status', 1);
    $data['create_abstract_type'] = base_url()."programs/create";
    $data['edit'] = base_url()."programs/create/";

    $data['view_module'] = "programs";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);
}

//Upload Image
public function do_upload()
{
        $config['upload_path']          = './assets/images/programs/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000000;
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
    $data['title'] = $this->input->post('title', TRUE);
    $data['session_name'] = $this->input->post('session_name', TRUE);
    $data['description'] = $this->input->post('description', TRUE);
    $data['video_url'] = $this->input->post('video_url', TRUE);
    $data['chairpersons'] = $this->input->post('chairpersons', TRUE);
    $data['speaker'] = $this->input->post('speaker', TRUE);
    $data['reviewer'] = $this->input->post('reviewer', TRUE);
    $data['moderator'] = $this->input->post('moderator', TRUE);
    $data['panelists'] = $this->input->post('panelists', TRUE);
    $data['team_members'] = $this->input->post('team_members', TRUE);
    $data['team_lead'] = $this->input->post('team_lead', TRUE);
    $data['other'] = $this->input->post('other', TRUE);
    $data['conference_id'] = $this->input->post('conference_id', TRUE);
    $data['keywords'] = $this->input->post('keywords', TRUE);
    $data['day'] = $this->input->post('day', TRUE);
    $data['url'] = $this->input->post('url', TRUE);
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
        $data['id'] = $row->id;
        $data['title'] = $row->title;
        $data['session_name'] = $row->session_name;
        $data['description'] = $row->description;
        $data['video_url'] = $row->video_url;
        $data['chairpersons'] = $row->chairpersons;
        $data['speaker'] = $row->speaker;
        $data['reviewer'] = $row->reviewer;
        $data['moderator'] = $row->moderator;
        $data['panelists'] = $row->panelists;
        $data['team_members'] = $row->team_members;
        $data['team_lead'] = $row->team_lead;
        $data['other'] = $row->other;
        $data['conference_id'] = $row->conference_id;
        $data['keywords'] = $row->keywords;
        $data['day'] = $row->day;
        $data['url'] = $row->url;
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
      $data['title'] = $row->title;
      $data['session_name'] = $row->session_name;
      $data['description'] = $row->description;
      $data['video_url'] = $row->video_url;
      $data['chairpersons'] = $row->chairpersons;
      $data['speaker'] = $row->speaker;
      $data['reviewer'] = $row->reviewer;
      $data['moderator'] = $row->moderator;
      $data['panelists'] = $row->panelists;
      $data['team_members'] = $row->team_members;
      $data['team_lead'] = $row->team_lead;
      $data['other'] = $row->other;
      $data['conference_id'] = $row->conference_id;
      $data['keywords'] = $row->keywords;
      $data['day'] = $row->day;
      $data['url'] = $row->url;
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
    $this->load->model('Mdl_Programs');
    $query = $this->Mdl_Programs->get_where_url($url);
    return $query;
}

function get($order_by)
{
    $this->load->model('Mdl_Programs');
    $query = $this->Mdl_Programs->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by)
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_Programs');
    $query = $this->Mdl_Programs->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_Programs');
    $query = $this->Mdl_Programs->get_where($id);
    return $query;
}

function get_where_custom($col, $value)
{
    $this->load->model('Mdl_Programs');
    $query = $this->Mdl_Programs->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('Mdl_Programs');
    $this->Mdl_Programs->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_Programs');
    $this->Mdl_Programs->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_Programs');
    $this->Mdl_Programs->_delete($id);
}

function count_where($column, $value)
{
    $this->load->model('Mdl_Programs');
    $count = $this->Mdl_Programs->count_where($column, $value);
    return $count;
}

function get_max()
{
    $this->load->model('Mdl_Programs');
    $max_id = $this->Mdl_Programs->get_max();
    return $max_id;
}

function _custom_query($mysql_query)
{
    $this->load->model('Mdl_Programs');
    $query = $this->Mdl_Programs->_custom_query($mysql_query);
    return $query;
}

function delete()
{
    $update_id = $this->uri->segment(3);
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
      }
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
    $this->_delete($update_id);
    $flash_msg = "The item images was successfully deleted.";
    $value = '<div class="alert alert-danger" role="alert">'.$flash_msg.'</div>';
    $this->session->set_flashdata('item', $value);
    $this->session->set_flashdata('item', $value);
    redirect('programs/manage');
}

}
