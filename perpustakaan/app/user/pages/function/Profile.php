<?php
session_start();

include "../../../../config/koneksi.php";
include "Peminjaman.php";
include "Pesan.php";

if ($_GET['aksi'] = "edit") {
    $id_user = $_POST['IdUser'];
    $nis = $_POST['Nis'];
    $fullname = $_POST['Fullname'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $kelas = $_POST['Kelas'];
    $alamat = $_POST['Alamat'];

    if ($_POST['kelas'] = NULL) {
        $_SESSION['gagal'] = "Harap pilih kelas anda !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {

        UpdateDataPeminjaman();

        UpdateDataPesan();

        $query = "UPDATE user SET nis = '$nis', fullname = '$fullname', username = '$username', password = '$password', kelas = '$kelas', alamat = '$alamat'";
        $query .= "WHERE id_user = $id_user";

        $sql = mysqli_query($koneksi, $query);

        if ($sql) {
            $_SESSION['berhasil'] = "Update profil berhasil !";
            header("location: " . $_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['gagal'] = "Update profil gagal !";
            header("location: " . $_SERVER['HTTP_REFERER']);
        }
    }
}
