<div class="container-fluid">

    <div class="alert alert-success" role="alert">
      <i class="fas fa-book-open"></i>
            Mata Pelajaran
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <?= anchor('admin/matapelajaran/tambah_matapelajaran','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Mata Pelajaran</button>') ?>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>KODE MATA PELAJARAN</th>
            <th>NAMA MATA PELAJARAN</th>
            <th>SEMESTER</th>
            <th>TINGKAT</th>
            <th>JURUSAN</th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php
        $no = 1;
        foreach($tb_matapelajaran as $mp): ?>
        <tr>
            <td><?= $no++?></td>
            <td><?= $mp->kode_matapelajaran ?></td>
            <td><?= $mp->nama_matapelajaran ?></td>
            <td><?= $mp->semester?></td>
            <td><?= $mp->tingkat?> </td>
            <td><?= $mp->nama_jurusan?> </td>
            <td width="100px">
            <?= anchor('admin/matapelajaran/update/'.$mp->kode_matapelajaran,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?>
            <div href="#modaldelete" data-toggle="modal" onclick="$('#modaldelete #formdelete').attr('action','<?= base_url('admin/matapelajaran/delete/'.$mp->kode_matapelajaran)?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>
            </td>
        </tr>
        <?php endforeach;?>
    </table>

<!-- Modal -->
<div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>PERINGATAN!</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apa anda yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <form id="formdelete" action="" method="post">
            <button type="submit" class="btn btn-danger">Hapus</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
  </div>
</div>