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

function create_buku ($post) {
    
    global $db;

    $kode_buku = $post["kode_buku"];
    $judul_buku = $post["judul_buku"];
    $kategori = $post["kategori"];
    $tgl_pembelian = $post["tgl_pembelian"];
    $harga = $post["harga"];

    // Query tambah data_dosen
    $query = "INSERT INTO buku VALUES (null, '$kode_buku','$judul_buku','$kategori','$tgl_pembelian','$harga')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Fungsi Mengubah data
function update_buku($post)
{
    global $db;

    $id = $post['id'];
    $kode_buku = $post['kode_buku'];
    $judul_buku = $post["judul_buku"];
    $kategori = $post["kategori"];
    $tgl_pembelian = $post["tgl_pembelian"];
    $harga = $post["harga"];

    // Query update Buku
    $query = "UPDATE buku SET kode_buku = '$kode_buku', judul_buku = '$judul_buku', kategori = '$kategori', tgl_pembelian = '$tgl_pembelian', harga = '$harga' WHERE id = '$id'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db); 
}

function delete_buku()
{
    global $db;

    // Query Delete mahasiswa
    $query = "DELETE FROM buku WHERE id = '$_POST[id]'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

?>