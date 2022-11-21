<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-users-cog"></i>
            Tambah Admin
    </div>

        <form method="post" action="<?= base_url('admin/dataadmin/tambah_admin_aksi')?>">
            <div class="form-group">
                <label>Nama Admin</label>
                <input type="hidden" name="foto" class="form-control">
                <input type="text" name="nama_admin" placeholder="Masukkan Nama Admin" class="form-control">
                <?= form_error('nama_admin','<div class="text-danger small" ml-3>','</div>')?>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" placeholder="Masukkan Email" class="form-control">
                <?= form_error('email','<div class="text-danger small" ml-3>','</div>')?>
            </div>
            <div class="form-group">
                <label>Blokir</label>
                <select name="blokir" class="form-control">
                    <option value="">--Pilih Status--</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
                <?= form_error('blokir','<div class="text-danger small" ml-3>','</div>')?>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan Username" class="form-control">
            </div>
                <?= form_error('username','<div class="text-danger small" ml-3>','</div>')?>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" placeholder="Masukkan Password" class="form-control">
            </div>
                <?= form_error('password','<div class="text-danger small" ml-3>','</div>')?>
            <button type="submit" class="btn btn-primary"><i class="fas fa-file-download"></i> Simpan</button>
            <?= anchor('admin/dataadmin','<div class="btn btn-primary ml-2"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
        </form>
