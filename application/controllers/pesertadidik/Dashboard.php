<?php

class Dashboard extends CI_Controller{

    function __construct(){
      parent::__construct();

      if(!isset($this->session->userdata['username'])){
        $this->session->set_flashdata('pesan',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Anda Belum Login!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('auth');
      }
    }

    public function index()
    {
	  $data = $this->m_user->ambil_data_pesertadidik($this->session->userdata('username'));
      $data = array(
        'id' => $data->id,
        'nisn' => $data->nisn,
        'nama_pesertadidik' => $data->nama_pesertadidik,
        'tempat_lahir' => $data->tempat_lahir,
        'tanggal_lahir' => $data->tanggal_lahir,
        'jenis_kelamin' => $data->jenis_kelamin,
        'agama' => $data->agama,
        'alamat' => $data->alamat,
        'email' => $data->email,
        'telepon' => $data->telepon,
        'nama_orangtua' => $data->nama_orangtua,
        'telepon_orangtua' => $data->telepon_orangtua,
        'role' => 'Peserta Didik'

      );
        $data['title'] = 'Dashboard Peserta Didik';
        $this->load->view('templates_pesertadidik/header');
		    $this->load->view('templates_pesertadidik/sidebar');
        $this->load->view('pesertadidik/dashboard', $data);
		    $this->load->view('templates_pesertadidik/footer');
    }
}