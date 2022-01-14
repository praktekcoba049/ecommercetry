<?php // proses tambah domba

// panggil koneksi ke database
require_once '../config/database.php';

if (isset($_POST['selesai'])) { // di submit atau tidak ?
	//echo "<option value='". $data['city_name'] ."'>" .$data['city_name'] ."</option>";
	// ambil data dari tambah_domba.php
	$idjenis = $_POST['id_jenis'];
	$jenkel = $_POST['jeniskelamin'];
    $harga = $_POST['hargadomba'];
	$berat = $_POST['beratdomba'];
	$status = $_POST['statusdomba'];

	// masukkan data ke database
	$query = "INSERT INTO domba (`ID_JENIS`, `JENIS_KELAMIN`, `HARGA`, `BERAT`, `STATUS_DOMBA`) VALUES ('$idjenis', '$jenkel', '$harga','$berat','$status')";
	$sql = mysqli_query($db, $query);
	
	if ($sql) {
		header('location: ../index.php');
	} else {
		echo "gagal input data";
	}
	
}

?>

 