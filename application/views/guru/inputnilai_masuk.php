<title><?=$title;?></title>

<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
        Masuk Input Nilai
    </div>

    <?= $this->session->flashdata('pesan') ?>
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= base_url('guru/inputnilai/siswa_kelas')?>" method="post">
                <div class="form-group">
                <label>Kelas</label>
                    <select class="form-control" name="id_kelas">
                    <option value="">--Pilih Kelas--</option>
                    <?php foreach($tb_kelas as $kls): ?>
                    <option value="<?= $kls->id_kelas?>"><?= $kls->kelas?></option>
                    <?php endforeach; ?>
                    </select>
                    <?= form_error('id_kelas','<div class="text-danger small" ml-3>','</div>')?>
                </div>
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

                        $dropdownlist[$dropdown->id_tahunakademik] = $dropdown->tahunsemester . " " .$tampilsemester;
                    }
                        echo form_dropdown('id_tahunakademik',$dropdownlist,'','class="form-control" id="id_tahunakademik"');
                    ?>
                </div>
                <div class="form-group">
                <label>Mata Pelajaran</label>
                    <select class="form-control" name="kode_matapelajaran">
                    <option value="">--Pilih Mata Pelajaran--</option>
                    <?php foreach($tb_matapelajaran as $mp): ?>
                    <option value="<?= $mp->kode_matapelajaran?>"><?= $mp->kode_matapelajaran." - ".$mp->nama_matapelajaran?></option>
                    <?php endforeach; ?>
                    </select>
                    <?= form_error('kode_matapelajaran','<div class="text-danger small" ml-3>','</div>')?>
                </div>
                    <button type="submit" class="btn btn-primary">Input Nilai</button>
                </form>
        </div>
    </div>
    <br>
    <br>