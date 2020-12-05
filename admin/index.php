<?php

    if (!isset($_SESSION['status'])) {
        header('location:../');
    }
?>
Anda login sebagai <?= $_SESSION['username'] ?>.