<?php
// panggil koneksi ke database
require_once 'config/database.php';

// ambil data dari database
$query = "
SELECT 
A.ID_PEMESANAN,
B.NAMA_PEGAWAI,
A.ID_KOTA,
A.NAMA_PENERIMA,
A.ALAMAT_PENERIMA,	
A.KODE_POS_PENERIMA,
A.JASA_KURIR,	
A.LAYANAN_KURIR,	
A.TGL_PESAN,			
A.JENIS_BAYAR,		
A.ONGKOS_KIRIM,		
A.TOTAL_HARGA,	   
A.STATUS_TRANSAKSI
from pemesanan A INNER JOIN pegawai B
ON A.ID_PEGAWAI=B.ID_PEGAWAI
GROUP BY A.ID_PEMESANAN
";
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
						<h3>Data Pemesanan SIB2 grup</h3><hr>
						<p style="padding:10pt 0pt 0pt 10pt;">
							<a href="pages/tambah_domba.php" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-plus"></span> TEST </a>
						</p>
					</div>
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>ID Pemesanan</th>
									<th>Nama Pegawai</th>
									<th>ID Kota</th>
									<th>Nama Penerima</th>
									<th>Alamat penerima</th>
									<th>Kode Pos Penerima</th>
									<th>Jasa Kurir</th>
									<th>Layanan Kurir</th>
									<th>Tanggal Pesan</th>
									<th>Metode Bayar</th>
									<th>Ongkos Kirim</th>
									<th>Total Harga</th>
									<th>Status Transaksi</th>
									<th>Aksi</th>

								</tr>
							</thead>
							<tbody>
							<?php foreach ($sql as $member) : ?>
								<tr>
									<td><?php echo $member['ID_PEMESANAN']; ?></td>
									<td><?php echo $member['NAMA_PEGAWAI']; ?></td>		
									<td><?php echo $member['ID_KOTA']; ?></td>
									<td><?php echo $member['NAMA_PENERIMA']; ?></td>
									<td><?php echo $member['ALAMAT_PENERIMA']; ?></td>
									<td><?php echo $member['KODE_POS_PENERIMA']; ?></td>		
									<td><?php echo $member['JASA_KURIR']; ?></td>
									<td><?php echo $member['LAYANAN_KURIR']; ?></td>
									<td><?php echo $member['TGL_PESAN']; ?></td>
									<td><?php echo $member['JENIS_BAYAR']; ?></td>		
									<td><?php echo $member['ONGKOS_KIRIM']; ?></td>
									<td><?php echo $member['TOTAL_HARGA']; ?></td>
									<td><?php echo $member['STATUS_TRANSAKSI']; ?></td>
									<td>
										<a href="pages/edit_domba.php?id=<?php echo $member['ID_PEMESANAN']; ?>
										" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"> Edit</span></a>
										<a href="process/hapus_domba_proses.php?id=<?php echo $member['ID_PEMESANAN']; ?>
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