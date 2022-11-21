<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-newspaper"></i>
        Peserta Didik Di Kelas <?= $kelas->row()->kelas ?>
    </div>
    <center>
    <legend><strong>RIWAYAT NILAI</strong></legend>
        <table>
            <tr>
            <td><strong>Kode Kelas</strong></td>
            <td>&nbsp;: <?= $kelas->row()->kode_kelas ?></td>
            </tr>
            <tr>
            <td><strong>Kelas </strong></td>
            <td>&nbsp;: <?= $kelas->row()->kelas?></td>
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
              <td>NO</td>
              <td>NISN</td>
              <td>NAMA PESERTA DIDIK</td>
              <td>AKSI</td>
          </tr>
          <?php
            $no = 1;
            foreach($pesertadidik as $ptd): ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$ptd->nisn?></td>
                <td><?=$ptd->nama_pesertadidik?></td>
                <td width="150px"><a href="<?=base_url()?>guru/riwayatnilai/nilai_siswa?id=<?=$ptd->id?>" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat Nilai</a></td>
            </tr>
            <?php endforeach; ?>
      </table>
      <?= anchor('guru/riwayatnilai','<div class="btn btn-primary ml-2 mb-5"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
