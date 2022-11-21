<title><?=$title;?></title>

<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
        Isi Raport
    </div>
    <center>
    <legend><strong>ISI RAPORT</strong></legend>
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
                <?= $this->session->flashdata('pesan')?>
                <h3>Penilaian Hasil Belajar</h3>
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>KKM</th>
                                <th>Angka</th>
                                <th>Huruf</th>
                                <th>Deskripsi Kemauan Belajar</th>
                            </tr>
                            <?php if($nilai->num_rows() == 0){?>
                            <tr>
                                <td>1</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <?php }else{
                                $no = 1; foreach($nilai->result() as $nl){?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$nl->nama_matapelajaran?></td>
                                <td><?=$nl->kkm?></td>
                                <td><?=number_format($nl->nilai)?></td>
                                <td><?=$this->m_inputraport->terbilang(number_format($nl->nilai))?></td>
                                <td><?=$nl->deskripsi?></td>
                            </tr>
                            <?php }}?>
                        </table>
                        <hr>
                        <h3>Catatan Akhir Semester</h3>
                        <label>1. Ketidakhadiran</label>
                        <?php if($presensi->num_rows() == 0){?>
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation"></i>
                                    Ketidakhadiran Belum Diisi!
                            </div>
                        <?php }else{?>
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>No</th>
                                <th>Jenis </th>
                                <th>Jumlah</th>
                            </tr>
                            <form action="<?=base_url()?>guru/inputraport/simpan_presensi" method="POST">
                                <?php $no = 1; foreach($presensi->result() as $pr){?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$pr->keterangan?></td>
                                    <td><?=$pr->jumlah?> Hari</td>
                                </tr>
                                <?php }}?>
                            </form>
                        </table>
                        <br>
                        <Label>2. Catatan Untuk Perhatian Orang Tua Peserta Didik</Label>
                        <?php if($catatan->num_rows() == 0){?>
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation"></i>
                                    Catatan Belum Diisi!
                        </div>
                        <?php }else{?>
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <td><?=$catatan->row()->catatan?></td>
                            </tr>
                        </table>
                        <?php }?>
                        <hr>
                        <h3>Status Kenaikan Kelas</h3>
                        <?php if($kelulusan->num_rows() == 0){?>
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation"></i>
                                    Status Belum Diisi!
                        </div>
                        <?php }else{?>
                        <div class="col-lg-6 row">
                            <table class="table table-bordered table-hover table-striped">
                                <tr>
                                    <td><?=$kelulusan->row()->kelulusan?></td>
                                </tr>
                            </table>
                        </div>
                        <?php }?>