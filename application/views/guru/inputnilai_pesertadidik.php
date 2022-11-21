<title><?=$title;?></title>

<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
        Peserta Didik Di Kelas <?= $kelas ?>
    </div>
    <center>
    <legend><strong>INPUT NILAI</strong></legend>
        <table>
            <tr>
            <td><strong>Kode Kelas</strong></td>
            <td>&nbsp;: <?= $kode_kelas ?></td>
            </tr>
            <tr>
            <td><strong>Kelas </strong></td>
            <td>&nbsp;: <?= $kelas ?></td>
            </tr>
            <tr>
            <td><strong>Jurusan </strong></td>
            <td>&nbsp;: <?= $jurusan?></td>
            </tr>
            <tr>
            <td><strong>Mata Pelajaran </strong></td>
            <td>&nbsp;: <?=$kode_matapelajaran." - ".$nama_matapelajaran?></td>
            </tr>
            <tr>
            <td><strong>Tahun Ajaran </strong></td>
            <td>&nbsp;: <?= $tahunakademik?></td>
            </tr>
            <tr>
            <td><strong>Semester </strong></td>
            <td>&nbsp;: <?= $semester?></td>
            </tr>
        </table>
      </center>
      <br>
      <?php if($cek_nilai->num_rows() != 0){ ?>
        <div class="alert alert-warning">
            <i class="fas fa-exclamation"></i>
                Nilai Sudah Diisi!
        </div>
        <?= anchor('guru/inputnilai','<div class="btn btn-primary ml-2 mb-5"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
    <?php }else{?>
            <form action="<?=base_url()?>guru/inputnilai/simpan_nilai" method="post">
                <input type="hidden" name="id_kelas" value="<?=$id_kelas?>">
                <input type="hidden" name="kode_matapelajaran" value="<?=$kode_matapelajaran?>">
                <input type="hidden" name="ta" value="<?=$tahunakademik?>">
                <input type="hidden" name="semester" value="<?=$semester?>">
      <?= $this->session->flashdata('pesan') ?>
        <div class="form-group">
            <label>Guru</label>
            <input type="hidden" name="guru" class="form-control" value="<?=$this->session->userdata('kode_guru')?>" readonly>
            <br>
            <div><strong><?=$this->session->userdata('kode_guru')." - ".$this->session->userdata('nama_guru')?></strong></div>
        </div>
        <div class="form-group row col-lg-2">
            <label>KKM Nilai</label>
            <input type="number" name="kkm" placeholder="KKM" class="form-control" required/>
            <?= form_error('kkm','<div class="text-danger small" ml-3>','</div>')?>
        </div>
    <br>
      <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>NISN</th>
            <th>NAMA PESERTA DIDIK</th>
            <th>NILAI</th>
            <th>DESKRIPSI</th>
        </tr>
        <?php
        $no = 1;
        foreach($pesertadidik as $ptd): ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$ptd->nisn?>
            <input type="hidden" name="nisn<?=$no;?>" value="<?=$ptd->nisn?>"/>
            </td>
            <td><?=$ptd->nama_pesertadidik?></td>
            <td width="100px">
                <input type="number" name="nilai<?=$no;?>" placeholder="Nilai" class="form-control"/>
            </td>
            <td>
                <textarea name="deskripsi<?=$no;?>" placeholder="Masukkan Deskripsi" class="form-control" style="resize: none"></textarea>
            </td>
        </tr>
        <?php endforeach;
        $jumlahData = $no;
        ?>
      </table>
      <input type="hidden" name="jumlahData" value="<?= $jumlahData; ?>">
      <button type="submit" class="btn btn-primary mb-5"><i class="fas fa-file-download"></i> Simpan</button>
      <?= anchor('guru/inputnilai','<div class="btn btn-primary ml-2 mb-5"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
      </form>
      <?php }?>