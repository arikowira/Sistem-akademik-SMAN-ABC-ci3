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
	  $data = $this->m_user->ambil_data_guru($this->session->userdata('username'));
      $data = array(
        'id_guru' => $data->id_guru,
        'kode_guru' => $data->kode_guru,
        'nama_guru' => $data->nama_guru,
        'tempat_lahir' => $data->tempat_lahir,
        'tanggal_lahir' => $data->tanggal_lahir,
        'jenis_kelamin' => $data->jenis_kelamin,
        'agama' => $data->agama,
        'alamat' => $data->alamat,
        'email' => $data->email,
        'telepon' => $data->telepon,
        'role' => 'guru'

      );
        $data['title'] = 'Dashboard Guru';
        $this->load->view('templates_guru/header');
		    $this->load->view('templates_guru/sidebar');
        $this->load->view('guru/dashboard', $data);
		    $this->load->view('templates_guru/footer');
    }
}