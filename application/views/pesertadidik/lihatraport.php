<title><?=$title;?></title>

<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-newspaper"></i>
        Lihat dan Cetak Raport
    </div>
      <br>
      <?= $this->session->flashdata('pesan') ?>
      <table class="table table-bordered table-hover table-striped">
          <tr>
              <th>No</th>
              <th>Tahun Ajaran</th>
              <th>Semester</th>
              <th>Aksi</th>
          </tr>
          <?php
            $no = 1;
            foreach($data as $dt): ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$dt->tahun_akademik?></td>
                <td><?=$dt->semester?></td>
                <td width="170px">
                    <a href="<?=base_url()?>pesertadidik/lihatraport/cetak_raport?id=<?=$pesertadidik->row()->id?>&id_kelas=<?=$kelas->row()->id_kelas?>&semester=<?=$dt->semester?>&ta=<?=$dt->tahun_akademik?>" target="_blank" class="btn btn-sm btn-success mb-2"><i class="fa fa-print"></i> Cetak Raport</a>
                    <a href="<?=base_url()?>pesertadidik/lihatraport/pdf?id=<?=$pesertadidik->row()->id?>&id_kelas=<?=$kelas->row()->id_kelas?>&semester=<?=$dt->semester?>&ta=<?=$dt->tahun_akademik?>" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Unduh Raport</a>
                </td>
            </tr>
            <?php endforeach; ?>
      </table>