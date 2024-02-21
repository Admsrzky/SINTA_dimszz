<?php
    include '../layout/header.php';
    include '../layout/Config.php';
    include '../Controllers/MahasiswaController.php';

    $data_mahasiswa = select("SELECT * FROM mahasiswa");

     // Notification Tambah Data
     if (isset($_POST['simpan'])) {
        if (create_mahasiswa($_POST) > 0) {
            echo "<script> let timerInterval;
        Swal.fire({
            position: 'top-middle',
            icon: 'success',
            title: 'Data Mahasiswa Berhasil Ditambah',
            showConfirmButton: false,
            timer: 1500,
            didOpen: () => {
                const timer = Swal.getPopup().querySelector('b');
                timerInterval = setInterval(() => {
                }, 100);
            },
            willClose: () => {
                window.location = 'Mahasiswa.php'
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
                    alert('Data Mahasiswa Gagal Disimpan');
                    document.location.href = 'Mahasiswa.php';
                </script>";
        }
    }

    // Notifikasi Edit
    if (isset($_POST['Edit'])) {
        if(update_mahasiswa($_POST) > 0) {
            echo "<script> let timerInterval;
        Swal.fire({
            position: 'top-middle',
            icon: 'success',
            title: 'Data Mahasiswa Berhasil diubah',
            showConfirmButton: false,
            timer: 1500,
            didOpen: () => {
                const timer = Swal.getPopup().querySelector('b');
                timerInterval = setInterval(() => {
                }, 100);
            },
            willClose: () => {
                window.location = 'Mahasiswa.php'
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
                    alert('Data Mahasiswa Gagal Diubah');
                    document.location.href = 'Mahasiswa.php';
                </script>";
        }
    }
    // Notification Hapus
    if(isset($_POST['Hapus'])) {
       if (delete_mahasiswa() > 0) {
        echo "<script> let timerInterval;
        Swal.fire({
            position: 'top-middle',
            icon: 'success',
            title: 'Data Mahasiswa Berhasil dihapus',
            showConfirmButton: false,
            timer: 1500,
            didOpen: () => {
                const timer = Swal.getPopup().querySelector('b');
                timerInterval = setInterval(() => {
                }, 100);
            },
            willClose: () => {
                window.location = 'Mahasiswa.php'
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
                    alert('Data Mahasiswa Gagal dihapus');
                    document.location.href = 'Mahasiswa.php';
                </script>";
        }
    }
?>

<div class="container mt-5">
    <h1>Data Mahasiswa</h1>
    <hr>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info mb-5 mt-2 p-2 py-2 fs-5" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class='bx bx-user-plus bx-sm'></i> Tambah Data</button>
    <a href="../model/Export_Excel.php" class="btn btn-success p-1 fs-5 mb-3 float-end" value="Excel"><i class='bx bx-table mx-2 p-1'></i></a>
    <a href="../Model/PrintMahasiswa.php" class="btn btn-danger p-1 fs-5 mb-3 mx-3 float-end" value="PDF"><i class='bx bx-import mx-2 p-1'></i></a>


    <table class=" col-xs-12 table table-bordered table-striped mt-4" id="tabel-data">
        <thead>
            <tr>
                <th scope ="col">No</th>
                <th scope ="col">NIM</th>
                <th scope ="col">Nama Mahasiswa</th>    
                <th style="width: 25%;">Program Studi</th>    
                <th scope ="col">Alamat</th>    
                <th scope ="col">Aksi</th>    
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_mahasiswa as $mahasiswa): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $mahasiswa['nim']; ?></td>
                <td><?= $mahasiswa['nama_mahasiswa']; ?></td>
                <td><?= $mahasiswa['prodi']; ?></td>
                <td><?= $mahasiswa ['alamat']; ?></td>
                <td width="15%" class="text-center">
                    <a href="" class="btn btn-primary col-xs-12 col-md-5 mt-1" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $no ?>"><i class='bx bx-edit'> Edit</i></a>
                    <a href="" class="btn btn-danger col-xs-12 col-md-5 mt-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><i class='bx bx-trash'> Hapus</i></a>
                </td>
            </tr>
                
            <!-- Start Modal Edit -->
            <div class="modal fade" id="modalEdit<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit Mahasiswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            
                    <form action="" method="POST">
                    <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">
                    
                    <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" name="nim" value="<?= $mahasiswa['nim']; ?>" placeholder="Masukkan NIM Anda!">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama mahasiswa</label>
                        <input type="text" class="form-control" name="nama_mahasiswa" value="<?= $mahasiswa['nama_mahasiswa']; ?>" placeholder="Masukkan Nama Anda!">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <input type="text" class="form-control" name="prodi" value="<?= $mahasiswa['prodi']; ?>" placeholder="Masukkan Program Studi Anda!">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3"><?= $mahasiswa['alamat']; ?></textarea>
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
                    <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">
                    
                    <div class="modal-body">
                        <h5 class="text-center">Apakah Anda yakin akan menghapus data ini?<br>
                            <span class="text-danger"><?= $mahasiswa['nama_mahasiswa']; ?></span>
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

    <!-- Start Modal Tambah Mahasiswa -->
    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form action="" method="POST">
        <div class="modal-body">
            
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM Anda!">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda!">
            </div>

            <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <select class="form-select" name="prodi">
                    <option></option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Manajemen Informatika">Manajemen Informatika</option>
                    <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" rows="3"></textarea>
            </div>
          
        </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="simpan" id="simpan">Save Changes</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- End Modal Tambah Mahasiswa-->
</div>



<?php
    include '../layout/footer.php';
?>