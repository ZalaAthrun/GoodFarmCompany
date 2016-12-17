<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrator GFC</title>
    <?php include("component_css_js.php"); ?>
    <?php include("component_css_sidebar_admin.php"); ?>
  </head>
  <body>
    <div class="col-sm-2">
      <?php include("component_sidebar.php"); ?>
    </div>
    <div class="col-sm-10">
      <div class="row" style="margin-top:100px;">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Profil <?php echo $data->nama; ?></h3>
            </div>
            <div class="panel-body">
              <table class="table table-bordered">
                  <tr>
                    <td>ID Member</td>
                    <td><?php echo $data->id_member; ?></td>
                  </tr>
                  <tr>
                    <td>E-mail</td>
                    <td><?php echo $data->email; ?></td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td><?php echo $data->nama; ?></td>
                  </tr>
                  <tr>
                    <td>Nomor Telepon</td>
                    <td><?php echo $data->no_telp; ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td><?php echo $data->alamat; ?></td>
                  </tr>
              </table>
            </div>
            <div class="panel-footer">
            <a style="margin-left:80%;" href="<?php echo base_url()."index.php/member/hapus/".$data->id_member; ?>"><button type="button" class="btn btn-warning">
              Hapus Member Ini
            </button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
