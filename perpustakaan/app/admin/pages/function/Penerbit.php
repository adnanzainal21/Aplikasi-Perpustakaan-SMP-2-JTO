<?php
session_start();
include "../../../../config/koneksi.php";

if ($_GET['act'] == "tambah") {
    $kode_penerbit = $_POST['kodePenerbit'];
    $nama_penerbit = $_POST['namaPenerbit'];
    $status = $_POST['sTatus'];

    $sql = "INSERT INTO penerbit(kode_penerbit,nama_penerbit,verif_penerbit)
            VALUES('" . $kode_penerbit . "','" . $nama_penerbit . "','" . $status . "')";
    $sql .= mysqli_query($koneksi, $sql);

    if ($sql) {
        $_SESSION['berhasil'] = "Penerbit berhasil ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Penerbit gagal ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['act'] == "edit") {
    $id_penerbit = $_POST['idPenerbit'];
    $nama_penerbit = $_POST['namaPenerbit'];
    $verif_penerbit = $_POST['sTatus'];

    $query = "UPDATE penerbit SET nama_penerbit = '$nama_penerbit', verif_penerbit = '$verif_penerbit'";
    $query .= "WHERE id_penerbit = '$id_penerbit'";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        $_SESSION['berhasil'] = "Data Penerbit berhasil di ganti !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data Penerbit gagal di ganti !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['act'] == "hapus") {
    $id_penerbit = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM penerbit WHERE id_penerbit = '$id_penerbit'");

    if ($sql) {
        $_SESSION['berhasil'] = "Data Penerbit berhasil dihapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data Penerbit gagal dihapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
