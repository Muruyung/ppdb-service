<?php
/******************************************
* Filename    : Sosmed_set_suka.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-03-20
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Insert & Update Data suka (Login)
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Sosmed_set_suka extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  // Memasukkan (Post) data suka
  function index_post() {
    $data = $this->post('data');
    $insert = $this->db->insert('sosmed_tb_suka', $data);
    if ($insert) {
      $this->response($data, 200);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }

  // Menghapus (Delete) data suka
  function index_delete() {
    $where = array(
      'id_user' => decrypt_url($this->delete('id_user')),
      'id_post' => decrypt_url($this->delete('id_post')),
      'jenis'   => $this->delete('jenis')
    );

    $this->db->where($where);
    $delete = $this->db->delete('sosmed_tb_suka');
    if ($delete) {
      $this->response(array('status' => 'success'), 201);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }
}
?>
