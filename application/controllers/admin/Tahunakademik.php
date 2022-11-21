<?php

class Tahunakademik extends CI_Controller{

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
        $data['tb_tahunakademik'] = $this->m_tahunakademik->tampil_data('tb_tahunakademik')->result();
        $this->load->view('templates_admin/header');
		    $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tahunakademik', $data);
		    $this->load->view('templates_admin/footer');
    }

    public function tambah_tahunakademik()
    {
        $this->load->view('templates_admin/header');
		    $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tahunakademik_form');
		    $this->load->view('templates_admin/footer');
    }

    public function tambah_tahunakademik_aksi()
    {
      $this->_rules();

      if($this->form_validation->run()==FALSE){
        $this->tambah_tahunakademik();

      }else{
        $tahun_akademik = $this->input->post('tahun_akademik');
        $semester = $this->input->post('semester');
        $status = $this->input->post('status');
        $tingkat = $this->input->post('tingkat');

            $data = array(
                'tahun_akademik' => $tahun_akademik,
                'semester' => $semester,
                'status' => $status
            );
            $this->m_kelas->insert_data($data,'tb_tahunakademik');
            $this->session->set_flashdata('pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Tahun Akademik Ditambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
            redirect('admin/tahunakademik');
      }
    }

    public function _rules(){

      $this->form_validation->set_rules('tahun_akademik','tahun_akademik','required',[
          'required' => 'Tahun Akademik Wajib Diisi!'
      ]);
      $this->form_validation->set_rules('semester','semester','required',[
          'required' => 'Semester Didik Wajib Diisi!'
      ]);
      $this->form_validation->set_rules('status','status','required',[
          'required' => 'Status Wajib Diisi!'
      ]);
  }

  public function update($id)
  {
      $where = array('id_tahunakademik' => $id);
      $data['tb_tahunakademik'] = $this->m_tahunakademik->edit_data($where,'tb_tahunakademik')->result();
      $this->load->view('templates_admin/header');
		  $this->load->view('templates_admin/sidebar');
      $this->load->view('admin/tahunakademik_update', $data);
		  $this->load->view('templates_admin/footer');
  }

  public function update_tahunakademik_aksi()
  {
    $id = $this->input->post('id_tahunakademik');
    $tahun_akademik = $this->input->post('tahun_akademik');
    $semester = $this->input->post('semester');
    $status = $this->input->post('status');

    $data = array(
        'tahun_akademik' => $tahun_akademik,
        'semester' => $semester,
        'status' => $status
    );

    $where = array(
        'id_tahunakademik' => $id
    );

    $this->m_tahunakademik->update_data($where,$data,'tb_tahunakademik');
    $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Tahun Akademik Berhasil Diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect('admin/tahunakademik');
  }

  public function delete($id)
    {
        $where = array('id_tahunakademik' => $id);
        $this->m_tahunakademik->hapus_data($where,'tb_tahunakademik');
        $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Tahun Akademik Berhasil Dihapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('admin/tahunakademik');
    }
}