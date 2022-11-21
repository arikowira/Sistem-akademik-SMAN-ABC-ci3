<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-user"></i>
            Wali Kelas
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <?= anchor('admin/walikelas/tambah_walikelas','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Wali Kelas</button>') ?>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>No</th>
            <th>Nama Walikelas</th>
            <th>Alamat</th>
            <th>Email</th>
            <th colspan="3">Aksi</th>
        </tr>

        <?php
        $no = 1;
        foreach($tb_walikelas as $wl) : ?>
        <tr>
            <td><?= $no++?></td>
            <td><?= $wl->nama_walikelas?></td>
            <td><?= $wl->alamat?></td>
            <td><?= $wl->email?></td>
            <td width="140px">
            <?= anchor('admin/walikelas/update/'.$wl->id_walikelas,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit fa-eye"></i></div>')?>
            <div href="#modaldelete" data-toggle="modal" onclick="$('#modaldelete #formdelete').attr('action','<?= base_url('admin/walikelas/delete/'.$wl->id_walikelas)?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div></td>
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