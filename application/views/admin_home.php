<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrator GFC</title>
    <?php include("component_css_js.php"); ?>
    <?php include("component_css_sidebar_admin.php"); ?>
    <style media="screen">
      #notifcard{=
          padding : 20px;
          height: 160px;
          background-color: rgba(46, 46, 31, 0.5);
      }
    </style>
  </head>
  <body>
    <div class="col-sm-2">
      <?php include("component_sidebar.php"); ?>
    </div>
    <div class="col-sm-10">
      <div class="row" style="margin-top:30px;">
        <div class="col-sm-3 col-sm-offset-1" id="notifcard">
          <div class="card">
            <div class="card-block">
              <div class="col-sm-6" style="">
                <h1 class="text-center"><?php echo $unconfirmed; ?></h1>
              </div>
              <div class="col-sm-6">
                <h4 class="card-title">Transaksi Belum Dikonfirmasi</h4>
                <a href="#" class="btn btn-primary">Konfirmasi</a>
              </div>
              </div>
          </div>
        </div>
        <div class="col-sm-3 col-sm-offset-0" id="notifcard">
          <div class="card">
            <div class="card-block">
              <div class="col-sm-6" style="">
                <h1 class="text-center"><?php echo $confirmed; ?></h1>
              </div>
              <div class="col-sm-6">
                <h4 class="card-title">Transaksi Berjalan</h4>
                <a href="#" class="btn btn-primary">Konfirmasi</a>
              </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
