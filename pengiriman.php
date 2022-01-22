<?php
// panggil koneksi ke database
require_once 'config/database.php';

// ambil data dari database
$query = "SELECT A.NO_RESI,
A.ID_PEGAWAI,
A.ID_PEMBAYARAN,
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
      <a class="navbar-brand" href="#">PBD-SIB2 (Admin)</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="./">Dashboard<span class="sr-only">(current)</span></a></li>
		<li><a href="./pemesanan.php">Data Pemesanan</a></li>
		<li><a href="./pembayaran.php">Data Pembayaran</a></li>
        <li><a href="./pengiriman.php">Data Pengiriman</a></li>

      </ul>
     
      <ul class="nav navbar-nav navbar-right">
	  <li><a href="./domba.php">Data Domba</a></li>
	  <li><a href="./pegawai.php">Data Pegawai</a></li>
	  <li><a href="./pelanggan.php">Data Pelanggan</a></li>

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