<?php
/******************************************
* Filename    : get_admin.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-03-20
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get Data Admin (Login)
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class get_admin extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $where = $this->get('where');
    $admin = "";
    if (isset($where['u']) && isset($where['p'])){

      $admin = $this->db->get_where('tb_admin', $where)->result();
    }else{
      $where = array(
        'u' => "-1"
      );
      $admin = $this->db->get_where('tb_admin', $where)->result();
    }
    if ($admin) {
      if ($admin[0]->token != ""){
        $this->response(['0' =>['token'=> encrypt_url($admin[0]->token.' '.$admin[0]->email)]], 200);
      } else {
        $this->response(array('status' => 'Not Found', 401));
      }
    } else {
      $this->response(array('status' => 'Not Found', 401));
      // $this->response(array('status' => $where, 401));
    }
  }
}
?>
