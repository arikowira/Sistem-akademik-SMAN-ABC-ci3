<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-book-open"></i>
            Tambah Mata Pelajaran
    </div>
    <form method="post" action="<?= base_url('admin/matapelajaran/tambah_matapelajaran_aksi')?>">
        <div class="form-group">
            <label>Kode Mata Pelajaran</label>
            <input type="text" name="kode_matapelajaran" placeholder="Masukkan Kode Mata Pelajaran" class="form-control">
            <?= form_error('kode_matapelajaran','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Nama Mata Pelajaran</label>
            <input type="text" name="nama_matapelajaran" placeholder="Masukkan Nama Mata Pelajaran" class="form-control">
            <?= form_error('nama_matapelajaran','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Semester</label>
            <select name="semester" class="form-control">
                <option value="">--Pilih Semester--</option>
                <option>Ganjil</option>
                <option>Genap</option>
            </select>
            <?= form_error('semester','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Tingkat</label>
            <select name="tingkat" class="form-control">
                <option value="">--Pilih Tingkat--</option>
                <?php foreach($tb_tingkat as $tkt): ?>
                    <option value="<?= $tkt->tingkat?>">
                    <?= $tkt->tingkat;?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?= form_error('tingkat','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Nama Jurusan</label>
            <select name="nama_jurusan" class="form-control">
                <option value="">--Pilih Jurusan--</option>
                <?php foreach($tb_jurusan as $jrs): ?>
                    <option value="<?= $jrs->nama_jurusan?>">
                    <?= $jrs->nama_jurusan;?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?= form_error('nama_jurusan','<div class="text-danger small" ml-3>')?>
        </div>
        <button type="submit" class="btn btn-primary mb-5"><i class="fas fa-file-download"></i> Simpan</button>
        <?= anchor('admin/matapelajaran','<div class="btn btn-primary ml-2 mb-5"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
    </form>