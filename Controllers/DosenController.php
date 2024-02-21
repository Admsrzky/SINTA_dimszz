<?php 

function select($query){
        
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Start Dosen
// Fungsi Menambahkan data_dosen
function create_dosen($post)
{
    global $db;

    $nidn = $post["nidn"];
    $nama_dosen = $post["nama_dosen"];
    $email = $post["email"];
    $alamat = $post["alamat"];

    // Query tambah data_dosen
    $query = "INSERT INTO dosen VALUES (null, '$nidn','$nama_dosen','$email','$alamat')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Fungsi Mengubah data
function update_dosen($post)
{
    global $db;

    $id_dosen = $post['id_dosen'];
    $nidn = $post['nidn'];
    $nama_dosen = $post['nama_dosen'];
    $email = $post['email'];
    $alamat = $post['alamat'];

    // Query update mahasiswa
    $query = "UPDATE dosen SET nidn = '$nidn', nama_dosen = '$nama_dosen', email = '$email', alamat = '$alamat' WHERE id_dosen = '$id_dosen'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db); 
}

// Fungsi Menghapus Data Dosen
function delete_dosen()
{
    global $db;

    // Query Delete mahasiswa
    $query = "DELETE FROM dosen WHERE id_dosen = '$_POST[id_dosen]'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
