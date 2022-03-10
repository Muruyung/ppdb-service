<?php
/******************************************
* Filename    : Sosmed_set_komentar.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-03-20
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Insert & Update Data komentar (Login)
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Sosmed_set_komentar extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  // Memasukkan (Post) data komentar
  function index_post() {
    $data = $this->post('data');
    $insert = $this->db->insert('sosmed_tb_komentar', $data);
    if ($insert) {
      $this->response($data, 200);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }

  // Mengupdate (Put) data komentar
  function index_put() {
    $where = $this->put('where');
    $data = $this->put('data');
    $this->db->where($where);
    $update = $this->db->update('sosmed_tb_komentar', $data);
    if ($update) {
      $this->response($data, 200);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }
}
?>
