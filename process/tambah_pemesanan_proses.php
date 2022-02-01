<?php // proses tambah domba

// panggil koneksi ke database
require_once '../config/database.php';

if (isset($_POST['selesai'])) { // di submit atau tidak ?
	//echo "<option value='". $data['city_name'] ."'>" .$data['city_name'] ."</option>";
	// ambil data dari tambah_domba.php
	$idpegawai 	 = $_POST['id_pegawai'];
	$idkota		 = $_POST['id_kota'];
    $namaterima  = $_POST['namapenerima'];
	$addrterima  = $_POST['alamatpenerima'];
	$kposterima  = $_POST['kodepospenerima'];
	$jkurir      = $_POST['jasakurir'];
    $lkurir      = $_POST['layanankurir'];
	$tglpesan    = $_POST['tanggalpesan'];
	$jenispay    = $_POST['jenisbayar'];
	$ongkosend   = $_POST['ongkoskirim'];
    $totalharga  = $_POST['totalharga'];
	$statuspay   = $_POST['statuspay'];
	
	// masukkan data ke database
	$query = "
	INSERT INTO `pemesanan` 
	(`ID_PEGAWAI`, `ID_KOTA`,
	`NAMA_PENERIMA`, `ALAMAT_PENERIMA`, `KODE_POS_PENERIMA`, 
	`JASA_KURIR`, `LAYANAN_KURIR`, `TGL_PESAN`, `JENIS_BAYAR`,
	`ONGKOS_KIRIM`, `TOTAL_HARGA`, `STATUS_TRANSAKSI`)
	VALUES ('$idpegawai', '$idkota', '$namaterima',
	'$addrterima', '$kposterima', '$jkurir', '$lkurir',
	'$tglpesan', '$jenispay', '$ongkosend',
	'$totalharga', '$statuspay')";
	$sql = mysqli_query($db, $query);
	
	if ($sql) {
		header('location: ../index.php');
	} else {
		echo "gagal input data";
	}
	
}

?>

 