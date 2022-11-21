<?php

class M_gantipassword extends CI_Model{

    public function cek_data_guru($username, $password)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get('tb_guru');
    }

    public function cek_data_walikelas($username, $password)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get('tb_walikelas');
    }

    public function cek_data_pesertadidik($username, $password)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get('tb_pesertadidik');
    }
}