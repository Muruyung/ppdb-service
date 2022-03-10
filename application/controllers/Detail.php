<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

/**
 *
 */
class Detail extends REST_Controller{

  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $id = $this->get('id');
    if ($id == ''){
      $detailjabatan = $this->db->get('tb_detailjabatan')->result();
    } else {
      $this->db->where('id', $id);
      $detailjabatan = $this->db->get('tb_detailjabatan')->result();
    }
    $this->response($detailjabatan, 200);
  }

  function index_post() {
    $data = array(
        'id'      =>  $this->input->post('id'),
        'id_jabatan'    =>  $this->input->post('id_jabatan'),
        'id_karyawan'   =>  $this->input->post('id_karyawan')
      );
    $insert = $this->db->insert('tb_detailjabatan', $data);
    if ($insert) {
      $this->response($data, 200);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }

  function index_put() {
    $data = array(
      'id_jabatan'    =>  $this->put('id_jabatan')
      );
    $this->db->where('id_karyawan', $this->put('id_karyawan'));
    $update = $this->db->update('tb_detailjabatan', $data);
    if ($update) {
      $this->response($data, 200);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }

  function index_delete() {
    $id = $this->delete('id');
    $this->db->where('id', $id);
    $delete = $this->db->delete('tb_detailjabatan');
    if ($delete) {
      $this->response(array('status' => 'success'), 201);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }
}


?>
