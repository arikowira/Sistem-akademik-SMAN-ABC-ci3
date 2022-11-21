<?php

class Riwayatnilai extends CI_Controller{

    public function index()
    {
        $data['title'] = 'Riwayat Nilai';
        $this->db->order_by('kode_kelas', 'ASC');
        $data['tb_kelas'] = $this->m_inputnilai->tampil_data('tb_kelas')->result();
        $data['tb_matapelajaran'] = $this->m_inputnilai->tampil_data('tb_matapelajaran')->result();
        $data['tb_tahunakademik'] = $this->m_inputnilai->tampil_data('tb_tahunakademik')->result();

        $this->load->view('templates_guru/header');
        $this->load->view('templates_guru/sidebar');
        $this->load->view('guru/riwayatnilai_masuk', $data);
        $this->load->view('templates_guru/footer');
    }

    public function siswa_kelas()
    {
		$kelas = $this->input->post('id_kelas', true);
		$this->db->from('tb_pesertadidik');
		$this->db->where(array('id_kelas' => $kelas));
		$this->db->order_by('nama_pesertadidik', 'ASC');
		$pesertadidik = $this->db->get()->result();
		$data = array(
			'kelas' => $this->db->get_where('tb_kelas', array('id_kelas' => $kelas)),
			'pesertadidik' => $pesertadidik
		);
		$this->load->view('templates_guru/header');
        $this->load->view('templates_guru/sidebar');
        $this->load->view('guru/riwayatnilai_list', $data);
        $this->load->view('templates_guru/footer');
	}

    public function nilai_siswa()
    {
		$pesertadidik = $this->db->get_where('tb_pesertadidik', array('id' => $this->input->get('id', true)));
		$kelas = $this->db->get_where('tb_kelas', array('id_kelas' => $pesertadidik->row()->id_kelas));
		$this->db->from('tb_nilai');
		$this->db->join('tb_matapelajaran', 'tb_nilai.kode_matapelajaran = tb_matapelajaran.kode_matapelajaran');
		$this->db->where(array('nisn' => $pesertadidik->row()->nisn));
		$data_nilai = $this->db->get();

		$data = array(
			'pesertadidik' => $pesertadidik,
			'kelas' => $kelas,
			'data_nilai' => $data_nilai
		);
		$this->load->view('templates_guru/header');
        $this->load->view('templates_guru/sidebar');
        $this->load->view('guru/riwayatnilai_nilai', $data);
        $this->load->view('templates_guru/footer');
	}

    public function lihat_nilai(){
		$guru =$this->db->get('tb_guru');
		$pesertadidik = $this->db->get_where('tb_pesertadidik', array('id' => $this->input->get('id', true)));
        $kelas = $this->db->get_where('tb_kelas', array('id_kelas' => $this->input->get('id_kelas', true)));
		$mapel = $this->db->get_where('tb_matapelajaran', array('kode_matapelajaran' => $this->input->get('kode_matapelajaran', true)));
        $ta = $this->db->get_where('tb_tahunakademik', array('tahun_akademik' => $this->input->get('ta', true)));
		$semester = $this->db->get_where('tb_tahunakademik', array('semester' => $this->input->get('semester', true)));
		$cek_nilai = $this->db->get_where('tb_nilai', array('nisn' => $pesertadidik->row()->nisn, 'kode_matapelajaran' => $mapel->row()->kode_matapelajaran, 'tahun_akademik' => $this->input->get('ta', true), 'semester' => $this->input->get('semester', true)));
		$this->db->from('tb_guru');
		$this->db->where(array('kode_guru' => $cek_nilai->row()->kode_guru));
		$data_guru = $this->db->get();
		$data = array(
			'pesertadidik' => $pesertadidik,
            'nisn' => $pesertadidik,
			'kelas' => $kelas,
            'tahunakademik' => $ta,
			'mapel' => $mapel,
			'guru' => $guru,
			'cek_nilai' => $cek_nilai,
			'semester' => $semester,
			'data_guru' => $data_guru
		);
		$this->load->view('templates_guru/header');
        $this->load->view('templates_guru/sidebar');
        $this->load->view('guru/riwayatnilai_lihat', $data);
        $this->load->view('templates_guru/footer');
	}

	public function update_nilai(){
		$data = array(
			'kode_guru' => $this->input->post('guru', true),
			'nilai' => $this->input->post('nilai', true),
			'kkm' => $this->input->post('kkm', true),
			'deskripsi' => $this->input->post('deskripsi', true),

		);
		$this->db->where('nisn', $this->input->post('nisn', true));
		$this->db->where('kode_matapelajaran', $this->input->post('kode_matapelajaran', true));
		$this->db->where('tahun_akademik', $this->input->post('ta', true));
		$this->db->where('semester', $this->input->post('semester', true));
		$simpan = $this->db->update('tb_nilai', $data);
		if($simpan){
			$this->session->set_flashdata('pesan',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data Nilai Berhasil Disimpan!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>');
			redirect(base_url().'guru/riwayatnilai/lihat_nilai?id='.$this->input->post('id', true).'&id_kelas='.$this->input->post('id_kelas', true).'&kode_matapelajaran='.$this->input->post('kode_matapelajaran', true).'&ta='.$this->input->post('ta', true).'&semester='.$this->input->post('semester', true));
		}else{
			$this->session->set_flashdata('pesan',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data Nilai Berhasil Disimpan!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>');
			redirect(base_url().'guru/riwayatnilai/lihat_nilai?id='.$this->input->post('id', true).'&id_kelas='.$this->input->post('id_kelas', true).'&kode_matapelajaran='.$this->input->post('kode_matapelajaran', true).'&ta='.$this->input->post('ta', true).'&semester='.$this->input->post('semester', true));
		}
	}
}