<?php

class Lihatraport extends CI_Controller{

        public function index(){
			$datatitle = 'Masuk Lihat Raport';
			$guru = $this->db->get_where('tb_kelas', array('id_guru' => $this->session->userdata('id_guru')));
			$this->db->from('tb_pesertadidik');
			$this->db->where(array('id_kelas' => $guru->row()->id_kelas));
			$this->db->order_by('nama_pesertadidik', 'ASC');
			$pesertadidik = $this->db->get()->result();
			$data = array(
				'title' => $datatitle,
				'kelas' => $this->db->get_where('tb_kelas', array('id_kelas' => $guru->row()->id_kelas)),
				'pesertadidik' => $pesertadidik
			);
			$this->load->view('templates_guru/header');
			$this->load->view('templates_guru/sidebar');
			$this->load->view('guru/lihatraport_list', $data);
			$this->load->view('templates_guru/footer');
		}

    public function lihat_raport_siswa(){
		$datatitle = 'List Peserta Didik Lihat Raport';
		$ta = $this->input->get('ta', true);
		$semester = $this->input->get('semester', true);
		$id = $this->input->get('id', true);
		$kelas = $this->input->get('id_kelas', true);
		$pesertadidik = $this->db->get_where('tb_pesertadidik', array('id' => $id));
		$this->db->from('tb_nilai');
		$this->db->where(array('nisn' => $pesertadidik->row()->nisn));
		$this->db->group_by('tahun_akademik, semester');
		$nilai = $this->db->get();

		$data = array(
			'title' => $datatitle,
			'kelas' => $this->db->get_where('tb_kelas', array('id_kelas' => $kelas)),
			'pesertadidik' => $pesertadidik,
			'id' => $id,
			'tahunakademik' => $ta,
			'semester' => $semester,
			'nilai' => $nilai

		);
		$this->load->view('templates_guru/header');
        $this->load->view('templates_guru/sidebar');
        $this->load->view('guru/lihatraport', $data);
        $this->load->view('templates_guru/footer');
	}

    public function preview_raport(){

            $datatitle = 'Lihat Raport';
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
            $this->load->view('guru/lihatraport_preview', $data);
            $this->load->view('templates_guru/footer');
        }

	public function cetak_raport(){
		$datatitle = 'Cetak Raport';
		$ta = $this->input->get('ta', true);
		$semester = $this->input->get('semester', true);
		$id = $this->input->get('id', true);
		$kelas = $this->input->get('id_kelas', true);
		$pesertadidik = $this->db->get_where('tb_pesertadidik', array('id' => $id));

		$this->db->from('tb_nilai');
		$this->db->join('tb_matapelajaran', 'tb_nilai.kode_matapelajaran = tb_matapelajaran.kode_matapelajaran');
		$this->db->where(array('tb_nilai.nisn' => $pesertadidik->row()->nisn, 'tb_nilai.tahun_akademik' => $ta, 'tb_nilai.semester' => $semester));
		$nilai = $this->db->get();


		$presensi = $this->db->get_where('tb_presensi', array('nisn' => $pesertadidik->row()->nisn, 'tahun_akademik' => $ta, 'semester' => $semester));

		$catatan = $this->db->get_where('tb_catatan', array('nisn' => $pesertadidik->row()->nisn, 'tahun_akademik' => $ta, 'semester' => $semester));

		$kelas = $this->db->get_where('tb_kelas', array('id_kelas' => $kelas));

		$jumlah = $this->db->query("select sum(nilai) as jumlah_nilai from tb_nilai where nisn = '".$pesertadidik->row()->nisn."' and tahun_akademik = '".$ta."' and semester = '".$semester."' ");
		$total_nilai = $this->db->query("select count(*) as total_nilai from tb_nilai where nisn = '".$pesertadidik->row()->nisn."' and tahun_akademik = '".$ta."' and semester = '".$semester."' ");

		$total_siswa = $this->db->get_where('tb_pesertadidik', array('id_kelas' => $this->input->get('id_kelas', true)));

		$ranking = $this->db->query("select nisn, sum(nilai) as nilai, (@curRank:=@curRank +1) as ranking from tb_nilai, (SELECT @curRank := 0) r where tahun_akademik = '".$ta."' and semester = '".$semester."' group by nisn order by sum(nilai) desc");

		$data = array(
			'title' => $datatitle,
			'kelas' => $kelas,
			'pesertadidik' => $pesertadidik,
			'nilai' => $nilai,
			'ta' => $ta,
			'semester' => $semester,
			'presensi' => $presensi,
			'catatan' => $catatan,
			'guru' => $this->db->get_where('tb_guru', array('id_guru' => $kelas->row()->id_guru)),
			'jumlah_nilai' => $jumlah,
			'total_nilai' => $total_nilai,
			'total_siswa' => $total_siswa,
			'ranking' => $ranking
		);
		    $this->load->view('templates_guru/header');
            $this->load->view('guru/lihatraport_cetak', $data);
	}
}