<?php
/******************************************
* Filename    : get_kabupaten.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-04-05
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get Data kabupaten
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class get_kabupaten extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $where = $this->get('where');
    $kabupaten = $this->db->get_where('kabupaten', $where)->result();
    if ($kabupaten) {
      $this->response($kabupaten, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
