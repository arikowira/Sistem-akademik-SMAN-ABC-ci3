<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-eye"></i>
            Detail Mata Pelajaran
    </div>

    <table class="table table-hover table-striped table-bordered">
        <?php foreach ($detail as $dt): ?>
        <tr>
            <th width="300px">Kode Mata Kuliah</th>
            <td><?= $dt->kode_matapelajaran?></td>
        </tr>
        <tr>
            <th>Nama Mata Pelajaran</th>
            <td><?= $dt->nama_matapelajaran?></td>
        </tr>
        <tr>
            <th>Semester</th>
            <td><?= $dt->semester?></td>
        </tr>
        <tr>
            <th>Tingkat</th>
            <td><?= $dt->tingkat?></td>
        </tr>
        <tr>
            <th>Jurusan</th>
            <td><?= $dt->nama_jurusan?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?= anchor('admin/matapelajaran','<div class="btn btn-sm btn-primary">Kembali</div>')?>


