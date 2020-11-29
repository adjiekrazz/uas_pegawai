<?php
    if (!isset($_SESSION['status'])) {
        if ($_GET) {
            if ($_GET['pesan'] === 'logout') {
                header('location:login/index.php?pesan=logout');
            } else {
                header('location:login/index.php?pesan');
            }
        }
        header('location:login/index.php?pesan');
    } else {
        if ($_GET) {
            switch($_GET['page']) {
                case 'Tambah-Pegawai' :
                    if (!file_exists("pages/form-tambah.php")) die ("Sorry, page is not available!");
                    include "pages/form-tambah.php";
                    break;
                case 'Daftar-Pegawai' :
                    if (!file_exists("pages/list-pegawai.php")) die ("Sorry, page is not available!");
                    include "pages/list-pegawai.php";
                    break;
                case 'Edit-Pegawai' :
                    if (!file_exists("pages/form-edit.php")) die ("Sorry, page is not available!");
                    include "pages/form-edit.php";
                    break;
                case 'Hapus-Pegawai' :
                    if (!file_exists("pages/hapus-pegawai.php")) die ("Sorry, page is not available!");
                    include "pages/hapus-pegawai.php";
                    break;
                case 'Logout' :
                    if (!file_exists("pages/logout.php")) die ("Sorry, page is not available!");
                    include "pages/logout.php";
                    break;
                default :
                    if (!file_exists("pages/index.php")) die ("Sorry, page is not available!");
                    include "pages/index.php";
                    break;
           }
        } else {
            include "pages/index.php";
        }
    }
?>