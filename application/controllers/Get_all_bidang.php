<?php
/******************************************
* Filename    : get_all_bidang.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2021-03-20
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get semua Data bidang
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Get_all_bidang extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $bidang = $this->db->get('t_bidang')->result();
    if ($bidang) {
      $this->response($bidang, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
