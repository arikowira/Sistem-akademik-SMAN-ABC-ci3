<!DOCTYPE html>
<title><?=$title;?></title>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?=base_url()?>assets/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <style type="text/css">
            @page {
              size: legal;
              margin: 0mm;
            }
            @media all {
                .page-break { display: none; }
            }

            @media print {
                .page-break { display: block; page-break-before: always; }
            }
            html
            {
                background-color: #FFFFFF;
                margin: 0px;  /* this affects the margin on the html before sending to printer */
            }

            body
            {
                font-size: 12pt;
                margin: 15mm 15mm 15mm 15mm; /* margin you want for the content */
            }
        </style>
        <script type="text/javascript">
            window.onload=function(){self.print();}
        </script>
    </head>
    <body>
        <div class="container">
            <center>
                <img src="<?=base_url()?>assets/img/garuda.jpg"/>
                <br/><br/>
                <h1><b>LAPORAN HASIL BELAJAR<br/>SEKOLAH MENENGAH ATAS<br/>(SMA)</b></h1>
            </center>
            <br/><br/><br/>
            <h2>
            <table class="table table-hover table-striped table-bordered">
                <tr>
                    <td>Nama Sekolah </td>
                    <td>:</td>
                    <td>SMAN 64 JAKARTA</td>
                </tr>
                <tr>
                    <td>Alamat Sekolah </td>
                    <td>:</td>
                    <td>JL. RAYA CIPAYUNG</td>
                </tr>
                <tr>
                    <td>Kecamatan </td>
                    <td>:</td>
                    <td>CIPAYUNG</td>
                </tr>
                <tr>
                    <td>Kabupaten </td>
                    <td>:</td>
                    <td>JAKARTA TIMUR</td>
                </tr>
                <tr>
                    <td>Provinsi </td>
                    <td>:</td>
                    <td>DKI JAKARTA</td>
                </tr>
            </table>
            <br/><br/><br/>
            <center>
                NAMA PESERTA DIDIK
                <br/>
                <?=$pesertadidik->row()->nama_pesertadidik?>
                <br/><br/><br/>
                NOMOR INDUK SISWA<br/>
                <?=$pesertadidik->row()->nisn?>
            </center>
            <br/><br/>
            <center>
                <h1>
                    <b>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN<br/>REPUBLIK INDONESIA</b>
                </h1>
            </center>
            </h2>
            <div class="row page-break">
                <div class="row">
                    <div class="md-12">
                        <br/><br/>
                        <table width="120%">
                            <tr>
                                <td>Nama Peserta Didik</td>
                                <td>&nbsp;&nbsp;&nbsp;:</td>
                                <td width="50%"><?=$pesertadidik->row()->nama_pesertadidik?></td>
                            </tr>
                            <tr>
                                <td>Nomor Induk Siswa</td>
                                <td>&nbsp;&nbsp;&nbsp;:</td>
                                <td><?=$pesertadidik->row()->nisn?></td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td>&nbsp;&nbsp;&nbsp;:</td>
                                <td><?=$kelas->row()->nama_jurusan?></td>
                            </tr>
                            <tr>
                                <td>Kelas/Semester</td>
                                <td>&nbsp;&nbsp;&nbsp;:</td>
                                <td><?=$kelas->row()->kelas?> / <?= $semester ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br/><br/><br/>
                <div class="row">
                   <h3>PENILAIAN HASIL BELAJAR</h3>
                    <br><br>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>No.</th>
                            <th>Mata Pelajaran</th>
                            <th>KKM</th>
                            <th>Angka</th>
                            <th>Huruf</th>
                            <th>Deskripsi Kemauan Belajar</th>
                        </tr>
                        <?php if($nilai->num_rows() == 0){
                            for($i=1;$i<=10;$i++){
                        ?>
                        <tr>
                            <td><?=$i?>.</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>

                        <?php } }else{ $no = 1; $hitung = count($nilai->result()); foreach($nilai->result() as $nl){?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$nl->nama_matapelajaran?></td>
                            <td><?=$nl->kkm?></td>
                            <td><?=number_format($nl->nilai)?></td>
                            <td><?=$this->m_inputraport->terbilang(number_format($nl->nilai))?></td>
                            <td><?=$nl->deskripsi?></td>
                        </tr>
                        <?php }
                        if($hitung == 1){
                            $tot_looping = 9;
                        }
                        if($hitung == 2){
                            $tot_looping = 8;
                        }
                        if($hitung == 3){
                            $tot_looping = 7;
                        }
                        if($hitung == 4){
                            $tot_looping = 6;
                        }
                        if($hitung == 5){
                            $tot_looping = 5;
                        }
                        if($hitung == 6){
                            $tot_looping = 4;
                        }
                        if($hitung == 7){
                            $tot_looping = 3;
                        }
                        if($hitung == 8){
                            $tot_looping = 2;
                        }
                        if($hitung == 9){
                            $tot_looping = 1;
                        }
                        for($i=0;$i<$tot_looping;$i++){
                        ?>
                        <tr>
                            <td><?=$no++?>.</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>

                        <?php }} ?>
                    </table>
                    <br/><br/>
                    <table width="100%">
                    <tr>
                        <td><b>JUMLAH TOTAL </b></td>
                        <td>:</td>
                        <td width="50%"><b> <?=number_format($jumlah_nilai->row()->jumlah_nilai)?></b></td>

                    </tr>
                    <tr>
                        <td><b>Rata-Rata </b></td>
                        <td>:</td>
                        <td><b> <?=number_format($jumlah_nilai->row()->jumlah_nilai/$total_nilai->row()->total_nilai, 2)?></b></td>

                    </tr>
                    <tr>
                        <td><b>Peringkat </b></td>
                        <td>:</td>
                        <td><b></b>
                        <?php $rank = 0; foreach($ranking->result() as $ranking){
                            if($ranking->nisn == $pesertadidik->row()->nisn){
                                $rank = $ranking->ranking;
                            }
                         }?>
                         <b><?=$rank?></b> Dari <?=count($total_siswa->result())?> Peserta Didik</td>
                    </tr>
                    </table>
                    </div>
                </div>
            </div>

            <div class="row page-break">
                <br><br><br>
                <h3>CATATAN AKHIR SEMESTER</h3>
                        <?=@$this->session->flashdata('msg')?>
                        <label><strong>1. Ketidakhadiran</strong></label>
                        <table class="table table-hover table-striped table-bordered">
                            <tr>
                                <th>No.</th>
                                <th>Jenis </th>
                                <th>Jumlah</th>
                            </tr>
                            <?php $no = 1; foreach($presensi->result() as $presensi){?>
                            <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$presensi->keterangan?></td>
                                <td><?=$presensi->jumlah?> Hari</td>
                            </tr>
                            <?php }?>
                        </table>
                        <br/>
                        <label><strong>2. Catatan Untuk Perhatian Orang Tua Wali</strong></label>
                        <?php if($catatan->num_rows() != 0){?>
                        <table class="table table-bordered">
                            <tr>
                                <td><?=$catatan->row()->catatan?></td>

                            </tr>
                        </table>
                        <?php }else{?>
                        <table class="table table-bordered">
                            <tr>
                                <td>-</td>
                            </tr>
                        </table>
                        <?php }?>
                        <br/><br/>
                        <table width="100%">
                            <tr>
                                <td><center>Mengetahui</center></td>
                                <td></td>
                                <td width="50%"><center>Jakarta, <?=date('d-m-Y')?></center></td>
                            </tr>
                            <tr>
                                <td><center>Orang Tua/Wali</center></td>
                                <td></td>
                                <td width="50%"><center>Wali Kelas</center></td>
                            </tr>
                        </table>
                        <table width="100%">
                            <tr>
                                <td><center></center></td>
                                <td></td>
                                <td width="10000px"><center><img src="<?=base_url()?>/assets/ttd/<?=$this->session->userdata('id_guru')?>.png"></center></td>
                            </tr>
                            <tr>
                                <td width="50%"><center><?=$pesertadidik->row()->nama_orangtua?></center></td>
                                <td></td>
                                <td width="50%"><center><?=$guru->row()->nama_guru?></center></td>
                            </tr>
                        </table>
                        <br/><br/><br/>
                        <center>Kepala Sekolah</center>
                        <center><img src="<?=base_url()?>/assets/ttd/ttdkepsek.png"></center>
                        <center>Drs.Imam Prasaja M.Si</center>
            </div>
        </div>
    </body>
</html>