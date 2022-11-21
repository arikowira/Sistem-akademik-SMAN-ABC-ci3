<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-eye"></i>
        <?php foreach($detail_kelas as $dtk): ?>
            Kelas <?= $dtk->kelas?>
        <?php endforeach ?>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>NO</th>
            <th>NISN</th>
            <th>NAMA PESERTA DIDIK</th>
            <th>KELAS</th>
        </tr>
        <?php
        $no = 1;
        foreach($detail as $dt): ?>

        <tr>
            <td><?= $no++?></td>
            <td><?= $dt->nisn?></td>
            <td><?= $dt->nama_pesertadidik?></td>
            <?php foreach($detail_kelas as $dtk): ?>
            <td><?= $dtk->kelas?></td>
            <?php endforeach ?>
        </tr>
        <?php endforeach ?>
    </table>
    <?= anchor('admin/kelas','<div class="btn btn-primary"><i class="far fa-caret-square-left"></i> Kembali</div>')?>