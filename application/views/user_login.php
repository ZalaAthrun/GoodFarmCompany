<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <?php include("component_css_js.php"); ?>
    <style media="screen">
    .card-container.card {
      max-width: 350px;
      padding: 40px 40px;
    }
    .btn {
      font-weight: 700;
      height: 36px;
      -moz-user-select: none;
      -webkit-user-select: none;
      user-select: none;
      cursor: default;
    }
    /*
    * Card component
    */
    .card {
      background-color: #F7F7F7;
      /* just in case there no content*/
      padding: 20px 25px 30px;
      margin: 0 auto 25px;
      margin-top: 100px;
      /* shadows and rounded borders */
      -moz-border-radius: 2px;
      -webkit-border-radius: 2px;
      border-radius: 2px;
      -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    }
    .profile-img-card {
      width: 96px;
      height: 96px;
      margin: 0 auto 10px;
      display: block;
      -moz-border-radius: 50%;
      -webkit-border-radius: 50%;
      border-radius: 50%;
    }
    /*
    * Form styles
    */
    .profile-name-card {
      font-size: 16px;
      font-weight: bold;
      text-align: center;
      margin: 10px 0 0;
      min-height: 1em;
    }
    .reauth-email {
      display: block;
      color: #404040;
      line-height: 2;
      margin-bottom: 10px;
      font-size: 14px;
      text-align: center;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }
    .form-signin #inputEmail,
    .form-signin #inputPassword {
      direction: ltr;
      height: 44px;
      font-size: 16px;
    }
    .form-signin input[type=email],
    .form-signin input[type=password],
    .form-signin input[type=text],
    .form-signin button {
      width: 100%;
      display: block;
      margin-bottom: 10px;
      z-index: 1;
      position: relative;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }
    .form-signin .form-control:focus {
      border-color: rgb(104, 145, 162);
      outline: 0;
      -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
      box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    }
    .btn.btn-signin {
      /*background-color: #4d90fe; */
      background-color: rgb(104, 145, 162);
      /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
      padding: 0px;
      font-weight: 700;
      font-size: 14px;
      height: 36px;
      -moz-border-radius: 3px;
      -webkit-border-radius: 3px;
      border-radius: 3px;
      border: none;
      -o-transition: all 0.218s;
      -moz-transition: all 0.218s;
      -webkit-transition: all 0.218s;
      transition: all 0.218s;
    }
    .btn.btn-signin:hover,
    .btn.btn-signin:active,
    .btn.btn-signin:focus {
      background-color: rgb(12, 97, 33);
    }

    .forgot-password {
      color: rgb(104, 145, 162);
    }

    .forgot-password:hover,
    .forgot-password:active,
    .forgot-password:focus{
      color: rgb(12, 97, 33);
    }
    </style>
    <script type="text/javascript">
        function hide_conf(){
        document.getElementById('conf_box').className ="modal hide";
    }
    </script>
  </head>
  <body>
    <div class="row">
      <?php include("component_navbar.php"); ?>
    </div>
    <div class="row">
      <div id="conf_box" class="modal <?php if($state==true) echo "show"; else echo "hide"; ?>" role="dialog " style="margin-top:100px;">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onClick="hide_conf()">&times;</button>
                <h4 class="modal-title">Login Gagal</h4>
              </div>
              <div class="modal-body">
                <p>Silahkan cek kembali username dan password anda.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onClick="hide_conf()">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="card card-container">
              <h4 class="header_default header text-center">Masuk ke Administrasi GoodFarmCompany</h4>
                <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin" action="<?php echo base_url()."index.php/akun/do_login" ;?> " method="post">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Alamat Email" required autofocus>
                    <input name="password"type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
                </form>
            </div>
       </div>
    </div>
  </body>
</html>
