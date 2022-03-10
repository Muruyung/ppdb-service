<?php
/******************************************
* Filename    : get_all_agama.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-04-05
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get semua Data agama
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class get_all_agama extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $seleksi = $this->db->get('t_agama')->result();
    if ($seleksi) {
      $this->response($seleksi, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
