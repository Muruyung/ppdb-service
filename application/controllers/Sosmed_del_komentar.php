<?php
/******************************************
* Filename    : Sosmed_del_komentar.php
* Programmer  : Robi Naufal Kaosar
* Date        : 2020-06-11
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Delete data komentar
*
******************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Sosmed_del_komentar extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_delete() {
        $id = decrypt_url($this->delete('id'));
        $this->db->where('id_komentar', $id);
        $delete = $this->db->delete('sosmed_tb_balasan');

        $this->db->where('id', $id);
        $delete = $this->db->delete('sosmed_tb_komentar');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>
