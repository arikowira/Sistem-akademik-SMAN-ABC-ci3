<?php

class Inputraport extends CI_Controller{

    public function index()
    {
        $data['title'] = 'Masuk Input Raport';
        $this->db->order_by('kode_kelas', 'ASC');
        $data['tb_kelas'] = $this->db->get_where('tb_kelas', array('id_guru' => $this->session->userdata('id_guru')));
        $this->db->order_by('semester', 'ASC');
        $data['tb_tahunakademik'] = $this->m_inputnilai->tampil_data('tb_tahunakademik')->result();
        $data['tb_guru'] = $this->m_inputnilai->ambil_data_guru($this->session->userdata('id_guru'));

        $this->load->view('templates_guru/header');
        $this->load->view('templates_guru/sidebar');
        $this->load->view('guru/inputraport_masuk', $data);
        $this->load->view('templates_guru/footer');
    }

    public function siswa_kelas()
    {
        $this->_rules();

        if($this->form_validation->run()==FALSE){
            $this->index();
        }else{
        $datatitle = 'List Peserta Didik Input Raport';
        $data = $this->m_inputnilai->ambil_data_kelas($this->input->post('id_kelas'));
        $dataguru = $this->m_inputnilai->ambil_data_guru($this->session->userdata('id_guru'));
        $datatahunajaran = $this->m_inputnilai->ambil_data_tahunakademik($this->input->post('id_tahunakademik'));
        $datapesertadidik = $this->m_inputnilai->ambil_data_pesertadidik($this->input->post('id_kelas'));
        $kelas = $this->input->post('id_kelas');
        $this->db->from('tb_pesertadidik');
        $this->db->where(array('id_kelas' => $kelas));
        $this->db->order_by('nama_pesertadidik','ASC');
        $pesertadidik = $this->db->get();

        $data = array(
            'title' => $datatitle,
            'kode_kelas' => $data->kode_kelas,
            'kelas' => $data->kelas,
            'id_kelas' => $data->id_kelas,
            'jurusan'=> $data->nama_jurusan,
            'tahun_akademik' => $datatahunajaran->tahun_akademik,
            'semester' => $datatahunajaran->semester,
            'pesertadidik' => $datapesertadidik,
            'guru' => $dataguru
        );

        $this->load->view('templates_guru/header');
        $this->load->view('templates_guru/sidebar');
        $this->load->view('guru/inputraport_list', $data);
        $this->load->view('templates_guru/footer');
        }
    }

    public function isi_raport(){

    $datatitle = 'Input Raport';
		$tahun_akademik = $this->input->get('ta', true);
		$semester = $this->input->get('semester', true);
		$id = $this->input->get('id', true);
		$kelas = $this->input->get('id_kelas', true);
		$pesertadidik = $this->db->get_where('tb_pesertadidik', array('id' => $id));

		$this->db->from('tb_nilai');
		$this->db->join('tb_matapelajaran', 'tb_nilai.kode_matapelajaran = tb_matapelajaran.kode_matapelajaran');
		$this->db->where(array('tb_nilai.nisn' => $pesertadidik->row()->nisn, 'tb_nilai.tahun_akademik' => $tahun_akademik, 'tb_nilai.semester' => $semester));
		$nilai = $this->db->get();

		$presensi = $this->db->get_where('tb_presensi', array('nisn' => $pesertadidik->row()->nisn, 'tahun_akademik' => $tahun_akademik, 'semester' => $semester));

		$catatan = $this->db->get_where('tb_catatan', array('nisn' => $pesertadidik->row()->nisn, 'tahun_akademik' => $tahun_akademik, 'semester' => $semester));

    $kelulusan = $this->db->get_where('tb_kelulusan', array('nisn' => $pesertadidik->row()->nisn, 'tahun_akademik' => $tahun_akademik, 'semester' => $semester));

		$data = array(
      'title' => $datatitle,
			'kelas' => $this->db->get_where('tb_kelas', array('id_kelas' => $kelas)),
			'pesertadidik' => $pesertadidik,
			'nilai' => $nilai,
			'tahunakademik' => $tahun_akademik,
			'semester' => $semester,
			'presensi' => $presensi,
			'catatan' => $catatan,
      'kelulusan' => $kelulusan
		);
		    $this->load->view('templates_guru/header');
        $this->load->view('templates_guru/sidebar');
        $this->load->view('guru/inputraport', $data);
        $this->load->view('templates_guru/footer');
	}

