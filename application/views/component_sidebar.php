<div class="navbar navbar-fixed-left">
    <div class="row" style="height:100%">
        <div class="col-md-12" style="height:100%">
            <div id="sidebar" class="well sidebar-nav" style="height:100%">
                <img src="<?php echo base_url();?>assets/img/gfc.png" alt="" style="margin-bottom:30px;">
                <h4><i class="glyphicon glyphicon-user"></i>
                    <small><b>Pengguna</b></small>
                </h4>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="<?php echo base_url()."index.php/member" ;?>">List</a></li>
                </ul>
                <h4><i class="glyphicon glyphicon-screenshot"></i>
                    <small><b>Paket</b></small>
                </h4>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="<?php echo base_url()."index.php/paket/tambah_paket";?>">Tambah Paket</a></li>
                    <li><a href="<?php echo base_url()."index.php/paket" ;?>">Manage Paket</a></li>
                </ul>
                <h4><i class="glyphicon glyphicon-envelope"></i>
                    <small><b>Transaksi</b></small>
                </h4>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="<?php echo base_url()."index.php/transaksi/transaksi_masuk";?>">Transaksi Masuk</a></li>
                    <li><a href="<?php echo base_url()."index.php/transaksi" ;?>">Semua Transaksi</a></li>
                </ul>
                <a href="<?php echo base_url()."index.php/admin/do_logout" ;?>"><h4><i class="glyphicon glyphicon-log-out"></i>
                    <small><b>Logout</b></small>
                </h4></a>
            </div>
        </div>
    </div>
</div>
