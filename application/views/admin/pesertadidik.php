<div class="container-fluid">

    <div class="alert alert-success" role="alert">
      <i class="fas fa-users"></i>
            Peserta Didik
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <?= anchor('admin/pesertadidik/tambah_pesertadidik','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Peserta Didik</button>') ?>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>NO</th>
            <th>NAMA PESERTA DIDIK</th>
            <th>ALAMAT</th>
            <th>EMAIL</th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php
        $no = 1;
        foreach($tb_pesertadidik as $ptd) : ?>
        <tr>
            <td><?= $no++?></td>
            <td><?= $ptd->nama_pesertadidik?></td>
            <td><?= $ptd->alamat?></td>
            <td><?= $ptd->email?></td>
            <td width="140px">
            <?= anchor('admin/pesertadidik/update/'.$ptd->id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit fa-eye"></i></div>')?>
            <div href="#modaldelete" data-toggle="modal" onclick="$('#modaldelete #formdelete').attr('action','<?= base_url('admin/pesertadidik/delete/'.$ptd->id)?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div></td>
            </td>
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