<?php
// panggil koneksi ke database
require_once 'config/database.php';

// ambil data dari database
$query = "SELECT A.ID_DOMBA,B.JENIS_DOMBA,A.JENIS_KELAMIN,A.HARGA,A.BERAT,A.STATUS_DOMBA
 FROM domba A join jenis_domba B 
 ON A.ID_JENIS=B.ID_JENIS
 ORDER BY harga ASC LIMIT 0, 99";
$sql = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

		<title>Data Domba</title>
		
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
		<button class="dropbtn" style="margin-left:15px">Data Transaksi</button>
		    <div class="dropdown-content">
				<li><a href="./domba.php">Data Domba</a></li>
				<li><a href="./pegawai.php">Data Pegawai</a></li>
				<li><a href="./domba.php">Data Pelanggan</a></li>
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
						<h3>Data domba SIB2 grup</h3><hr>
						<p style="padding:10pt 0pt 0pt 10pt;">
							<a href="pages/tambah_domba.php" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah domba</a>
						</p>
					</div>
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>ID_Domba</th>
									<th>Jenis_Domba</th>
									<th>Jenis_kelamin</th>
									<th>Harga</th>
									<th>Berat</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($sql as $member) : ?>
								<tr>
									<td><?php echo $member['ID_DOMBA']; ?></td>
									<td><?php echo $member['JENIS_DOMBA']; ?></td>
									<td><?php $member['JENIS_KELAMIN'];
									if($member['JENIS_KELAMIN']==1){
										echo "Betina";
									}
									else {
										echo "Jantan";
									}
									
									?></td>
									<td><?php echo $member['HARGA']; ?></td>
									<td><?php echo $member['BERAT']; ?></td>
									<td><?php $member['STATUS_DOMBA'];
									if($member['STATUS_DOMBA']==1){
										echo "Sold";
									}
									else {
										echo "Ready";
									}

									?></td>
									<td>
										<a href="pages/edit_domba.php?id=<?php echo $member['ID_DOMBA']; ?>
										" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"> Edit</span></a>
										<a href="process/hapus_domba_proses.php?id=<?php echo $member['ID_DOMBA']; ?>
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