<?php
    if (!isset($_SESSION['status'])) {
        if ($_GET) {
            if ($_GET['pesan'] === 'logout') {
                header('location:login/index.php?pesan=logout');
            }

            switch($_GET['page']) {
                case 'Tambah-Pegawai' :
                    if (!file_exists("guest-form-tambah.php")) die ("Sorry, page is not available!");
                    include "guest-form-tambah.php";
                    break;
                default :
                    if (!file_exists("guest.php")) die ("Sorry, page is not available!");
                    include "guest.php";
                    break;
           }
        } else {
            include "guest.php";
        }
        // header('location:login/index.php?pesan');
    } else {
        if ($_GET) {
            switch($_GET['page']) {
                case 'Tambah-Pegawai' :
                    if (!file_exists("admin/form-tambah.php")) die ("Sorry, page is not available!");
                    include "admin/form-tambah.php";
                    break;
                case 'Daftar-Pegawai' :
                    if (!file_exists("admin/list-pegawai.php")) die ("Sorry, page is not available!");
                    include "admin/list-pegawai.php";
                    break;
                case 'Edit-Pegawai' :
                    if (!file_exists("admin/form-edit.php")) die ("Sorry, page is not available!");
                    include "admin/form-edit.php";
                    break;
                case 'Hapus-Pegawai' :
                    if (!file_exists("admin/hapus-pegawai.php")) die ("Sorry, page is not available!");
                    include "admin/hapus-pegawai.php";
                    break;
                case 'Logout' :
                    if (!file_exists("admin/logout.php")) die ("Sorry, page is not available!");
                    include "admin/logout.php";
                    break;
                default :
                    if (!file_exists("admin/index.php")) die ("Sorry, page is not available!");
                    include "admin/index.php";
                    break;
           }
        } else {
            include "admin/index.php";
        }
    }
?>