<?php

session_start();
if ($_SESSION['level'] != "Admin") {
    $_SESSION['masuk_dulu'] = "Silahkan masuk terlebih dahulu !!";
    header("location: ../../masuk");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
    include "../../config/koneksi.php";

    $sql = mysqli_query($koneksi, "SELECT * FROM identitas");
    $row = mysqli_fetch_assoc($sql);
    ?>
    <title>Dashboard Admin | <?= $row['nama_app']; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../assets/dist/css/skins/_all-skins.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- -->
    <link rel="stylesheet" href="../../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Icon -->
    <link rel="icon" type="icon" href="../../assets/dist/img/icon-app.png">
    <!-- Custom -->
    <link rel="stylesheet" href="../../assets/dist/css/custom.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../../assets/dist/css/toastr.min.css">
    <!-- -->
    <style>
        .theme-loader {
            height: 100%;
            width: 100%;
            background-color: #fff;
            position: fixed;
            z-index: 999999;
            top: 0;
        }

        .theme-loader .ball-scale {
            left: 50%;
            top: 50%;
            position: absolute;
            height: 50px;
            width: 50px;
            margin: -25px 0 0 -25px;
        }

        .theme-loader .ball-scale .contain {
            height: 100%;
            width: 100%;
        }

        .theme-loader .ball-scale .contain .ring {
            display: none;
        }

        .theme-loader .ball-scale .contain .ring:first-child {
            display: block;
            height: 100%;
            width: 100%;
            border-radius: 50%;
            padding: 10px;
            border: 3px solid transparent;
            border-left-color: #2b99f2;
            border-right-color: #2b99f2;
            -webkit-animation: round-rotate 1.5s ease-in-out infinite;
            animation: round-rotate 1.5s ease-in-out infinite;
        }

        .theme-loader .ball-scale .contain .ring:first-child .frame {
            height: 100%;
            width: 100%;
            border-radius: 50%;
            border: 3px solid transparent;
            border-left-color: #65a6db;
            border-right-color: #65a6db;
            -webkit-animation: round-rotate 1.5s ease-in-out infinite;
            animation: round-rotate 1.5s ease-in-out infinite;
        }

        @-webkit-keyframes round-rotate {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes round-rotate {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>

</head>

<body class="hold-transition skin-blue sidebar-mini" style="font-family: 'Quicksand', sans-serif">

    <!-- Pre-loader start -->

    <!-- Pre-loader end -->
    <div class="wrapper">

        <?php include "pages/navbar.php"; ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php include "pages/sidebar.php"; ?>

        <?php include "pages/content.php"; ?>
        <!-- /.content-wrapper -->
        <?php include "pages/footer.php"; ?>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../assets/dist/js/adminlte.min.js"></script>
    <!-- Toastr -->
    <script src="../../assets/dist/js/toastr.min.js"></script>
    <!-- Lottie -->
    <script src="../../assets/json/lottie-player.js"></script>
    <!-- -->
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.theme-loader').fadeOut('slow', function() {
                    $(this).remove();
                });
            }, 1500);
        });
    </script>
    <!-- -->
    <script src="../../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
            $('#example2').DataTable();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var url = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
            $('.treeview-menu li').removeClass('active');
            $('[href$="' + url + '"]').parent().addClass("active");
            $('.treeview').removeClass('menu-open active');
            $('[href$="' + url + '"]').closest('li.treeview').addClass("menu-open active");
        });
    </script>
    <script src="../../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function() {
            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            })
            $('#datepicker1').datepicker({
                autoclose: true
            })
        })
    </script>
</body>

</html>