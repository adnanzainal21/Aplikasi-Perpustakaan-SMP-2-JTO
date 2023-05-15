<?php
session_start();

function InsertPemberitahuanPeminjaman()
{
    include "../../../../config/koneksi.php";

    $nama_anggota = $_POST['namaAnggota'];
    $notif = addslashes("<i class='fa fa-exchange'></i> #" . $nama_anggota . " Telah meminjam Buku");
    $level = "Admin";
    $status = "Belum dibaca";

    $sql = "INSERT INTO pemberitahuan(isi_pemberitahuan,level_user,status) 
                VALUES('" . $notif . "','" . $level . "','" . $status . "')";
    $sql .= mysqli_query($koneksi, $sql);
}

function InsertPemberitahuanPengembalian()
{
    include "../../../../config/koneksi.php";

    $nama_anggota = $_SESSION['fullname'];
    $notif = addslashes("<i class='fa fa-repeat'></i> #" . $nama_anggota . " Telah mengembalikan Buku");
    $level = "Admin";
    $status = "Belum dibaca";

    $sql = "INSERT INTO pemberitahuan(isi_pemberitahuan,level_user,status) 
                VALUES('" . $notif . "','" . $level . "','" . $status . "')";
    $sql .= mysqli_query($koneksi, $sql);
}
