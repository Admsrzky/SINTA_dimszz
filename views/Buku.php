<?php 
    include '../layout/header.php';
    include '../layout/Config.php';
    include '../Controllers/BukuController.php';

    $data_buku = select("SELECT * FROM buku");
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
            <?php endforeach; ?>
        </tbody>
    </table>
</div>




<?php 
    include '../layout/footer.php';
?>