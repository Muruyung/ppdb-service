<?php
/******************************************
* Filename    : set_file.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-04-05
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Insert & Update Data file
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class set_file extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  // Memasukkan (Post) data file
  function index_post() {
    $data = $this->post('data');
    if ($data != ''){
      $where = array(
        'id_user' => $this->post('data')['id_user'],
        'jenis'   => $this->post('data')['jenis']
      );
      $file = $this->db->get_where('tb_file', $where)->result();
    }
    if ($file || $data == '') {
      $this->response(array('status' => 'fail', 502));
    } else {
      if ($data != ''){
        $insert = $this->db->insert('tb_file', $data);
      }
      if ($insert) {
        $this->response($data, 200);
      } else {
        $this->response(array('status' => 'fail', 502));
      }
    }
  }

  // Mengupdate (Put) data file
  function index_put() {
    $where = $this->put('where');
    $data = $this->put('data');
    $this->db->where($where);
    $update = $this->db->update('tb_file', $data);
    if ($update) {
      $this->response($data, 200);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }
}
?>
