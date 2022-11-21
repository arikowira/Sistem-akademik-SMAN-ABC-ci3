<?php

class M_user extends CI_Model{
    public function ambil_data_admin($id)
    {
        $this->db->where('username', $id);
        return $this->db->get('tb_admin')->row();
    }

    public function ambil_data_walikelas($id)
    {
        $this->db->where('username', $id);
        return $this->db->get('tb_walikelas')->row();
    }

    public function ambil_data_guru($id)
    {
        $this->db->where('username', $id);
        return $this->db->get('tb_guru')->row();
    }

    public function ambil_data_pesertadidik($id)
    {
        $this->db->where('username', $id);
        return $this->db->get('tb_pesertadidik')->row();
    }
}

?>