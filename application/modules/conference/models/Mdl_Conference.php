<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_Conference extends CI_Model
{

function __construct() {
parent::__construct();
}

function get_table() {
    $table = "conferences";
    return $table;
}

function get($order_by){
    $table = $this->get_table();
    $this->db->order_by($order_by);
    $query=$this->db->get($table);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) {
    $table = $this->get_table();
    $this->db->limit($limit, $offset);
    $this->db->order_by($order_by);
    $query=$this->db->get($table);
    return $query;
}

function get_where($id){
    $table = $this->get_table();
    $this->db->where('id', $id);
    $query=$this->db->get($table);
    return $query;
}

function get_where_url($url){
    $table = $this->get_table();
    $this->db->where('slug', $url);
    $query=$this->db->get($table);
    return $query;
}

function get_where_custom($col, $value) {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $query=$this->db->get($table);
    return $query;
}

function _insert($data){
    $table = $this->get_table();
    $this->db->insert($table, $data);
}

function _update($id, $data){
    $table = $this->get_table();
    $this->db->where('id', $id);
    $this->db->update($table, $data);
}

function _delete($id){
    $table = $this->get_table();
    $this->db->where('id', $id);
    $this->db->delete($table);
}

function count_where($column, $value) {
    $table = $this->get_table();
    $this->db->where($column, $value);
    $query=$this->db->get($table);
    $num_rows = $query->num_rows();
    return $num_rows;
}

function count_all() {
    $table = $this->get_table();
    $query=$this->db->get($table);
    $num_rows = $query->num_rows();
    return $num_rows;
}

function get_max() {
    $table = $this->get_table();
    $this->db->select_max('id');
    $query = $this->db->get($table);
    $row=$query->row();
    $id=$row->id;
    return $id;
}

function _custom_query($mysql_query) {
    $query = $this->db->query($mysql_query);
    return $query;
}

function get_all_days($url_id)
{
    //SELECT DISTINCT day from programs
    $query = $this->db->query("SELECT DISTINCT day from programs where conference_id = $url_id");
    return $query->result();            
}

function get_day1_videos($url_id,$day)
{
    if($day == '')
    {
        $query = $this->db->query("SELECT * from programs where conference_id = $url_id AND day = 'day-1' ");
        return $query->result();                   
    }
    else
    {
        $query = $this->db->query("SELECT * from programs where conference_id = $url_id AND day = '$day' ");
        return $query->result();               
    }
}

}
