<title><?=$title;?></title>

<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
        Masuk Input Raport
    </div>

    <?= $this->session->flashdata('pesan') ?>
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= base_url('guru/inputraport/siswa_kelas')?>" method="post">
                <input type="hidden" name="id_kelas" value="<?=$tb_kelas->row()->id_kelas?>" readonly>
                <div class="form-group">
                    <label>Tahun Akademik - Semester</label>
                    <?php
                    $query = $this->db->query(
                        'select id_tahunakademik, semester, concat(tahun_akademik," - ")
                        as tahunsemester
                        from tb_tahunakademik
                        where status="Aktif"');

                        $dropdowns = $query->result();

                        foreach($dropdowns as $dropdown){
                            if($dropdown->semester == 'Ganjil'){
                                $tampilsemester = "Ganjil";
                        }else{
                                $tampilsemester = "Genap";
                        }

                        $dropdownlist[$dropdown->id_tahunakademik] = $dropdown->tahunsemester. " " .$tampilsemester;
                    }
                        echo form_dropdown('id_tahunakademik',$dropdownlist,'','class="form-control" id="id_tahunakademik"');
                    ?>
                </div>
                    <button type="submit" class="btn btn-primary">Input Raport</button>
                </form>
        </div>
    </div>
    <br>
    <br>