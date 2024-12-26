<?php 
    include '../layout/header.php';
    include '../layout/Config.php';
    include '../Controllers/BukuController.php';

    $data_buku = select("SELECT * FROM buku");

    // Notification Tambah Data
    if (isset($_POST['simpan'])) {
        if (create_buku($_POST) > 0) {
            echo "<script> let timerInterval;
        Swal.fire({
            position: 'top-middle',
            icon: 'success',
            title: 'Data Buku Berhasil Disimpan',
            showConfirmButton: false,
            timer: 1500,
            didOpen: () => {
                const timer = Swal.getPopup().querySelector('b');
                timerInterval = setInterval(() => {
                }, 100);
            },
            willClose: () => {
                window.location = 'Buku.php'
                clearInterval(timerInterval);
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer');
            }
        });</script>";
        } else {
            echo "<script>
                    alert('Data Buku Gagal Disimpan');
                    document.location.href = 'Buku.php';
                </script>";
        }
    }

    // Notifikasi Edit
    if (isset($_POST['Edit'])) {
        if(update_buku($_POST) > 0) {
            echo "<script> let timerInterval;
        Swal.fire({
            position: 'top-middle',
            icon: 'success',
            title: 'Data Buku Berhasil Diubah',
            showConfirmButton: false,
            timer: 1500,
            didOpen: () => {
                const timer = Swal.getPopup().querySelector('b');
                timerInterval = setInterval(() => {
                }, 100);
            },
            willClose: () => {
                window.location = 'Buku.php'
                clearInterval(timerInterval);
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer');
            }
        });</script>";
        } else {
            echo "<script>
                    alert('Data Buku Gagal diubah');
                    document.location.href = 'Buku.php';
                </script>";
        }
    }
    // Notification Hapus
    if(isset($_POST['Hapus'])) {
       if (delete_buku() > 0) {
        echo "<script> let timerInterval;
        Swal.fire({
            position: 'top-middle',
            icon: 'success',
            title: 'Data Buku Berhasil Dihapus',
            showConfirmButton: false,
            timer: 1500,
            didOpen: () => {
                const timer = Swal.getPopup().querySelector('b');
                timerInterval = setInterval(() => {
                }, 100);
            },
            willClose: () => {
                window.location = 'Buku.php'
                clearInterval(timerInterval);
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer');
            }
        });</script>";
        } else {
            echo "<script>
                    alert('Data Buku Gagal dihapus');
                    document.location.href = 'Buku.php';
                </script>";
        }
    }
?>

<div class="container mt-5">
    <h1>Data Buku</h1>
    <hr>

    <button type="button" class="btn btn-info mb-5 mt-2 p-2 py-2 fs-5" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class='bx bx-user-plus bx-sm'></i> Tambah Data</button>


    <table class=" col-xs-12 table table-bordered table-striped mt-4" id="tabel-data">
        <thead>
            <tr>
                <th scope ="col">No</th>
                <th scope ="col">Kode Buku</th>
                <th scope ="col">Nama Buku</th>    
                <th style="width: 25%;">Kategori</th>    
                <th scope ="col">Tanggal</th>    
                <th scope ="col">Harga</th>    
                <th scope ="col">Aksi</th>    
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_buku as $buku): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $buku['kode_buku']; ?></td>
                <td><?= $buku['judul_buku']; ?></td>
                <td><?= $buku['kategori']; ?></td>
                <td><?= $buku ['tgl_pembelian']; ?></td>
                <td><?= $buku ['harga']; ?></td>
                <td width="15%" class="text-center">
                <a href="" class="btn btn-primary col-xs-12 col-md-5 mt-1" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $no ?>"><i class='bx bx-edit'> Edit</i></a>
                <a href="" class="btn btn-danger col-xs-12 col-md-5 mt-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><i class='bx bx-edit'> Hapus</i></a>
                </td>
            </tr>

            <!-- Start Modal Edit -->
            <div class="modal fade" id="modalEdit<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit Buku</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            
                    <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $buku['id']; ?>">
                    
                    <div class="modal-body">
                    
                    <div class="mb-3">
                        <label class="form-label">Kode Buku</label>
                        <input type="text" class="form-control" name="kode_buku" value="<?= $buku['kode_buku']; ?>" placeholder="Masukkan Kode Buku Anda!">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" name="judul_buku" value="<?= $buku['judul_buku']; ?>" placeholder="Masukkan Judul Buku Anda!">
                    </div>

                    <div class="mb-3">
                    <label class="form-label">Kategori</label>
                        <select class="form-select" name="kategori">
                            <option><?= $buku['kategori']; ?></option>
                            <option value="Ekonomi">Ekonomi</option>
                            <option value="Sejarah">Sejarah</option>
                            <option value="Biologi">Biologi</option>
                            <option value="IPA">IPA</option>
                        </select>
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tgl_pembelian" value="<?= $buku['tgl_pembelian']; ?>" placeholder="Masukkan Tanggal Pembelian Buku Anda!">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" value="<?= $buku['harga']; ?>" placeholder="Masukkan Harga Buku Anda!">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="Edit">Save Changes</button>
                </div>
            </form>
            </div>
        </div>
        </div>
        <!-- End Modal Edit -->

        <!-- Start Modal Hapus -->
        <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            
                    <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $buku['id']; ?>">
                    
                    <div class="modal-body">
                        <h5 class="text-center">Apakah Anda yakin akan menghapus Data Buku?<br>
                            <span class="text-danger"><?= $buku['judul_buku']; ?></span>
                        </h5>
            
                    </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="Hapus">Ya, Hapus</button>
                </div>
            </form>
            </div>
        </div>
            </div>
            <!-- End Modal Hapus -->
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Start Modal Tambah Buku -->
    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Buku</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form action="" method="POST">
        <div class="modal-body">
            
            <div class="mb-3">
                <label class="form-label">Kode Buku</label>
                <input type="text" class="form-control" name="kode_buku" placeholder="Masukkan Kode Buku Anda!">
            </div>

            <div class="mb-3">
                <label class="form-label">Judul Buku</label>
                <input type="text" class="form-control" name="judul_buku" placeholder="Masukkan Judul Buku Anda!">
            </div>

            <div class="mb-3">
            <label class="form-label">Kategori</label>
                <select class="form-select" name="kategori">
                    <option></option>
                    <option value="Ekonomi">Ekonomi</option>
                    <option value="Sejarah">Sejarah</option>
                    <option value="Biologi">Biologi</option>
                    <option value="IPA">IPA</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tgl_pembelian" placeholder="Masukkan Tanggal Pembelian Buku Anda!">
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga" placeholder="Masukkan Harga Buku Anda!">
            </div>
          
        </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="simpan">Save Changes</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- End Modal Tambah Dosen-->
</div>




<?php 
    include '../layout/footer.php';
?>