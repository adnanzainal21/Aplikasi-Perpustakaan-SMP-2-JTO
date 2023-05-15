<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Data Penerbit
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
            <li class="active">Data Penerbit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Data Penerbit</h3>
                        <div class="form-group m-b-2 text-right" style="margin-top: -20px; margin-bottom: -5px;">
                            <button type="button" onclick="tambahPenerbit()" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Penerbit</button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Penerbit</th>
                                    <th>Nama Penerbit</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            include "../../config/koneksi.php";

                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM penerbit");
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['kode_penerbit']; ?></td>
                                        <td><?= $row['nama_penerbit']; ?></td>
                                        <td>
                                            <?php

                                            if ($row['verif_penerbit'] == "Terverifikasi") {
                                                echo "<span class='btn-primary btn-sm' style='font-weight: bold; display: block; margin: 0 auto; text-align: center;'>Penerbit Terverifikasi</span>";
                                            } else if ($row['verif_penerbit'] == "Belum Terverifikasi") {
                                                echo "<span class='btn-danger btn-sm' style='font-weight: bold; display: block; margin: 0 auto; text-align: center;'>Penerbit Belum Terverifikasi</span>";
                                            } else {
                                                echo "<span class='btn-warning btn-sm' style='font-weight: bold; display: block; margin: 0 auto; text-align: center;'>Status Tidak Diketahui</span>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#modalEditPenerbit<?= $row['id_penerbit']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="pages/function/Penerbit.php?act=hapus&id=<?= $row['id_penerbit']; ?>" class="btn btn-danger btn-sm btn-del"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit Anggota -->
                                    <div class="modal fade" id="modalEditPenerbit<?= $row['id_penerbit']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="border-radius: 5px;">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                                                        Edit Penerbit ( <?= $row['kode_penerbit']; ?> - <?= $row['nama_penerbit']; ?> )
                                                    </h4>
                                                </div>
                                                <form action="pages/function/Penerbit.php?act=edit" enctype="multipart/form-data" method="POST">
                                                    <div class="modal-body">
                                                        <input type="hidden" value="<?= $row['id_penerbit']; ?>" name="idPenerbit">
                                                        <div class="form-group">
                                                            <label>Kode Penerbit</label>
                                                            <input type="text" class="form-control" value="<?= $row['kode_penerbit'] ?>" style="cursor: not-allowed;" name="kodeAnggota" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Penerbit</label>
                                                            <input type="text" class="form-control" value="<?= $row['nama_penerbit']; ?>" name="namaPenerbit" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="form-control select" name="sTatus">
                                                                <?php
                                                                if ($row['verif_penerbit'] == "Terverifikasi") {
                                                                    echo "<option selected value='Terverifikasi'>Terverifikasi ( Dipilih Sebelumnya )</option>";
                                                                    echo "<option value='Belum Terverifikasi'>Belum Terverifikasi</option>";
                                                                } else if ($row['verif_penerbit'] == "Belum Terverifikasi") {
                                                                    echo "<option selected value='Belum Terverifikasi'>Belum Terverifikasi ( Dipilih Sebelumnya )</option>";
                                                                    echo "<option value='Terverifikasi'>Terverifikasi</option>";
                                                                } else {
                                                                    echo "<option selected disabled>-- Harap Pilih Status Penerbit --</option>";
                                                                    echo "<option value='Belum Terverifikasi'>Belum Terverifikasi</option>";
                                                                    echo "<option value='Terverifikasi'>Terverifikasi</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- Modal Tambah Penerbit -->
<div class="modal fade" id="modalTambahPenerbit">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 5px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Tambah Penerbit</h4>
            </div>
            <form action="pages/function/Penerbit.php?act=tambah" enctype="multipart/form-data" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Penerbit <small style="color: red;">* Otomatis Terisi</small></label>
                        <?php
                        include "../../config/koneksi.php";

                        $query = mysqli_query($koneksi, "SELECT max(kode_penerbit) as kodeTerakhir FROM penerbit");
                        $data = mysqli_fetch_array($query);
                        $kodeTerakhir = $data['kodeTerakhir'];

                        // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                        // dan diubah ke integer dengan (int)
                        $urutan = (int) substr($kodeTerakhir, 3, 3);

                        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                        $urutan++;

                        // membentuk kode barang baru
                        // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                        // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                        // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
                        $huruf = "P";
                        $Kode = $huruf . sprintf("%03s", $urutan);
                        ?>
                        <input type="text" class="form-control" value="<?php echo $Kode ?>" name="kodePenerbit" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Penerbit <small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Penerbit" name="namaPenerbit" required>
                    </div>
                    <div class="form-group">
                        <label>Status <small style="color: red;">* Wajib diisi</small></label>
                        <select class="form-control select" name="sTatus">
                            <option selected disabled>-- Harap Pilih Status Penerbit --</option>
                            <option value="Terverifikasi">Terverfikasi</option>
                            <option value="Belum Terverifikasi">Belum Terverfikasi</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Script Tampilkan Modal Tambah Penerbit -->
<script>
    function tambahPenerbit() {
        $('#modalTambahPenerbit').modal('show');
    }
</script>
<!-- jQuery 3 -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Sweet Alert -->
<script src="../../assets/dist/js/sweetalert.min.js"></script>
<!-- Notif Berhasil -->
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
<!-- Notif Gagal -->
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
                text: 'Apakah anda yakin ingin menghapus data penerbit ini ?',
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
                        text: 'Data penerbit tersebut aman !'
                    })
                }
            });
    })
</script>