<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Pesan
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
            <li class="active">Pesan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#pesan-masuk" data-toggle="tab">Pesan Masuk</a></li>
                        <li><a href="#pesan-terkirim" data-toggle="tab">Pesan Terkirim</a></li>
                        <div class="form-group m-b-2 text-right" style="margin-top: 5px;margin-bottom: -5px; margin-right: 5px;">
                            <button type="button" onclick="kirimPesan()" class="btn btn-info"><i class="fa fa-send"></i> Kirim Pesan</button>
                        </div>
                    </ul>
                    <div class="tab-content">
                        <!-- Font Awesome Icons -->
                        <div class="tab-pane active" id="pesan-masuk">
                            <section id="new">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pengirim</th>
                                                <th>Judul Pesan</th>
                                                <th>Isi Pesan</th>
                                                <th>Status Pesan</th>
                                                <th>Tanggal Kirim</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        include "../../config/koneksi.php";

                                        $no = 1;
                                        $penerima = $_SESSION['fullname'];
                                        $query = mysqli_query($koneksi, "SELECT * FROM pesan WHERE penerima = '$penerima'");
                                        while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $row['pengirim']; ?></td>
                                                    <td><?= $row['judul_pesan']; ?></td>
                                                    <td><?= $row['isi_pesan']; ?></td>
                                                    <td><?= $row['status']; ?></td>
                                                    <td><?= $row['tanggal_kirim']; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row['status'] == "Sudah dibaca") {
                                                            //
                                                            echo "<a href='pages/function/Pesan.php?aksi=hapus&id_pesan=" . $row['id_pesan'] . "' class='btn btn-danger btn-sm btn-del' onclick='hapusAnggota()'><i class='fa fa-trash'></i></a>";
                                                        } else {
                                                            echo "<a href='pages/function/Pesan.php?aksi=update&id_pesan=" . $row['id_pesan'] . "' class='btn btn-info btn-sm'><i class='fa fa-check'></i></a>";
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            </section>
                        </div>

                        <!-- Pesan Terkirim -->
                        <div class="tab-pane" id="pesan-terkirim">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Penerima</th>
                                            <th>Judul Pesan</th>
                                            <th>Isi Pesan</th>
                                            <th>Status Pesan</th>
                                            <th>Tanggal Kirim</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    include "../../config/koneksi.php";

                                    $no = 1;
                                    $pengirim = $_SESSION['fullname'];
                                    $query = mysqli_query($koneksi, "SELECT * FROM pesan WHERE pengirim = '$pengirim'");
                                    while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row['penerima']; ?></td>
                                                <td><?= $row['judul_pesan']; ?></td>
                                                <td><?= $row['isi_pesan']; ?></td>
                                                <td><?= $row['status']; ?></td>
                                                <td><?= $row['tanggal_kirim']; ?></td>
                                                <td>
                                                    <a href="pages/function/Pesan.php?aksi=hapus&id_pesan=<?= $row['id_pesan']; ?>" class="btn btn-danger btn-sm btn-del" onclick="hapusPesan()"><i class="fa fa-trash"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <!-- /#Pesan Terkirim -->
                    </div>
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
<!-- -->
<form action="pages/function/Pesan.php?aksi=kirim" enctype="multipart/form-data" method="POST">
    <div class="modal fade" id="modalKirimPesan">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 5px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Kirim Pesan</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="pengirim" value="<?= $_SESSION['fullname']; ?>">
                    <div class="form-group">
                        <label>Nama Penerima <small style="color: red;">* Wajib diisi</small></label>
                        <select class="form-control" name="namaPenerima">
                            <option selected disabled>-- Pilih Penerima --</option>
                            <?php
                            include "../../config/koneksi.php";

                            $nama_saya = $_SESSION['fullname'];
                            $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE fullname != '$nama_saya' AND role = 'Admin'");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?= $data['fullname']; ?>">[ <?= $data['kode_user']; ?> ] <?= $data['fullname']; ?> ( <?= $data['role']; ?> )</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Judul Pesan <small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" name="judulPesan" class="form-control" placeholder="Masukan Judul Pesan" required>
                    </div>
                    <div class="form-group">
                        <label>Isi Pesan <small style="color: red;">* Wajib diisi</small></label>
                        <textarea name="isiPesan" class="form-control" style="height: 100px; resize: none;" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</form>
<script>
    function kirimPesan() {
        $('#modalKirimPesan').modal('show');
    }
</script>
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
                text: 'Apakah anda yakin ingin menghapus pesan ini ?',
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
                        text: 'Pesan tersebut tetap aman !'
                    })
                }
            });
    })
</script>