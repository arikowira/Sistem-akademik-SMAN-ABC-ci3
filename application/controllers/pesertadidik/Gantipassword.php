<?php

class Gantipassword extends CI_Controller{

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
          $this->_rules();
          $data['title'] = 'Ganti Password';
          $data['tb_pesertadidik'] = $this->db->get_where('tb_pesertadidik',['username' => $this->session->userdata('username')])->row_array();
          if($this->form_validation->run() == false){
            $this->load->view('templates_pesertadidik/header');
            $this->load->view('templates_pesertadidik/sidebar');
            $this->load->view('pesertadidik/gantipassword', $data);
            $this->load->view('templates_pesertadidik/footer');
          }else{
            $passwordlama = $this->input->post('passwordlama');
            $passwordbaru = $this->input->post('passwordbaru');
            $username = $this->session->userdata('username');
            $cek = $this->m_gantipassword->cek_data_pesertadidik($username,$passwordlama);
                if ($cek->num_rows() > 0){
                  if($passwordlama == $passwordbaru){
                    $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Password Baru Tidak Boleh Sama Dengan Password Lama!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                  redirect('pesertadidik/gantipassword');
                }else{
                    $this->db->set('password', $passwordbaru);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('tb_pesertadidik');

                    $this->session->set_flashdata('pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Password Berhasil Di Ganti!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                  redirect('pesertadidik/gantipassword');
                }
            }else{
                $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Password Lama Salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                  redirect('pesertadidik/gantipassword');
            }
          }


      }

      public function _rules()
      {
        $this->form_validation->set_rules('passwordlama','passwordlama','required',[
            'required' => 'Password Lama Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('passwordbaru','passwordbaru','required|matches[passwordbaru2]',[
            'required' => 'Password Baru Wajib Diisi!', 'matches' => 'Password Baru Tidak Sama'
        ]);
        $this->form_validation->set_rules('passwordbaru2','passwordbaru2','required|matches[passwordbaru]',[
            'required' => 'Wajib Diisi!', 'matches' => 'Password Baru Tidak Sama'
        ]);
      }
}