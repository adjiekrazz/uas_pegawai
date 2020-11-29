<?php

    if (!isset($_SESSION['status'])) {
        header('location:../');
    }
?>

<header>
	<h4>Daftar Pegawai</h4>
</header>
<?php
if ($_GET) {
	if ($_GET['status']) {
		switch ($_GET['status']) {
			case 'suksesEdit':
				echo "
					<div class='alert alert-success alert-dismissible' role='alert'>
						Berhasil edit pegawai.
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
					</div>";
			break;
			case 'suksesHapus':
				echo "
					<div class='alert alert-success alert-dismissible' role='alert'>
						Berhasil hapus pegawai.
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
					</div>";
			break;
			case 'gagalEdit':
				echo "
					<div class='alert alert-danger alert-dismissible' role='alert'>
						Gagal edit pegawai.
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
					</div>";
			break;
			case 'gagalHapus':
				echo "
					<div class='alert alert-danger alert-dismissible' role='alert'>
						Gagal hapus pegawai.
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
					</div>";
			break;
			default:
				echo '';
			break;
		}
	}
}
?>

<div class="table-responsive">
<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Tempat & Tanggal Lahir</th>
				<th>Agama</th>
				<th>Alamat</th>
				<th>Tindakan</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$sql = "SELECT * FROM pegawai";
				$query = mysqli_query($koneksi, $sql);
				$i = 1;
				
				while ($pegawai = mysqli_fetch_array($query)) {
					echo "<tr>";
					echo "<td class='center'>" . $i . "</td>";
					echo "<td>" . $pegawai['nama'] . "</td>";
					echo "<td>" . $pegawai['jenis_kelamin'] . "</td>";
					echo "<td>" . $pegawai['tempat_lahir'] . ", ". $pegawai['tanggal_lahir'] ."</td>";
					echo "<td>" . $pegawai['agama'] . "</td>";
					echo "<td>" . $pegawai['alamat'] . "</td>";
					echo "<td>";
					echo "<a href='?page=Edit-Pegawai&id=" . $pegawai['id'] ."' target='_self'>Edit</a>";
					echo "&nbsp;-&nbsp;";
					echo "<a href='?page=Hapus-Pegawai&id=" . $pegawai['id'] ."' target='_self'>Hapus</a>";
					echo "</td>";
					echo "</tr>";
					
					$i++;
				}
			?>
		</tbody>
	</table>
</div>
<p>
	Jumlah yang mendaftar : <?php echo mysqli_num_rows($query) ?>
</p>
<a class="btn btn-primary btn-block" href="?page=Tambah-Pegawai&status" role="button">Tambah Pegawai Baru</a>