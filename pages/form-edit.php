<?php

    if (!isset($_SESSION['status'])) {
        header('location:../');
    }
    // if id is unavailabe
    if (!isset($_GET)) {
        header('Location:?page=Daftar-Pegawai');
    }

    // grab id from url
    $id = $_GET['id'];

    // take data by id from database
    $sql = "SELECT * FROM pegawai WHERE id = $id";
    $query = mysqli_query($koneksi, $sql);
    $pegawai = mysqli_fetch_assoc($query);

    // if requested data wasn't found
    if (mysqli_num_rows($query) < 1) {
        die("Data tidak ditemukan ..");
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
                    alamat = '$alamat'
                WHERE id = $id";
        $query = mysqli_query($koneksi, $sql);

        // check if update query is success
        if ($query) {
            header('Location:?page=Daftar-Pegawai&status=suksesEdit');
        } else {
            header('Location:?page=Daftar-Pegawai&status=gagalEdit');
        }
    }
?>
<form action="" method="post">
<div class="row">
        <div class="col-xs-12 col-md-4 form-group">
            <label for="nama">Nama</label>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="text" class="form-control" name="nama" value="<?= $pegawai['nama']?>">
        </div>
        <div class="col-xs-12 col-md-4 form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" value="<?= $pegawai['tempat_lahir']?>">
        </div>
        <div class="col-xs-12 col-md-4 form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal_lahir" value="<?= $pegawai['tanggal_lahir']?>">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-3 form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label><br>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" <?= $pegawai['jenis_kelamin'] === 'Laki-laki' ? 'checked' : '' ; ?>>
                <label class="form-check-label" for="jenis_kelamin">
                    Laki-laki
                </label>
            </div>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" <?= $pegawai['jenis_kelamin'] === 'Perempuan' ? 'checked' : '' ; ?>>
                <label class="form-check-label" for="jenis_kelamin">
                    Perempuan
                </label>
            </div>
        </div>
        <div class="col-xs-12 col-md-3 form-group">
            <label for="agama">Agama</label><br>
            <select name="agama">
                <option value="Islam" <?= $pegawai['agama'] === 'Islam' ? 'selected' : '' ; ?>>Islam</option>
                <option value="Kristen" <?= $pegawai['agama'] === 'Kristen' ? 'selected' : '' ; ?>>Kristen</option>
                <option value="Katholik" <?= $pegawai['agama'] === 'Katholik' ? 'selected' : '' ; ?>>Katholik</option>
                <option value="Hindu" <?= $pegawai['agama'] === 'Hindu' ? 'selected' : '' ; ?>>Hindu</option>
                <option value="Budha" <?= $pegawai['agama'] === 'Budha' ? 'selected' : '' ; ?>>Budha</option>
            </select>
        </div>
        <div class="col-xs-12 col-md-6 form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" rows="2"><?= $pegawai['alamat']; ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </div>
        </div>
    </div>
</form>