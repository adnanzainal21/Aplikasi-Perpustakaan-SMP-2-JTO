<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Pengembalian Buku
            <small>
                <script type='text/javascript'>
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                        thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                    //
                </script>
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Pengembalian Buku</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tgl-pinjam" data-toggle="tab">Formulir Pengembalian Buku</a></li>
                        <li><a href="#tgl-pengembalian" data-toggle="tab">Riwayat Pengembalian Buku</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- Font Awesome Icons -->
                        <div class="tab-pane active" id="tgl-pinjam">
                            <section id="new">
                                <form action="pages/function/Peminjaman.php?aksi=pengembalian" method="POST">
                                    <div class="form-group">
                                        <label>Judul Buku</label>
                                        <select class="form-control" name="judulBuku" required>
                                            <option selected disabled> -- Silahkan pilih buku yang akan di kembalikan -- </option>
                                            <?php
                                            include "../../config/koneksi.php";

                                            $fullname = $_SESSION['fullname'];
                                            $sql = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE nama_anggota = '$fullname' AND tanggal_pengembalian = ''");
                                            while ($data = mysqli_fetch_array($sql)) {
                                            ?>
                                                <option value="<?= $data['judul_buku']; ?>"> <?= $data['judul_buku']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pengembalian</label>
                                        <input type="text" class="form-control" name="tanggalPengembalian" value="<?= date('d-m-Y'); ?>" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kondisi Buku Saat Dikembalikan</label>
                                        <select class="form-control" name="kondisiBukuSaatDikembalikan" required>
                                            <option selected disabled>-- Silahkan pilih kondisi buku saat dikembalikan --</option>
                                            <!-- -->
                                            <option value="Baik">Baik ( Tidak terkena denda )</option>
                                            <option value="Rusak">Rusak ( Denda 20.000 )</option>
                                            <option value="Hilang">Hilang ( Denda 50.000 )</option>
                                        </select>
                                    </div>
                                    <div class=" form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                                    </div>
                                </form>
                            </section>
                        </div>

                        <!-- Tanggal Pengembalian -->
                        <div class="tab-pane" id="tgl-pengembalian">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Anggota</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Kondisi Buku Saat Dikembalikan</th>
                                        <th>Denda</th>
                                    </tr>
                                </thead>
                                <?php
                                include "../../config/koneksi.php";

                                $no = 1;
                                $fullname = $_SESSION['fullname'];
                                $query = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE nama_anggota = '$fullname'");
                                while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['nama_anggota']; ?></td>
                                            <td><?= $row['judul_buku']; ?></td>
                                            <td><?= $row['tanggal_pengembalian']; ?></td>
                                            <td><?= $row['kondisi_buku_saat_dikembalikan']; ?></td>
                                            <td><?= $row['denda']; ?></td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                        <!-- /#tgl-pengembalian] -->

                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- jQuery 3 -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/dist/js/sweetalert.min.js"></script>
<!-- Pesan Berhasil Edit -->
<script>
    <?php
    if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] <> '') {
        echo "swal({
            icon: 'success',
            title: 'Berhasil',
            text: '$_SESSION[berhasil]'
        })";
    }
    $_SESSION['berhasil'] = '';
    ?>
</script>
<!-- Pesan Gagal Edit -->
<script>
    <?php
    if (isset($_SESSION['gagal']) && $_SESSION['gagal'] <> '') {
        echo "swal({
                icon: 'error',
                title: 'Gagal',
                text: '$_SESSION[gagal]'
              })";
    }
    $_SESSION['gagal'] = '';
    ?>
</script>
<!-- Swal Hapus Data -->
<script>
    $('.btn-del').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')

        swal({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Apakah anda yakin ingin menghapus data administrator ini ?',
                buttons: true,
                dangerMode: true,
                buttons: ['Tidak, Batalkan !', 'Iya, Hapus']
            })
            .then((willDelete) => {
                if (willDelete) {
                    document.location.href = href;
                } else {
                    swal({
                        icon: 'error',
                        title: 'Dibatalkan',
                        text: 'Data administrator tersebut tetap aman !'
                    })
                }
            });
    })
</script>