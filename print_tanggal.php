<?php
include 'config/koneksi.php';

$dari = $_GET['dari'];
$sampai = $_GET['sampai'];
$data = mysqli_query($koneksi, "SELECT a.*, b.* FROM transaksi a
	JOIN menu             AS b ON a.id_menu = b.id_menu WHERE tgl_transaksi BETWEEN '$dari' AND '$sampai' ");
$no=1;
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
		<div class="col-lg-12">
			<div class="container-fluid">
				<center>
					<h3>Rekap Data Transaksi Berdasarkan Tanggal</h3>
					<h5>Aplikasi Resto</h5>
				</center>
				<p>Dari Tanggal : <?= $dari ?></p>
				<p>Sampai Tanggal : <?= $sampai ?></p>
				<br>

				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Kasir</th>
								<th>Tgl Transaksi</th>
								<th>No Transaksi</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
							while ($row = mysqli_fetch_assoc($data)) {
								?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $row['nama_user'] ?></td>
									<td><?= $row['tgl_transaksi'] ?></td>
									<td><?= $row['kode_transaksi'] ?></td>
									<td><?= $row['jumlah_total'] ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	window.print();
</script>
</html>