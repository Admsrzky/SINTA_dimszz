<?php 
    include '../layout/header.php';
    include '../layout/Config.php';
    include '../Controllers/TaController.php';

    $query1 = "SELECT * FROM ta";
    $query2 = "SELECT 
                ta.id, ta.no_ta, ta.judul, mahasiswa.nama_mahasiswa as mahasiswa, dosen.nama_dosen as pembimbing
            FROM 
            ta
                LEFT JOIN mahasiswa ON ta.mahasiswa = mahasiswa.id_mahasiswa
                LEFT JOIN dosen ON ta.pembimbing = dosen.id_dosen";

$data_ta = select($query2);
$data_mahasiswa = mysqli_query($db, "SELECT * FROM mahasiswa");
$data_dosen = mysqli_query($db, "SELECT * FROM dosen");

    if (isset($_POST['simpan'])) {
        if (create_ta($_POST) > 0) {
            echo "<script> let timerInterval;
            Swal.fire({
                position: 'top-middle',
                icon: 'success',
                title: 'Data TA Berhasil di Simpan',
                showConfirmButton: false,
                timer: 1500,
                didOpen: () => {
                    const timer = Swal.getPopup().querySelector('b');
                    timerInterval = setInterval(() => {
                    }, 100);
                },
                willClose: () => {
                    window.location = 'ta.php'
                    clearInterval(timerInterval);
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer');
                }
            });</script>";
        
        }
    }

    if (isset($_POST['Edit'])) {
        if (Edit_ta($_POST) > 0) {
            echo "<script> let timerInterval;
            Swal.fire({
                position: 'top-middle',
                icon: 'success',
                title: 'Data TA Berhasil di Edit',
                showConfirmButton: false,
                timer: 1500,
                didOpen: () => {
                    const timer = Swal.getPopup().querySelector('b');
                    timerInterval = setInterval(() => {
                    }, 100);
                },
                willClose: () => {
                    window.location = 'ta.php'
                    clearInterval(timerInterval);
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer');
                }
            });</script>";
        
        }
    }
?>

