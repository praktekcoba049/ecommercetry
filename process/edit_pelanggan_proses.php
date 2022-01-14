<?php // proses edit member

// panggil koneksi ke database
require_once '../config/database.php';

if (isset($_POST['selesai'])) { // di submit atau tidak ?
	
	// ambil data dari edit_member.php
	$iddomba = $_GET['id'];
	$harga = $_POST['hargadomba'];
	$berat= $_POST['beratdomba'];
    $status= $_POST['statusdomba'];

	// perbarui data di database
	$query = "UPDATE domba SET HARGA = '$harga', BERAT = '$berat', STATUS_DOMBA = '$status' WHERE ID_DOMBA = '$iddomba'";
	$sql = mysqli_query($db, $query);
	
	if ($sql) {
		header('location: ../index.php');
	} else {
		echo "update data gagal";
	}
	
}

?>