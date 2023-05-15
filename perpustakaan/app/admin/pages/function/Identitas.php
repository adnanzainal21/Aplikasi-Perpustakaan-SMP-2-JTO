<?php
session_start();
include "../../../../config/koneksi.php";

if ($_GET['aksi'] == "edit") {
    $id_identitas = $_POST['id_identitas'];
    $nama_applikasi = $_POST['App'];
    $alamat = $_POST['Alamat'];
    $email = $_POST['Email'];
    $telp = $_POST['Telp'];

    $query = "UPDATE identitas SET nama_app = '$nama_applikasi', alamat_app = '$alamat', email_app = '$email', nomor_hp = '$telp'";
    $query .= "WHERE id_identitas = '$id_identitas'";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        $_SESSION['berhasil'] = "Identitas applikasi berhasil diedit !";

        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Identitas applikasi gagal diedit !";

        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
