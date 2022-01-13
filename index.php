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
		<div class="jumbotron text-center" style="background:linear-gradient(40deg, #64B5F6, #8E24AA);color:#ffffff;">
			<h1>Peternakan domba FP PBDSI</h1>
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
										echo "Hidup";
									}
									else {
										echo "non-Hidup / Curah";
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