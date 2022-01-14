<?php // proses edit member

// panggil koneksi ke database
require_once '../config/database.php';

if (isset($_POST['selesai'])) { // di submit atau tidak ?
	
	// ambil data dari edit_member.php
	$idpegawai = $_GET['id'];
	$nama = $_POST['namepeg'];
	$alamat= $_POST['addrpeg'];
    $status= $_POST['statuspeg'];

	// perbarui data di database
	$query = "UPDATE pegawai
	 SET NAMA_PEGAWAI = '$nama',
	  	ALAMAT_PEGAWAI = '$alamat',
	   STATUS_PEGAWAI = '$status' 
	   WHERE ID_PEGAWAI = '$idpegawai'
	   ";
	$sql = mysqli_query($db, $query);
	
	if ($sql) {
		header('location: ../pegawai.php');
	} else {
		echo "update data gagal";
	}
	
}

?>