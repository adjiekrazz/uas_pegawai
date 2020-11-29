<?php
    require_once "config/config.php";
    session_start();

    if (!isset($_SESSION['status'])) {
        header('location:login');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Pegawai</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
        <?php
            include "navbar.php";
        ?>

        <div class="container">
            <div class="card shadow-sm" style="margin-top:6rem;">
                <div class="card-body">
                <?php
                    include "page-router.php";
                ?>
                </div>
            </div>
        </div>

    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>