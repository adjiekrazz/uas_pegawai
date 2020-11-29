<?php
    if (isset($_POST['tambah'])) {
        // grab form data
        $nama = $_POST['nama'];
        $jk = $_POST['jenis_kelamin'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $agama = $_POST['agama'];
        $alamat = $_POST['alamat'];

        // Query into database
        $sql = "INSERT INTO pegawai (nama, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, alamat) 
                VALUE ('$nama',  '$jk', '$tempat_lahir', '$tanggal_lahir', '$agama', '$alamat')";
        $query = mysqli_query($koneksi, $sql);

        // check if query is success
        if ($query) {
            // if success, redirect to index.php with status = sukses
            header('Location:?page=Tambah-Pegawai&status=sukses');
        } else {
            // if fail, redirect to index.php with status = gagal
            header('Location:?page=Tambah-Pegawai&status=gagal');
        }
    }
?>
<header>
    <h4>Tambah Pegawai Baru</h4>
</header>

<?php
    if ($_GET) {
        if ($_GET['status']) {
            if ($_GET['status'] === 'sukses') {
                echo "
                    <div class='alert alert-success alert-dismissible' role='alert'>
                        Berhasil tambah pegawai!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
            } else if ($_GET['status'] === 'gagal') {
                echo "
                    <div class='alert alert-danger alert-dismissible' role='alert'>
                        Gagal tambah pegawai!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
            }
        }
    }
?>
<form action="" method="post">
    <div class="row">
        <div class="col-xs-12 col-md-4 form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama">
        </div>
        <div class="col-xs-12 col-md-4 form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir">
        </div>
        <div class="col-xs-12 col-md-4 form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal_lahir">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-3 form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label><br>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" checked>
                <label class="form-check-label" for="jenis_kelamin">
                    Laki-laki
                </label>
            </div>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">
                <label class="form-check-label" for="jenis_kelamin">
                    Perempuan
                </label>
            </div>
        </div>
        <div class="col-xs-12 col-md-3 form-group">
            <label for="agama">Agama</label><br>
            <select name="agama">
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katholik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
            </select>
        </div>
        <div class="col-xs-12 col-md-6 form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" rows="2"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
            </div>
        </div>
    </div>
</form>