<header class="main-header">
    <!-- Logo -->
    <a href="dashboard" class="logo" style="font-family: 'Quicksand', sans-serif">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>CS</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Perpustakaan </b>ESPENERO</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="../../assets/#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a style="cursor: pointer;" class="dropdown-toggle" data-toggle="dropdown" id="badgePesan">
                        <i class="fa fa-envelope-o"></i>
                        <?php
                        include "../../config/koneksi.php";

                        $nama_saya = $_SESSION['fullname'];
                        $default = "Belum dibaca";
                        $query_pesan  = mysqli_query($koneksi, "SELECT * FROM pesan WHERE penerima = '$nama_saya' AND status = '$default'");
                        $jumlah_pesan = mysqli_num_rows($query_pesan);
                        ?>

                        <?php
                        include "../../config/koneksi.php";

                        $nama_saya = $_SESSION['fullname'];
                        $default = "Belum dibaca";
                        $query_pesan  = mysqli_query($koneksi, "SELECT * FROM pesan WHERE penerima = '$nama_saya' AND status = '$default'");
                        $row_pesan = mysqli_fetch_array($query_pesan);

                        if ($jumlah_pesan == null) {
                            // Hilangkan badge pesan
                        } else {
                            echo "<span class='label label-danger'>" . $jumlah_pesan . "</span>";
                        }

                        ?>
                    </a>
                    <ul class="dropdown-menu" id="Pesan">
                        <li class="header">
                            <?php
                            if ($jumlah_pesan == null) {
                                echo "Kamu tidak memiliki pesan baru";
                            } else {
                                echo "Kamu memiliki $jumlah_pesan pesan";
                            }
                            ?>
                        </li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php

                                include "../../config/koneksi.php";

                                $query_pesan1 = mysqli_query($koneksi, "SELECT * FROM pesan WHERE penerima = '$nama_saya' AND status = '$default'");
                                while ($row_pesan1 = mysqli_fetch_assoc($query_pesan1)) {
                                ?>
                                    <li>
                                        <!-- start message -->
                                        <a href="lihat-pesan?id_pesan=<?= $row_pesan1['id_pesan']; ?>">
                                            <div class="pull-left">
                                                <img src="../../assets/dist/img/avatar02.png" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                <?php
                                                include "../../config/koneksi.php";

                                                $nama = $row_pesan1['pengirim'];
                                                $id2 = $_SESSION['id_user'];

                                                $query_cek_verif = mysqli_query($koneksi, "SELECT * FROM user WHERE fullname = '$nama'");
                                                $row_cek = mysqli_fetch_array($query_cek_verif);
                                                ?>

                                                <?php
                                                if ($row_cek['verif'] == "Tidak") {
                                                    echo "$row_pesan1[pengirim]";
                                                } else {
                                                    echo "$row_pesan1[pengirim] " . "<i class='fa fa-check-circle text-info' title='User Terverifikasi' data-toggle='tooltip' data-placement='bottom'></i>";
                                                }
                                                ?>
                                            </h4>
                                            <p><?= $row_pesan1['isi_pesan']; ?></p>
                                        </a>
                                    </li>

                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="footer"><a href="pesan">Lihat semua pesan</a></li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../../assets/dist/img/avatar02.png" class="user-image" alt="User Image">

                        <span class="hidden-xs"><?= $_SESSION['fullname']; ?>
                            <?php include "../../config/koneksi.php";
                            $id = $_SESSION['id_user'];
                            $query_verif = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id'");
                            $row = mysqli_fetch_array($query_verif);

                            if ($row['verif'] == "Iya") {
                                echo "<i class='fa fa-check-circle' title='Akun Terverifikasi' data-toggle='tooltip' data-placement='bottom'></i>";
                            } else {
                                //
                            }
                            ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="../../assets/dist/img/avatar02.png" class="img-circle" alt="User Image">

                            <p>
                                <?= $_SESSION['fullname']; ?>
                                <!-- -->
                                <?php
                                include "../../config/koneksi.php";

                                $id = $_SESSION['id_user'];
                                $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id'");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <small>Tanggal Bergabung : <?= $row['join_date']; ?></small>
                                    <small>Terakhir Login : <?= $row['terakhir_login']; ?></small>
                                <?php
                                }
                                ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#Logout" data-toggle="modal" data-target="#modalLogoutConfirm" class="btn btn-default btn-flat">Keluar</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<script>
    var refreshId = setInterval(function() {
        $('#badgePesan').load('./pages/function/Pesan.php?aksi=badgePesan');
    }, 500);
</script>
<script>
    var refreshId = setInterval(function() {
        $('#Pesan').load('./pages/function/Pesan.php?aksi=Pesan');
    }, 500);
</script>