<?php
include 'header.php';
include 'config/koneksi.php';

$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT a.*, b.* FROM transaksi AS a 
  JOIN meja AS b ON a.id_meja = b.id_meja WHERE id_transaksi = $id ");
$data = mysqli_fetch_assoc($sql);
?>
<div class="content-body">
  <div class="container-fluid">
    <div class="row page-titles">
     <ol class="breadcrumb">
      <li class="breadcrumb-item active"><a href="javascript:void(0)">Form</a></li>
      <li class="breadcrumb-item"><a href="javascript:void(0)">Validation</a></li>
    </ol>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Data Transaksi</h4>
        </div>
        <div class="card-body">
          <div class="basic-form">
            <form class="form-valide-with-icon needs-validation" method="post" >
              <input type="hidden" name="kode_pesanan" value="<?= $id ?>">
              <div class="row">
                <div class="col-lg-12">
                  <label class="text-label form-label" for="validationCustomUsername">Kode Pesanan</label>
                  <div class="input-group">
                    <span class="input-group-text"> <i class="fa fa-table"></i> </span>
                    <input type="text" class="form-control" name="kode_pesanan" disabled="" value="<?= $data['kode_pesanan'] ?>">
                    <div class="invalid-feedback">
                     Please Enter a username.
                   </div>
                 </div><br>
               </div>
               <div class="col-lg-4">

                <label class="text-label form-label" for="validationCustomUsername">Total</label>
                <div class="input-group">
                  <span class="input-group-text"> <i class="fa fa-table"></i> </span>
                  <input type="text" class="form-control" name="jumlah_total" readonly="" value="<?= $data['jumlah_total'] ?>" id="validationCustomUsername" required="">
                </div>
              </div>
              <div class="col-lg-4">
                <label class="text-label form-label" for="validationCustomUsername">Bayar</label>
                <div class="input-group">
                  <span class="input-group-text"> <i class="fa fa-table"></i> </span>
                  <input type="text" class="form-control" name="bayar" id="bayar" value="<?= $data['bayar'] ?>">
                </div>
              </div>
              <div class="col-lg-4">
                <label class="text-label form-label" for="validationCustomUsername">Tanggal</label>
                <div class="input-group">
                  <span class="input-group-text"> <i class="fa fa-table"></i> </span>
                  <input type="date" class="form-control" name="tgl_transaksi" value="<?= $data['tgl_transaksi'] ?>">
                </div>
              </div>
              <div class="col-xl-4">
                <div class="mb-3 row">
                  <label class="text-label form-label" for="validationCustom01">Nama User*</label>
                  <div class="input-group">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    <select class="default-select wide form-control" id="validationCustom05" name="id_user">
                      <option data-display="-- Pilih --" value="">Pilih User</option>
                      <?php
                      $qr = mysqli_query($koneksi, "SELECT * FROM user");
                      while ($d = mysqli_fetch_assoc($qr)) { 

                        if ($data['id_user'] == $d['id_user']){

                          $sc = 'selected';
                        }else {
                          $sc = '';
                        }
                        ?>
                        <option <?= $sc; ?> value="<?= $d['id_user'] ?>">
                          <?= $d['nama_user'] ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xl-4">
                <div class="mb-3 row">
                  <label class="text-label form-label" for="validationCustom01">Nomer Meja*</label>
                  <div class="input-group">
                    <span class="input-group-text"> <i class="fa fa-table"></i> </span>
                    <select class="default-select wide form-control" id="validationCustom05" name="id_meja">
                      <option data-display="-- Pilih --" value="">Pilih Nomer Meja</option>
                      <?php
                      $qr = mysqli_query($koneksi, "SELECT * FROM meja");
                      while ($d = mysqli_fetch_assoc($qr)) { 

                        if ($data['id_meja'] == $d['id_meja']){

                          $sc = 'selected';
                        }else {
                          $sc = '';
                        }
                        ?>
                        <option <?= $sc; ?> value="<?= $d['id_meja'] ?>">
                          <?= $d['nomor_meja'] ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" name="simpan" value="Simpan" class="btn me-2 btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<?php
include 'footer.php'
?>

<?php
if (isset($_POST['simpan'])) {
  $kode_pesanan = $_POST['kode_pesanan'];
  $id_user = $_POST['id_user'];
  $id_meja = $_POST['id_meja'];
  $tgl_transaksi = $_POST['tgl_transaksi'];
  $jumlah_total = $_POST['jumlah_total'];
  $bayar = $_POST['bayar'];
  $kembali = $bayar - $jumlah_total;


  if ($jumlah_total > $bayar) {
    echo "
    <script>
    alert ('Maaf ,Pembayaran Kurang');
    </script>
    ";
  } else {


    $sql = mysqli_query($koneksi, " UPDATE transaksi SET bayar = '$bayar', tgl_transaksi = '$tgl_transaksi', id_user = '$id_user', id_meja = '$id_meja', kembali = '$kembali' WHERE id_transaksi = $id ");
    if ($sql) {
      echo "
      <script>
      alert('Data Sudah Tersimpan');
      window.location = 'transaksi.php';
      </script>
      ";
    }
  }
}
?>