<?php

class Guru extends CI_Controller{

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
        $data['tb_guru'] = $this->m_guru->tampil_data('tb_guru')->result();
        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/guru', $data);
		$this->load->view('templates_admin/footer');
    }

    public function tambah_guru()
    {
        $data['tb_guru'] = $this->m_dataadmin->tampil_data('tb_guru')->result();
        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/guru_form', $data);
		$this->load->view('templates_admin/footer');
    }

    public function tambah_guru_aksi()
    {
        $this->_rules();

        if($this->form_validation->run()==FALSE){
            $this->tambah_guru();
        }else{
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
            $walikelas = $this->input->post('walikelas');
            $foto = $_FILES['foto']['name'];
            if($foto=''){
            }else{
                $config['upload_path'] = './assets/uploads/foto_guru';
                $config['allowed_types'] = 'jpg|png|jpeg';

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('foto')){
                    echo "Gagal Upload"; die();
                }else{
                    $foto = $this->upload->data('file_name');
                }
            }

            $data = array(
                'kode_guru' => $kode_guru,
                'nama_guru' => $nama_guru,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'agama' => $agama,
                'alamat' => $alamat,
                'email' => $email,
                'telepon' => $telepon,
                'username' => $username,
                'password' => $password,
                'walikelas' => $walikelas,
                'foto' => $foto
            );
            $this->m_guru->insert_data($data,'tb_guru');
            $this->session->set_flashdata('pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Peserta Didik Berhasil Ditambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
            redirect('admin/guru');
        }
    }

    public function _rules(){

        $this->form_validation->set_rules('kode_guru','kode_guru','required',[
            'required' => 'Kode Guru Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('nama_guru','nama_guru','required',[
            'required' => 'Nama Guru Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('tempat_lahir','tempat_lahir','required',[
            'required' => 'Tempat Lahir Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir','tanggal_lahir','required',[
            'required' => 'Tanggal Lahir Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required',[
            'required' => 'jenis_kelamin Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('agama','agama','required',[
            'required' => 'Agama Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('alamat','alamat','required',[
            'required' => 'Alamat Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('email','email','required',[
            'required' => 'Email Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('telepon','telepon','required',[
            'required' => 'Telepon Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('walikelas','walikelas','required',[
            'required' => 'Status Walikelas Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('username','username','required',[
            'required' => 'Username Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('password','password','required',[
            'required' => 'Password Wajib Diisi!'
        ]);
        if(empty($_FILES['foto']['name']))
        {
            $this->form_validation->set_rules('foto','foto','required',[
                'required' => 'Foto Wajib Diisi!']);
        }
    }

    public function update($id)
    {
        $where = array('id_guru' => $id);
        $data['tb_guru'] = $this->m_guru->edit_data($where,'tb_guru')->result();
        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/guru_update', $data);
		$this->load->view('templates_admin/footer');
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
        $walikelas = $this->input->post('walikelas');
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
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $agama,
            'alamat' => $alamat,
            'email' => $email,
            'telepon' => $telepon,
            'walikelas' => $walikelas,
            'username' => $username,
            'password' => $password
        );

        $where = array(
            'id_guru' => $id
        );

        $this->m_guru->update_data($where,$data,'tb_guru');
        $this->session->set_flashdata('pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Jurusan Berhasil Diupdate!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('admin/guru');
    }

    public function delete($id)
    {
        $where = array('id_guru' => $id);
        $this->m_guru->hapus_data($where,'tb_guru');
        $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Guru Berhasil Dihapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('admin/guru');
    }

    public function detail($id)
    {
        $where = array('id_guru' => $id);
        $data['tb_guru'] = $this->m_kelas->get_where('tb_guru',$where)->result();

        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/guru_detail', $data);
		$this->load->view('templates_admin/footer');
    }
}
