<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <?php include("component_css_js.php"); ?>
  </head>
  <body>
      <div class="row">
        <?php include("component_navbar.php"); ?>
      </div>
      <div class="row" style="margin-top:100px;">
        <div class="col-sm-10 col-sm-offset-2">
          <div class="row">
            <div class="col-sm-2 col-sm-offset-1">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Foto</h3>
              </div>
              <div class="panel-body">
                Foto Anda Disini
              </div>
              <div class="panel-footer">
              </div>
            </div>
            </div>
            <div class="col-sm-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Profil Anda</h3>
                </div>
                <div class="panel-body">
                  <table class="table table-bordered">
                    <tr><td>E-mail</td><td><?php echo $data->email; ?></td></tr>
                    <tr><td>Nama</td><td><?php echo $data->nama; ?></td></tr>
                    <tr><td>Alamat</td><td><?php echo $data->alamat; ?></td></tr>
                    <tr><td>Nomor Telepon</td><td><?php echo $data->no_telp ?></td></tr>
                  </table>
                </div>
                <div class="panel-footer">
                <span style="margin-left:80%;"><a href="<?php echo base_url()."index.php/akun/edit/" ; ?>"><button type="button" class="btn btn-primary">
                    Edit
                </button></a></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8 col-sm-offset-1">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Transaksi Anda</h3>
                </div>
                <div class="panel-body">
                  <table class="table table-bordered">
                    <thead>
                      <td>Tanggal Transaksi</td>
                      <td>Nama Paket</td>
                      <td>Status</td>
                      <td>Keterangan</td>
                      <td>File MOU</td>
                    </thead>
                    <tbody>
                      <?php if($data2!=null) { foreach ($data2 as $transaksi): ?>
                          <tr>
                          <td><?php echo $transaksi->tanggal; ?></td>
                          <td><?php echo $transaksi->namapkt; ?></td>
                          <td><?php echo $transaksi->status; ?></td>
                          <td><?php echo $transaksi->keterangan; ?></td>
                          <td><?php echo $transaksi->url_mou; ?></td>
                          <td><a href="<?php echo base_url()."index.php/pemesanan/detail/".$transaksi->hashkey;?>"><button type="button" class="btn btn-sucess">
                            Detail
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
      </div>
  </body>
</html>
