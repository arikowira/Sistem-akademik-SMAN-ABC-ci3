<title><?=$title;?></title>

<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-newspaper"></i>
        Masuk Lihat Raport
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <div class="row">
        <div class="col-lg-6">
            <form action="<?= base_url('guru/lihatraport/siswa_kelas')?>" method="post">
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
                    <button type="submit" class="btn btn-primary"> Selanjutnya</button>
                </form>
        </div>
    </div>
    <br>
    <br>