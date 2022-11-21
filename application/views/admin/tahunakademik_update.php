<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
            Update Tahun Akademik
    </div>

    <?php foreach($tb_tahunakademik as $tk): ?>
    <form method="post" action="<?= base_url('admin/tahunakademik/update_tahunakademik_aksi')?>">
        <div class="form-group">
            <label>Tahun Akademik</label>
            <input type="hidden" name="id_tahunakademik" class="form-control" value="<?= $tk->id_tahunakademik?>">
            <input type="text" name="tahun_akademik" placeholder="Masukkan Tahun Akademik" class="form-control" value="<?= $tk->tahun_akademik?>">
            <?= form_error('tahun_akademik','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Semester</label>
            <select name="semester" class="form-control">
                <option><?= $tk->semester?></option>
                <option>Ganjil</option>
                <option>Genap</option>
            </select>
            <?= form_error('semester','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option><?= $tk->status?></option>
                <option>Aktif</option>
                <option>Tidak Aktif</option>
            </select>
            <?= form_error('status','<div class="text-danger small" ml-3>')?>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-file-download"></i> Simpan</button>
        <?= anchor('admin/tahunakademik','<div class="btn btn-primary ml-2"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
        <br>
        <br>
        <br>
        <br>
    </form>
    <?php endforeach; ?>