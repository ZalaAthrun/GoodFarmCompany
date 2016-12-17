<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrator GFC - Edit Paket</title>
    <?php include("component_css_js.php"); ?>
    <?php include("component_css_sidebar_admin.php"); ?>
  </head>
  <body>
    <div class="col-sm-2">
      <?php include("component_sidebar.php"); ?>
    </div>
    <div class="col-sm-10" style="margin-top:0px;">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Detail Paket</h3>
            </div>
            <div class="panel-body">
            <form class="" action="<?php echo base_url()."index.php/paket/update_paket"?>" method="post">
              <table class = "table table-bordered">
                <input type="text" name="id_paket" value="<?php echo $data->id_paket ;?>" style="display:none;">
                <tr>
                  <td>Nama Paket</td>
                  <td><input type="text" name="nama" value="<?php echo $data->nama ;?>" class="form-control"></td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td><input type="text" name="keterangan" value="<?php echo $data->keterangan; ?>" class="form-control"></td>
                </tr>
                <tr>
                  <td>Stok</td>
                  <td><input type="text" name="stok" value="<?php echo $data->stok; ?>" class="form-control"></td>
                </tr>
                <tr>
                  <td>Harga Paket</td>
                  <td><?php echo $data->harga; ?></td>
                </tr>
              </table>
              <input type="submit" name="submit" value="Simpan" class="btn btn-success" style="margin-left:80%;">
            </form>
            </div>
            <div class="panel-footer">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Tambah Barang</h3>
            </div>
            <div class="panel-body">
              <form class="" action="<?php echo base_url()."index.php/paket/tambah_barang"?>" method="post">
                <input type="text" name="id_paket" value="<?php echo $data->id_paket; ?>" style="display:none;">
                <div class="col-sm-2">
                  <input type="text" name="nama" value="" placeholder="nama_barang" class="form-control">
                </div>
                <div class="col-sm-2">
                  <input type="text" name="harga" value="" placeholder="harga" class="form-control">
                </div>
                <div class="col-sm-2">
                  <input type="text" name="jumlah" value="" placeholder="jumlah per paket" class="form-control">
                </div>
                <div class="col-sm-2">
                  <input type="text" name="stok" value="" placeholder="stok" class="form-control">
                </div>
                <div class="col-sm-2">
                  <input type="text" name="keterangan" value="" placeholder="keterangan" class="form-control">
                </div>
                <div class="col-sm-2">
                  <input type="submit" name="submit" value="Tambah"class="btn btn-success">
                </div>
              </form>
            </div>
            <div class="panel-footer">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-10 col-sm-offset-1" style="height:200px; overflow-y:scroll; overflow-x:hidden;">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Detail Barang</h3>
            </div>
            <div class="panel-body">
                <table class ="table table-bordered">
                  <thead>
                    <td>Nama Barang</td>
                    <td>Jumlah Per Paket</td>
                    <td>Keterangan</td>
                    <td>Aksi</td>
                  </thead>
                  <tbody>
                    <?php if($detail!=null){ foreach ($detail as $detail_paket): ?>
                      <tr>
                      <td><?php echo $detail_paket->nama_barang; ?></td>
                      <td><?php echo $detail_paket->jumlah; ?></td>
                      <td><?php echo $detail_paket->keterangan; ?></td>
                      <td><a href="<?php echo base_url()."index.php/paket/hapus_barang/".$detail_paket->id_barang."/".$detail_paket->id_paket ?>"><button type="button" class="btn btn-warning">
                        Hapus
                      </button></a></td>
                    </tr>
                    <?php endforeach; } ?>
                  </tbody>
                </table>
            </div>
            <div class="panel-footer">
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
