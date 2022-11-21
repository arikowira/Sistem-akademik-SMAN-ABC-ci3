<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
            Edit Kelas
    </div>

    <div class="alert alert-warning" role="alert">
        Pilih <a href="<?= base_url('admin/kelas') ?>" class="alert-link"><strong>Kembali</strong></a> Untuk Ke Halaman Peserta Didik Tanpa Mengubah Data!
    </div>

    <?php foreach ($tb_kelas as $kls) :?>
        <form method="post" action="<?= base_url('admin/kelas/update_aksi')?>">
            <div class="form-group">
                <label>Kode Kelas</label>
                <input type="hidden" name="id_kelas" value="<?= $kls->id_kelas?>">
                <input type="text" name="kode_kelas" class="form-control" value="<?= $kls->kode_kelas?>">
            </div>
            <div class="form-group">
                <label>Kelas</label>
                <input type="text" name="kelas" class="form-control" value="<?= $kls->kelas?>">
            </div>
            <div class="form-group">
                <label>Nama Jurusan</label>
                    <select name="nama_jurusan" class="form-control">
                        <option value="<?=$kls->nama_jurusan?>">
                            <?= $kls->nama_jurusan;?>
                        </option>
                        <?php foreach($tb_jurusan as $jrs):?>
                            <option value="<?=$jrs->nama_jurusan?>">
                            <?= $jrs->nama_jurusan;?>
                            <?php endforeach ?>
                        </option>
                    </select>
            </div>
            <div class="form-group">
                <label>Tingkat</label>
                    <select name="tingkat" class="form-control">
                        <option value="<?=$kls->tingkat?>">
                            <?= $kls->tingkat;?>
                        </option>
                        <?php foreach($tb_tingkat as $tkt):?>
                            <option value="<?=$tkt->tingkat?>">
                            <?= $tkt->tingkat;?>
                            <?php endforeach ?>
                        </option>
                    </select>
            </div>
            <div class="form-group">
                <label>Walikelas</label>
                    <select name="id_guru" class="form-control">
                        <option value="<?=$kls->id_guru?>">
                            <?= $kls->nama_guru;?>
                        </option>
                <?php foreach($tb_guru as $gr): ?>
                    <option value="<?= $gr->id_guru?>">
                    <?= $gr->nama_guru;?>
                    <?php endforeach; ?>
                    </option>
            </select>
            <?= form_error('id_walikelas','<div class="text-danger small" ml-3>')?>
        </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-file-download"></i> Simpan</button>
            <?= anchor('admin/kelas','<div class="btn btn-primary ml-2"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
        </form>
    <?php endforeach;?>