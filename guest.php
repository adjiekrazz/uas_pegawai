<?php
    require_once('config/config.php');

	$sql = "SELECT * FROM pegawai";
	$query = mysqli_query($koneksi, $sql);
	$i = 1;
?>

<header>
	<h4>Daftar Pegawai</h4>
</header>
<br>
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

<div class="table-responsive">
	<table class="table table-bordered table-sm table-hover">
		<caption>Jumlah pegawai : <?php echo mysqli_num_rows($query) ?></caption>
		<thead class="thead-light">
			<tr>
				<th class="text-center">No</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Tempat & Tanggal Lahir</th>
				<th>Agama</th>
				<th>Alamat</th>
			</tr>
		</thead>
		<tbody>
			<?php 				
				while ($pegawai = mysqli_fetch_array($query)) {
					echo "<tr>";
					echo "<td class='text-center'>" . $i . "</td>";
					echo "<td>" . $pegawai['nama'] . "</td>";
					echo "<td>" . $pegawai['jenis_kelamin'] . "</td>";
					echo "<td>" . $pegawai['tempat_lahir'] . ", ". $pegawai['tanggal_lahir'] ."</td>";
					echo "<td>" . $pegawai['agama'] . "</td>";
					echo "<td>" . $pegawai['alamat'] . "</td>";
					echo "</tr>";
					
					$i++;
				}
			?>
		</tbody>
	</table>
</div>
<a class="btn btn-primary btn-block" href="?page=Tambah-Pegawai&status&pesan" role="button">Tambah Pegawai Baru</a>