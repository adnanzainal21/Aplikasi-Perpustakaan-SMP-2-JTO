<?php
include "../../../../config/koneksi.php";

if ($_GET['aksi'] == "tgl_pinjam") {

    $tgl_pinjam = $_POST['tgl_pinjam'];

    echo "<html>";
    echo "<head>";
    echo "<title>Laporan Perpustakaan - Tanggal Peminjaman</title>";
    echo "<link rel='stylesheet' href='../../../../assets/dist/css/custom.css'>";
    echo "<link rel='stylesheet' href='../../../../assets/bower_components/bootstrap/dist/css/bootstrap.min.css'>";
    echo "<link rel='stylesheet' href='../../../../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'>";
    echo "<link rel='icon' type='icon' href='../../../../assets/dist/img/logo_app.png'>";
    echo "</head>";
    echo "<body onload='window.print()' style='font-family: Quicksand, sans-serif'>";
    echo "<img src='../../../../assets/dist/img/logo_app.png' style='height: 90px; width: 90px; margin-top: 10px; margin-left: 10px; margin-bottom: -50px;'>";
    echo "<img src='../../../../assets/dist/img/LOGO-PERPUSNAS.png' style='display: block; margin-left: auto; width: 90px; margin-bottom: -70px; margin-top: -38px; margin-right: 5px;'>";
    echo "<h3 class='text-center' style='font-family: Quicksand, sans-serif; margin-top: -30px;'>.:: Laporan Perpustakaan ::.</h3>";
    $sql2 = mysqli_query($koneksi, "SELECT * FROM identitas");
    $row = mysqli_fetch_assoc($sql2);

    echo "<p style='font-size: 12px;' class='text-center'>" . $row['alamat_app'] . "<br> Email : " . $row['email_app'] . " | Nomor Telpon : " . $row['nomor_hp'] . " </p>";
    echo "<hr>";
    echo "<table class='table table-striped table-bordered'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>No</th>";
    echo "<th>Nama Anggota</th>";
    echo "<th>Judul Buku</th>";
    echo "<th>Tanggal Peminjaman</th>";
    echo "<th>Tanggal Pengembalian</th>";
    echo "</tr>";
    $no = 1;
    $sql = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE tanggal_peminjaman = '$tgl_pinjam'");
    while ($row = mysqli_fetch_assoc($sql)) {
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['nama_anggota'] . "</td>";
        echo "<td>" . $row['judul_buku'] . "</td>";
        echo "<td>" . $row['tanggal_peminjaman'] . "</td>";
        if ($row['tanggal_pengembalian'] == null) {
            echo "<td> - </td>";
        } else {
            echo "<td>" . $row['tanggal_pengembalian'] . "</td>";
        }
        echo "</tr>";
        echo "</tbody>";
    }
    echo "</table>";
    echo "<p style='text-align: center;'>Laporan Perpustakaan Berdasarkan Tanggal Peminjaman (" . $_POST['tgl_pinjam'] . ")</p>";
    echo "<script src='../../../../assets/bower_components/jquery/dist/jquery.min.js'></script>";
    echo "<script src='../../../../assets/bower_components/bootstrap/dist/js/bootstrap.min.js'></script>";
    echo "</body>";
    echo "</html>";
} elseif ($_GET['aksi'] == "tgl_pengembalian") {

    $tgl_pengembalian = $_POST['tgl_pengembalian'];

    echo "<html>";
    echo "<head>";
    echo "<title>Laporan Perpustakaan - Tanggal Pengembalian</title>";
    echo "<link rel='stylesheet' href='../../../../assets/dist/css/custom.css'>";
    echo "<link rel='stylesheet' href='../../../../assets/bower_components/bootstrap/dist/css/bootstrap.min.css'>";
    echo "<link rel='stylesheet' href='../../../../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'>";
    echo "<link rel='icon' type='icon' href='../../../../assets/dist/img/logo_app.png'>";
    echo "</head>";
    echo "<body onload='window.print()' style='font-family: Quicksand, sans-serif'>";
    echo "<img src='../../../../assets/dist/img/logo_app.png' style='height: 90px; width: 90px; margin-top: 10px; margin-left: 10px; margin-bottom: -50px;'>";
    echo "<img src='../../../../assets/espenero.png' style='display: block; margin-left: auto; width: 90px; margin-bottom: -70px; margin-top: -38px; margin-right: 5px;'>";
    echo "<h3 class='text-center' style='font-family: Quicksand, sans-serif; margin-top: -30px;'>.:: Laporan Perpustakaan ::.</h3>";
    $sql2 = mysqli_query($koneksi, "SELECT * FROM identitas");
    $row = mysqli_fetch_assoc($sql2);

    echo "<p style='font-size: 12px;' class='text-center'>" . $row['alamat_app'] . "<br> Email : " . $row['email_app'] . " | Nomor Telpon : " . $row['nomor_hp'] . " </p>";
    echo "<hr>";
    echo "<table class='table table-striped table-bordered'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>No</th>";
    echo "<th>Nama Anggota</th>";
    echo "<th>Judul Buku</th>";
    echo "<th>Tanggal Peminjaman</th>";
    echo "<th>Tanggal Pengembalian</th>";
    echo "</tr>";
    $no = 1;
    $sql = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE tanggal_pengembalian = '$tgl_pengembalian'");
    while ($row = mysqli_fetch_assoc($sql)) {
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['nama_anggota'] . "</td>";
        echo "<td>" . $row['judul_buku'] . "</td>";
        echo "<td>" . $row['tanggal_peminjaman'] . "</td>";
        if ($row['tanggal_pengembalian'] == null) {
            echo "<td> - </td>";
        } else {
            echo "<td>" . $row['tanggal_pengembalian'] . "</td>";
        }
        echo "</tr>";
        echo "</tbody>";
    }
    echo "</table>";
    echo "<p style='text-align: center;'>Laporan Perpustakaan Berdasarkan Tanggal Pengembalian (" . $_POST['tgl_pengembalian'] . ")</p>";
    echo "<script src='../../../../assets/bower_components/jquery/dist/jquery.min.js'></script>";
    echo "<script src='../../../../assets/bower_components/bootstrap/dist/js/bootstrap.min.js'></script>";
    echo "</body>";
    echo "</html>";
} elseif ($_GET['aksi'] == "nama_anggota") {

    $nama_anggota = $_POST['nama_anggota'];

    echo "<html>";
    echo "<head>";
    echo "<title>Laporan Perpustakaan - Nama Anggota</title>";
    echo "<link rel='stylesheet' href='../../../../assets/dist/css/custom.css'>";
    echo "<link rel='stylesheet' href='../../../../assets/bower_components/bootstrap/dist/css/bootstrap.min.css'>";
    echo "<link rel='stylesheet' href='../../../../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'>";
    echo "<link rel='icon' type='icon' href='../../../../assets/dist/img/logo_app.png'>";
    echo "</head>";
    echo "<body onload='window.print()' style='font-family: Quicksand, sans-serif'>";
    echo "<img src='../../../../assets/dist/img/logo_app.png' style='height: 90px; width: 90px; margin-top: 10px; margin-left: 10px; margin-bottom: -50px;'>";
    echo "<img src='../../../../assets/dist/img/LOGO-PERPUSNAS.png' style='display: block; margin-left: auto; width: 90px; margin-bottom: -70px; margin-top: -38px; margin-right: 5px;'>";
    echo "<h3 class='text-center' style='font-family: Quicksand, sans-serif; margin-top: -30px;'>.:: Laporan Perpustakaan ::.</h3>";
    $sql2 = mysqli_query($koneksi, "SELECT * FROM identitas");
    $row = mysqli_fetch_assoc($sql2);

    echo "<p style='font-size: 12px;' class='text-center'>" . $row['alamat_app'] . "<br> Email : " . $row['email_app'] . " | Nomor Telpon : " . $row['nomor_hp'] . " </p>";
    echo "<hr>";
    echo "<table class='table table-striped table-bordered' id='example1'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>No</th>";
    echo "<th>Nama Anggota</th>";
    echo "<th>Judul Buku</th>";
    echo "<th>Tanggal Peminjaman</th>";
    echo "<th>Tanggal Pengembalian</th>";
    echo "</tr>";
    $no = 1;
    $sql = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE nama_anggota = '$nama_anggota'");
    while ($row = mysqli_fetch_assoc($sql)) {
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['nama_anggota'] . "</td>";
        echo "<td>" . $row['judul_buku'] . "</td>";
        echo "<td>" . $row['tanggal_peminjaman'] . "</td>";
        if ($row['tanggal_pengembalian'] == null) {
            echo "<td> - </td>";
        } else {
            echo "<td>" . $row['tanggal_pengembalian'] . "</td>";
        }
        echo "</tr>";
        echo "</tbody>";
    }
    echo "</table>";
    echo "<p style='text-align: center;'>Laporan Perpustakaan Berdasarkan Nama Anggota (" . $_POST['nama_anggota'] . ")</p>";
    echo "<script src='../../../../assets/bower_components/jquery/dist/jquery.min.js'></script>";
    echo "<script src='../../../../assets/bower_components/bootstrap/dist/js/bootstrap.min.js'></script>";
    echo "</body>";
    echo "</html>";
}
