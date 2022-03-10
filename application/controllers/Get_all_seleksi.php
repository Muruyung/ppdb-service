<?php
/******************************************
* Filename    : get_all_seleksi.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-03-20
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get semua Data Seleksi (Login)
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Get_all_seleksi extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $seleksi = $this->db->get('tb_seleksi')->result();
    if ($seleksi) {
      $this->response($seleksi, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
