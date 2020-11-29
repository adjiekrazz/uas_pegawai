<?php

    if (!isset($_SESSION['status'])) {
        header('location:../');
    }

    if (isset($_POST['daftar'])) {
        // grab form data
        $nama = $_POST['nama'];
        $jk = $_POST['jenis_kelamin'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $agama = $_POST['agama'];
        $alamat = $_POST['alamat'];

        // Query into database
        $sql = "INSERT INTO pegawai (nama, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, alamat) 
                VALUE ('$nama', '$jk', '$tempat_lahir', '$tanggal_lahir', '$agama', '$alamat')";
        $query = mysqli_query($koneksi, $sql);

        // check if query is success
        if ($query) {
            // if success, redirect to index.php with status = sukses
            header('Location:index.php?status=sukses');
        } else {
            // if fail, redirect to index.php with status = gagal
            header('Location:index.php?status=gagal');
        }
    } else {
        die("Akses Dilarang ..");
    }
?>