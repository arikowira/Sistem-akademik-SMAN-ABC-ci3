<?php

class Matapelajaran extends CI_Controller{

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
        $data['tb_matapelajaran'] = $this->m_matapelajaran->tampil_data('tb_matapelajaran')->result();
        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/matapelajaran', $data);
		$this->load->view('templates_admin/footer');
    }

    public function tambah_matapelajaran()
    {
        $data['tb_tingkat'] = $this->m_matapelajaran->tampil_data('tb_tingkat')->result();
        $data['tb_jurusan'] = $this->m_matapelajaran->tampil_data('tb_jurusan')->result();
        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/matapelajaran_form', $data);
		$this->load->view('templates_admin/footer');
    }

    public function tambah_matapelajaran_aksi()
    {
        $this->_rules();
        if($this->form_validation->run()==FALSE){
            $this->tambah_matapelajaran();
        }else{
            $kode_matapelajaran = $this->input->post('kode_matapelajaran');
            $nama_matapelajaran = $this->input->post('nama_matapelajaran');
            $semester = $this->input->post('semester');
            $tingkat = $this->input->post('tingkat');
            $nama_jurusan = $this->input->post('nama_jurusan');

            $data = array(
                'kode_matapelajaran' => $kode_matapelajaran,
                'nama_matapelajaran' => $nama_matapelajaran,
                'semester' => $semester,
                'tingkat' => $tingkat,
                'nama_jurusan' => $nama_jurusan
            );
            $this->m_matapelajaran->insert_data($data,'tb_matapelajaran');
            $this->session->set_flashdata('pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Mata Pelajaran Berhasil Ditambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
            redirect('admin/matapelajaran');
        }
    }

    public function _rules(){

        $this->form_validation->set_rules('kode_matapelajaran','kode_matapelajaran','required',[
            'required' => 'Kode Mata Pelajaran Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('nama_matapelajaran','nama_matapelajaran','required',[
            'required' => 'Nama Mata Pelajaran Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('semester','semester','required',[
            'required' => 'Semester Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('tingkat','tingkat','required',[
            'required' => 'Tingkat Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('nama_jurusan','nama_jurusan','required',[
            'required' => 'Jurusan Wajib Diisi!'
        ]);
    }

    public function update($id)
    {
        $where = array('kode_matapelajaran' => $id);
        $data['tb_matapelajaran'] = $this->db->query("select * from tb_matapelajaran mp, tb_tingkat tkt where mp.tingkat=tkt.tingkat and mp.kode_matapelajaran = '$id'")->result();
        $data['tb_matapelajaran'] = $this->db->query("select * from tb_matapelajaran mp, tb_jurusan jrs where mp.nama_jurusan=jrs.nama_jurusan and mp.kode_matapelajaran = '$id'")->result();
        $data['tb_tingkat'] = $this->m_matapelajaran->tampil_data('tb_tingkat')->result();
        $data['tb_jurusan'] = $this->m_matapelajaran->tampil_data('tb_jurusan')->result();

        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/matapelajaran_update', $data);
		$this->load->view('templates_admin/footer');
    }

    public function update_aksi()
    {
        $id = $this->input->post('kode_matapelajaran');
        $kode_matapelajaran = $this->input->post('kode_matapelajaran');
        $nama_matapelajaran = $this->input->post('nama_matapelajaran');
        $semester = $this->input->post('semester');
        $tingkat = $this->input->post('tingkat');
        $nama_jurusan = $this->input->post('nama_jurusan');

        $data = array(
            'kode_matapelajaran' => $kode_matapelajaran,
            'nama_matapelajaran' => $nama_matapelajaran,
            'semester' => $semester,
            'tingkat' => $tingkat,
            'nama_jurusan' => $nama_jurusan
        );

        $where = array(
            'kode_matapelajaran' => $id
        );

        $this->m_matapelajaran->update_data($where,$data,'tb_matapelajaran');
        $this->session->set_flashdata('pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Mata Pelajaran Berhasil Diupdate!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('admin/matapelajaran');
    }

    public function delete($id)
    {
        $where = array('kode_matapelajaran' => $id);
        $this->m_matapelajaran->hapus_data($where,'tb_matapelajaran');
        $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Mata Pelajaran Berhasil Dihapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('admin/matapelajaran');
    }
}