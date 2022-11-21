<?php

class Inputnilai extends CI_Controller{

    public function index()
    {
        $data['title'] = 'Masuk Input Nilai';
        $this->db->order_by('kode_kelas', 'ASC');
        $data['tb_kelas'] = $this->m_inputnilai->tampil_data('tb_kelas')->result();
        $this->db->order_by('kode_matapelajaran', 'ASC');
        $data['tb_matapelajaran'] = $this->m_inputnilai->tampil_data('tb_matapelajaran')->result();
        $this->db->order_by('semester', 'ASC');
        $data['tb_tahunakademik'] = $this->m_inputnilai->tampil_data('tb_tahunakademik')->result();

        $this->load->view('templates_guru/header');
        $this->load->view('templates_guru/sidebar');
        $this->load->view('guru/inputnilai_masuk', $data);
        $this->load->view('templates_guru/footer');
    }

    public function siswa_kelas()
    {
        $this->_rules();

        if($this->form_validation->run()==FALSE){
            $this->index();
        }else{
        $data = $this->m_inputnilai->ambil_data_kelas($this->input->post('id_kelas'));
        $datatitle = 'Input Nilai';
        $datatahunajaran = $this->m_inputnilai->ambil_data_tahunakademik($this->input->post('id_tahunakademik'));
        $datamapel = $this->m_inputnilai->ambil_data_matapelajaran($this->input->post('kode_matapelajaran'));
        $datapesertadidik = $this->m_inputnilai->ambil_data_pesertadidik($this->input->post('id_kelas'));
        $kelas = $this->input->post('id_kelas');
        $this->db->from('tb_pesertadidik');
        $this->db->where(array('id_kelas' => $kelas));
        $this->db->order_by('nama_pesertadidik','ASC');
        $pesertadidik = $this->db->get();
        $cek_nilai = $this->db->get_where('tb_nilai', array('id_kelas' => $data->id_kelas ,'kode_matapelajaran' => $datamapel->kode_matapelajaran, 'tahun_akademik' => $datatahunajaran->tahun_akademik, 'semester' => $datatahunajaran->semester));

        $data = array(
            'title' => $datatitle,
            'kode_kelas' => $data->kode_kelas,
            'kelas' => $data->kelas,
            'id_kelas' => $data->id_kelas,
            'jurusan'=> $data->nama_jurusan,
            'nama_matapelajaran' => $datamapel->nama_matapelajaran,
            'kode_matapelajaran' => $datamapel->kode_matapelajaran,
            'tahunakademik' => $datatahunajaran->tahun_akademik,
            'semester' => $datatahunajaran->semester,
            'pesertadidik' => $datapesertadidik,
            'guru' => $this->session->userdata('kode_guru'),
            'cek_nilai' => $cek_nilai
        );

        $this->load->view('templates_guru/header');
        $this->load->view('templates_guru/sidebar');
        $this->load->view('guru/inputnilai_pesertadidik', $data);
        $this->load->view('templates_guru/footer');
        }
    }

    public function simpan_nilai()
    {
            $jml_dt = $this->input->post('jumlahData', true);

            for ($i = 2; $i <= $jml_dt; $i++) {
                $nilai = $this->input->post('nilai' . $i);
                $nisn = $this->input->post('nisn' . $i);
                $kkm = $this->input->post('kkm');
                $deskripsi = $this->input->post('deskripsi' . $i);
                $ta = $this->input->post('ta');
                $semester = $this->input->post('semester');
                $kode_matapelajaran = $this->input->post('kode_matapelajaran');
                $kode_guru = $this->input->post('guru');
                $id_kelas = $this->input->post('id_kelas');

            $data = array(
                'nilai' => $nilai,
                'kkm' => $kkm,
                'deskripsi' => $deskripsi,
                'tahun_akademik' => $ta,
                'semester' => $semester,
                'nisn' => $nisn,
                'kode_matapelajaran' => $kode_matapelajaran,
                'kode_guru' => $kode_guru,
                'id_kelas' => $id_kelas,
            );

            $simpan = $this->db->insert('tb_nilai', $data);
        }
            if($simpan){
                    $this->session->set_flashdata('pesan',
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Nilai Berhasil Disimpan!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');
                        redirect('guru/inputnilai');
                }else{
                    $this->session->set_flashdata('pesan',
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Nilai Gagal Disimpan!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');
                        redirect('guru/inputnilai');
                }
    }


    public function _rules()
    {
      $this->form_validation->set_rules('id_kelas','id_kelas','required',[
          'required' => 'Kelas Wajib Diisi!'
      ]);
      $this->form_validation->set_rules('kode_matapelajaran','kode_matapelajaran','required',[
          'required' => 'Mata Pelajaran Wajib Diisi!'
      ]);
    }
}

