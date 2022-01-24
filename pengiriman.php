<?php
// panggil koneksi ke database
require_once 'config/database.php';

// ambil data dari database
$query = "SELECT A.NO_RESI,
A.ID_PEGAWAI,
A.ID_PEMBAYARAN,
C.NAMA_PENERIMA,
C.JASA_KURIR,
C.LAYANAN_KURIR,
A.TGL_PENGIRIMAN,
A.STATUS_PENGIRIMAN
FROM pengiriman A INNER JOIN pembayaran B
ON A.ID_PEMBAYARAN=B.ID_PEMBAYARAN
INNER JOIN pemesanan C 
ON B.ID_PEMESANAN=C.ID_PEMESANAN
ORDER BY ID_PEMBAYARAN LIMIT 99";
$sql = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

		<title>Data Pengiriman</title>
		
		
		<style>
.dropbtn {
  background-color: #4ca8af;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>
		
		
		
		
		
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
      <a class="navbar-brand" href="#">PBD-SIB2 (Admin)</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="./">Dashboard<span class="sr-only">(current)</span></a></li>
		<div class="dropdown">
		<button class="dropbtn" style="margin-left:15px">Data Transaksi</button>
			<div class="dropdown-content">
				<li><a href="./pemesanan.php">Data Pemesanan</a></li>
				<li><a href="./pembayaran.php">Data Pembayaran</a></li>
				<li><a href="./pengiriman.php">Data Pengiriman</a></li>
			</div>
		</div>

		<div class="dropdown">
		<button class="dropbtn" style="margin-left:15px">Data Master</button>
			<div class="dropdown-content">
				<li><a href="./domba.php">Data Domba</a></li>
				<li><a href="./pegawai.php">Data Pegawai</a></li>
				<li><a href="./pelanggan.php">Data Pelanggan</a></li>
			</div>
		</div>

      </ul>
     
      <ul class="nav navbar-nav navbar-right">
	  
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>	
	</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="text-center">
						<h3>Data Shipment SIB2 grup</h3><hr>
						<p style="padding:10pt 0pt 0pt 10pt;">
							<a href="pages/tambah_domba.php" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah domba</a>
						</p>
					</div>
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>NO_RESI</th>
									<th>ID_PEGAWAI</th>
									<th>ID_PEMBAYARAN</th>
									<th>Penerima</th>
									<th>Jasa Kurir</th>
									<th>Layanan Kurir</th>
									<th>Tanggal</th>
									<th>Status</th>
									
								</tr>
							</thead>
							<tbody>
							<?php foreach ($sql as $member) : ?>
								<tr>
									<td><?php echo $member['NO_RESI']; ?></td>
									<td><?php echo $member['ID_PEGAWAI']; ?></td>
									<td><?php echo $member['ID_PEMBAYARAN']; ?></td>
									<td><?php echo $member['NAMA_PENERIMA']; ?></td>
									<td><?php echo $member['JASA_KURIR']; ?></td>
									<td><?php echo $member['LAYANAN_KURIR']; ?></td>					
									<td><?php echo $member['TGL_PENGIRIMAN']; ?></td>
								    <td><?php $member['STATUS_PENGIRIMAN'];
									if($member['STATUS_PENGIRIMAN']==1){
										echo "Terkirim";
									}
									else {
										echo "Sedang Dalam Proses";
									}

									?></td>
									<td>
										<a href="pages/edit_domba.php?id=<?php echo $member['NO_RESI']; ?>
										" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"> Edit</span></a>
										<a href="process/hapus_domba_proses.php?id=<?php echo $member['NO_RESI']; ?>
										" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"> Hapus</span></a>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>