<?php 

// include '..layout/Config.php';
// Fungsi menampilkan data
function select($query){
        
    global $db;

    $result = mysqli_query($db, $query);
    $row = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Mahasiswa Start!
// Fungsi menambahkan data_mahasiswa
function create_mahasiswa($post) 
{
    global $db;

    $nim = $post['nim'];
    $nama_mahasiswa = $post['nama'];
    $prodi = $post['prodi'];
    $alamat = $post['alamat'];

    // Query tambah data
    $query = "INSERT INTO mahasiswa VALUES (null,'$nim','$nama_mahasiswa','$prodi','$alamat')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Fungsi Mengubah data
function update_mahasiswa($post)
{
    global $db;

    $id_mahasiswa = $post['id_mahasiswa'];
    $nim = $post['nim'];
    $nama_mahasiswa = $post['nama_mahasiswa'];
    $prodi = $post['prodi'];
    $alamat = $post['alamat'];

    // Query update mahasiswa
    $query = "UPDATE mahasiswa SET nim = '$nim', nama_mahasiswa = '$nama_mahasiswa', prodi = '$prodi', alamat = '$alamat' WHERE id_mahasiswa = '$id_mahasiswa'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Fungsi Menghapus data mahasiswa
function delete_mahasiswa()
{
    global $db;

    // Query Delete mahasiswa
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = '$_POST[id_mahasiswa]'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// End task Mahasiswa
