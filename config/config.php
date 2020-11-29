<?php
	$server = "localhost";
	$user = "root";
	$password = "";
	$db_name = "uas_pegawai";
	
	$koneksi = mysqli_connect($server, $user, $password, $db_name);
	
	if(!$koneksi) {
		die ("Gagal terhubung ke database " . $server . "!");
	}
?>