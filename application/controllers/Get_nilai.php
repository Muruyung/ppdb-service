<?php
/******************************************
* Filename    : get_nilai.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-03-20
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get Data nilai
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class get_nilai extends REST_Controller {
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
    $nilai = $this->db->get_where('tb_nilai', $where)->result();
    if ($nilai) {
      $this->response($nilai, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
