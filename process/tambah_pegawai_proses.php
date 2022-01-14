<?php // proses tambah pegawai

// panggil koneksi ke database
require_once '../config/database.php';

if (isset($_POST['selesai'])) { // di submit atau tidak ?
	// ambil data dari view  tambah_pegawai.php
	$idpeg = $_POST['nama_pegawai'];
	$addrpeg = $_POST['alamat_pegawai'];
    $pospeg = $_POST['kodepos_pegawai'];
	$usepeg = $_POST['user_pegawai'];
	$passpeg = $_POST['pass_pegawai'];
	$statuspeg = $_POST['status_pegawai'];
	// masukkan data ke database
	$query = "INSERT INTO pegawai
	 (`NAMA_PEGAWAI`, `ALAMAT_PEGAWAI`, `KODEPOS_PEGAWAI`,
	  `USERNAMEPEG`,`PASSWORDPEG`, `STATUS_PEGAWAI`)
	   VALUES
	    ('$idpeg', '$addrpeg', '$pospeg','$usepeg','$passpeg','$statuspeg')";
	$sql = mysqli_query($db, $query);
	
	if ($sql) {
		header('location: ../pegawai.php');
	} else {
		echo "gagal input data";
	}
	
}

?>

 