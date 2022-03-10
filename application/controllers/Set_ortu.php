<?php
/******************************************
* Filename    : set_ortu.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-03-20
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Insert & Update Data ortu (Login)
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class set_ortu extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  // Memasukkan (Post) data ortu
  function index_post() {
    $data = $this->post('data');
    if ($data != ''){
      $where = array(
        'id_user' => $this->post('data')['id_user'],
        'jenis'   => $this->post('data')['jenis']
      );
      $ortu = $this->db->get_where('tb_ortu', $where)->result();
    }
    if ($ortu || $data == '') {
      $this->response(array('status' => 'fail', 502));
    } else {
      if ($data != ''){
        $insert = $this->db->insert('tb_ortu', $data);
      }
      if ($insert) {
        $this->response($data, 200);
      } else {
        $this->response(array('status' => 'fail', 502));
      }
    }
  }

  // Mengupdate (Put) data ortu
  function index_put() {
    $where = $this->put('where');
    $data = $this->put('data');
    $this->db->where($where);
    $update = $this->db->update('tb_ortu', $data);
    if ($update) {
      $this->response($data, 200);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }
}
?>
