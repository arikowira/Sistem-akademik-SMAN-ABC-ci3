<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="far fa-user"></i>
            Tambah Wali Kelas
    </div>

    <?= form_open_multipart('admin/walikelas/tambah_walikelas_aksi')?>
        <div class="form-group">
            <label>Kode walikelas</label>
            <input type="text" name="kode_walikelas" placeholder="Masukkan Kode walikelas" class="form-control">
            <?= form_error('kode_walikelas','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Nama walikelas</label>
            <input type="text" name="nama_walikelas" placeholder="Masukkan Nama walikelas" class="form-control">
            <?= form_error('nama_walikelas','<div class="text-danger small" ml-3>','</div>')?>
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
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="">--Pilih Jenis Kelamin--</option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
            <?= form_error('jenis_kelamin','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Agama</label>
            <input type="text" name="agama" placeholder="Masukkan Agama" class="form-control">
            <?= form_error('agama','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control">
            <?= form_error('alamat','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" placeholder="Masukkan Email" class="form-control">
            <?= form_error('email','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" placeholder="Masukkan Telepon" class="form-control">
            <?= form_error('telepon','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" class="form-control">
            <?= form_error('username','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" placeholder="Masukkan Password" class="form-control">
            <?= form_error('password','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Foto</label><br>
            <input type="file" name="foto">
            <?= form_error('foto','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <button type="submit" class="btn btn-primary mb-5"><i class="fas fa-file-download"></i> Simpan</button>
        <?= anchor('admin/walikelas','<div class="btn btn-primary mb-5"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
        <br>
        <br>
        <br>
    <?php form_close();?>
