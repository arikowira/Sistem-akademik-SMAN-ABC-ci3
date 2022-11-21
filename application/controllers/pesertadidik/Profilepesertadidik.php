<?php

class Profilepesertadidik extends CI_Controller{

public function index()
    {
        $where = array('id' => $this->session->userdata('id'));
        $data['tb_pesertadidik'] = $this->m_pesertadidik->edit_data($where,'tb_pesertadidik')->result();
        $this->load->view('templates_pesertadidik/header');
		$this->load->view('templates_pesertadidik/sidebar');
        $this->load->view('pesertadidik/profilepesertadidik', $data);
		$this->load->view('templates_pesertadidik/footer');
    }

    public function update_pesertadidik_aksi()
    {
        $id = $this->input->post('id');
        $nisn = $this->input->post('nisn');
        $nama_pesertadidik = $this->input->post('nama_pesertadidik');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $agama = $this->input->post('agama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $nama_orangtua = $this->input->post('nama_orangtua');
        $telepon_orangtua = $this->input->post('telepon_orangtua');
        $foto = $_FILES['userfile']['name'];
        if($foto){
            $config['upload_path'] = './assets/uploads/foto_pesertadidik';
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
            'nisn' => $nisn,
            'nama_pesertadidik' => $nama_pesertadidik,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'agama' => $agama,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'jenis_kelamin' => $jenis_kelamin,
            'email' => $email,
            'nama_orangtua' => $nama_orangtua,
            'telepon_orangtua' => $telepon_orangtua,
        );

        $where = array(
            'id' => $id
        );

        $this->m_pesertadidik->update_data($where,$data,'tb_pesertadidik');
        $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Peserta Didik Berhasil Diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('pesertadidik/profilepesertadidik');
    }
}