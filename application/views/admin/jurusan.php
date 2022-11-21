<div class="container-fluid">

    <div class="alert alert-success" role="alert">
      <i class="fas fa-graduation-cap"></i>
            Jurusan
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <?= anchor('admin/jurusan/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Jurusan</button>') ?>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>KODE JURUSAN</th>
            <th>NAMA JURUSAN</th>
            <th>AKSI</th>
        </tr>

        <?php
        $no = 1;
        foreach($tb_jurusan as $jrs) :?>
        <tr>
            <td width="20px"><?= $no++?></td>
            <td><?= $jrs->kode_jurusan?></td>
            <td><?= $jrs->nama_jurusan?></td>
            <td  width="100px"><?= anchor('admin/jurusan/update/'.$jrs->id_jurusan,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?>
            <div href="#modaldelete" data-toggle="modal" onclick="$('#modaldelete #formdelete').attr('action','<?= base_url('admin/jurusan/delete/'.$jrs->id_jurusan)?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div></td>
        </tr>
        <?php endforeach; ?>
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