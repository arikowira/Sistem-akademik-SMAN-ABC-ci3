<title><?=$title;?></title>

<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
        Isi Raport
    </div>
    <center>
    <legend><strong>INPUT RAPORT</strong></legend>
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
                            <?php }else{ $no = 1; foreach($nilai->result() as $nl){?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$nl->nama_matapelajaran?></td>
                                <td><?=$nl->kkm?></td>
                                <td><?=number_format($nl->nilai)?></td>
                                <td><?=$this->m_inputraport->terbilang(number_format($nl->nilai))?></td>
                                <td><?=$nl->deskripsi?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td><?=$no++?></td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <?php } ?>
                        </table>
                        <hr>
                        <h3>Catatan Akhir Semester</h3>
                        <label>1. Ketidakhadiran</label>
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>No</th>
                                <th>Jenis </th>
                                <th>Jumlah</th>
                                <th></th>
                            </tr>
                            <form action="<?=base_url()?>guru/inputraport/simpan_presensi" method="POST">
                                <?php $no = 1; foreach($presensi->result() as $pr){?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$pr->keterangan?></td>
                                    <td><?=$pr->jumlah?> Hari</td>
                                    <td>
                                        <a href="<?=base_url()?>guru/inputraport/hapus_presensi?id_presensi=<?=$pr->id_presensi?>&id=<?=$pesertadidik->row()->id?>&id_kelas=<?=$kelas->row()->id_kelas?>&ta=<?=$tahunakademik?>&semester=<?=$semester?>&page=cas" class="btn btn-sm btn-danger" onclick="return confirm('yakin akan menghapus data ini?')"><i class="fas fa-trash"></i>  Hapus</a>
                                    </td>
                                </tr>
                                <?php }?>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="hidden" name="nisn" value="<?=$pesertadidik->row()->nisn?>"/>
                                    <input type="hidden" name="id" value="<?=$pesertadidik->row()->id?>"/>
                                    <input type="hidden" name="id_kelas" value="<?=$kelas->row()->id_kelas?>"/>
                                    <input type="hidden" name="ta" value="<?=$tahunakademik?>"/>
                                    <input type="hidden" name="semester" value="<?=$semester?>"/>
                                    <select name="keterangan" class="form-control input-sm" required>
                                        <option value="">--Pilih Keterangan--</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Tanpa keterangan">Tanpa Keterangan</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="jumlah" placeholder="Jumlah Hari" class="form-control" required/>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-file-download"></i> Simpan</button>
                                </td>
                            </tr>
                            </form>
                        </table>
                        <br>
                        <Label>2. Catatan Untuk Perhatian Orang Tua Peserta Didik</Label>
                        <?php if($catatan->num_rows() != 0){?>
                        <div class="col-lg-6 row">
                            <table class="table table-bordered table-hover table-striped">
                                <tr>
                                    <td><?=$catatan->row()->catatan?></td>
                                </tr>
                            </table>
                        </div>
                            <a href="<?=base_url()?>guru/inputraport/hapus_catatan?id_catatan=<?=$catatan->row()->id_catatan?>&id=<?=$pesertadidik->row()->id?>&id_kelas=<?=$kelas->row()->id_kelas?>&ta=<?=$tahunakademik?>&semester=<?=$semester?>&page=cas" class="btn btn-danger" onclick="return confirm('yakin akan menghapus data ini?')"><i class="fas fa-trash"></i>  Hapus Catatan</a>
                        <?php }else{?>
                        <form action="<?=base_url()?>guru/inputraport/simpan_catatan" method="POST">
                            <input type="hidden" name="nisn" value="<?=$pesertadidik->row()->nisn?>"/>
                            <input type="hidden" name="id" value="<?=$pesertadidik->row()->id?>"/>
                            <input type="hidden" name="id_kelas" value="<?=$kelas->row()->id_kelas?>"/>
                            <input type="hidden" name="ta" value="<?=$tahunakademik?>"/>
                            <input type="hidden" name="semester" value="<?=$semester?>"/>
                            <textarea class="form-control" name="catatan" style="resize: none"></textarea><br/>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-file-download"></i> Simpan Catatan</button>
                        </form>
                        <?php }?>
                        <hr>
                        <h3>Status Kenaikan Kelas</h3>
                        <?php if($kelulusan->num_rows() != 0){?>
                        <div class="col-lg-6 row">
                            <table class="table table-bordered table-hover table-striped">
                                <tr>
                                    <td><?=$kelulusan->row()->kelulusan?></td>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <a href="<?=base_url()?>guru/inputraport/hapus_kelulusan?id_kelulusan=<?=$kelulusan->row()->id_kelulusan?>&id=<?=$pesertadidik->row()->id?>&id_kelas=<?=$kelas->row()->id_kelas?>&ta=<?=$tahunakademik?>&semester=<?=$semester?>&page=cas" class="btn btn-danger" onclick="return confirm('yakin akan menghapus data ini?')"><i class="fas fa-trash"></i>  Hapus Kelulusan</a>
                        <?php }else{?>
                        <form action="<?=base_url()?>guru/inputraport/simpan_kelulusan" method="POST">
                            <input type="hidden" name="nisn" value="<?=$pesertadidik->row()->nisn?>"/>
                            <input type="hidden" name="id" value="<?=$pesertadidik->row()->id?>"/>
                            <input type="hidden" name="id_kelas" value="<?=$kelas->row()->id_kelas?>"/>
                            <input type="hidden" name="ta" value="<?=$tahunakademik?>"/>
                            <input type="hidden" name="semester" value="<?=$semester?>"/>
                        <select name="kelulusan" class="form-control input-sm" required>
                            <option value="">--Pilih Status--</option>
                            <option value="Naik Kelas">Naik Kelas</option>
                            <option value="Tidak Naik Kelas">Tidak Naik Kelas</option>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-file-download"></i> Simpan Status</button>
                        <?php }?>
                        <br>
                        <br>





