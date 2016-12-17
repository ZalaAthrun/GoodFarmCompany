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
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1" style="height:80%; overflow-y:scroll; overflow-x:hidden;">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Daftar Transaksi GoodFarmCompany</h3>
              </div>
              <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                      <td>ID Transaksi</td>
                      <td>Nama Member</td>
                      <td>Nama Paket Saat Pembelian</td>
                      <td>Status</td>
                      <td>URL MOU</td>
                      <td>Total Harga</td>
                      <td>Aksi</td>
                    </thead>
                    <tbody>
                      <?php if($data!=null){ foreach ($data as $trx): ?>
                          <tr>
                            <td><?php echo $trx->id_transaksi ;?></td>
                            <td><?php echo $trx->nama ;?></td>
                            <td><?php echo $trx->namapkt ;?></td>
                            <td><?php echo $trx->status ;?></td>
                            <td><?php echo $trx->url_mou ;?></td>
                            <td><?php echo $trx->harga;?></td>
                            <td><a href="<?php echo base_url()."index.php/transaksi/detail/".$trx->id_transaksi; ?>"><button type="button" class="btn btn-primary">
                              Detail Transaksi
                            </button></a></td>
                          </tr>
                      <?php endforeach; }?>
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
