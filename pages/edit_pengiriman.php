<?php // panggil koneksi ke database
require_once '../config/database.php';

$id_domba = $_GET['id'];
$query = "SELECT * FROM domba WHERE ID_DOMBA = '$id_domba'";
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
							<h3 class="text-center">Edit Domba</h3><hr>
							<form role="form" action="../process/edit_domba_proses.php?id=<?php echo $member['ID_DOMBA']?>" method="post">
								
								<div class="form-group">
									<label for="telepon">Harga Domba</label>
									<input type="number" name="hargadomba" class="form-control" id="hargadomba" value="<?php echo $member['HARGA']; ?>">
								</div>

								<div class="form-group">
									<label for="telepon">Berat Domba</label>
									<input type="number" name="beratdomba" class="form-control" id="beratdomba" value="<?php echo $member['BERAT']; ?>">
								</div>

								<div class="form-group">
									<label for="telepon">Status Domba</label>
									<input type="number" name="statusdomba" class="form-control" id="statusdomba" value="<?php echo $member['STATUS_DOMBA']; ?>">
								</div>


								<div class="form-group">
									<button type="submit" name="selesai" class="btn btn-lg btn-success" style="width:49%;"><span class="glyphicon glyphicon-ok-sign"></span> Selesai</button>
									<a href="../index.php" class="btn btn-lg btn-danger" style="width:49%;"><span class="glyphicon glyphicon-remove-sign"></span> Kembali</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>