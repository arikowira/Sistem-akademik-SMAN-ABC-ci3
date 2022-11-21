<title><?=$title;?></title>

<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-eye"></i>
        Lihat Raport
    </div>
    <center>
    <legend><strong>LIHAT RAPORT</strong></legend>
    <table>
            <tr>
            <td><strong>Nama Peserta Didik</strong></td>
            <td>&nbsp;: <?= $pesertadidik->row()->nama_pesertadidik ?></td>
            </tr>
            <tr>
            <td><strong>NISN</strong></td>
            <td>&nbsp;: <?= $pesertadidik->row()->nisn ?></td>
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
      <?php if($nilai->num_rows() == 0){?>
      <div class="alert alert-warning">
        <i class="fas fa-exclamation"></i>
                Raport Belum Diisi!
        </div>
        <?php }else{ ?>
        <table class="table table-bordered table-hover table-striped">
          <tr>
              <th>No</th>
              <th>Tahun Ajaran</th>
              <th>Semester</th>
              <th>Aksi</th>
          </tr>
          <?php
            $no = 1;
            foreach($nilai->result() as $nl){?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$nl->tahun_akademik?></td>
                <td><?=$nl->semester?></td>
                <td width="170px">
                    <a href="<?=base_url()?>guru/lihatraport/preview_raport?id=<?=$id?>&id_kelas=<?=$kelas->row()->id_kelas?>&semester=<?=$nl->semester?>&ta=<?=$nl->tahun_akademik?>" target="_blank" class="btn btn-sm btn-primary mb-1"><i class="fa fa-eye"></i> Lihat Raport</a>
                    <a href="<?=base_url()?>guru/lihatraport/cetak_raport?id=<?=$id?>&id_kelas=<?=$kelas->row()->id_kelas?>&semester=<?=$nl->semester?>&ta=<?=$nl->tahun_akademik?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak Raport</a>
                </td>
            </tr>
            <?php }} ?>
      </table>