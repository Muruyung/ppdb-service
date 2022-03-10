<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

/**
 *
 */
class Jabatan extends REST_Controller{

  function __construct($config = 'rest') {
      parent::__construct($config);
      $this->load->database();
  }

  function index_get() {
      $id = $this->get('id');
      if ($id == '') {
          $jabatan = $this->db->get('tb_jabatan')->result();
      } else {
          $this->db->where('id', $id);
          $jabatan = $this->db->get('tb_jabatan')->result();
      }
      $this->response($jabatan, 200);
  }
}


?>
