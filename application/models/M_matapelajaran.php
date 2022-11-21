<?php

class M_matapelajaran extends CI_Model{

    public function tampil_Data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data,$table)
    {
        $this->db->insert($table, $data);
    }

    public function ambil_kode_matapelajaran($kode)
    {
        $result = $this->db->where('kode_matapelajaran',$kode)->get('tb_matapelajaran');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}