<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Karyawan extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
          $karyawan = $this->db->order_by('id',"desc")
            // ->limit(1)
            ->get('tb_karyawan')
            ->result();
        } else
        if ($id == '-1') {
          $karyawan = $this->db->order_by('id',"desc")
            ->limit(1)
            ->get('tb_karyawan')
            ->result();
        } else {
            // $this->db->where('id', $id);
            $karyawan = $this->db->get_where('tb_karyawan', ['id'=>$id])->result();
        }
        $this->response($karyawan, 200);
    }

    function index_post() {
        $data = array(
            'id'      =>  $this->post('id'),
            'name'    =>  $this->post('name'),
            'email'   =>  $this->post('email'),
            'address' =>  $this->post('address'),
            'phone'   =>  $this->post('phone'));
        $insert = $this->db->insert('tb_karyawan', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $id = $this->put('id');
        $data = array(
            'name'    =>  $this->put('name'),
            'email'   =>  $this->put('email'),
            'address' =>  $this->put('address'),
            'phone'   =>  $this->put('phone'));
        $this->db->where('id', $id);
        $update = $this->db->update('tb_karyawan', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('tb_karyawan');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>
