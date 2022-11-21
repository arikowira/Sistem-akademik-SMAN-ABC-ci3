<div class="container-fluid">
    <div class="alert alert-success">
        <i class="fas fa-newspaper"></i>
        Riwayat Nilai <strong><?= $pesertadidik->row()->nama_pesertadidik ?></strong> | Kelas <strong><?= $kelas->row()->kelas ?></strong>
    </div>
    <center>
    <legend><strong>RIWAYAT NILAI</strong></legend>
        <table>
            <tr>
            <td><strong>NISN</strong></td>
            <td>&nbsp;: <?= $pesertadidik->row()->nisn ?></td>
            </tr>
            <tr>
            <td><strong>Nama Peserta Didik</strong></td>
            <td>&nbsp;: <?= $pesertadidik->row()->nama_pesertadidik ?></td>
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
      <?php if($data_nilai->num_rows() == 0){?>
            <div class="alert alert-warning">
                    <i class="fas fa-exclamation"></i>
                            Belum Ada Nilai Peserta Didik!
            </div>
            <?php }else{?>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <td>NO</td>
                <td>TAHUN AJARAN</td>
                <td>SEMESTER</td>
                <td>KODE MATA PELAJARAN</td>
                <td>MATA PELAJARAN</td>
                <td>AKSI</td>
            </tr>
            <?php
                $no = 1;
                foreach($data_nilai->result() as $dtn){ ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$dtn->tahun_akademik?></td>
                    <td><?=$dtn->semester?></td>
                    <td><?=$dtn->kode_matapelajaran?></td>
                    <td><?=$dtn->nama_matapelajaran?></td>
                    <td width="150px">
                        <a href="<?=base_url()?>guru/riwayatnilai/lihat_nilai?id=<?=$pesertadidik->row()->id?>&id_kelas=<?=$kelas->row()->id_kelas?>&kode_matapelajaran=<?=$dtn->kode_matapelajaran?>&ta=<?=$dtn->tahun_akademik?>&semester=<?=$dtn->semester?>" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat Nilai</a>
                    </td>
                </tr>
                <?php } ?>
        </table>
        <?php } ?>
        <br><br><br>
