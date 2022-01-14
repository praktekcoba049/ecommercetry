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
							<h3 class="text-center">Tambah domba</h3><hr>
							<form role="form" action="../process/tambah_domba_proses.php" method="post">
								<div class="form-group">
								<label for="">Jenis Domba</label>
								  <select name="id_jenis" id="id_jenis" class="form-control">
  									<option disabled selected> Pilih Jenis Domba</option>
										<?php
       									 $records = mysqli_query($db, "SELECT * From jenis_domba WHERE 1");  // Use select query here 

        							    while($data = mysqli_fetch_array($records))
       										 {
           								 echo "<option value='". $data['ID_JENIS'] ."'>" . $data['JENIS_DOMBA'] ."</option>";// Nampilkan data di option menu tambah data
      										  }	?>  
								    </select>
								</div>
								<div class="form-group">
								<label for="">Jenis Kelamin</label>
                                <select name="jeniskelamin" class="form-control" id="jeniskelamin">
                                    <option value="">--Select Kelamin--</option>
                                    <option value=0>Jantan</option>
                                    <option value=1>Betina</option>
                                </select>
								</div>
								<div class="form-group">
									<label for="hargadomba">Harga Domba</label>
									<input type="number" name="hargadomba" class="form-control" id="hargadomba">
								</div>
								<div class="form-group">
									<label for="beratdomba">Berat domba</label>
									<input type="number" name="beratdomba" class="form-control" id="beratdomba">
								</div>
								<div class="form-group">
									<label for="statusdomba">Status Domba</label>
									 <select name="statusdomba" class="form-control" id="statusdomba">
                                    <option value="">--Pilih Status--</option>
                                    <option value=0>Ready</option>
                                    <option value=1>Sold</option>
                                </select>
								</div>
								<div class="form-group">
									<button type="sumbit" name="selesai" class="btn btn-lg btn-success" style="width:49%;"><span class="glyphicon glyphicon-ok-sign"></span> Selesai</button>
									<a href="./domba.php" class="btn btn-lg btn-danger" style="width:49%;"><span class="glyphicon glyphicon-remove-sign"></span> Kembali</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>