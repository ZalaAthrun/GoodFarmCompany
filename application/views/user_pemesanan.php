<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pemesanan Paket</title>
    <?php include ("component_css_js.php"); ?>
    <style media="screen">
    .container-fluid {
        padding: 0px 100px;
    }
    .panel {
      border: 1px solid #33d653;
      border-radius:0;
      transition: box-shadow 0.5s;
    }

    .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
    }

    .panel-footer .btn:hover {
      border: 1px solid #33d653;
      background-color: #fff !important;
      color: #f4511e;
    }

    .panel-heading {
      color: #fff !important;
      background-color: #33d653 !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
    }

    .panel-footer {
      background-color: #fff !important;
    }

    .panel-footer h3 {
      font-size: 32px;
    }

    .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
    }

    .panel-footer .btn {
      margin: 15px 0;
      background-color: #33d653;
      color: #fff;
    }
    </style>
  </head>
  <body>
    <div class="row">
    <?php include("component_navbar.php"); ?>
    </div>
    <div class="row" style="margin-top:100px;">
      <div class="col-sm-8 col-sm-offset-2">
        <?php
        if($paket!=null){
          $counter = 1;
          foreach($paket as $data){
            if($counter%3==0){
            echo "<div class=\"row\">";
            }
              echo"
              <div class=\"col-sm-4\">
                <div class=\"panel panel-default text-center\">
                  <div class=\"panel-heading\">
                    <h1>$data->nama</h1>
                  </div>
                  <div class=\"panel-body\" style=\"height:150px;\">";
                if($barang!=null){
                  foreach($barang as $value){
                    if($data->id_paket == $value->id_paket){
                      echo "<p><strong>$value->jumlah</strong>$value->nama_barang</p>";
                    }
                  }
                }
                echo "
                  </div>
                  <div class=\"panel-footer\">
                    <h3>$data->harga</h3>
                    <h4>Pertahun</h4>
                    <a href=\"";echo base_url()."index.php/pemesanan/paket/".$data->id_paket."\"><button class=\"btn btn-lg\">Pilih</button></a>
                  </div>
                </div>
              </div>
              ";
              if($counter%3==0){
              echo "    </div>";
              }
            $counter++;
          }
          }else{
              echo "Belum ada paket dijual";
          }
        ?>
      </div>
    </div>
  </body>
</html>
