<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
            Edit Mata Pelajaran
    </div>
    <?php foreach($tb_matapelajaran as $mp):?>
        <form method="post" action="<?= base_url('admin/matapelajaran/update_aksi')?>">
            <div class="form-group">
                <label>Nama Mata Pelajaran</label>
                <input type="hidden" name="kode_matapelajaran" class="form-control" value="<?= $mp->kode_matapelajaran ?>">
                <input type="text" name="nama_matapelajaran" class="form-control" value="<?= $mp->nama_matapelajaran ?>">
            </div>
            <div class="form-group">
                <label>Semester</label>
                <select name="semester" class="form-control">
                    <option><?= $mp->semester?></option>
                    <option>Ganjil</option>
                    <option>Genap</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tingkat</label>
                <select name="tingkat" class="form-control">
                        <option value="<?=$mp->tingkat?>">
                            <?= $mp->tingkat;?>
                        </option>
                        <?php foreach($tb_tingkat as $tkt):?>
                            <option value="<?=$tkt->tingkat?>">
                            <?= $tkt->tingkat;?>
                            <?php endforeach ?>
                        </option>
                    </select>
            </div>
            <div class="form-group">
                <label>Nama Jurusan</label>
                <select name="nama_jurusan" class="form-control">
                        <option value="<?=$mp->nama_jurusan?>">
                            <?= $mp->nama_jurusan;?>
                        </option>
                        <?php foreach($tb_jurusan as $jrs):?>
                            <option value="<?=$jrs->nama_jurusan?>">
                            <?= $jrs->nama_jurusan;?>
                            <?php endforeach ?>
                        </option>
                    </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-file-download"></i> Simpan</button>
            <?= anchor('admin/matapelajaran','<div class="btn btn-primary"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
        </form>
    <?php endforeach;?>