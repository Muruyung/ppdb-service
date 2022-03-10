<?php
/******************************************
* Filename    : Sosmed_get_all_komentar.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-06-06
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Get semua Data komentar (sosmed)
*
******************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Sosmed_get_all_komentar extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $komentar = "";
    $limit  = $this->get('limit');
    $offset = $this->get('offset');
    if ($limit != "" && $offset != ""){
      $komentar = $this->db->order_by('id',"desc")->get('sosmed_tb_komentar',$limit,$offset)->result();
    }
    if ($komentar) {
      $this->response($komentar, 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
