<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
            Update Walikelas
    </div>

    <div class="alert alert-warning" role="alert">
        Pilih <a href="<?= base_url('admin/walikelas') ?>" class="alert-link"><strong>Kembali</strong></a> Untuk Ke Halaman Peserta Didik Tanpa Mengubah Data!
    </div>

    <?php foreach($tb_walikelas as $wl): ?>
    <?= form_open_multipart('admin/walikelas/update_walikelas_aksi')?>

    <img src="<?= base_url().'assets/uploads/foto_walikelas/'.$wl->foto ?>" style="width:10%">
    <br><br>
        <div class="form-group">
            <label>Kode walikelas</label>
            <input type="hidden" name="id_walikelas" class="form-control" value="<?= $wl->id_walikelas ?>">
            <input type="text" name="kode_walikelas" placeholder="Masukkan Kode walikelas" class="form-control" value="<?= $wl->kode_walikelas ?>">
            <?= form_error('kode_walikelas','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Nama walikelas</label>
            <input type="text" name="nama_walikelas" placeholder="Masukkan Nama walikelas" class="form-control" value="<?= $wl->nama_walikelas ?>">
            <?= form_error('nama_walikelas','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" class="form-control" value="<?= $wl->tempat_lahir ?>">
            <?= form_error('tempat_lahir','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value="<?= $wl->tanggal_lahir ?>">
            <?= form_error('tanggal_lahir','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option><?= $wl->jenis_kelamin ?></option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
            <?= form_error('jenis_kelamin','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Agama</label>
            <input type="text" name="agama" placeholder="Masukkan Agama" class="form-control" value="<?= $wl->agama ?>">
            <?= form_error('agama','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="Masukkan alamat" class="form-control" value="<?= $wl->alamat ?>">
            <?= form_error('alamat','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" placeholder="Masukkan Email" class="form-control" value="<?= $wl->email ?>">
            <?= form_error('email','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" placeholder="Masukkan Telepon" class="form-control" value="<?= $wl->telepon ?>">
            <?= form_error('telepon','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" class="form-control" value="<?= $wl->username ?>">
            <?= form_error('username','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" placeholder="Masukkan Password" class="form-control" value="<?= $wl->password ?>">
        </div>
        <div>
        <label>Foto</label><br>
            <input type="file" name="userfile" value="<?= $wl->foto ?>">
            <?= form_error('foto','<div class="text-danger small" ml-3>','</div>')?>
        </div><br>
        <button type="submit" class="btn btn-primary mb-5"><i class="fas fa-file-download"></i> Simpan</button>
        <?= anchor('admin/walikelas','<div class="btn btn-primary ml-2 mb-5"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
        <br>
        <br>
        <br>
    <?php form_close();?>
    <?php endforeach; ?>