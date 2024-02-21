<?php
    include '../layout/header.php';
    include '../layout/Config.php';
    include '../Controllers/DosenController.php';

    $data_dosen = select("SELECT * FROM dosen");
    
    // Notification Tambah Data
    if (isset($_POST['simpan'])) {
        if (create_dosen($_POST) > 0) {
            echo "<script> let timerInterval;
        Swal.fire({
            position: 'top-middle',
            icon: 'success',
            title: 'Data Dosen Berhasil Disimpan',
            showConfirmButton: false,
            timer: 1500,
            didOpen: () => {
                const timer = Swal.getPopup().querySelector('b');
                timerInterval = setInterval(() => {
                }, 100);
            },
            willClose: () => {
                window.location = 'Dosen.php'
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
                    alert('Data Dosen Gagal Disimpan');
                    document.location.href = 'Dosen.php';
                </script>";
        }
    }

    // Notifikasi Edit
    if (isset($_POST['Edit'])) {
        if(update_dosen($_POST) > 0) {
            echo "<script> let timerInterval;
        Swal.fire({
            position: 'top-middle',
            icon: 'success',
            title: 'Data Dosen Berhasil Diubah',
            showConfirmButton: false,
            timer: 1500,
            didOpen: () => {
                const timer = Swal.getPopup().querySelector('b');
                timerInterval = setInterval(() => {
                }, 100);
            },
            willClose: () => {
                window.location = 'Dosen.php'
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
                    alert('Data Dosen Gagal diubah');
                    document.location.href = 'Dosen.php';
                </script>";
        }
    }
    // Notification Hapus
    if(isset($_POST['Hapus'])) {
       if (delete_dosen() > 0) {
        echo "<script> let timerInterval;
        Swal.fire({
            position: 'top-middle',
            icon: 'success',
            title: 'Data Dosen Berhasil Dihapus',
            showConfirmButton: false,
            timer: 1500,
            didOpen: () => {
                const timer = Swal.getPopup().querySelector('b');
                timerInterval = setInterval(() => {
                }, 100);
            },
            willClose: () => {
                window.location = 'Dosen.php'
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
                    alert('Data Dosen Gagal dihapus');
                    document.location.href = 'Dosen.php';
                </script>";
        }
    }
?>

<div class="container mt-5">
    <h1>Data Dosen</h1>
    <hr>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info mb-5 mt-2 p-2 py-2 fs-5" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class='bx bx-user-plus bx-sm'></i> Tambah Data</button>

    <table class="col-xs-12 table table-bordered table-striped mt-4" id="tabel-data">
        <thead>
            <tr>
                <th scope ="col">No</th>
                <th scope ="col">NIDN</th>
                <th scope ="col">Nama dosen</th>    
                <th scope ="col">Email</th>    
                <th scope ="col">Alamat</th>    
                <th scope ="col">Aksi</th>    
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_dosen as $dosen): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $dosen['nidn']; ?></td>
                <td><?= $dosen['nama_dosen']; ?></td>
                <td><?= $dosen['email']; ?></td>
                <td><?= $dosen ['alamat']; ?></td>
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
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit Dosen</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            
                    <form action="" method="POST">
                    <input type="hidden" name="id_dosen" value="<?= $dosen['id_dosen']; ?>">
                    
                    <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">NIDN</label>
                        <input type="text" class="form-control" name="nidn" value="<?= $dosen['nidn']; ?>" placeholder="Masukkan NIDN Anda!">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Dosen</label>
                        <input type="text" class="form-control" name="nama_dosen" value="<?= $dosen['nama_dosen']; ?>" placeholder="Masukkan Nama Anda!">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="<?= $dosen['email']; ?>" placeholder="Masukkan Email Anda!">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3"><?= $dosen['alamat']; ?></textarea>
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
                    <input type="hidden" name="id_dosen" value="<?= $dosen['id_dosen']; ?>">
                    
                    <div class="modal-body">
                        <h5 class="text-center">Apakah Anda yakin akan menghapus data ini?<br>
                            <span class="text-danger"><?= $dosen['nama_dosen']; ?></span>
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
</table>

   
   

    <!-- Start Modal Tambah Dosen -->
    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Dosen</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form action="" method="POST">
        <div class="modal-body">
            
            <div class="mb-3">
                <label class="form-label">NIDN</label>
                <input type="text" class="form-control" name="nidn" placeholder="Masukkan NIDN Anda!">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Dosen</label>
                <input type="text" class="form-control" name="nama_dosen" placeholder="Masukkan Nama Anda!">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Masukkan Email Anda!">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" rows="3"></textarea>
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