<?php
    if (isset($_GET['id'])) {
        // grab the id from the url 
        $id = $_GET['id'];

        // sql query for delete data
        $sql = "DELETE FROM pegawai WHERE id =  $id";
        $query = mysqli_query($koneksi, $sql);

        // check if success
        if ($query) {
            header('Location:?page=Daftar-Pegawai&status=suksesHapus');
        } else {
            header('Location:?page=Daftar-Pegawai&status=gagalHapus');
        }
    }
?>