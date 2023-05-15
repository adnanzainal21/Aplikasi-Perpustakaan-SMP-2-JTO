<?php
function GetBadgePemberitahuan()
{
    echo '<i class="fa fa-bell-o"></i>';
    include "../../../../config/koneksi.php";

    $id = $_SESSION['id_user'];
    $level_user = $_SESSION['level'];
    $default = "Belum dibaca";
    $query_notif2 = mysqli_query($koneksi, "SELECT * FROM pemberitahuan WHERE level_user = '$level_user' AND status = '$default'");
    $jumlah_notif = mysqli_num_rows($query_notif2);

    //
    $id = $_SESSION['id_user'];
    $level_user = $_SESSION['level'];
    $default = "Belum dibaca";
    $query_notif1 = mysqli_query($koneksi, "SELECT * FROM pemberitahuan WHERE level_user = '$level_user' AND status = '$default'");
    $row_notif = mysqli_fetch_array($query_notif1);

    if ($jumlah_notif == null) {
        // Hilangkan badge notif
    } else {
        echo "<span class='label label-danger'>" . $jumlah_notif . "</span>";
    }
}

function GetHeaderPemberitahuan()
{
    echo "<li class='header'>";
    include "../../../../config/koneksi.php";

    $id = $_SESSION['id_user'];
    $level_user = $_SESSION['level'];
    $default = "Belum dibaca";
    $query_notif2 = mysqli_query($koneksi, "SELECT * FROM pemberitahuan WHERE level_user = '$level_user' AND status = '$default'");
    $jumlah_notif = mysqli_num_rows($query_notif2);

    if ($jumlah_notif == null) {
        echo "Kamu tidak memiliki pemberitahuan";
    } else {
        echo "Kamu memiliki $jumlah_notif pemberitahuan";
    }
    echo "</li>";
}

function GetIsiPemberitahuan()
{
    include "../../../../config/koneksi.php";
    $level_user = $_SESSION['level'];
    $default = "Belum dibaca";
    $query_isi_notif = mysqli_query($koneksi, "SELECT * FROM pemberitahuan WHERE level_user = '$level_user' AND status = '$default'");
    while ($row_isi_notif = mysqli_fetch_assoc($query_isi_notif)) {

        echo "<li>";
        echo "<a href='pages/function/Pemberitahuan.php?aksi=edit&id_pemberitahuan=" . $row_isi_notif['id_pemberitahuan'] . "'>" . $row_isi_notif['isi_pemberitahuan'] . "";
        echo "</li>";
    }
}
