<?php
/******************************************
* Filename    : get_user.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-03-20
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get Data User (Login)
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class get_file extends REST_Controller {
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
    $user = $this->db->get_where('tb_file', $where)->result();
    if ($user) {
      $this->response($user, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
