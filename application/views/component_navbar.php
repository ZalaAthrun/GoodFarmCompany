<div class="navbar_default">
  <div class="row">
    <div class="col-sm-12">
      <nav class = "navbar navbar-fixed-top navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url() ?>">GoodFarmCompany</a>
          </div>
          <?php if(($this->session->userdata('Account')==null) || $this->session->userdata('Account')->account_level!=0){ ?>
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li><a href="<?php echo base_url()."index.php/pemesanan";?>">Pemesanan</a></li>
            <li><a href="<?php echo base_url()."index.php/home/tentang";?>">Tentang Kami</a></li>
          </ul>
          <?php }else{
            ?>
            <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li><a href="#">Edit Pemesanan</a></li>
            <li><a href="#">Edit Tentang Kami</a></li>
          </ul>
            <?php } ?>
          <ul class="nav navbar-nav navbar-right">
            <?php if(($this->session->userdata('id_member')==null)){
               ?>
            <li><a href="<?php echo base_url() ?>index.php/akun/register"><span class="glyphicon glyphicon-user"></span>Buat Akun</a></li>
            <li><a href="<?php echo base_url() ?>index.php/akun/login"><span class="glyphicon glyphicon-log-in"></span>Masuk</a></li>
            <?php }else if($this->session->userdata('id_member')!=null){
            ?>
            <li><a href="<?php echo base_url() ?>index.php/akun"><span class="glyphicon glyphicon-user"></span>Profil</a></li>
            <li><a href="<?php echo base_url() ?>index.php/akun/do_logout"><span class="glyphicon glyphicon-minus"></span>Logout</a></li>
          <?php  } ?>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</div>

<style media="screen">
.navbar {
  margin-bottom: 0;
  background-color: #33d653;
  z-index: 9999;
  border: 0;
  font-size: 12px !important;
  line-height: 1.42857143 !important;
  letter-spacing: 4px;
  border-radius: 0;
  padding-top: 0px;
  padding-left: 25px;
}

.navbar li a, .navbar .navbar-brand {
  color: #fff !important;
}

.navbar-nav li a:hover, .navbar-nav li.active a {
  color: #33d653 !important;
  background-color: #fff !important;
}

.navbar-default .navbar-toggle {
  border-color: transparent;
  color: #fff !important;
}
</style>
