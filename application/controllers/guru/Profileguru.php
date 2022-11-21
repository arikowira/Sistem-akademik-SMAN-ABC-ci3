<?php

class Profileguru extends CI_Controller{

public function index()
    {
        $where = array('id_guru' => $this->session->userdata('id_guru'));
        $data['tb_guru'] = $this->m_guru->edit_data($where,'tb_guru')->result();
        $this->load->view('templates_guru/header');
		$this->load->view('templates_guru/sidebar');
        $this->load->view('guru/profileguru', $data);
		$this->load->view('templates_guru/footer');
    }

    public function update_guru_aksi()
    {
        $id = $this->input->post('id_guru');
        $kode_guru = $this->input->post('kode_guru');
        $nama_guru = $this->input->post('nama_guru');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $agama = $this->input->post('agama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $foto = $_FILES['userfile']['name'];
        if($foto){
            $config['upload_path'] = './assets/uploads/foto_guru';
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload',$config);

            if($this->upload->do_upload('userfile')){
                $userfile = $this->upload->data('file_name');
                $this->db->set('foto',$userfile);
            }else{
                echo "Gagal Upload";
            }
        }
        $data = array(
            'kode_guru' => $kode_guru,
            'nama_guru' => $nama_guru,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'agama' => $agama,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'jenis_kelamin' => $jenis_kelamin,
            'email' => $email,
        );

        $where = array(
            'id_guru' => $id
        );

        $this->m_guru->update_data($where,$data,'tb_guru');
        $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Guru Berhasil Diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('guru/profileguru');
    }
}