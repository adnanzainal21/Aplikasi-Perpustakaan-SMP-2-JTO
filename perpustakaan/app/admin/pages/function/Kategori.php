<?php
session_start();
include "../../../../config/koneksi.php";

if ($_GET['act'] == "tambah") {
    $kode_kategori = $_POST['kodeKategori'];
    $nama_kategori = $_POST['namaKategori'];

    $sql = "INSERT INTO kategori(kode_kategori,nama_kategori)VALUES('$kode_kategori','$nama_kategori')";
    $sql .= mysqli_query($koneksi, $sql);

    if ($sql) {
        $_SESSION['berhasil'] = "Kategori buku berhasil ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Kategori buku gagal ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['act'] == "edit") {
    $id_kategori = $_POST['idKategori'];
    $nama_kategori = $_POST['namaKategori'];

    $query = "UPDATE kategori SET nama_kategori = '$nama_kategori'";
    $query .= "WHERE id_kategori = '$id_kategori'";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        $_SESSION['berhasil'] = "Kategori buku berhasil diedit !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Kategori buku gagal diedit !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['act'] == "hapus") {
    $id_kategori = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$id_kategori'");

    if ($sql) {
        $_SESSION['berhasil'] = "Kategori buku berhasil dihapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Kategori buku gagal dihapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
