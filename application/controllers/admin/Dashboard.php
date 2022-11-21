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
		  $data = $this->m_user->ambil_data_admin($this->session->userdata('username'));
      $data = array(
        'id_admin' => $data->id_admin,
        'nama_admin' => $data->nama_admin,
        'username' => $data->username,
        'role' => 'admin',
        'email' => $data->email

      );
      $this->load->view('templates_admin/header');
		  $this->load->view('templates_admin/sidebar');
      $this->load->view('admin/dashboard', $data);
		  $this->load->view('templates_admin/footer');
    }
}