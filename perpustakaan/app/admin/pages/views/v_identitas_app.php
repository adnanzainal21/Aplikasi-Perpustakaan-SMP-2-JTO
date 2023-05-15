<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Identitas Applikasi
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
            <li class="active">Identitas Applikasi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Edit Identitas Applikasi</h3>
                    </div>
                    <!-- /.box-header -->
                    <form action="pages/function/Identitas.php?aksi=edit" method="POST" enctype="multipart/form-data">
                        <?php
                        include "../../config/koneksi.php";

                        $query = mysqli_query($koneksi, "SELECT * FROM identitas WHERE id_identitas = '1'");
                        $row = mysqli_fetch_assoc($query);
                        ?>
                        <div class="box-body">
                            <input name="id_identitas" type="hidden" value="1">
                            <div class="form-group">
                                <label for="nameApp">Nama Applikasi</label>
                                <input type="text" class="form-control" id="nameApp" value="<?= $row['nama_app']; ?>" name="App" required>
                            </div>
                            <div class="form-group">
                                <label for="alamaT">Alamat Lengkap</label>
                                <textarea class="form-control" style="height: 80px; resize: none;" name="Alamat" required><?= $row['alamat_app']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="emaiL">Email</label>
                                <input type="email" class="form-control" id="emaiL" value="<?= $row['email_app']; ?>" name="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="telP">Nomor Telpon</label>
                                <input type="number" class="form-control" id="telP" value="<?= $row['nomor_hp']; ?>" name="Telp" required>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-block btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Identitas Applikasi</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <img src="../../assets/dist/img/icon-app.png" style="width: 125px; height: 125px; display: block; margin-left: auto; margin-right: auto; margin-top: -10px; margin-bottom: 15px;">
                        <!-- Animasi -->
                        <!--<lottie-player src="../../assets/json/3151-books.json" background="transparent" speed="1" style="width: 125px; height: 125px; display: block; margin-left: auto; margin-right: auto; margin-top: -50px; margin-bottom: 15px;" loop autoplay></lottie-player>
                        -->
                        <p style="font-weight: bold;">Nama Applikasi : <?= $row['nama_app']; ?></p>
                        <p style="font-weight: bold;">Alamat : <?= $row['alamat_app']; ?></p>
                        <p style="font-weight: bold;">Email : <?= $row['email_app']; ?></p>
                        <p style="font-weight: bold;">Nomor Telepon : <?= $row['nomor_hp']; ?></p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
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