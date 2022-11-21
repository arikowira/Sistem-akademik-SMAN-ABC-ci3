<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
            Edit Profile
    </div>
    <?= $this->session->flashdata('pesan') ?>
    <?php foreach($tb_pesertadidik as $ptd): ?>
    <?= form_open_multipart('pesertadidik/profilepesertadidik/update_pesertadidik_aksi')?>
        <table>
            <tr>
                <img class="img-profile rounded-circle" src="<?= base_url().'assets/uploads/foto_pesertadidik/'.$ptd->foto ?>" style="width:10%">
            </tr>
            <tr>
                <h4><?= $ptd->nama_pesertadidik ?></h4>
            </tr>

        </table>
    <br>
    <div class="row">
        <div class="col-lg-6">
        <div class="form-group">
            <label>NISN</label>
            <input type="hidden" name="id" class="form-control" value="<?= $ptd->id ?>">
            <input type="text" name="nisn" placeholder="Masukkan NISN" class="form-control" value="<?= $ptd->nisn ?>">
            <?= form_error('nisn','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Nama pesertadidik</label>
            <input type="text" name="nama_pesertadidik" placeholder="Masukkan Nama pesertadidik" class="form-control" value="<?= $ptd->nama_pesertadidik ?>">
            <?= form_error('nama_pesertadidik','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" class="form-control" value="<?= $ptd->tempat_lahir ?>">
            <?= form_error('tempat_lahir','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value="<?= $ptd->tanggal_lahir ?>">
            <?= form_error('tanggal_lahir','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option><?= $ptd->jenis_kelamin ?></option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
            <?= form_error('jenis_kelamin','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Agama</label>
            <input type="text" name="agama" placeholder="Masukkan Agama" class="form-control" value="<?= $ptd->agama ?>">
            <?= form_error('agama','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="Masukkan alamat" class="form-control" value="<?= $ptd->alamat ?>">
            <?= form_error('alamat','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" placeholder="Masukkan Email" class="form-control" value="<?= $ptd->email ?>">
            <?= form_error('email','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" placeholder="Masukkan Telepon" class="form-control" value="<?= $ptd->telepon ?>">
            <?= form_error('telepon','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Nama Orang Tua</label>
            <input type="text" name="nama_orangtua" placeholder="Masukkan Nama Orang Tua" class="form-control" value="<?= $ptd->nama_orangtua ?>">
            <?= form_error('nama_orangtua','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Telepon Orang Tua</label>
            <input type="text" name="telepon_orangtua" placeholder="Masukkan Telepon Orang Tua" class="form-control" value="<?= $ptd->telepon_orangtua ?>">
            <?= form_error('telepon_orangtua','<div class="text-danger small" ml-3>','</div>')?>
        </div>
    </div>
    </div>
        <div>
        <label>Foto</label><br>
            <input type="file" name="userfile" value="<?= $ptd->foto ?>">
            <?= form_error('foto','<div class="text-danger small" ml-3>','</div>')?>
        </div><br>
        <button type="submit" class="btn btn-primary mb-5"><i class="fas fa-file-download"></i> Simpan Perubahan</button>
        <br>
        <br>
        <br>
    <?php form_close();?>
    <?php endforeach; ?>