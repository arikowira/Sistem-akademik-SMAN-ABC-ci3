<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
            Edit Admin
    </div>

    <?php foreach($tb_admin as $adm):?>
        <form method="post" action="<?= base_url('admin/dataadmin/update_aksi')?>">
            <div class="form-group">
                <label>Nama Admin</label>
                <input type="hidden" name="id_admin" class="form-control" value="<?= $adm->id_admin ?>">
                <input type="text" name="nama_admin" class="form-control" value="<?= $adm->nama_admin ?>">
                <?= form_error('nama_admin','<div class="text-danger small" ml-3>','</div>')?>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?= $adm->email ?>">
                <?= form_error('email','<div class="text-danger small" ml-3>','</div>')?>
            </div>
            <div class="form-group">
                <label>Blokir</label>
                <select name="blokir" class="form-control">
                    <option><?= $adm->blokir ?></option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
                <?= form_error('blokir','<div class="text-danger small" ml-3>','</div>')?>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?= $adm->username ?>">
                <?= form_error('username','<div class="text-danger small" ml-3>','</div>')?>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" value="<?= $adm->password ?>">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-file-download"></i> Simpan</button>
            <?= anchor('admin/dataadmin','<div class="btn btn-primary ml-2"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
        </form>
    <?php endforeach;?>