<?php
include 'header.php';
include 'config/koneksi.php';

$id = $_GET['id'];
$sql = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM meja WHERE id_meja = $id "))
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
                    <h4 class="card-title">Edit Data Meja</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form class="form-valide-with-icon needs-validation" method="post" >
                            <div class="mb-3">
                                <label class="text-label form-label" for="validationCustomUsername">Nomer Meja</label>
                                <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-table"></i> </span>
                                    <input type="text" class="form-control" name="nomor_meja" id="validationCustomUsername" value="<?= $sql['nomor_meja']; ?>">
                                    <div class="invalid-feedback">
                                       Please Enter a username.
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
    $nomor_meja = $_POST['nomor_meja'];

    $sql = mysqli_query($koneksi, " UPDATE meja SET nomor_meja = '$nomor_meja' WHERE id_meja = $id ");

    if ($sql) {
        ?>
        <script type="text/javascript">
          alert ("Data Berhasil Di Simpan");
          window.location.href="meja.php";
      </script>      
      <?php  
  }
}
?>