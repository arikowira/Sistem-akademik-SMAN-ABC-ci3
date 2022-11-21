<title><?=$title;?></title>

<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
        Peserta Didik Di Kelas <?= $kelas ?>
    </div>
    <center>
    <legend><strong>INPUT RAPORT</strong></legend>
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
            <td><strong>Tahun Ajaran </strong></td>
            <td>&nbsp;: <?= $tahun_akademik?></td>
            </tr>
            <tr>
            <td><strong>Semester </strong></td>
            <td>&nbsp;: <?= $semester?></td>
            </tr>
        </table>
      </center>
      <br>
      <?= $this->session->flashdata('pesan') ?>
      <table class="table table-bordered table-hover table-striped">
        <tr>
            <td><strong>No</strong></td>
            <td><strong>NISN</strong></td>
            <td><strong>Nama Peserta Didik</strong></td>
            <td><strong>Aksi</strong></td>
        </tr>
        <?php
            $no = 1;
            foreach($pesertadidik as $ptd): ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$ptd->nisn?></td>
                <td><?=$ptd->nama_pesertadidik?></td>
                <td width="170px"><a href="<?=base_url()?>guru/inputraport/isi_raport?id=<?=$ptd->id?>&ta=<?=$tahun_akademik?>&semester=<?=$semester?>&id_kelas=<?=$id_kelas?>" target="_blank" class="btn btn-primary"><i class="fas fa-edit"></i> Input Raport</a></td>
            </tr>
            <?php endforeach; ?>
      </table>
      <?= anchor('guru/inputraport','<div class="btn btn-primary ml-2 mb-5"><i class="far fa-caret-square-left"></i> Kembali</div>')?>