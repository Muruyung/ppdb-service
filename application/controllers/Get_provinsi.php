<?php
/******************************************
* Filename    : get_provinsi.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-04-22
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get Data provinsi
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class get_provinsi extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $where = $this->get('where');
    $provinsi = $this->db->get_where('provinsi', $where)->result();
    if ($provinsi) {
      $this->response($provinsi, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
