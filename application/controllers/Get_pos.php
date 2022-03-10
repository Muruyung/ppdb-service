<?php
/******************************************
* Filename    : get_pos.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2021-03-15
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get Data Kode Pos
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class get_pos extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $where = $this->get('where');
    $kode_pos = $this->db->get_where('kode_pos', $where)->result();
    if ($kode_pos) {
      $this->response($kode_pos, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
