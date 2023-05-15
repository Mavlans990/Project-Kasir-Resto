<?php
include 'header.php';
include 'config/koneksi.php';
?>
<div class="content-body">
  <div class="container-fluid">
    <div class="row page-titles">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Form</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Validation</a></li>
      </ol>
    </div>
    <!-- row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Tambah Data Transaksi</h4>
          </div>
          <div class="card-body">
            <div class="basic-form">
              <form class="form-valide-with-icon needs-validation" method="post" >
                <div class="row">
                  <div class="col-xl-5">
                    <div class="mb-3 row">
                      <label class="text-label form-label" for="validationCustomUsername">Dari Tanggal*</label>
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fas fa-calendar"></i> </span>
                        <input type="date" class="form-control" name="dari"  > 
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-5">
                    <div class="mb-3 row">
                      <label class="text-label form-label" for="validationCustomUsername">Sampai Tanggal*</label>
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fas fa-calendar"></i> </span>
                        <input type="date" class="form-control" name="sampai"  > 
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <label class="text-label form-label" for="validationCustomUsername">Tampilkan</label><br>
                    <button type="submit" name="cari" value="Cari" class="btn me-2 btn-primary">Cari</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    if (isset($_POST['cari'])) {
      $dari = $_POST['dari'];
      $sampai = $_POST['sampai'];
      ?>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <!-- <span class="badge-lg badge light badge-primary"> Dari Tanggal : <?= date('d F Y',strtotime($dari)) ?></span>
              <span class="badge-lg badge light badge-danger"> Sampai Tanggal : <?= date('d F Y',strtotime($sampai)) ?></span> -->
              <div class="bootstrap-badge">
                <span class="badge badge-lg light badge-primary">Dari Tanggal : <?= date('d F Y',strtotime($dari)) ?></span>
                <span class="badge badge-lg light badge-danger">Sampai Tanggal : <?= date('d F Y',strtotime($sampai)) ?></span>
              </div>
              <a href="<?= 'print_tanggal.php?dari=' . $dari . '&sampai=' . $sampai ?>" target="_blank" class="btn-sm btn me-2 btn-primary">Cetak</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                 <thead>
                  <tr>
                    <th class="center">No</th>
                    <th class="left">Nama Kasir</th>
                    <th class="center">Tgl Transaksi</th>
                    <th class="right">No Transaksi</th>
                    <th class="right">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $sql = mysqli_query($koneksi, "SELECT a.*, b.* FROM transaksi a
                    JOIN menu             AS b ON a.id_menu = b.id_menu WHERE tgl_transaksi BETWEEN '$dari' AND '$sampai' ");
                  while ($row = mysqli_fetch_assoc($sql)) {
                    ?>
                    <tr>
                      <td class="center"><?php echo $no++ ?></td>
                      <td class="left"><?= $row['nama_user']?></td>
                      <td class="center"><?= $row['tgl_transaksi']?></td>
                      <td class="right"><?= $row['kode_transaksi']?></td>
                      <td class="right"><?= $row['jumlah_total']?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-5"> </div>
              <div class="col-lg-4 col-sm-5 ms-auto">
                <table class="table table-clear">
                  <tbody>
                    <tr>
                      <?php
                      $bayar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(jumlah_total) AS total FROM transaksi WHERE tgl_transaksi BETWEEN '$dari' AND '$sampai' "));
                      ?>
                      <td class="left"><strong>Total Pemasukan</strong></td>
                      <td class="right"><input type="text" name="jumlah_total" class="form-control" value="<?= "Rp.".rupiah($bayar['total']) ?>" readonly>  </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  <?php } ?>

</div>
</div>

<?php
include 'footer.php'
?>

