<title><?=$title;?></title>

<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
        Peserta Didik Di Kelas <?= $kelas->row()->kelas ?>
    </div>
    <center>
    <legend><strong>LIHAT RAPORT</strong></legend>
        <table>
            <tr>
            <td><strong>Kode Kelas</strong></td>
            <td>&nbsp;: <?= $kelas->row()->kode_kelas ?></td>
            </tr>
            <tr>
            <td><strong>Kelas </strong></td>
            <td>&nbsp;: <?= $kelas->row()->kelas ?></td>
            </tr>
            <tr>
            <td><strong>Jurusan </strong></td>
            <td>&nbsp;: <?= $kelas->row()->nama_jurusan?></td>
            </tr>
        </table>
      </center>
      <br>
      <?= $this->session->flashdata('pesan') ?>
      <table class="table table-bordered table-hover table-striped">
          <tr>
              <th>No</th>
              <th>NISN</th>
              <th>Nama Peserta Didik</th>
              <th>Aksi</th>
          </tr>
          <?php
            $no = 1;
            foreach($pesertadidik as $ptd): ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$ptd->nisn?></td>
                <td><?=$ptd->nama_pesertadidik?></td>
                <td width="170px"><a href="<?=base_url()?>guru/lihatraport/lihat_raport_siswa?id=<?=$ptd->id?>&id_kelas=<?=$kelas->row()->id_kelas?>" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat Raport</a></td>
            </tr>
            <?php endforeach; ?>
      </table>