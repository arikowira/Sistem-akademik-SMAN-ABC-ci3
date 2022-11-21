<title><?=$title;?></title>

<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
        Ganti Password
    </div>

    <?= $this->session->flashdata('pesan') ?>
    <?= form_error('passwordbaru','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>','</div>')?>
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= base_url('pesertadidik/gantipassword')?>" method="post">
                <div class="form-group">
                    <label for="passwordlama">Password Lama</label>
                    <input type="password" id="passwordlama" name="passwordlama" class="form-control" placeholder="Masukkan Password Lama">
                    <?= form_error('passwordlama','<div class="text-danger small" ml-3>','</div>')?>
                </div>
                <div class="form-group">
                    <label for="passwordbaru">Password Baru</label>
                    <input type="password" id="passwordbaru" name="passwordbaru" class="form-control" placeholder="Masukkan Password baru">
                    <?= form_error('passwordbaru','<div class="text-danger small" ml-3>','</div>')?>
                </div>
                <div class="form-group">
                    <label for="passwordbaru2">Ulangi Password Baru</label>
                    <input type="password" id="passwordbaru2" name="passwordbaru2" class="form-control" placeholder="Masukkan Password baru">
                    <?= form_error('passwordbaru2','<div class="text-danger small" ml-3>','</div>')?>
                </div>
                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                </form>
        </div>
    </div>