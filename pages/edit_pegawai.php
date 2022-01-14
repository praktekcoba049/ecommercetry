<?php // panggil koneksi ke database
require_once '../config/database.php';

$id_pegawai = $_GET['id'];
$query = "SELECT * FROM pegawai WHERE ID_PEGAWAI = '$id_pegawai'";
$sql = mysqli_query($db, $query);
$member = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
		<title>Edit domba</title>
	</head>
	<body>
		<div class="container-fluid" style="background:linear-gradient(40deg, #90CAF9, #673AB7);">
			<div class="row" style="height:100vh;">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" style="margin-top:10%;">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="text-center">Edit Pegawai</h3><hr>
							<form role="form" action="../process/edit_pegawai_proses.php?id=<?php echo $member['ID_PEGAWAI']?>" method="post">
								
								<div class="form-group">
									<label for="telepon">Nama Pegawai</label>
									<input type="text" name="namepeg" class="form-control" id="namepeg" value="<?php echo $member['NAMA_PEGAWAI']; ?>">
								</div>

								<div class="form-group">
									<label for="telepon">Alamat Pegawai</label>
									<input type="text" name="addrpeg" class="form-control" id="addrpeg" value="<?php echo $member['ALAMAT_PEGAWAI']; ?>">
								</div>

								<div class="form-group">
									<label for="telepon">Status Pegawai</label>
									<input type="text" name="statuspeg" class="form-control" id="statuspeg" value="<?php echo $member['STATUS_PEGAWAI']; ?>">
								</div>


								<div class="form-group">
									<button type="submit" name="selesai" class="btn btn-lg btn-success" style="width:49%;"><span class="glyphicon glyphicon-ok-sign"></span> Selesai</button>
									<a href="../pegawai.php" class="btn btn-lg btn-danger" style="width:49%;"><span class="glyphicon glyphicon-remove-sign"></span> Kembali</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>