<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-users"></i>
            Tambah Peserta Didik
    </div>

    <?= form_open_multipart('admin/pesertadidik/tambah_pesertadidik_aksi')?>
        <div class="form-group">
            <label>NISN</label>
            <input type="text" name="nisn" placeholder="Masukkan NISN" class="form-control">
            <?= form_error('nisn','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Nama Peserta Didik</label>
            <input type="text" name="nama_pesertadidik" placeholder="Masukkan Nama Peseta Didik" class="form-control">
            <?= form_error('nama_pesertadidik','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" class="form-control">
            <?= form_error('tempat_lahir','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control">
            <?= form_error('tanggal_lahir','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control">
            <?= form_error('alamat','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" placeholder="Masukkan Telepon" class="form-control">
            <?= form_error('telepon','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="">--Pilih Jenis Kelamin--</option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
            <?= form_error('jenis_kelamin','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" placeholder="Masukkan Email" class="form-control">
            <?= form_error('email','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <select name="id_kelas" class="form-control">
                <option value="">--Pilih Kelas--</option>
                <?php foreach($tb_kelas as $kls): ?>
                    <option value="<?= $kls->id_kelas?>">
                        <?= $kls->kelas;?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?= form_error('id_kelas','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Nama Orang Tua</label>
            <input type="text" name="nama_orangtua" placeholder="Masukkan Nama Orang Tua" class="form-control">
            <?= form_error('nama_orangtua','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Telepon Orang Tua</label>
            <input type="text" name="telepon_orangtua" placeholder="Masukkan Telepon Orang Tua" class="form-control">
            <?= form_error('telepon_orangtua','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Foto</label><br>
            <input type="file" name="foto">
            <?= form_error('foto','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <button type="submit" class="btn btn-primary mb-5"><i class="fas fa-file-download"></i> Simpan</button>
        <?= anchor('admin/pesertadidik','<div class="btn btn-primary mb-5"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
        <br>
        <br>
        <br>
    <?php form_close();?>
