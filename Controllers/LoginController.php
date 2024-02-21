<?php 

    function create_account($post) {

        global $db;

        $fullname = $post['fullname'];
        $username = $post['username'];
        $email = $post['email'];
        $password = $post['password'];

        $query = "INSERT INTO users VALUES ('$fullname', '$username', '$email', '$password')";

        mysqli_query($db, $query);

        return mysqli_affected_rows($db);
    }

?>