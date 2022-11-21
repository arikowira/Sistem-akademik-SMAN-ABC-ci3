<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-graduation-cap"></i>
            Tambah Jurusan
    </div>
    <form method="post" action="<?= base_url('admin/jurusan/input_aksi')?>">
        <div class="form-group">
            <label>Kode Jurusan</label>
            <input type="text" name="kode_jurusan" placeholder="Masukkan Kode Jurusan" class="form-control">
            <?= form_error('kode_jurusan','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Nama Jurusan</label>
            <input type="text" name="nama_jurusan" placeholder="Masukkan Nama Jurusan" class="form-control">
            <?= form_error('nama_jurusan','<div class="text-danger small" ml-3>')?>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-file-download"></i> Simpan</button>
        <?= anchor('admin/jurusan','<div class="btn btn-primary ml-2"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
    </form>