<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Laporan Perpustakaan
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
            <li class="active">Laporan Perpustakaan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tgl-peminjaman" data-toggle="tab">Tanggal Peminjaman</a></li>
                        <li><a href="#tgl-pengembalian" data-toggle="tab">Tanggal Pengembalian</a></li>
                        <li><a href="#nama-anggota" data-toggle="tab">Nama Anggota ( Siswa )</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- Tanggal Pinjam -->
                        <div class="tab-pane active" id="tgl-peminjaman">
                            <section id="new">
                                <form action="pages/function/Laporan.php?aksi=tgl_pinjam" method="POST" target="_blank">
                                    <div class="form-group">
                                        <label>Tanggal Peminjaman</label>
                                        <input type="text" class="form-control" name="tgl_pinjam" id="datepicker" placeholder="Silahkan masukan tanggal pinjam" required>
                                    </div>
                                    <div class=" form-group">
                                        <button type="submit" target="_blank" class="btn btn-primary btn-block">Tampilkan Data</button>
                                    </div>
                                </form>
                            </section>
                        </div>
                        <!-- /#tgl-pinjam] -->

                        <!-- Tanggal Pengembalian -->
                        <div class="tab-pane" id="tgl-pengembalian">
                            <form action="pages/function/Laporan.php?aksi=tgl_pengembalian" method="POST" target="_blank">
                                <div class="form-group">
                                    <label>Tanggal Pengembalian</label>
                                    <input type="text" class="form-control" name="tgl_pengembalian" id="datepicker1" placeholder="Silahkan masukan tanggal pengembalian" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Tampilkan Data</button>
                                </div>
                            </form>
                        </div>
                        <!-- /#tgl-pengembalian] -->

                        <!-- Nama Anggota -->
                        <div class="tab-pane" id="nama-anggota">
                            <form action="pages/function/Laporan.php?aksi=nama_anggota" method="POST" target="_blank">
                                <div class="form-group">
                                    <label>Nama Anggota</label>
                                    <input type="text" class="form-control" name="nama_anggota" placeholder="Masukan Nama Anggota / Siswa" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Tampilkan Data</button>
                                </div>
                            </form>
                        </div>
                        <!-- /#nama-anggota] -->
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