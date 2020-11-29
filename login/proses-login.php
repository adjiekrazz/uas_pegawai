<?php
    session_start();
    include '../config/config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='". $username ."' AND password='". $password ."'";
    $sql   = mysqli_query($koneksi, $query);

    $cek = mysqli_num_rows($sql);
    
    if ($cek) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'login';
        header('location:../index.php');
    } else {
        var_dump($sql);
        // header('location:index.php?pesan=gagal');
    }
?>