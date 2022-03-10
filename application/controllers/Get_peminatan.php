<?php
/******************************************
* Filename    : get_peminatan.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-03-20
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get Data peminatan
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class get_peminatan extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $where = $this->get('where');
    $peminatan = $this->db->get_where('t_peminatan', $where)->result();
    if ($peminatan) {
      $this->response($peminatan, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
