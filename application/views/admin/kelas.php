<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i>
            Kelas
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <?= anchor('admin/kelas/tambah_kelas','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Kelas</button>') ?>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>NO</th>
            <th>KODE KELAS</th>
            <th>KELAS</th>
            <th>JURUSAN</th>
            <th>TINGKAT</th>
            <th colspan="2">AKSI</th>
        </tr>
        <?php
        $no = 1;
        foreach($tb_kelas as $kls): ?>

        <tr>
            <td><?= $no++?></td>
            <td><?= $kls->kode_kelas?></td>
            <td><?= $kls->kelas?></td>
            <td><?= $kls->nama_jurusan?></td>
            <td><?= $kls->tingkat?></td>
            <td width="140px"><?= anchor('admin/kelas/detail/'.$kls->id_kelas,'<div class="btn btn-sm btn-success"><i class="fa fa-eye"></i></div>')?>
            <?= anchor('admin/kelas/update/'.$kls->id_kelas,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?>
            <div href="#modaldelete" data-toggle="modal" onclick="$('#modaldelete #formdelete').attr('action','<?= base_url('admin/kelas/delete/'.$kls->id_kelas)?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div></td>
        </tr>
        <?php endforeach ?>
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