<?php

class M_tahunakademik extends CI_Model{

    public function tampil_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_Data($data,$table)
    {
        $this->db->insert($table,$data);
    }

    public function edit_data($where,$table)
    {
        return $this->db->get_where($table,$where);
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

    public $table = 'tb_tahunakademik';
    public $id = 'id_tahunakademik';

    public function get_by_id($id)
    {
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }
}