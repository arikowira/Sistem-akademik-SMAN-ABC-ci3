<?php

class M_riwayatnilai extends CI_Model{

    public function tampil_data($table)
    {
        return $this->db->get($table);
    }

    public function ambil_data_kelas($id)
    {
        $this->db->where('id_kelas', $id);
        return $this->db->get('tb_kelas')->row();
    }

    public function ambil_data_tahunakademik($id)
    {
        $this->db->where('id_tahunakademik', $id);
        return $this->db->get('tb_tahunakademik')->row();
    }

    public function ambil_data_matapelajaran($id)
    {
        $this->db->where('kode_matapelajaran', $id);
        return $this->db->get('tb_matapelajaran')->row();
    }

    public function ambil_data_pesertadidik($id)
    {
        $this->db->select('*');
        $this->db->from('tb_pesertadidik');
        $this->db->where('id_kelas', $id);
        $this->db->order_by('nama_pesertadidik','ASC');
        $query = $this->db->get();

        return $query->result();
    }
}
