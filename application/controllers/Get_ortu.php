<?php
/******************************************
* Filename    : get_ortu.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-03-20
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get Data ortu
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Get_ortu extends REST_Controller {
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
    $ortu = $this->db->get_where('tb_ortu', $where)->result();
    if ($ortu) {
      $this->response($ortu, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
