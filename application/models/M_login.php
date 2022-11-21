<?php

class M_login extends CI_Model{

    public function cek_login_admin($username, $password)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get('tb_admin');
    }

    public function cek_login_guru($username, $password)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get('tb_guru');
    }

    public function cek_login_pesertadidik($username, $password)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get('tb_pesertadidik');
    }

    public function cek_login_walikelas($username, $password)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get('tb_walikelas');
    }
}

?>