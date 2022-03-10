<?php
/******************************************
* Filename    : get_all_kepemilikan.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-04-05
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get semua Data Kepemilikan Rumah
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Get_all_kepemilikan extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $kepemilikan = $this->db->get('t_kepemilikan')->result();
    if ($kepemilikan) {
      $this->response($kepemilikan, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
