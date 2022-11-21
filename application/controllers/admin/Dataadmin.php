<?php

class Dataadmin extends CI_Controller{

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
        $data['tb_admin'] = $this->m_dataadmin->tampil_data('tb_admin')->result();
        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataadmin', $data);
		$this->load->view('templates_admin/footer');
    }

    public function tambah_admin()
    {
        $data['tb_admin'] = $this->m_dataadmin->tampil_data('tb_admin')->result();

        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataadmin_form', $data);
		$this->load->view('templates_admin/footer');
    }

    public function tambah_admin_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->tambah_admin();
        }else{
            $nama_admin = $this->input->post('nama_admin');
            $email = $this->input->post('email');
            $blokir = $this->input->post('blokir');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $data = array(
                'nama_admin' => $nama_admin,
                'email' => $email,
                'blokir' => $blokir,
                'username' => $username,
                'password' => $password,
            );


            $this->m_dataadmin->input_data($data,'tb_admin');
            $this->session->set_flashdata('pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Admin Berhasil Ditambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
            redirect('admin/dataadmin');
        }
    }

    public function _rules(){

        $this->form_validation->set_rules('nama_admin','nama_admin','required',[
            'required' => 'Nama Admin Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('email','email','required',[
            'required' => 'Email Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('blokir','blokir','required',[
            'required' => 'Wajib Dipilih!'
        ]);
        $this->form_validation->set_rules('username','username','required',[
            'required' => 'Username Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('password','password','required',[
            'required' => 'Password Wajib Diisi!'
        ]);
    }

    public function update($id)
    {
        $where = array('id_admin' => $id);
        $data['tb_admin'] = $this->m_dataadmin->edit_data($where,'tb_admin')->result();
        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataadmin_update', $data);
		$this->load->view('templates_admin/footer');
    }

    public function update_aksi()
    {
        $id = $this->input->post('id_admin');
        $nama_admin = $this->input->post('nama_admin');
        $email = $this->input->post('email');
        $blokir = $this->input->post('blokir');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'nama_admin' => $nama_admin,
            'email' => $email,
            'blokir' => $blokir,
            'username' => $username,
            'password' => $password,
        );

        $where = array(
            'id_admin' => $id
        );

        $this->m_dataadmin->update_data($where,$data,'tb_admin');
        $this->session->set_flashdata('pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Admin Berhasil Diupdate!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('admin/dataadmin');
    }

    public function delete($id)
    {
        $where = array('id_admin' => $id);
        $this->m_dataadmin->hapus_data($where,'tb_admin');
        $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Admin Berhasil Dihapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('admin/dataadmin');
    }

}
