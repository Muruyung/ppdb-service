<?php
/******************************************
* Filename    : get_all_prestasi.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2021-03-20
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get semua Data prestasi
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Get_all_prestasi extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $prestasi = $this->db->get('t_prestasi')->result();
    if ($prestasi) {
      $this->response($prestasi, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
