<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding");

defined('BASEPATH') or exit('No direct script access allowed');
// require_once APPPATH . 'core/MY_Controller.php';
// require APPPATH . 'libraries/Cors.php'; // Add this line

class SendController extends CI_Controller
// class SendController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load the database library
        // $this->load->library('cors');

    }

    public function index()
    {
        $data = array();
        $allmsgs = $this->db->select('*')->from('tbl_msg')->get()->result_array();
        $data['allMsgs'] = $allmsgs;
        $this->load->view('message', $data);
    }
    public function send()
    {
        $arr['msg'] = $this->input->post('message');
        $arr['date'] = date('Y-m-d');
        $arr['status'] = 1;
        $this->db->insert('tbl_msg', $arr);
        $detail = $this->db->select('*')->from('tbl_msg')->where('id', $this->db->insert_id())->get()->row();
        $msgCount = $this->db->select('*')->from('tbl_msg')->get()->num_rows();
        $arr['message'] = $detail->msg;
        $arr['date'] = date('m-d-Y', strtotime($detail->date));
        $arr['msgcount'] = $msgCount;
        $arr['success'] = true;
        echo json_encode($arr);
    }
}
