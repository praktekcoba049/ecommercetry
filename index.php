<?php
		require_once 'config/database.php';
		$query1 = "SELECT a.id_jenis,
		b.jenis_domba AS 'nama_domba',
		max(harga) AS 'HARGA_TERTINGGI',
		min(harga) AS 'HARGA_TERENDAH',
		round(avg(HARGA),2) AS 'RATA_RATA'
		from domba a join JENIS_DOMBA b 
		on a.id_jenis=b.id_jenis
		group by ID_JENIS
		order by HARGA DESC
		";




		$sql1 = mysqli_query($db, $query1);
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
      <a class="navbar-brand" href="#">PBD-SIB2 (Admin) </a>
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
	  <li><a href="./pegawai.php">Data Pegawai</a></li>
	  <li><a href="./domba.php">Data Pelanggan</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	</div>
		<div class="container">

		<div class="column">
  <div class="col-sm-6 col-md-4" style="width:600px;">
    <div class="thumbnail">
      <img src="./branding/client-1.jpg" alt="logos" style="width:90%; height:80%;">
      <div class="caption">
        <h3 style="text-align:center">Report Domba</h3>
		<div class="panel panel-default">
  <div class="panel-heading"><h4 style="text-align:center">HARGA</h4></div>
  <div class="panel-body">
  <table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Jenis_Domba</th>
									<th>Harga Tertinggi</th>
									<th>Harga Terendah</th>
									<th>Rata-Rata</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($sql1 as $member) : ?>
								<tr>
									<td><?php echo $member['nama_domba']; ?></td>
									<td><?php echo $member['HARGA_TERTINGGI']; ?></td>
									<td><?php echo $member['HARGA_TERENDAH']; ?></td>
									<td><?php echo $member['RATA_RATA']; ?></td>									
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
 				 </div>
			 </div>	
		</div>
        <p>
		</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  



  



		    </div>
		</div>
	</body>
</html>