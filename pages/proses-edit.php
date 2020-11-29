<?php

    if (!isset($_SESSION['status'])) {
        header('location:../');
    }

    // check if btn simpan is clicked
    if (isset($_POST['simpan'])) {
        // grab the form data
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jk = $_POST['jenis_kelamin'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $agama = $_POST['agama'];
        $alamat = $_POST['alamat'];

        // update query into database
        $sql = "UPDATE pegawai SET 
                    nama = '$nama', 
                    jenis_kelamin = '$jk', 
                    tempat_lahir = '$tempat_lahir',
                    tanggal_lahir = '$tanggal_lahir',
                    agama = '$agama',
                    alamat = '$alamat', 
                WHERE id = $id";
        $query = mysqli_query($koneksi, $sql);

        // check if update query is success
        if ($query) {
            header('Location:list-pegawai.php');
        } else {
            die("Gagal simpan perubahan ..");
        }
    } else {
        die("Akses dilarang ..");
    }
?>