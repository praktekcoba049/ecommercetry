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
		
		$query2 = "
		SELECT b.JENIS_DOMBA AS JENIS_DOMBA,
    count(*) AS TOTAL_DOMBA,
    sum(case when STATUS_DOMBA = 1 then 1 else 0 end) AS TERJUAL,
    sum(case when STATUS_DOMBA = 0 then 1 else 0 end) AS BELUM_TERJUAL
    FROM domba a inner join jenis_domba b
    ON a.ID_JENIS = b.ID_JENIS
    GROUP BY a.ID_JENIS
		";

		$query3 = "
		SELECT c.NAMA_JABATAN AS JABATAN,
    count(*) AS TOTAL_PEGAWAI,
    sum(case when STATUS_PEGAWAI = 1 then 1 else 0 end) AS AKTIF,
    sum(case when STATUS_PEGAWAI = 0 then 1 else 0 end) AS NON_AKTIF
    from pegawai a INNER JOIN menjabat b
    ON a.ID_PEGAWAI=b.ID_PEGAWAI
    INNER JOIN jabatan c
    ON b.ID_JABATAN=c.ID_JABATAN
   group by c.ID_JABATAN
		";
		
		$query4 = "
		
		";
		

		$sql1 = mysqli_query($db, $query1);
		$sql2 = mysqli_query($db, $query2);
		$sql3 = mysqli_query($db, $query3);
		//$sql4 = mysqli_query($db, $query4);
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
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">PBD-SIB2 (Admin) </a>
    </div>

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



		<div class="column" style="width:auto; margin:auto;" >
  <div class="col-sm-6 col-md-4" style="width:600px; ">
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
				  <div class="panel-heading"><h4 style="text-align:center">INFO STOK</h4></div>
  <div class="panel-body">
  <table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Jenis_Domba</th>
									<th>Total_Domba</th>
									<th>Terjual</th>
									<th>Belum Terjual</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($sql2 as $member2) : ?>
								<tr>
									<td><?php echo $member2['JENIS_DOMBA']; ?></td>
									<td><?php echo $member2['TOTAL_DOMBA']; ?></td>
									<td><?php echo $member2['TERJUAL']; ?></td>
									<td><?php echo $member2['BELUM_TERJUAL']; ?></td>									
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
 				 </div>



			 </div>	
		</div>
        <p>
		</p>
        <p style="text-align:center"><a href="./domba.php" class="btn btn-primary" role="button">Data Domba</a> <a href="#" class="btn btn-default" role="button">TEST</a></p>
      </div>
    </div>
  </div>

  <div class="column" style="width:auto; margin:auto;" >
  <div class="col-sm-6 col-md-4" style="width:600px; ">
    <div class="thumbnail">
      <img src="./branding/client-2.jpg" alt="logos" style="width:90%;">
      <div class="caption">
        <h3 style="text-align:center">Report Pegawai</h3>
		<div class="panel panel-default">
  <div class="panel-heading"><h4 style="text-align:center">Status Pegawai</h4></div>
  <div class="panel-body">
  <table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Jabatan</th>
									<th>Jumlah Pegawai</th>
									<th>Aktif</th>
									<th>Nonaktif</th>
									
								</tr>
							</thead>
							<tbody>
							<?php foreach ($sql3 as $member) : ?>
								<tr>
									<td><?php echo $member['JABATAN']; ?></td>
									<td><?php echo $member['TOTAL_PEGAWAI']; ?></td>
									<td><?php echo $member['AKTIF']; ?></td>
									<td><?php echo $member['NON_AKTIF']; ?></td>									
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
 				 </div>
				  <div class="panel-heading">
					  
				  
				  <h4 style="text-align:center">TEST</h4>
				  <p style="text-align:center"><a href="./pegawai.php" class="btn btn-primary" 
				  role="button">Data Pegawai</a> 
				  <a href="#" class="btn btn-default" role="button">TEST</a></p>

				</div>
			 </div>	
		</div>
        <p>
		</p>
      </div>
    </div>
  </div>
  
  
  <div class="column" style="width:auto; margin:auto;" >
  <div class="col-sm-6 col-md-4" style="width:600px; ">
    <div class="thumbnail">
      <img src="./branding/client-2.jpg" alt="logos" style="width:90%;">
      <div class="caption">
        <h3 style="text-align:center">Report Pegawai</h3>
		<div class="panel panel-default">
  <div class="panel-heading"><h4 style="text-align:center">Status Pegawai</h4></div>
  <div class="panel-body">
  <table class="table table-striped table-bordered">
							<thead>
								<tr>
								<th>Jabatan</th>
									<th>Jumlah Pegawai</th>
									<th>Aktif</th>
									<th>Nonaktif</th>
									
								</tr>
							</thead>
							<tbody>
							<?php foreach ($sql3 as $member) : ?>
								<tr>
									<td><?php echo $member['JABATAN']; ?></td>
									<td><?php echo $member['TOTAL_PEGAWAI']; ?></td>
									<td><?php echo $member['AKTIF']; ?></td>
									<td><?php echo $member['NON_AKTIF']; ?></td>									
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
 				 </div>
				  <div class="panel-heading">			  
				  <h4 style="text-align:center">TEST</h4>
				  <p style="text-align:center"><a href="./pegawai.php" class="btn btn-primary" 
				  role="button">Data Pegawai</a> 
				  <a href="#" class="btn btn-default" role="button">TEST</a></p>
				</div>
			 </div>	
		</div>
        <p>
		</p>
      </div>
    </div>
  </div>


		    </div>
		</div>
	</body>
</html>