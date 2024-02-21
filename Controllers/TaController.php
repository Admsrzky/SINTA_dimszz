<?php 
    function select($query)
    {    
        global $db;
    
        $result = mysqli_query($db, $query);
        $row = [];
    
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    
        return $rows;
    }

    function create_ta($post)
    {
        global $db;

        $no_ta = $_POST['no_ta'];
        $judul = $_POST['judul'];
        $mahasiswa = $_POST['mahasiswa'];
        $pembimbing = $_POST['pembimbing'];

        // cek apakah mahasiswa dan dosen sudah diisi
        if ($pembimbing == 0 || $mahasiswa == 0) {
            echo "<script> alert('Nama Mahasiswa atau Nama Dosen Belum Dipilih');</script>";
            return mysqli_affected_rows($db);
        }

        $query = "INSERT INTO ta VALUES (null, '$no_ta', '$judul', '$mahasiswa','$pembimbing')";

        mysqli_query($db, $query);

        return mysqli_affected_rows($db);
    }

    function Edit_ta($post)
    {
        global $db;

        $id = $post['id'];
        $no_ta = $post['no_ta'];
        $judul = $post['judul']; 
        $mahasiswa = $post['mahasiswa']; 
        $pembimbing = $post['pembimbing'];

        // cek apakah mahasiswa dan dosen sudah diisi
        if ($pembimbing == 0 || $mahasiswa == 0) {
            echo "<script> alert('Nama Mahasiswa atau Nama Dosen Belum Dipilih');</script>";
            return mysqli_affected_rows($db);
        }

        $query = "UPDATE ta SET no_ta = '$no_ta', judul = '$judul', mahasiswa = '$mahasiswa', pembimbing = '$pembimbing' WHERE id = '$id'";

        mysqli_query($db, $query);

        return mysqli_affected_rows($db);

    }

    function Delete_ta()
{
    global $db;

    // Query Delete mahasiswa
    $query = "DELETE FROM ta WHERE id = '$_POST[id]'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

?>