<?php

class Auth extends CI_Controller{

    public function index()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('login');
    }


    public function proses_login()
    {
        $this->form_validation->set_rules('username','username','required',[
            'required' => 'Username Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('password','password','required',[
            'required' => 'Password Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('role','role','required',[
            'required' => 'Wajib Dipilih!'
        ]);
        if ($this->form_validation->run() == FALSE){
            $this->load->view('templates_admin/header');
            $this->load->view('login');
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $role = $this->input->post('role');
            $nama_admin = $this->input->post('nama_admin');

            $user = $username;
            $pass = $password;

            if($role == 'admin'){
            $cek = $this->m_login->cek_login_admin($user, $pass);
            if ($cek->num_rows() > 0){
                        foreach ($cek->result() as $cek){
                            $sess_data['id_admin'] = $cek->id_admin;
                            $sess_data['nama_admin'] = $cek->nama_admin;
                            $sess_data['username'] = $cek->username;
                            $sess_data['email'] = $cek->email;
                            $sess_data['foto'] = $cek->foto;
                            $sess_data['jenis_akun'] = 'admin';

                            $this->session->set_userdata($sess_data);
                        }
                        if($sess_data['jenis_akun'] == 'admin'){
                            redirect('admin/dashboard');
                        }else{
                            $this->session->set_flashdata('pesan',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Username atau Password Salah!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');
                            redirect('auth');
                        }
            }else{
                    $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password Salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    redirect('auth');
                }
            }

            if($role == 'guru'){
                $cek = $this->m_login->cek_login_guru($user, $pass);
                if ($cek->num_rows() > 0){
                            foreach ($cek->result() as $cek){
                                $sess_data['kode_guru'] = $cek->kode_guru;
                                $sess_data['id_guru'] = $cek->id_guru;
                                $sess_data['nama_guru'] = $cek->nama_guru;
                                $sess_data['username'] = $cek->username;
                                $sess_data['email'] = $cek->email;
                                $sess_data['foto'] = $cek->foto;
                                $sess_data['walikelas'] = $cek->walikelas;
                                $sess_data['jenis_akun'] = 'guru';
                                $sess_data['role'] = 'Guru';

                                $this->session->set_userdata($sess_data);
                            }
                            if($sess_data['jenis_akun'] == 'guru'){
                                redirect('guru/dashboard');
                            }else{
                                $this->session->set_flashdata('pesan',
                                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Username atau Password Salah!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>');
                                redirect('auth');
                            }
                }else{
                        $this->session->set_flashdata('pesan',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Username atau Password Salah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
                        redirect('auth');
                    }
                }

                if($role == 'pesertadidik'){
                    $cek = $this->m_login->cek_login_pesertadidik($user, $pass);
                    if ($cek->num_rows() > 0){
                                foreach ($cek->result() as $cek){
                                    $sess_data['id'] = $cek->id;
                                    $sess_data['nama_pesertadidik'] = $cek->nama_pesertadidik;
                                    $sess_data['username'] = $cek->username;
                                    $sess_data['email'] = $cek->email;
                                    $sess_data['foto'] = $cek->foto;
                                    $sess_data['jenis_akun'] = 'pesertadidik';
                                    $sess_data['role'] = 'Peserta Didik';

                                    $this->session->set_userdata($sess_data);
                                }
                                if($sess_data['jenis_akun'] == 'pesertadidik'){
                                    redirect('pesertadidik/dashboard');
                                }else{
                                    $this->session->set_flashdata('pesan',
                                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Username atau Password Salah!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>');
                                    redirect('auth');
                                }
                    }else{
                            $this->session->set_flashdata('pesan',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Username atau Password Salah!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>');
                            redirect('auth');
                        }
                    }

                    if($role == 'walikelas'){
                        $cek = $this->m_login->cek_login_walikelas($user, $pass);
                        if ($cek->num_rows() > 0){
                                    foreach ($cek->result() as $cek){
                                        $sess_data['id_walikelas'] = $cek->id_walikelas;
                                        $sess_data['nama_walikelas'] = $cek->nama_walikelas;
                                        $sess_data['username'] = $cek->username;
                                        $sess_data['email'] = $cek->email;
                                        $sess_data['foto'] = $cek->foto;
                                        $sess_data['jenis_akun'] = 'walikelas';
                                        $sess_data['role'] = 'Wali Kelas';

                                        $this->session->set_userdata($sess_data);
                                    }
                                    if($sess_data['jenis_akun'] == 'walikelas'){
                                        redirect('walikelas/dashboard');
                                    }else{
                                        $this->session->set_flashdata('pesan',
                                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Username atau Password Salah!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>');
                                        redirect('auth');
                                    }
                        }else{
                                $this->session->set_flashdata('pesan',
                                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Username atau Password Salah!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>');
                                redirect('auth');
                            }
                        }
        }
    }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }


?>