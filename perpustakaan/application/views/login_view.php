<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="favicon.ico">
	<link rel="icon" href="icon.ico" type="image/ico">
    <title>Login - Perpustakaan</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url() ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
	
  </head>
 
<body class="hold-transition login-page" style="background:url(assets/img/photo1.jpg)
no-repeat center center fixed; background-size: cover;
 -webkit-background-size: cover; 
 -moz-background-size: cover; -o-background-size: cover;">
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
		  <center><strong><marquee style="font-size:18pt;color:#ffcc00;">MEMBACA ADALAH MEMBUKA JENDELA DUNIA | BUKU YANG BERMANFAAT MERUPAKAN TEMAN YANG SEJATI</h2></marquee></center>
            <form method="post" action="<?php echo base_url() ?>login/dologin">
			<center><img alt="logo" src="assets/logo.png" height="139" width="250"/></center><p>
              <h1>Admin Login</h1>
              <?php
                $announce = $this->session->flashdata('announce');
                if(!empty($announce)){
                  echo '
                    <div class="alert alert-danger">
                    '.$announce.' 
                    </div>
                  ';
                }
              ?>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" />
              </div>
              <div>
                <input type="submit" name="login" class="btn btn-default submit pull-right" value="Login" />
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />
				
		<p><!-- BEGIN: Powered by Ipaddress.is -->
<p><span style="text-align:center; display:
block;"><a href="">
<img src="http://www.wieistmeineip.de/ip-address/?size=468x60" border="0" width="350" height="60" alt="IP" /></a><br /></span></p>
<!-- END: Powered by Ipaddress.is -->
                <div>
                  <h1><i class="fa fa-book"></i>  Perpustakaan</h1>
                  <p>Copyright © <?php echo date('Y') ?> All Rights Reserved. Rehan Software Company. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
