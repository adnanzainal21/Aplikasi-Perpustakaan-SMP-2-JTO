<?php
session_start();
include "../../../../config/koneksi.php";
include "Pesan.php";

if ($_GET['act'] == "tambah") {
    $fullname = $_POST['namaLengkap'];
    $username = $_POST['namaPengguna'];
    $password = $_POST['kataSandi'];
    $role = $_POST['role'];
    $join_date = date('d-m-Y');
    $verif = "Iya";
    $kode_user = "-";
    $nis = "-";
    $kelas = "-";
    $alamat = "-";

    $query = "INSERT INTO user(kode_user,nis,fullname,username,password,kelas,alamat,verif,role,join_date)
        VALUES('" . $kode_user . "','" . $nis . "','" . $fullname . "','" . $username . "','" . $password . "','" . $kelas . "','" . $alamat . "', '" . $verif . "','" . $role . "','" . $join_date . "')";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        $_SESSION['berhasil'] = "Administrator berhasil ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Administrator gagal ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['act'] == "edit") {

    UpdateDataPesan();

    $id_admin = $_POST['id_admin'];
    $fullname = htmlspecialchars(addslashes($_POST['fullname']));
    $username = htmlspecialchars(strtolower($_POST['username']));
    $password = htmlspecialchars(addslashes($_POST['password']));

    $query = "UPDATE user SET fullname = '$fullname', username = '$username', password ='$password'";
    $query .= "WHERE id_user = '$id_admin'";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        $_SESSION['berhasil'] = "Data Administrator berhasil di edit !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data Administrator gagal di edit !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['act'] == "hapus") {
    $id_admin = $_GET['id'];

    $query = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = $id_admin");

    if ($query) {
        $_SESSION['berhasil'] = "Data Administrator berhasil dihapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data Administrator gagal dihapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
