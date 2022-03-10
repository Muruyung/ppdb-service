<?php
/******************************************
* Filename    : Sosmed_get_komentar.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-06-06
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get Data komentar (Sosmed)
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Sosmed_get_komentar extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $where = $this->get('where');
    if ($where == ""){
      $where = array(
        'id' => "-1"
      );
    }
    $komentar = $this->db->get_where('sosmed_tb_komentar', $where)->result();
    if ($komentar) {
      $this->response($komentar, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
