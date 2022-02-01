<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
		<title>Tambah Data Pemesanan</title>
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
							<form role="form" action="../process/tambah_pemesanan_proses.php" method="post">
							
							
								
								<div class="form-group">
								<label for="">Nama Pegawai</label>
								  <select name="id_pegawai" id="id_pegawai" class="form-control">
  									<option disabled selected>-- Pilih Pegawai --</option>
										<?php
       									 $records = mysqli_query($db, "SELECT * From pegawai WHERE 1");  // Use select query here 

        							    while($data = mysqli_fetch_array($records))
       										 {
           								 echo "<option value='". $data['ID_PEGAWAI'] ."'>" . $data['NAMA_PEGAWAI'] ."</option>";  // displaying data in option menu
      										  }	?>  
								    </select>
								</div>
								
								<div class="form-group">
								<label for="">Kota</label>
								  <select name="id_kota" id="id_kota" class="form-control">
  									<option disabled selected>-- Pilih Kota --</option>
										<?php
       									 $records = mysqli_query($db, "SELECT * From kota WHERE 1");  // Use select query here 

        							    while($data = mysqli_fetch_array($records))
       										 {
           								 echo "<option value='". $data['ID_KOTA'] ."'>" . $data['NAMA_KOTA'] ."</option>";  // displaying data in option menu
      										  }	?>  
								    </select>
								</div>
								
								
								
								<div class="form-group">
									<label for="namapenerima">Nama Penerima</label>
									<input type="text" name="namapenerima" class="form-control" id="namapenerima">
								</div>
								
								
								<div class="form-group">
									<label for="alamatpenerima">Alamat Penerima</label>
									<input type="text" name="alamatpenerima" class="form-control" id="alamatpenerima">
								</div>
								
								<div class="form-group">
									<label for="kodepospenerima">Kode Pos Penerima</label>
									<input type="text" name="kodepospenerima" class="form-control" id="kodepospenerima">
								</div>
								
								
								<div class="form-group">
									<label for="jasakurir">Jasa Kurir</label>
									<input type="text" name="jasakurir" class="form-control" id="jasakurir">
								</div>
								
								<div class="form-group">
									<label for="layanankurir">Layanan Kurir</label>
									<input type="text" name="layanankurir" class="form-control" id="layanankurir">
								</div>
								
								
								<div class="form-group">
									<label for="tanggalpesan">Tanggal & Waktu pesan</label>
									<input type="datetime-local" name="tanggalpesan" class="form-control" id="tanggalpesan">
								</div>
								
								<div class="form-group">
									<label for="jenisbayar">Nama Penerima</label>
									<input type="text" name="jenisbayar" class="form-control" id="jenisbayar">
								</div>
								
								
								<div class="form-group">
									<label for="ongkoskirim">Ongkos Kirim</label>
									<input type="number" name="ongkoskirim" class="form-control" id="ongkoskirim">
								</div>
								
								<div class="form-group">
									<label for="totalharga">Total Harga</label>
									<input type="number" name="totalharga" class="form-control" id="totalharga">
								</div>
								
								
								<div class="form-group">
									<label for="statuspay">Status Pemesanan</label>
									<input type="text" name="statuspay" class="form-control" id="statuspay">
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