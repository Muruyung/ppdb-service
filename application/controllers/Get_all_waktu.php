<?php
/******************************************
* Filename    : get_all_waktu.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2021-03-15
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get semua Data Waktu
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Get_all_waktu extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $waktu = $this->db->get('t_waktu')->result();
    if ($waktu) {
      $this->response($waktu, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