<div class="container mt-5">
    <h1>Data Tugas Akhir</h1>
    <hr>

    <button type="button" class="btn btn-info mb-5 mt-2 p-2 py-2 fs-5" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class='bx bx-user-plus bx-sm'></i> Tambah Data</button>

    <table class="col-xs-12 table table-bordered table-striped mt-4" id="tabel-data">
        <thead>
            <tr>
                <th>No</th>
                <th>No. TA</th>
                <th>Judul</th>    
                <th>Mahasiswa</th>    
                <th>Pembimbing</th>   
                <th>Aksi</th>    
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_ta as $ta): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $ta['no_ta']; ?></td>
                <td><?= $ta['judul']; ?></td>
                <td><?= $ta['mahasiswa']; ?></td>
                <td><?= $ta['pembimbing']; ?></td>
                <td width="15%" class="text-center">
                    <a href="" class="btn btn-primary col-xs-12 col-md-5 mt-1" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $no ?>"><i class='bx bx-edit'> Edit</i></a>
                    <a href="" class="btn btn-danger col-xs-12 col-md-5 mt-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><i class='bx bx-trash'> Hapus</i></a>
                </td>
            </tr>

            <!-- Start Modal Edit TA -->
            <div class="modal fade" id="modalEdit<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit TA</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <form action="" method="POST">
                    <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $ta['id']; ?>">
                        
                        <div class="mb-3">
                            <label class="form-label">No Tugas Akhir</label>
                            <input type="text" class="form-control" name="no_ta" value="<?= $ta['no_ta']; ?>" placeholder="Masukkan NOTA Anda!">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Judul TA</label>
                            <input type="text" class="form-control" name="judul" value="<?= $ta['judul']; ?>" placeholder="Masukkan Judul TA Anda!">
                        </div>

                        <div class="mb-2">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Nama Mahasiswa</label>
                                <select class="form-select" id="inputGroupSelect01" name="mahasiswa" required>
                                    <?php
                                        $no = 1;
                                        if ($data_mahasiswa == 0) {
                                            echo '<option value="0" selected> - Tidak Ada Data Mahasiswa - </option>';
                                        } else {
                                            echo  '<option selected value="0" style="background-color: lightgrey";> - Pilih Nama Mahasiswa - </option>';
                                            foreach ($data_mahasiswa as $mahasiswa) :
                                        ?>
                                            <option value=" <?php echo $mahasiswa['id_mahasiswa'] ?>"><?php echo $mahasiswa['nim'] ?> - <?php echo $mahasiswa['nama_mahasiswa'] ?></option>
                                            <?php endforeach;
                                        } ?>
                                    </select>
                                </div>
                            </div>

                        <div class="mb-2">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Nama Dosen Pembimbing</label>
                                <select class="form-select" id="inputGroupSelect01" name="pembimbing" required>
                                    <?php
                                        $no = 1;
                                        if ($data_dosen == 0) {
                                            echo '<option value="0" selected> - Tidak Ada Data Dosen - </option>';
                                        } else {
                                            echo '<option selected value="0" style="background-color: lightgrey";> - Pilih Nama Dosen - </option>';
                                            foreach ($data_dosen as $dosen) :
                                        ?>
                                            <option value="<?php echo $dosen['id_dosen'] ?>"><?php echo $dosen['nama_dosen'] ?></option>
                                            <?php endforeach;
                                        } ?>
                                        </select>
                                    </div>
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
            <!-- End Modal Edit TA -->

            <!-- Start Modal Hapus -->
            <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" onclick="Hapus">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                
                        <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $ta['id']; ?>">
                        
                        <div class="modal-body">
                            <h5 class="text-center">Apakah Anda yakin akan menghapus data ini?<br>
                                <span class="text-danger"><?= $ta['judul']; ?></span>
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

<!-- Start Modal Tambah TA -->
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
                <label class="form-label">No Tugas Akhir</label>
                <input type="text" class="form-control" name="no_ta" placeholder="Masukkan NOTA Anda!">
            </div>

            <div class="mb-3">
                <label class="form-label">Judul TA</label>
                <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul TA Anda!">
            </div>

            <div class="mb-2">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Nama Mahasiswa</label>
                    <select class="form-select" id="inputGroupSelect01" name="mahasiswa" required>
                        <?php
                            $no = 1;
                            if ($data_mahasiswa == 0) {
                                echo '<option value="0" selected> - Tidak Ada Data Mahasiswa - </option>';
                            } else {
                                echo '<option selected value="0" style="background-color: lightgrey";> - Pilih Nama Mahasiswa - </option>';
                                foreach ($data_mahasiswa as $mahasiswa) :
                            ?>
                                <option value=" <?php echo $mahasiswa['id_mahasiswa'] ?>"><?php echo $mahasiswa['nim'] ?> - <?php echo $mahasiswa['nama_mahasiswa'] ?></option>
                                <?php endforeach;
                            } ?>
                        </select>
                    </div>
                </div>

            <div class="mb-2">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Nama Dosen Pembimbing</label>
                    <select class="form-select" id="inputGroupSelect01" name="pembimbing" required>
                        <?php
                            $no = 1;
                            if ($data_dosen == 0) {
                                echo '<option value="0" selected> - Tidak Ada Data Dosen - </option>';
                            } else {
                                echo '<option selected value="0" style="background-color: lightgrey";> - Pilih Nama Dosen - </option>';
                                foreach ($data_dosen as $dosen) :
                            ?>
                                <option value="<?php echo $dosen['id_dosen'] ?>"><?php echo $dosen['nama_dosen'] ?></option>
                                <?php endforeach;
                            } ?>
                            </select>
                        </div>
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
    <!-- End Modal Tambah TA-->

</div>


<?php 
    include '../layout/footer.php';
?>