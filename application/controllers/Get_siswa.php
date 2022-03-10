<?php
/******************************************
* Filename    : get_siswa.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-03-20
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get Data siswa
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class get_siswa extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $where = $this->get('where');
    $siswa = "";
    if ($where != ''){
      if (isset($where['id'])&&$where['id'] == '-1'){
        $siswa = $this->db->order_by('id',"desc")
          ->limit(1)
          ->get('tb_siswa')
          ->result();
      }else{
        $siswa = $this->db->get_where('tb_siswa', $where)->result();
      }
    }
    if ($siswa) {
      $this->response($siswa, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
