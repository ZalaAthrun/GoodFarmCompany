<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include("component_css_js.php"); ?>
    <script type="text/javascript">
      function do_register(){
          document.getElementById('registrasi').submit();
      }
    </script>
  </head>
  <body>
    <div class="row">
      <?php include("component_navbar.php"); ?>
    </div>
    <div class="row" style="margin-top:100px;">
    <div class="row" >
    <div id="conf_box" class="modal fade" role="dialog " style="margin-top:100px;">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Konfirmasi Pendaftaran</h4>
            </div>
            <div class="modal-body">
              <p>Silahkan cek kembali data diri anda dan lakukan submit.</p>
            </div>
            <div class="modal-footer">
              <button type="button" name="button" class="btn btn-primary" onClick="do_register()">Submit</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="container">
      <form id="registrasi" class="form-horizontal" method="post" action="<?php echo base_url()."index.php/akun/do_register"; ?>">
    <fieldset>
    <legend>Bergabung dengan GoodFarmCompany</legend>
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Email</label>
      <div class="col-md-4">
      <input name="email" class="form-control input-md" id="textinput" type="email" placeholder="" required>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Password</label>
      <div class="col-md-4">
      <input name="password" class="form-control input-md" id="textinput" type="password" placeholder="" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nama Lengkap</label>
      <div class="col-md-4">
      <input name="nama" class="form-control input-md" id="textinput" type="text" placeholder="" required>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nomor Telepon</label>
      <div class="col-md-4">
      <input name="no_telp" class="form-control input-md" id="textinput" type="text" placeholder="" required>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Alamat</label>
      <div class="col-md-4">
      <textarea class="form-control input-md" rows="3" id="textinput" name="alamat" required></textarea >
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-4 col-md-offset-8">
        <input data-toggle="modal" data-target="#conf_box" class="btn btn-primary" type="button" name="name" value="Daftar" style="weight:200px;" onClick="">
      </div>
    </div>

    </fieldset>
    </form>

    </div>
    </div>

    </div>
  </body>
</html>
