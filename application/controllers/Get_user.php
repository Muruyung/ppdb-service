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

class get_user extends REST_Controller {
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
    $user = $this->db->get_where('tb_user', $where)->result();
    if ($user) {
      $this->response(['0' =>[
          'id'              => encrypt_url($user[0]->id),
          'id_user'         => encrypt_url($user[0]->id_user),
          'tahap_daftar'    => $user[0]->tahap_daftar,
          'kesempatan_email'=> $user[0]->kesempatan_email,
          'kesempatan_lupa' => $user[0]->kesempatan_lupa,
          'konfirmasi_lupa' => $user[0]->konfirmasi_lupa,
        ]
      ], 200);
    } else {
      $this->response(array('status' => 'Not Found', 401));
    }
  }
}
?>
