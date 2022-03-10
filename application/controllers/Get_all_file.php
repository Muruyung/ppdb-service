<?php
/******************************************
* Filename    : get_all_file.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-04-05
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get semua Data File siswa
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Get_all_file extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $where = array(
      'u'=> decrypt_url($this->get('username')),
      'p'=> decrypt_url($this->get('password'))
    );
    $admin = $this->db->get_where('tb_admin', $where)->result();
    if($admin){
      $all_file = [];
      if (!is_null($this->get('jenis'))){
        $all_file = $this->db->get_where('tb_file',['jenis' => $this->get('jenis')])->result();
      }else{
        $all_file = $this->db->get('tb_file')->result();
      }
      if ($all_file) {
        $this->response($all_file, 200);
      } else {
        $this->response(array('status' => 'Not Found', 401));
      }
    }else{
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
