<?php

class Datanilai extends CI_Controller{

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
        $data = array(
            'nisn' => set_value('nisn'),
            'id_tahunakademik' => set_value('id_tahunakademik')
        );

        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/masuk_datanilai', $data);
		$this->load->view('templates_admin/footer');
    }

    public function datanilai_aksi()
    {
        $this->_rulesdatanilai();

        if($this->form_validation->run() == FALSE) {
            $this->index();
        }else{
            $nisn = $this->input->post('nisn', TRUE);
            $tahun_akademik = $this->input->post('id_tahunakademik', TRUE);

            $query = "select tb_nilai.id_tahunakademik,
                             tb_nilai.kode_matapelajaran,
                             tb_matapelajaran.nama_matapelajaran,
                             tb_nilai
                        from tb_nilai
                        inner join tb_matapelajaran
                        on (tb_nilai.kode_matapelajaran = tb_matapelajaran.kode_matapelajaran)
                        where tb_nilai.nisn = $nisn and tb_nilai.id_tahunakademik = $tahun_akademik";

            $sql = $this->db->query($query)->result();

            $semester = $this->db->select('tahun_akademik, semester')
                                 ->from('tb_tahunakademik')
                                 ->where(array('id_tahunakademik'=>$tahun_akademik))->get()->row();

            $query_str = "select tb_pesertadidik.nisn,
                                 tb_pesertadidik.nama_pesertadidik
                                 tb_kelas.kelas
                          from
                            tb_pesertadidik
                            inner join kelas
                            on (tb_pesertadidik.kelas = tb_kelas.kelas);";

            $ptd = $this->db->query($query_str)->row();

            if($semester->semester == 'Ganjil'){
                $tampilsemester = "Ganjil";
            }else{
                $tampilsemester = "Genap";
            }

            $data = array(
                'ptd_data' => $sql,
                'ptd_nisn' => $nisn,
                'ptd_nama' => $sql->nama_pesertadidik,
                'ptd_kelas' => $sql->kelas,
                'tahun_akademik' => $semester->tahun_akademik."-".$tampilsemester
            );
            $this->load->view('templates_admin/header');
		    $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/datanilai', $data);
		    $this->load->view('templates_admin/footer');
        }
    }

    public function _rulesdatanilai()
        {
            $this->form_validation->set_rules('nisn','nisn','required');
            $this->form_validation->set_rules('id_tahunakademik','id_tahunakademik','required');
        }

    public function inputnilai()
    {
        $data = array(
            'kode_matapelajaran' => set_value('kode_matapelajaran'),
            'id_tahunakademik' => set_value('id_tahunakademik'),
        );
        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
        $this->load->view('admin/inputnilai_masuk', $data);
		$this->load->view('templates_admin/footer');
    }

    public function inputnilai_aksi()
    {
        $this->_rulesinputnilai();

        if($this->form_validation->run() == FALSE){
            $this->inputnilai();
        }else{
            $kode_matapelajaran = $this->input->post('kode_matapelajaran', TRUE);
            $id_tahunakademik = $this->input->post('id_tahunakademik', TRUE);

            $this->db->select('tk.id_tahunakademik, p.nisn, p.nama_pesertadidik ,mp.nama_matapelajaran');
            $this->db->from('tb_tahunakademik as tk');
            $this->db->join('tb_pesertadidik as p','p.nisn = n.nisn');
            $this->db->join('tb_nilai as n','n.');
            $this->db->join('tb_matapelajaran as mp','n.kode_matapelajaran = mp.kode_matapelajaran');
            $this->db->where('tk.id_tahunakademik',$id_tahunakademik);
            $this->db->where('mp.kode_matapelajaran',$kode_matapelajaran);
            $query = $this->db->get()->result();

            $data = array(
                'list_nilai' => $query,
                'kode_matapelarajan' => $kode_matapelajaran,
                'id_tahunakademik' => $id_tahunakademik
            );

            $this->load->view('templates_admin/header');
		    $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/inputnilai_form', $data);
		    $this->load->view('templates_admin/footer');
        }
    }

    public function _rulesinputnilai()
    {
        $this->form_validation->set_rules('kode_matapelajaran','Kode Mata Pelajaran','required');
        $this->form_validation->set_rules('id_tahunakademik','Tahun Akademik','required');
    }
}