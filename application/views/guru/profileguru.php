<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
            Edit Profile
    </div>

    <?php foreach($tb_guru as $gr): ?>
    <?= form_open_multipart('guru/profileguru/update_guru_aksi')?>
        <table>
            <tr>
                <img class="img-profile rounded-circle" src="<?= base_url().'assets/uploads/foto_guru/'.$gr->foto ?>" style="width:10%">
            </tr>
            <tr>
                <h4><?= $gr->nama_guru ?></h4>
            </tr>

        </table>
    <br>
    <div class="row">
        <div class="col-lg-6">
        <div class="form-group">
            <label>Kode Guru</label>
            <input type="hidden" name="id_guru" class="form-control" value="<?= $gr->id_guru ?>">
            <input type="text" name="kode_guru" placeholder="Masukkan Kode Guru" class="form-control" value="<?= $gr->kode_guru ?>">
            <?= form_error('kode_guru','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Nama Guru</label>
            <input type="text" name="nama_guru" placeholder="Masukkan Nama Guru" class="form-control" value="<?= $gr->nama_guru ?>">
            <?= form_error('nama_guru','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" class="form-control" value="<?= $gr->tempat_lahir ?>">
            <?= form_error('tempat_lahir','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value="<?= $gr->tanggal_lahir ?>">
            <?= form_error('tanggal_lahir','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option><?= $gr->jenis_kelamin ?></option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
            <?= form_error('jenis_kelamin','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Agama</label>
            <input type="text" name="agama" placeholder="Masukkan Agama" class="form-control" value="<?= $gr->agama ?>">
            <?= form_error('agama','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="Masukkan alamat" class="form-control" value="<?= $gr->alamat ?>">
            <?= form_error('alamat','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" placeholder="Masukkan Email" class="form-control" value="<?= $gr->email ?>">
            <?= form_error('email','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" placeholder="Masukkan Telepon" class="form-control" value="<?= $gr->telepon ?>">
            <?= form_error('telepon','<div class="text-danger small" ml-3>','</div>')?>
        </div>
    </div>
    </div>
        <div>
        <label>Foto</label><br>
            <input type="file" name="userfile" value="<?= $gr->foto ?>">
            <?= form_error('foto','<div class="text-danger small" ml-3>','</div>')?>
        </div><br>
        <button type="submit" class="btn btn-primary mb-5"><i class="fas fa-file-download"></i> Simpan Perubahan</button>
        <br>
        <br>
        <br>
    <?php form_close();?>
    <?php endforeach; ?>