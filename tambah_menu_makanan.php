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
          <h4 class="card-title">Tambah Data Menu Makanan  / Minuman</h4>
        </div>
        <div class="card-body">
          <div class="basic-form">
            <form class="form-valide-with-icon needs-validation" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="text-label form-label" for="validationCustomUsername">Menu Makanan  / Minuman*</label>
                <div class="input-group">
                  <span class="input-group-text"> <i class="fa fa-book"></i> </span>
                  <input type="text" class="form-control" name="nama_menu" id="validationCustomUsername"  required=""> 
                </div><br>
                <label class="text-label form-label" for="validationCustomUsername">Harga Menu Makanan  / Minuman*</label>
                <div class="input-group">
                  <span class="input-group-text"> <i class="fa fa-money-check-alt"></i> </span>
                  <input type="text" class="form-control" name="harga" id="validationCustomUsername"  required=""> 
                </div>
                <label class="text-label form-label" for="validationCustomUsername">Foto*</label>
                <div class="input-group">
                  <span class="input-group-text"> <i class="fa fa-money-check-alt"></i> </span>
                  <input type="file" class="form-control" name="foto" id="foto" > 
                </div>
              </div>
              <label class="text-label form-label" for="validationCustomUsername">Kategori*</label>
              <div class="input-group">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                <select class="default-select wide form-control" id="validationCustom05" name="kategori">
                  <option data-display="-- Pilih --" value="">Pilih Kategori</option>
                  <option value="Makanan">Makanan</option>
                  <option value="Minuman">Minuman</option>
                </select>
              </div>
            </div><br>
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
  $nama_menu = $_POST['nama_menu'];
  $harga = $_POST['harga'];
  $kategori = $_POST['kategori'];

  $rand = rand();
  $ekstensi = array('png','jpg','jpeg','jfif');
  $filename = $_FILES['foto']['name'];
  $ukuran = $_FILES['foto']['size'];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);

  if (!in_array($ext, $ekstensi)) {
    echo "Yang Anda Upload Bukan Gambar Atau Foto";
  }else{
    $ex = explode('.', $filename);
    $dot = $ex[1];
    $nm = uniqid().'.'.$dot;

    $sql = mysqli_query($koneksi, "INSERT INTO menu VALUES('', '$nm', '$nama_menu', '$harga', '$kategori')");
    if ($sql) {
      ?>
      <script type="text/javascript">
        alert ("Foto Berhasil Disimpan");
        window.location.href = "menu_makanan.php";
      </script>      
      <?php
    } 
    move_uploaded_file($_FILES['foto']['tmp_name'], 'images/image-gallery/'.$nm);
  }
}
?>