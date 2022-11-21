<?php

class Pesertadidik extends CI_Controller{

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
        $data['tb_pesertadidik'] = $this->m_pesertadidik->tampil_data('tb_pesertadidik')->result();
        $data['tb_kelas'] = $this->m_pesertadidik->tampil_data('tb_kelas')->result();
        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/pesertadidik', $data);
		$this->load->view('templates_admin/footer');
    }

    public function tambah_pesertadidik()
    {
        $this->db->order_by('kode_kelas', 'ASC');
        $data['tb_kelas'] = $this->m_pesertadidik->tampil_data('tb_kelas')->result();
        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/pesertadidik_form', $data);
		$this->load->view('templates_admin/footer');
    }

    public function tambah_pesertadidik_aksi()
    {
        $this->_rules();

        if($this->form_validation->run()==FALSE){
            $this->tambah_pesertadidik();
        }else{
            $nisn = $this->input->post('nisn');
            $nama_pesertadidik = $this->input->post('nama_pesertadidik');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $alamat = $this->input->post('alamat');
            $telepon = $this->input->post('telepon');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $email = $this->input->post('email');
            $id_kelas = $this->input->post('id_kelas');
            $nama_orangtua = $this->input->post('nama_orangtua');
            $telepon_orangtua = $this->input->post('telepon_orangtua');
            $foto = $_FILES['foto']['name'];
            if($foto=''){
            }else{
                $config['upload_path'] = './assets/uploads/foto_pesertadidik';
                $config['allowed_types'] = 'jpg|png|jpeg';

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('foto')){
                    echo "Gagal Upload"; die();
                }else{
                    $foto = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nisn' => $nisn,
                'nama_pesertadidik' => $nama_pesertadidik,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat' => $alamat,
                'telepon' => $telepon,
                'jenis_kelamin' => $jenis_kelamin,
                'email' => $email,
                'id_kelas' => $id_kelas,
                'nama_orangtua' => $nama_orangtua,
                'telepon_orangtua' => $telepon_orangtua,
                'foto' => $foto
            );
            $this->m_pesertadidik->insert_data($data,'tb_pesertadidik');
            $this->session->set_flashdata('pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Peserta Didik Berhasil Ditambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
            redirect('admin/pesertadidik');
        }
    }

    public function _rules(){

        $this->form_validation->set_rules('nisn','nisn','required',[
            'required' => 'NISN Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('nama_pesertadidik','nama_pesertadidik','required',[
            'required' => 'Nama Peserta Didik Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('tempat_lahir','tempat_lahir','required',[
            'required' => 'Tempat Lahir Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir','tanggal_lahir','required',[
            'required' => 'Tanggal Lahir Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('alamat','alamat','required',[
            'required' => 'Alamat Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('telepon','telepon','required',[
            'required' => 'Telepon Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required',[
            'required' => 'jenis_kelamin Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('email','email','required',[
            'required' => 'Email Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('id_kelas','id_kelas','required',[
            'required' => 'Kelas Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('nama_orangtua','nama_orangtua','required',[
            'required' => 'Nama Orang Tua Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('telepon_orangtua','telepon_orangtua','required',[
            'required' => 'Telepon Orang Tua Wajib Diisi!'
        ]);

        if(empty($_FILES['foto']['name']))
        {
            $this->form_validation->set_rules('foto','foto','required',[
                'required' => 'Foto Wajib Diisi!']);
        }
    }

    public function update($id)
    {
        $where = array('id' => $id);
        $data['tb_pesertadidik'] = $this->db->query("select * from tb_pesertadidik ptd, tb_kelas kls where ptd.id_kelas=kls.id_kelas and ptd.id = '$id'")->result();
        $this->db->order_by('kode_kelas', 'ASC');
        $data['tb_kelas'] = $this->m_pesertadidik->tampil_data('tb_kelas')->result();


        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/pesertadidik_update', $data);
		$this->load->view('templates_admin/footer');
    }

    public function update_pesertadidik_aksi()
    {
        $id                 = $this->input->post('id');
        $nisn               = $this->input->post('nisn');
        $nama_pesertadidik  = $this->input->post('nama_pesertadidik');
        $tempat_lahir       = $this->input->post('tempat_lahir');
        $tanggal_lahir      = $this->input->post('tanggal_lahir');
        $alamat             = $this->input->post('alamat');
        $telepon            = $this->input->post('telepon');
        $jenis_kelamin      = $this->input->post('jenis_kelamin');
        $email              = $this->input->post('email');
        $id_kelas           = $this->input->post('id_kelas');
        $nama_orangtua      = $this->input->post('nama_orangtua');
        $telepon_orangtua   = $this->input->post('telepon_orangtua');
        $foto               = $_FILES['userfile']['name'];
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
            'alamat' => $alamat,
            'telepon' => $telepon,
            'jenis_kelamin' => $jenis_kelamin,
            'email' => $email,
            'id_kelas' => $id_kelas,
            'nama_orangtua' => $nama_orangtua,
            'telepon_orangtua' => $telepon_orangtua
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
        redirect('admin/pesertadidik');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->m_pesertadidik->hapus_data($where,'tb_pesertadidik');
        $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Peserta Didik Berhasil Dihapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('admin/pesertadidik');
    }
}

