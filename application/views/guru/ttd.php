<title><?= $title ?></title>

<div class="container-fluid">
  <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
            Input Tanda Tangan
    </div>
    <?= $this->session->flashdata('pesan') ?>
      <div class="boxarea" style="margin:-100px">
        <div class="signature-pad" id="signature-pad">
          <div class="m-signature-pad">
            <div class="m-signature-pad-body">
              <canvas width="360" height="250"></canvas>
            </div>
          </div>
          <div class="m-signature-pad-footer">
            <button type="button"  id="save2" data-action="save" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            <button type="button" data-action="clear"  class="btn btn-danger"><i class="fa fa-trash"></i> Bersihkan</button>
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>

  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><strong>PERINGATAN!</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger">
          Tanda Tangan Belum Diisi!
        </div>
      </div>
      <div class="modal-footer">
        <form id="formdelete" action="" method="post">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-caret-square-left"></i> Kembali</button>
        </form>
      </div>
    </div>
  </div>
</div>

 <!-- Modal -->
 <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><strong>PERINGATAN!</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-success">
          <i class="fa fa-check"></i> Tanda Tangan Berhasil Di Simpan
        </div>
      </div>
      <div class="modal-footer">
        <form id="formdelete" action="" method="post">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-caret-square-left"></i> Kembali</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <script>

    var wrapper = document.getElementById("signature-pad"),
    clearButton = wrapper.querySelector("[data-action=clear]"),
    saveButton = wrapper.querySelector("[data-action=save]"),
    canvas = wrapper.querySelector("canvas"),
    signaturePad;


    function resizeCanvas() {

      var ratio =  window.devicePixelRatio || 1;
      canvas.width = canvas.offsetWidth * ratio;
      canvas.height = canvas.offsetHeight * ratio;
      canvas.getContext("2d").scale(ratio, ratio);
    }
    signaturePad = new SignaturePad(canvas);

    clearButton.addEventListener("click", function (event) {
      signaturePad.clear();
    });
    saveButton.addEventListener("click", function (event) {

      if (signaturePad.isEmpty()) {
        $('#myModal').modal('show');
      }

      else {
        $('#myModal1').modal('show');
        $.ajax({
          type: "POST",
          url: "<?= base_url();?>guru/ttd/insert_single_signature",
          data: {'image': signaturePad.toDataURL()},
          success: function(datas1)
          {
            signaturePad.clear();
          }
        });
      }
    });

  </script>
    <style type="text/css">
  .m-signature-pad-body
  {
    border: 1px dashed #000;
    border-radius: 5px;
    width: 30%;
    margin-left: 100px;
    margin-top: 120px;
    background: white;
  }
  .m-signature-pad-footer
  {
    margin-top: 10px;
    margin-left: 170px;
  }
</style>
