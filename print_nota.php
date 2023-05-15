<?php
include 'config/koneksi.php';

$kode = $_GET['kode'];
$data = mysqli_query($koneksi, "SELECT a.*, b.* FROM detail_transaksi a
	JOIN menu AS b ON a.id_menu = b.id_menu WHERE kode_transaksi = '$kode' ");
$row = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM transaksi WHERE kode_transaksi = '$kode'"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cetak Laporan</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
	<link rel="stylesheet" href="vendor/select2/css/select2.min.css">
	<link href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
	<link href="vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">

	<!-- Daterange picker -->
	<link href="vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

	<!-- Form step -->
	<link href="vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet">

	<!-- Datatable -->
	<link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

	<!-- Pick date -->
	<link rel="stylesheet" href="vendor/pickadate/themes/default.css">
	<link rel="stylesheet" href="vendor/pickadate/themes/default.date.css">

	<!-- Style css -->
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col-xl-12">
			<div class="row">
				<div class="col-xl-6">
					<div class="container-fluid">
						<center>
							<h3>Cetak Nota</h3>
							<h5>Aplikasi Resto</h5>
						</center>
						<p>Nama Petugas : <?= $row['nama_user'] ?></p>
						<p>Kode Transaksi : <?= $kode ?></p>
						<p>Tanggal Bayar : <?= $row['tgl_transaksi'] ?></p>
						<p>Bayar : <?= $row['bayar'] ?></p>
						<p>Kembali : <?= $row['kembali'] ?></p>
						<?php
						$bayar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(total_hrg) AS total FROM detail_transaksi WHERE kode_transaksi = '$kode' "));
						?>
						<p>Total Keseluruhan : <?= "Rp.".rupiah($bayar['total']) ?></p>
						<br>

						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Menu</th>
										<th>Jumlah Pesanan</th>
										<th>Total Harga</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no=1;
									while ($row = mysqli_fetch_assoc($data)) {
										?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $row['nama_menu'] ?></td>
											<td><?= $row['jumlah_pesanan'] ?></td>
											<td><?= $row['total_hrg'] ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>

					</div>
				</div>
				<?php
				$kode = $_GET['kode'];
				$data2 = mysqli_query($koneksi, "SELECT a.*, b.* FROM detail_transaksi a
					JOIN menu AS b ON a.id_menu = b.id_menu WHERE kode_transaksi = '$kode' ");
				$row2 = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM transaksi WHERE kode_transaksi = '$kode'"));
				$no2=1;
				?>
				<div class="col-xl-6">
					<div class="container-fluid">
						<center>
							<h3>Cetak Nota</h3>
							<h5>Aplikasi Resto</h5>
						</center>
						<p>Nama Petugas : <?= $row2['nama_user'] ?></p>
						<p>Kode Transaksi : <?= $kode ?></p>
						<p>Tanggal Bayar : <?= $row2['tgl_transaksi'] ?></p>
						<p>Bayar : <?= $row2['bayar'] ?></p>
						<p>Kembali : <?= $row2['kembali'] ?></p>
						<?php
						$bayar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(total_hrg) AS total FROM detail_transaksi WHERE kode_transaksi = '$kode' "));
						?>
						<p>Total Keseluruhan : <?= "Rp.".rupiah($bayar['total']) ?></p>
						<br>

						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Menu</th>
										<th>Jumlah Pesanan</th>
										<th>Total Harga</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no1=1;
									while ($row = mysqli_fetch_assoc($data2)) {
										?>
										<tr>
											<td><?= $no1++ ?></td>
											<td><?= $row['nama_menu'] ?></td>
											<td><?= $row['jumlah_pesanan'] ?></td>
											<td><?= $row['total_hrg'] ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
</body>
<script type="text/javascript">
	window.print();
</script>
</html>