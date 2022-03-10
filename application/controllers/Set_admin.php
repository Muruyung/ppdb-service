<?php
/******************************************
* Filename    : set_admin.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-03-20
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Update Data Admin (Login)
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class set_admin extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  // Mengupdate (Put) data siswa
  function index_put() {
    $where = array(
      'u' => $this->put('username'),
      'p' => $this->put('password')
    );
    $data = array(
      'token' => $this->put('token')
    );
    // $this->response(array($this->put(), 502), 502);
    $select = $this->db->get_where('tb_admin', $where)->result();
    if ($select) {
      $this->db->where($where);
      $update = $this->db->update('tb_admin', $data);
      $this->response(array('status' => 'success'), 200);
    } else {
      $this->response(array('status' => 'fail', 502), 502);
    }
  }
}
?>
