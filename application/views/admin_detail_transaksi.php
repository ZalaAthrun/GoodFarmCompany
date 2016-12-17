<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrator GFC</title>
    <?php include("component_css_js.php"); ?>
    <?php include("component_css_sidebar_admin.php"); ?>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#table').DataTable();
    });
    </script>
  </head>
  <body>
    <div class="col-sm-2">
      <?php include("component_sidebar.php"); ?>
    </div>
    <div class="col-sm-10">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Data Transaksi</h3>
            </div>
            <div class="panel-body">
              <table class="table table-bordered">
                <tr>
                <td>Nomor Transaksi</td><td><?php echo $transaksi->id_transaksi; ?></td>
                </tr>
                <tr>
                <td>Nama Pelanggan</td><td><a href="<?php echo base_url()."index.php/member/lihat_profil/".$transaksi->id_member ;?>"><?php echo $transaksi->nama; ?></a></td>
                </tr>
                <tr>
                <td>Nama Paket (Saat Pembelian)</td><td><?php echo $transaksi->namapkt; ?></td>
                </tr>
                <tr>
                <td>Status</td><td><?php echo $transaksi->status; ?></td>
                </tr>
                <tr>
                <td>Tanggal</td><td><?php echo $transaksi->tanggal; ?></td>
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
                  <h3 class="panel-title">Detail Barang</h3>
                </div>
                <div class="panel-body">
                  <table id="table" class="table table-bordered">
                    <thead>
                      <td>Nama Barang</td>
                      <td>Harga</td>
                      <td>Jumlah</td>
                    </thead>
                    <tbody>
                      <?php if($detail!=null){ foreach ($detail as $dtl): ?>
                        <tr>
                          <td><?php echo $dtl->nama_barang; ?></td><td><?php $dtl->harga; ?></td><td><?php $dtl->jumlah;  ?></td>
                        </tr>
                      <?php endforeach; }?>
                    </tbody>
                  </table>
                </div>
                <div class="panel-footer">
                <span style="margin-left:80%;">Total Harga = <?php echo $transaksi->harga; ?></span>
                </div>
              </div>
                <?php if($transaksi->status=="Menunggu Persetujuan"){ ?>
                <span><a href="<?php echo base_url()."index.php/transaksi/konfirmasi/".$transaksi->id_transaksi; ?>"><button type="button" class="btn btn-primary" style="margin-left:80%;">
                  Terima Pesanan
                </button></a></span>
                <?php } ?>
        </div>
      </div>
    </div>
  </body>
</html>
