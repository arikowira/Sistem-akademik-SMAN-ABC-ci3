<?php

class Lihatraport extends CI_Controller{

    public function index(){
                $pesertadidik = $this->db->get_where('tb_pesertadidik', array('id' => $this->session->userdata('id')));
                $this->db->from('tb_nilai');
                $this->db->where(array('nisn' => $pesertadidik->row()->nisn));
                $this->db->group_by('tahun_akademik, semester');
                $data = $this->db->get()->result();
                $kelas = $this->db->get_where('tb_kelas', array('id_kelas' => $pesertadidik->row()->id_kelas));

                $data = array(
                    'kelas' => $kelas,
                    'pesertadidik' => $pesertadidik,
                    'data' => $data

                );
                $this->load->view('templates_pesertadidik/header');
                $this->load->view('templates_pesertadidik/sidebar');
                $this->load->view('pesertadidik/lihatraport', $data);
                $this->load->view('templates_pesertadidik/footer');
    }

    public function cetak_raport(){
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
		    $this->load->view('templates_pesertadidik/header');
            $this->load->view('pesertadidik/lihatraport_cetak', $data);
	}

    public function pdf(){
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

		$this->load->view('templates_pesertadidik/header');
        $this->load->view('pesertadidik/lihatraport_pdf', $data);

        $papersize = 'legal';
        $orientation = 'potrait';
		$html = $this->output->get_output();
		$this->load->library('pdf');
        $this->pdf->generate($html,"Laporan_akademik", $papersize, $orientation);
    }
}