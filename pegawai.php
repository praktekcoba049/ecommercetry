<?php
// panggil koneksi ke database
require_once 'config/database.php';

// ambil data dari database
$query = "SELECT A.ID_PEGAWAI,A.NAMA_PEGAWAI,
C.NAMA_JABATAN,A.ALAMAT_PEGAWAI,A.STATUS_PEGAWAI
 FROM pegawai A 
 INNER JOIN menjabat B 
 ON A.ID_PEGAWAI=B.ID_PEGAWAI
 INNER JOIN jabatan C
 ON B.ID_JABATAN=C.ID_JABATAN
 group by ID_PEGAWAI
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
						<h3>Data Pegawai SI-B2 grup</h3><hr>
						<p style="padding:10pt 0pt 0pt 10pt;">
							<a href="pages/tambah_pegawai.php" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Pegawai </a>
						</p>
					</div>
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>ID_Pegawai</th>
									<th>Nama_Pegawai</th>
									<th>Jabatan Pegawai</th>
									<th>Alamat Pegawai</th>
									<th>Status Pegawai</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($sql as $member) : ?>
								<tr>
									<td><?php echo $member['ID_PEGAWAI']; ?></td>
									<td><?php echo $member['NAMA_PEGAWAI']; ?></td>
									<td><?php echo $member['NAMA_JABATAN']; ?></td>
									<td><?php echo $member['ALAMAT_PEGAWAI']; ?></td>
									<td><?php $member['STATUS_PEGAWAI'];
									if($member['STATUS_PEGAWAI']==1){
										echo "Aktif";
									}
									else {
										echo "non-Aktif";
									}

									?></td>
									<td>
										<a href="pages/edit_pegawai.php?id=<?php echo $member['ID_PEGAWAI']; ?>
										" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"> Edit </span></a>
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