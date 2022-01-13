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
									<select name="id_jenis" id="id_jenis">
  <option disabled selected> Pilih Jenis Domba</option>
<?php
        include "dbConn.php";  // Using database connection file here
        $records = mysqli_query($db, "SELECT ID_JENIS From jenis_domba");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['ID_JENIS'] ."'>" .$data['ID_JENIS'] ."</option>";  // displaying data in option menu
        }	
    ?>  
 
  </select>
								</div>
								<div class="form-group">
									<label for="jeniskelamin">Jenis Kelamin</label>
									<input type="number" name="jeniskelamin" class="form-control" id="jeniskelamin">
								</div>
								<div class="form-group">
									<label for="hargadomba">Harga Domba</label>
									<input type="number" name="hargadomba" class="form-control" id="hargadomba">
								</div>
								<div class="form-group">
									<label for="beratdomba">berat domba</label>
									<input type="number" name="beratdomba" class="form-control" id="beratdomba">
								</div>
								<div class="form-group">
									<label for="statusdomba">status domba</label>
									<input type="number" name="statusdomba" class="form-control" id="statusdomba">
								</div>
								
								<div class="form-group">
									<button type="sumbit" name="selesai" class="btn btn-lg btn-success" style="width:49%;"><span class="glyphicon glyphicon-ok-sign"></span> Selesai</button>
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