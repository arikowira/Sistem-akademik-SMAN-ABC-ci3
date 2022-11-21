<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i>
            Tambah Kelas
    </div>
    <form method="post" action="<?= base_url('admin/kelas/tambah_kelas_aksi')?>">
        <div class="form-group">
            <label>Kode Kelas</label>
            <input type="text" name="kode_kelas" placeholder="Masukkan Kode Kelas" class="form-control">
            <?= form_error('kode_kelas','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <input type="text" name="kelas" placeholder="Masukkan Kelas" class="form-control">
            <?= form_error('kelas','<div class="text-danger small" ml-3>')?>
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
            <label>Walikelas</label>
            <select name="id_guru" class="form-control">
                <option value="">--Pilih Walikelas--</option>
                <?php foreach($tb_guru as $gr): ?>
                    <option value="<?= $gr->id_guru?>">
                    <?= $gr->nama_guru;?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?= form_error('id_walikelas','<div class="text-danger small" ml-3>')?>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-file-download"></i> Simpan</button>
        <?= anchor('admin/kelas','<div class="btn btn-primary ml-2"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
        <br>
        <br>
        <br>
        <br>
    </form>
