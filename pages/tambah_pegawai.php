<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
		<title>Tambah domba</title>
		<?php // proses tambah domba

		// panggil koneksi ke database
		require_once '../config/database.php';
		?>
	</head>
	<body>
		<div class="container-fluid" style="background:linear-gradient(40deg, #90CAF9, #673AB7);">
			<div class="row" style="height:100vh;">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" style="margin-top:10%;">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="text-center">Tambah Pegawai</h3><hr>
							<form role="form" action="../process/tambah_pegawai_proses.php" method="post">
								<div class="form-group">
								<label for="">Nama Pegawai</label>
								<input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai">
								</div>
								<div class="form-group">
								<label for="">Alamat Pegawai</label>
								<input type="text" name="alamat_pegawai" class="form-control" id="alamat_pegawai">
								</div>
								<div class="form-group">
									<label for="">Kode Pos Pegawai</label>
									<input type="text" name="kodepos_pegawai" class="form-control" id="kodepos_pegawai">
								</div>
								<div class="form-group">
									<label for="">Username Pegawai</label>
									<input type="text" name="user_pegawai" class="form-control" id="user_pegawai">
								</div>
								<div class="form-group">
									<label for="">Password Pegawai</label>
									<input type="text" name="pass_pegawai" class="form-control" id="pass_pegawai">
								</div>
								<div class="form-group">
									<label for="">Status Pegawai</label>
									 <select name="status_pegawai" class="form-control" id="status_pegawai">
                                    <option value="">--Pilih Status--</option>
									<option value=1>Aktif</option>
                                    <option value=0>non-Aktif</option>
                                </select>
								</div>
								
								<div class="form-group">
									<button type="sumbit" name="selesai" class="btn btn-lg btn-success" style="width:49%;"><span class="glyphicon glyphicon-ok-sign"></span> Selesai</button>
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