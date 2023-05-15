<?php

session_start();
if ($_SESSION['level'] != "Anggota") {
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
    $row1 = mysqli_fetch_assoc($sql);
    ?>
    <title>Dashboard | <?= $row1['nama_app']; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../assets/bower_components/Ionicons/css/ionicons.min.css">
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

</head>

<body class="hold-transition skin-black sidebar-mini" style="font-family: 'Quicksand', sans-serif">

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
</body>

</html>