    public function simpan_presensi(){
		$data = array(
			'nisn' => $this->input->post('nisn', true),
			'tahun_akademik' => $this->input->post('ta', true),
			'semester' => $this->input->post('semester', true),
			'keterangan' => $this->input->post('keterangan', true),
			'jumlah' => $this->input->post('jumlah', true),
		);
		$simpan = $this->db->insert('tb_presensi', $data);
		if($simpan){
			$this->session->set_flashdata('pesan',
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Berhasil Disimpan!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
			redirect(base_url().'guru/inputraport/isi_raport?id='.$this->input->post('id', true).'&id_kelas='.$this->input->post('id_kelas', true).'&ta='.$this->input->post('ta', true).'&semester='.$this->input->post('semester', true));
		}else{
			$this->session->set_flashdata('pesan',
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Data Gagal Disimpan!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
            redirect(base_url().'guru/inputraport/isi_raport?id='.$this->input->post('id', true).'&id_kelas='.$this->input->post('id_kelas', true).'&ta='.$this->input->post('ta', true).'&semester='.$this->input->post('semester', true));
        }
	}

	public function hapus_presensi(){
		$this->db->where(array('id_presensi' => $this->input->get('id_presensi', true)));
        $hapus = $this->db->delete('tb_presensi');
        if($hapus){
			$this->session->set_flashdata('pesan',
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Berhasil Dihapus!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
			redirect(base_url().'guru/inputraport/isi_raport?id='.$this->input->get('id', true).'&id_kelas='.$this->input->get('id_kelas', true).'&ta='.$this->input->get('ta', true).'&semester='.$this->input->get('semester', true));
		}else{
			$this->session->set_flashdata('pesan',
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Data Gagal Dihapus!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
			redirect(base_url().'guru/inputraport/isi_raport?id='.$this->input->post('id', true).'&id_kelas='.$this->input->get('id_kelas', true).'&tahun_akademik='.$this->input->get('ta', true).'&semester='.$this->input->get('semester', true));
		}
	}

	public function simpan_catatan(){
		$data = array(
			'nisn' => $this->input->post('nisn', true),
			'tahun_akademik' => $this->input->post('ta', true),
			'semester' => $this->input->post('semester', true),
			'catatan' => $this->input->post('catatan', true),
		);
		$simpan = $this->db->insert('tb_catatan', $data);
		if($simpan){
			$this->session->set_flashdata('pesan',
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Berhasil Disimpan!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
			redirect(base_url().'guru/inputraport/isi_raport?id='.$this->input->post('id', true).'&id_kelas='.$this->input->post('id_kelas', true).'&ta='.$this->input->post('ta', true).'&semester='.$this->input->post('semester', true));
		}else{
			$this->session->set_flashdata('pesan',
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Data Gagal Disimpan!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
			redirect(base_url().'guru/inputraport/isi_raport?id='.$this->input->post('id', true).'&id_kelas='.$this->input->post('id_kelas', true).'&ta='.$this->input->post('ta', true).'&semester='.$this->input->post('semester', true));
		}
	}

	public function hapus_catatan(){
		$this->db->where(array('id_catatan' => $this->input->get('id_catatan', true)));
        $hapus = $this->db->delete('tb_catatan');
        if($hapus){
			$this->session->set_flashdata('pesan',
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Berhasil Dihapus!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
			redirect(base_url().'guru/inputraport/isi_raport?id='.$this->input->get('id', true).'&id_kelas='.$this->input->get('id_kelas', true).'&ta='.$this->input->get('ta', true).'&semester='.$this->input->get('semester', true));
		}else{
			$this->session->set_flashdata('pesan',
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Data Gagal Dihapus!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
			redirect(base_url().'guru/inputraport/isi_raport?id='.$this->input->post('id', true).'&id_kelas='.$this->input->get('id_kelas', true).'&ta='.$this->input->get('ta', true).'&semester='.$this->input->get('semester', true));
		}
	}

  public function simpan_kelulusan(){
		$data = array(
			'nisn' => $this->input->post('nisn', true),
			'tahun_akademik' => $this->input->post('ta', true),
			'semester' => $this->input->post('semester', true),
			'kelulusan' => $this->input->post('kelulusan', true),
		);
		$simpan = $this->db->insert('tb_kelulusan', $data);
		if($simpan){
			$this->session->set_flashdata('pesan',
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Berhasil Disimpan!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
			redirect(base_url().'guru/inputraport/isi_raport?id='.$this->input->post('id', true).'&id_kelas='.$this->input->post('id_kelas', true).'&ta='.$this->input->post('ta', true).'&semester='.$this->input->post('semester', true));
		}else{
			$this->session->set_flashdata('pesan',
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Data Gagal Disimpan!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
            redirect(base_url().'guru/inputraport/isi_raport?id='.$this->input->post('id', true).'&id_kelas='.$this->input->post('id_kelas', true).'&ta='.$this->input->post('ta', true).'&semester='.$this->input->post('semester', true));
        }
	}

	public function hapus_kelulusan(){
		$this->db->where(array('id_kelulusan' => $this->input->get('id_kelulusan', true)));
        $hapus = $this->db->delete('tb_kelulusan');
        if($hapus){
			$this->session->set_flashdata('pesan',
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Berhasil Dihapus!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
			redirect(base_url().'guru/inputraport/isi_raport?id='.$this->input->get('id', true).'&id_kelas='.$this->input->get('id_kelas', true).'&ta='.$this->input->get('ta', true).'&semester='.$this->input->get('semester', true));
		}else{
			$this->session->set_flashdata('pesan',
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Data Gagal Dihapus!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
			redirect(base_url().'guru/inputraport/isi_raport?id='.$this->input->post('id', true).'&id_kelas='.$this->input->get('id_kelas', true).'&tahun_akademik='.$this->input->get('ta', true).'&semester='.$this->input->get('semester', true));
		}
	}

    public function _rules()
    {
      $this->form_validation->set_rules('id_kelas','id_kelas','required',[
          'required' => 'Kelas Wajib Diisi!'
      ]);
    }
}

