<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Profil</title>
    <?php include("component_css_js.php"); ?>
  </head>
  <body>
    <div class="row">
      <?php include("component_navbar.php"); ?>
    </div>
    <div class="row" style="margin-top:120px;">
      <div class="col-sm-8 col-sm-offset-2">
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Edit Profil Anda</h3>
            </div>
            <div class="panel-body">
              <form class="" action="<?php echo base_url()."index.php/akun/simpan_perubahan"; ?>" method="post">
                <table class ="table table-bordered">
                  <tr><td>Nama</td><td><input class ="form-control"type="text" name="nama" value="<?php echo $member->nama; ?>"></td></tr>
                  <tr><td>Alamat</td><td><input class ="form-control" type="text" name="alamat" value="<?php echo $member->alamat; ?>"></td></tr>
                  <tr><td>Nomor Telepon</td><td><input class ="form-control" type="text" name="no_telp" value="<?php echo $member->no_telp; ?>"></td></tr>
                </table>
            </div>
            <div class="panel-footer">
            <span style="margin-left:80%;"><input class="btn btn-primary" type="submit" name="submit" value="Simpan"></span>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
