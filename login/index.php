<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body>
    <?php
        include "../navbar.php";
    ?>
    <div class="container d-flex h-100 justify-content-center">
        <div class="row justify-content-center align-self-center w-100">
            <div class="col-xs-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <!-- check notification message -->
                        <?php
                            if (isset($_GET['pesan'])) {
                                switch($_GET['pesan']) {
                                    case 'gagal':
                                        echo "
                                            <div class='alert alert-danger alert-dismissible' role='alert'>
                                                Login Gagal! <br> Username atau password salah. <a href=../index.php>Ke Halaman Utama</a>
                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>";
                                        break;
                                    case 'logout':
                                        echo "
                                            <div class='alert alert-success alert-dismissible' role='alert'>
                                                Anda berhasil logout!. <a href=../index.php>Ke Halaman Utama</a>
                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>";
                                        break;
                                    default:
                                        echo "
                                            <div class='alert alert-warning' role='alert'>
                                                Anda harus login untuk mengakses halaman ini.
                                            </div>";
                                        break;
                                }
                            }
                        ?>
                        <form action="proses-login.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Masukkan Nama Pengguna" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password"  placeholder="Masukkan Kata Sandi" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>