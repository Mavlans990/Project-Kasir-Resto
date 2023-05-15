<?php
include 'header.php';
include 'config/koneksi.php';

$id = $_GET['id'];
$sql = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu = $id "));

$ktg = $sql['kategori'];
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
                <h4 class="card-title">Edit Data Menu Makanan  / Minuman</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form class="form-valide-with-icon needs-validation" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="id_menu" value="<?= $id ?>">
                      <div class="mb-3">
                        <label class="text-label form-label" for="validationCustomUsername">Menu Makanan / Minuman*</label>
                        <div class="input-group">
                            <span class="input-group-text"> <i class="fa fa-book"></i> </span>
                            <input type="text" class="form-control" name="nama_menu" id="validationCustomUsername" value="<?= $sql['nama_menu']; ?>"  required=""> 
                        </div><br>
                        <label class="text-label form-label" for="validationCustomUsername">Harga Menu Makanan  / Minuman*</label>
                        <div class="input-group">
                            <span class="input-group-text"> <i class="fa fa-money-check-alt"></i> </span>
                            <input type="text" class="form-control" name="harga" id="validationCustomUsername" value="<?= $sql['harga']; ?>" required=""> 
                        </div>
                        <label class="text-label form-label" for="validationCustomUsername">Foto*</label><br>
                        <img value="<?= $sql['foto']; ?>" src="<?= 'images/image-gallery/'. $sql['foto']?>" height="100">
                        <div class="input-group">
                            <input type="hidden" name="foto_lama" value="<?= $sql['foto'] ?>">
                            <span class="input-group-text"> <i class="fa fa-money-check-alt"></i> </span>
                            <input type="file" class="form-control" name="foto" id="foto" > 
                        </div>
                        <label class="text-label form-label" for="validationCustomUsername">Kategori*</label>
                        <div class="input-group">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            <select class="default-select wide form-control" id="validationCustom05" name="kategori">
                              <option data-display="-- Pilih --" value="">Pilih Kategori</option>
                              <option value="Makanan" <?= $ktg == 'Makanan' ? 'selected' : '' ?>>Makanan</option>
                              <option value="Minuman" <?= $ktg == 'Minuman' ? 'selected' : '' ?>>Minuman</option>
                          </select>
                      </div>
                  </div><br>
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

    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];

    $ekstensi = array('png','jpg','jpeg');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $foto = $_FILES['foto']['tmp_name'];

    $acak = rand(1, 99);
    $tujuan_foto = $acak . $filename;
    $tempat_foto = 'images/image-gallery/' . $tujuan_foto;
    $lama = $_POST['foto_lama'];

    if ($filename != '') {
        $buat_foto = $tujuan_foto;
        $d = 'images/image-gallery/' . $lama;
        @unlink("$d");
        copy($foto, $tempat_foto);
    }else{
        $buat_foto = $lama;
    }
    $sql = mysqli_query($koneksi, " UPDATE menu SET nama_menu = '$nama_menu', harga = '$harga', kategori = '$kategori', foto = '$buat_foto'  WHERE id_menu = $id ");
    if ($sql) {
        echo "
        <script>
        alert('Data Berhasil Disimpan');
        window.location = 'menu_makanan.php';
        </script>
        ";
    }

}
?>