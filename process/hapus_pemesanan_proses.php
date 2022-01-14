<?php // proses hapus domba

// panggil koneksi ke database
require_once '../config/database.php';

if (isset($_GET['id'])) {

	$id_member = $_GET['id'];
	
	// hapus data dari database
	$query = "DELETE FROM domba WHERE ID_DOMBA = '$id_member'";
	$sql = mysqli_query($db, $query);
	
	if ($sql) {
		header('location: ../index.php');
	} else {
		echo "gagal hapus data";
	}
	
}

?>