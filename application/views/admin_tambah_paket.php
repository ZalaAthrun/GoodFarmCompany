<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrator GFC - Paket </title>
    <?php include("component_css_js.php"); ?>
    <?php include("component_css_sidebar_admin.php"); ?>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#paket-table').DataTable();
    });
    </script>
  </head>
  <body>
    <div class="col-sm-2">
      <?php include("component_sidebar.php"); ?>
    </div>
    <div class="col-sm-8 col-sm-offset-1" style="margin-top:10%;">
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Tambah Paket Baru</h3>
        </div>
        <div class="panel-body">
          <form class="" action="<?php echo base_url()."index.php/paket/do_tambah_paket" ?>" method="post">
            <table class="table table-bordered">
              <tr>
                <td>Nama Paket</td>
                <td><input type="text" name="nama" value="" class="form-control"></td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" value="" class="form-control"></td>
              </tr>
            </table>
            <input type="submit" name="submit" value="Selanjutnya" class="btn btn-success" style="margin-left:80%;">
          </form>
        </div>
        <div class="panel-footer">
        </div>
      </div>
    </div>
    </div>
  </body>
</html>
