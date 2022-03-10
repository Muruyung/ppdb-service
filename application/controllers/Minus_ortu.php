<?php
/******************************************
* Filename    : minus_ortu.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-04-08
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Delete data ortu
*
******************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Minus_ortu extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_delete() {
        $id = $this->delete('id');
        $jenis = $this->delete('jenis');
        $this->db->where(['id_user'=>$id, 'jenis'=>$jenis]);
        $delete = $this->db->delete('tb_ortu');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>
