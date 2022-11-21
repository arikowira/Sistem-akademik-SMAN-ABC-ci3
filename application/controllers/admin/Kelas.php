<?php

class Kelas extends CI_Controller{

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
        $this->db->order_by('kode_kelas', 'ASC');
        $data['tb_kelas'] = $this->m_kelas->tampil_data('tb_kelas')->result();
        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/kelas', $data);
		$this->load->view('templates_admin/footer');
    }

    public function tambah_kelas()
    {
        $data['tb_jurusan'] = $this->m_kelas->tampil_data('tb_jurusan')->result();
        $data['tb_tingkat'] = $this->m_kelas->tampil_data('tb_tingkat')->result();
        $data['tb_guru'] = $this->m_kelas->tampil_data('tb_guru')->result();
        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/kelas_form', $data);
		$this->load->view('templates_admin/footer');
    }

    public function tambah_kelas_aksi()
    {
        $this->_rules();
        if($this->form_validation->run()==FALSE)
        {
            $this->tambah_kelas();
        }else{
            $kode_kelas = $this->input->post('kode_kelas');
            $kelas = $this->input->post('kelas');
            $nama_jurusan = $this->input->post('nama_jurusan');
            $tingkat = $this->input->post('tingkat');
            $guru = $this->input->post('id_guru');

            $data = array(
                'kode_kelas' => $kode_kelas,
                'kelas' => $kelas,
                'nama_jurusan' => $nama_jurusan,
                'tingkat' => $tingkat,
                'id_guru' => $guru
            );
            $this->m_kelas->insert_data($data,'tb_kelas');
            $this->session->set_flashdata('pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Jurusan Berhasil Ditambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
            redirect('admin/kelas');
        }
    }
    public function _rules(){

        $this->form_validation->set_rules('kode_kelas','kode_kelas','required',[
            'required' => 'Kode Kelas Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('kelas','kelas','required',[
            'required' => 'Kelas Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('nama_jurusan','nama_jurusan','required',[
            'required' => 'Nama Jurusan Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('tingkat','tingkat','required',[
            'required' => 'Tingkat Wajib Diisi!'
        ]);
    }

    public function update($id)
    {
        $where = array('id_kelas' => $id);
        $data['tb_kelas'] = $this->db->query("select * from tb_kelas kls, tb_jurusan jrs, tb_guru wl where kls.nama_jurusan=jrs.nama_jurusan and kls.id_guru=wl.id_guru and kls.id_kelas = '$id'")->result();
        $data['tb_tingkat'] = $this->db->query("select * from tb_kelas kls, tb_tingkat tkt where kls.tingkat=tkt.tingkat and kls.id_kelas = '$id'")->result();
        $data['tb_guru'] = $this->m_kelas->tampil_data('tb_guru')->result();
        $data['tb_jurusan'] = $this->m_kelas->tampil_data('tb_jurusan')->result();
        $data['tb_tingkat'] = $this->m_kelas->tampil_data('tb_tingkat')->result();

        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/kelas_update', $data);
		$this->load->view('templates_admin/footer');
    }

    public function update_aksi()
    {
        $id = $this->input->post('id_kelas');
        $kode_kelas = $this->input->post('kode_kelas');
        $kelas = $this->input->post('kelas');
        $nama_jurusan = $this->input->post('nama_jurusan');
        $tingkat = $this->input->post('tingkat');
        $guru = $this->input->post('id_guru');

        $data = array(
            'kode_kelas' => $kode_kelas,
            'kelas' => $kelas,
            'nama_jurusan' => $nama_jurusan,
            'tingkat' => $tingkat,
            'id_guru' => $guru
        );

        $where = array(
            'id_kelas' => $id
        );

        $this->m_kelas->update_data($where,$data,'tb_kelas');
        $this->session->set_flashdata('pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Kelas Berhasil Diupdate!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('admin/kelas');
    }

    public function delete($id)
    {
        $where = array('id_kelas' => $id);
        $this->m_kelas->hapus_data($where,'tb_kelas');
        $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Kelas Berhasil Dihapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('admin/kelas');
    }

    public function detail($id)
    {
        $data['detail'] = $this->db->get_where('tb_pesertadidik', array('id_kelas' => $id))->result();
        $data['detail_kelas'] = $this->db->get_where('tb_kelas', array('id_kelas' => $id))->result();
        $data['tb_kelas'] = $this->m_kelas->tampil_data('tb_kelas')->result();

        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/kelas_detail', $data);
		$this->load->view('templates_admin/footer');
    }
}