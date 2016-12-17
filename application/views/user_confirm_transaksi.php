<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Konfirmasi Transaksi</title>
    <?php include("component_css_js.php"); ?>
  </head>
  <body>
    <div class="row">
        <?php include("component_navbar.php"); ?>
    </div>
    <div class="row" style="margin-top:100px;">
      <div class="col-sm-8 col-sm-offset-2">
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Detail Paket</h3>
            </div>
            <div class="panel-body">
              <table class="table table-bordered">
                <tr>
                  <td>Tanggal Transaksi</td><td><?php echo $transaksi->tanggal; ?></td>
                </tr>
                <tr>

                </tr>
                <tr>
                  <td>Status</td><td><?php echo $transaksi->status; ?></td>
                </tr>
              </table>
            </div>
            <div class="panel-footer">
            </div>
          </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Detail Paket</h3>
              </div>
              <div class="panel-body">
              <table class="table table-bordered">
              <thead>
                <td>Nama Barang</td><td>Jumlah Barang</td><td>Harga</td>
              </thead>
              <?php if($detail!=null){ foreach ($detail as $dt): ?>
                <tr>
                  <td><?php echo $dt->nama_barang; ?></td>
                  <td><?php echo $dt->jumlah; ?></td><td><?php echo $dt->harga; ?></td>
                </tr>
              <?php endforeach; }?>
              </table>
              </div>
              <div class="panel-footer">
              <span style="margin-left:70%;">Total Harga Paket = <?php echo $total; ?></span>
              </div>
            </div>
            <?php if($transaksi->status=="Belum Dikonfirmasi"){ ?>
            <span style="margin-left:80%;"><a href="<?php echo base_url()."index.php/pemesanan/confirm/".$transaksi->hashkey; ?>"><button type="button" class="btn btn-primary">
              Konfirmasi Transaksi
            </button></a></span>
            <?php } ?>
        </div>
      </div>
    </div>
  </body>
</html>
