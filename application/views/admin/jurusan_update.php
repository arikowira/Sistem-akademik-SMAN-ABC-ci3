<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
            Edit Jurusan
    </div>
    <?php foreach ($tb_jurusan as $jrs) :?>
        <form method="post" action="<?= base_url('admin/jurusan/update_aksi')?>">
            <div class="form-group">
                <label>Kode Jurusan</label>
                <input type="hidden" name="id_jurusan" value="<?= $jrs->id_jurusan?>">
                <input type="text" name="kode_jurusan" class="form-control" value="<?= $jrs->kode_jurusan?>">
            </div>
            <div class="form-group">
                <label>Nama Jurusan</label>
                <input type="text" name="nama_jurusan" class="form-control" value="<?= $jrs->nama_jurusan?>">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-file-download"></i> Simpan</button>
            <?= anchor('admin/jurusan','<div class="btn btn-primary ml-2"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
        </form>
    <?php endforeach;?>