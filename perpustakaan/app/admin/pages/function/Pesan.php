<?php
session_start();
include "../../../../config/koneksi.php";
include "PesanRealtime.php";

if ($_GET['aksi'] == "kirim") {

    if ($_POST['namaPenerima'] == NULL) {
        $_SESSION['gagal'] = "Harap pilih penerima pesan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        //
        $pengirim = $_POST['pengirim'];
        $penerima = $_POST['namaPenerima'];
        $judul_pesan = $_POST['judulPesan'];
        $isi_pesan = $_POST['isiPesan'];
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_kirim = date('d-m-Y');
        $status = "Belum dibaca";

        $sql = "INSERT INTO pesan(penerima,pengirim,judul_pesan,isi_pesan,status,tanggal_kirim)
            VALUES('" . $penerima . "', '" . $pengirim . "', '" . $judul_pesan . "', '" . $isi_pesan . "', '" . $status . "', '" . $tanggal_kirim . "')";

        $sql .= mysqli_query($koneksi, $sql);

        if ($sql) {
            $_SESSION['berhasil'] = "Pesan berhasil terkirim !!";
            header("location: " . $_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['gagal'] = "Pesan gagal terkirim !!. Cek QUERY";
            header("location: " . $_SERVER['HTTP_REFERER']);
        }
    }
} elseif ($_GET['aksi'] == "update") {
    //
    $id = $_GET['id_pesan'];

    $query_edit = "UPDATE pesan SET status = 'Sudah dibaca'";
    $query_edit .= "WHERE id_pesan='$id'";
    $sql = mysqli_query($koneksi, $query_edit);

    if ($sql) {
        $_SESSION['berhasil'] = "Status pesan berhasil di update !!";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Status pesan gagal di update !!. Cek QUERY";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['aksi'] == "hapus") {
    $id_pesan = $_GET['id_pesan'];

    $sql = mysqli_query($koneksi, "DELETE FROM pesan WHERE id_pesan = '$id_pesan'");

    if ($sql) {
        $_SESSION['berhasil'] = "Data pesan berhasil di hapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data pesan gagal di hapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['aksi'] == "badgePesan") {
    //
    GetBadgePesan();
} elseif ($_GET['aksi'] == "Pesan") {
    //
    GetPesan();
} elseif ($_GET['aksi'] == "jumlahPesan") {
    //
    GetJumlahPesan();
}

function UpdateDataPesan()
{
    include "../../../../config/koneksi.php";

    $nama_lama = $_SESSION['fullname'];
    $nama_saya = $_POST['fullname'];

    $query = "UPDATE pesan SET pengirim = '$nama_saya'";
    $query .= "WHERE pengirim = '$nama_lama'";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        // Hapus session lama
        unset($_SESSION['fullname']);

        // Mulai session baru
        session_start();
        $_SESSION['fullname'] = $_POST['fullname'];
    }
}
