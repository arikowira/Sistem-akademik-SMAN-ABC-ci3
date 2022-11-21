<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
        Lihat Nilai
    </div>
    <center>
    <legend><strong>LIHAT NILAI</strong></legend>
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
            <td>&nbsp;: <?= $tahunakademik->row()->tahun_akademik?></td>
            </tr>
            <tr>
            <td><strong>Semester </strong></td>
            <td>&nbsp;: <?= $semester->row()->semester ?></td>
            </tr>
            <tr>
            <td><strong>Mata Pelajaran </strong></td>
            <td>&nbsp;: <?= $mapel->row()->kode_matapelajaran.' - '.$mapel->row()->nama_matapelajaran?></td>
            </tr>
        </table>
      </center>
      <br>
      <?php if($cek_nilai->row()->kode_guru != $this->session->userdata('kode_guru')){?>
            <div class="alert alert-warning">
                <i class="fas fa-exclamation"></i>
                        Anda Tidak Memiliki Hak Akses Nilai Ini!
            </div>
            <?php }else{?>
            <form action="<?=base_url()?>guru/riwayatnilai/update_nilai" method="post">
                <?= $this->session->flashdata('pesan') ?>
                    <input type="hidden" name="id" value="<?=$this->input->get('id', true)?>"/>
                    <input type="hidden" name="nisn" value="<?=$pesertadidik->row()->nisn?>"/>
                    <input type="hidden" name="id_kelas" value="<?=$this->input->get('id_kelas', true)?>">
                    <input type="hidden" name="kode_matapelajaran" value="<?=$this->input->get('kode_matapelajaran', true)?>">
                    <input type="hidden" name="ta" value="<?=$this->input->get('ta', true)?>">
                    <input type="hidden" name="semester" value="<?=$this->input->get('semester', true)?>">
                    <div class="form-group">
                        <label>Pengisi Nilai</label>
                            <div>
                                <strong><?=$cek_nilai->row()->kode_guru." - ".$data_guru->row()->nama_guru?></strong>
                            </div>
                    </div>
                    <div class="form-group">
                        <label>Nilai</label>
                        <input type="number" name="nilai" placeholder="Masukkan Nilai" class="form-control" value="<?=$cek_nilai->row()->nilai?>"/>
                        <?= form_error('nilai','<div class="text-danger small" ml-3>','</div>')?>
                    </div>
                    <div class="form-group">
                        <label>KKM</label>
                        <input type="number" name="kkm" placeholder="Masukkan KKM" class="form-control" value="<?=$cek_nilai->row()->kkm?>"/>
                        <?= form_error('KKM','<div class="text-danger small" ml-3>','</div>')?>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" placeholder="Masukkan Deskripsi" class="form-control" style="resize: none"><?=$cek_nilai->row()->deskripsi?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-5"><i class="fas fa-file-download"></i> Simpan</button>
                </form>
            <?php }?>

