<?php
// panggil koneksi ke database
require_once 'config/database.php';

// ambil data dari database
$query = "SELECT A.ID_DOMBA,B.JENIS_DOMBA,A.JENIS_KELAMIN,A.HARGA,A.BERAT,A.STATUS_DOMBA
 FROM domba A join jenis_domba B 
 ON A.ID_JENIS=B.ID_JENIS
 ORDER BY harga ASC LIMIT 0, 10";
$sql = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

		<title>Data Domba</title>
	</head>
	<body>

	<div class="jumbotron text-center" style="background:azure; height: 100px;">
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">PBD-SIB2</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="./">Dashboard<span class="sr-only">(current)</span></a></li>
		<li><a href="./domba.php">Data Pemesanan</a></li>
		<li><a href="./domba.php">Data Pembayaran</a></li>
        <li><a href="./domba.php">Data Pengiriman</a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
	  <li><a href="./domba.php">Data Domba</a></li>
	  <li><a href="./domba.php">Data Pelanggan</a></li>
	  <li><a href="./domba.php">Data Pegawai</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	</div>
		<div class="container">
			
			</div>
		
	</body>
</html>