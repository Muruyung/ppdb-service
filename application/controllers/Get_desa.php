<?php
/******************************************
* Filename    : get_desa.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-04-05
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get Data desa
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class get_desa extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $where = $this->get('where');
    $kelurahan = $this->db->get_where('kelurahan', $where)->result();
    if ($kelurahan) {
      $this->response($kelurahan, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
