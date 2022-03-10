<?php
/******************************************
* Filename    : get_all_siswa_limit.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-06-08
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get semua Data siswa dengan limit
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class get_all_siswa_limit extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $where = array(
      'u'=> decrypt_url($this->get('username')),
      'p'=> decrypt_url($this->get('password'))
    );
    $limit = $this->get('limit');
    $offset = $this->get('offset');
    $admin = $this->db->get_where('tb_admin', $where)->result();
    if($admin){
      $all_siswa = $this->db->get('tb_siswa',$limit,$offset)->result();
      if ($all_siswa) {
        $this->response($all_siswa, 200);
      } else {
        $this->response(array('status' => 'Not Found', 401));
      }
    }else{
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
