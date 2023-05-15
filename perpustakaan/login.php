<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
    include "config/koneksi.php";

    $sql = mysqli_query($koneksi, "SELECT * FROM identitas");
    $row1 = mysqli_fetch_assoc($sql);
    ?>
    <title>Masuk | <?= $row1['nama_app']; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
    <!-- Icon -->
    <link rel="icon" type="icon" href="assets/dist/img/icon-app.png">
    <!-- Custom -->
    <link rel="stylesheet" href="assets/dist/css/custom.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="assets/dist/css/toastr.min.css">
</head>

<body class="hold-transition login-page" style="font-family: 'Quicksand', sans-serif;">
    <div class="login-box">
        <div class="login-logo">
            <a href="masuk"><b>PERPUSTAKAAN <br>ESPENERO</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body" style="border-radius: 10px;">
            <img src="assets/dist/img/espenero.png"  style="display: block; margin-left: auto; margin-right: auto; margin-top: -12px; margin-bottom: 5px;">
            <form name="formLogin" action="function/Process.php?aksi=masuk" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Nama Pengguna">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p style="font-size: 11px;">- ATAU -</p>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="button" onclick="Register()" class="btn btn-block btn-warning btn-flat"><i class="fa fa-user-plus"></i> Daftar sebagai member</button>
                    </div>
                </div>
            </div>

            <!-- <p style="text-align: center; font-size: 13px;">Hak Cipta &copy; <?= date('Y'); ?> .<?= $row1['nama_app']; ?> by FA Team.</p> -->
            <!-- <br><center><p>Repost by Abid Taufiqur Rohman</p></center> -->
            

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- -->
    <script src="assets/json/lottie-player.js"></script>
    <!-- Fungsi mengarahkan kehalaman pendaftaran -->
    <script>
        function Register() {
            window.location.href = "pendaftaran";
        }
    </script>
    <!-- Fungsi mengarahkan kehalaman lupa password -->
    <script>
        function ForgotPassword() {
            window.location.href = "lupa-password";
        }
    </script>
    <!-- Sweet Alert -->
    <script src="assets/dist/js/sweetalert.min.js"></script>
    <!-- Pesan Masuk Dulu -->
    <script>
        <?php
        if (isset($_SESSION['masuk_dulu']) && $_SESSION['masuk_dulu'] <> '') {
            echo "swal({
                icon: 'error',
                title: 'Peringatan',
                text: '$_SESSION[masuk_dulu]',
                buttons: false,
                timer: 3000
              })";
        }
        $_SESSION['masuk_dulu'] = '';
        ?>
    </script>
    <!-- Pesan Pendaftaran -->
    <script>
        <?php
        if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] <> '') {
            echo "swal({
                icon: 'success',
                title: 'Berhasil',
                text: '$_SESSION[berhasil]',
                buttons: false,
                timer: 3000
              })";
        }
        $_SESSION['berhasil'] = '';
        ?>
    </script>
    <script>
        <?php
        if (isset($_SESSION['gagal']) && $_SESSION['gagal'] <> '') {
            echo "swal({
                icon: 'error',
                title: 'Peringatan',
                text: '$_SESSION[gagal]',
                buttons: false,
                timer: 3000
              })";
        }
        $_SESSION['gagal'] = '';
        ?>
    </script>
    <!-- -->
    <script>
        <?php
        if (isset($_SESSION['gagal_login']) && $_SESSION['gagal_login'] <> '') {
            echo "swal({
                icon: 'error',
                title: 'Peringatan',
                text: '$_SESSION[gagal_login]',
                buttons: false,
                timer: 3000
              })";
        }
        $_SESSION['gagal_login'] = '';
        ?>
    </script>
    <script>
        <?php
        if (isset($_SESSION['berhasil_keluar']) && $_SESSION['berhasil_keluar'] <> '') {
            echo "swal({
            icon: 'success',
            title: 'Berhasil',
            text: '$_SESSION[berhasil_keluar]',
            buttons: false,
            timer: 3000
        })";
        }
        $_SESSION['berhasil_keluar'] = '';
        ?>
    </script>
    <!-- Toastr -->
    <script src="assets/dist/js/toastr.min.js"></script>
    <!-- -->
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    <!-- -->
    <script>
        function validateForm() {
            if (document.forms["formLogin"]["username"].value == "") {
                toastr.error("Nama Pengguna harus diisi !!");
                document.forms["formLogin"]["username"].focus();
                return false;
            }
            if (document.forms["formLogin"]["password"].value == "") {
                toastr.error("Kata Sandi harus diisi !!");
                document.forms["formLogin"]["password"].focus();
                return false;
            }
        }
    </script>
</body>

</html>