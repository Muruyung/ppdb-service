<?php

class M_api extends CI_Model{

  function read($id){
    if ($id == '') {
        return $this->db->get('tb_karyawan')->result();
    } else {
        $this->db->where('id', $id);
        return $this->db->get('tb_karyawan')->result();
    }
  }

  function
}

 ?>
