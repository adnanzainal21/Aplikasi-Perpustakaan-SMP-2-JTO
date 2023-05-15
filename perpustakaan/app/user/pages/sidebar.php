<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../assets/dist/img/avatar02.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">

                <p><?= $_SESSION['fullname']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN MENU</li>
            <li><a href="dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li><a href="peminjaman-buku"><i class="fa fa-exchange"></i> <span>Peminjaman Buku</span></a></li>
            <li><a href="pengembalian-buku"><i class="fa fa-repeat"></i> <span>Pengembalian Buku</span></a></li>
            <li class="header">LAIN LAIN</li>
            <li><a href="pesan"><i class="fa fa-envelope"></i> <span>Pesan</span>
                    <span class="pull-right-container" id="jumlahPesan">
                        <?php
                        include "../../config/koneksi.php";

                        $nama_saya = $_SESSION['fullname'];
                        $default = "Belum dibaca";
                        $query_pesan  = mysqli_query($koneksi, "SELECT * FROM pesan WHERE penerima = '$nama_saya' AND status = '$default'");
                        $jumlah_pesan = mysqli_num_rows($query_pesan);

                        $nama_saya = $_SESSION['fullname'];
                        $default = "Belum dibaca";
                        $query_pesan  = mysqli_query($koneksi, "SELECT * FROM pesan WHERE penerima = '$nama_saya' AND status = '$default'");
                        $row_pesan = mysqli_fetch_array($query_pesan);

                        if ($jumlah_pesan == null) {
                            // Hilangkan badge pesan
                        } else {
                            echo "<span class='label label-danger pull-right'>" . $jumlah_pesan . "</span>";
                        }
                        ?>
                    </span>
                </a></li>
            <li><a href="profil-saya"><i class="fa fa-user"></i> <span>Profil Saya</span></a></li>
            <li class="header">LANJUTAN</li>
            <li><a href="#Logout" data-toggle="modal" data-target="#modalLogoutConfirm"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<div class="modal fade" id="modalLogoutConfirm">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 5px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Peringatan</h4>
            </div>
            <div class="modal-body">
                <span>Apa anda yakin ingin keluar dari Applikasi ? <br>
                    Anda harus login kembali jika ingin masuk Applikasi Perpustakaan</span>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
                <a href="keluar" class="btn btn-primary">Iya, Logout</a>
            </div>
        </div>
    </div>
</div>
<script>
    var refreshId = setInterval(function() {
        $('#jumlahPesan').load('./pages/function/Pesan.php?aksi=jumlahPesan');
    }, 500);
</script>