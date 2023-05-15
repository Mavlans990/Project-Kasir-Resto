<?php
include 'header.php';
include 'config/koneksi.php';

$id = $_GET['id'];
$sql = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai = $id "))
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
          <h4 class="card-title">Edit Data Pegawai</h4>
        </div>
        <div class="card-body">
          <div class="basic-form">
            <form class="form-valide-with-icon needs-validation" method="post" >
              <div class="mb-3">
                <label class="text-label form-label" for="validationCustomUsername">Nama Pegawai*</label>
                <div class="input-group">
                  <span class="input-group-text"> <i class="fa fa-table"></i> </span>
                  <input type="text" class="form-control" name="nama_pegawai" id="validationCustomUsername" value="<?= $sql['nama_pegawai']; ?>">
                </div>
              </div>
              <div class="mb-3">
                <label class="text-label form-label" for="validationCustomUsername">Alamat*</label>
                <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-map"></i> </span>
                  <textarea class="form-control" rows="1" name="alamat"><?= $sql['alamat']; ?></textarea>
                </div>
              </div>
              <div class="mb-3">
                <label class="text-label form-label" for="validationCustomUsername">No Hp*</label>
                <div class="input-group">
                  <span class="input-group-text"> <i class="fas fa-phone"></i> </span>
                  <input type="number" class="form-control" name="no_hp" id="validationCustomUsername" value="<?= $sql['no_hp']; ?>">
                </div>
              </div>
              <div class="col-lg-6 mb-2">
                <label class="text-label form-label">Jenis Kelamin*</label><br>

                <label class="radio-inline me-3">
                  <input class="form-check-input" type="radio" name="jenkel" value="Laki-Laki" 
                  <?php if($sql['jenkel']=='Laki-Laki'){ echo "checked"; } ?> > Laki-Laki
                </label>

                <label class="radio-inline me-3">
                  <input class="form-check-input" type="radio" name="jenkel" value="Perempuan" 
                  <?php if($sql['jenkel']=='Perempuan'){ echo "checked"; } ?> > Perempuan
                </label>
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
  $nama_pegawai = $_POST['nama_pegawai'];
  $jenkel = $_POST['jenkel'];
  $alamat = $_POST['alamat'];
  $no_hp = $_POST['no_hp'];

  $sql = mysqli_query($koneksi, " UPDATE pegawai SET nama_pegawai = '$nama_pegawai', jenkel = '$jenkel', alamat = '$alamat', no_hp = '$no_hp' WHERE id_pegawai = $id ");

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert ("Data Berhasil Di Simpan");
      window.location.href="pegawai.php";
    </script>      
    <?php  
  }
}
?>