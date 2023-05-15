<?php
include 'header.php';
include 'config/koneksi.php';

$id = $_GET['id'];
$sql = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = $id "));

$lvl = $sql['level'];
?>

<div class="content-body">
      <div class="container-fluid">
            <div class="row page-titles">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Components</a></li>
                  </ol>
            </div>
            <!-- row -->
            <div class="row">
                  <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                              <div class="card-header">
                                    <h4 class="card-title">Edit Data User</h4>
                              </div>
                              <div class="card-body">
                                    <div id="smartwizard" class="form-wizard order-create">
                                          <ul class="nav nav-wizard">
                                                <li><a class="nav-link" href="#wizard_Service"> 
                                                      <span>1</span> 
                                                </a></li>
                                                <li><a class="nav-link" href="#wizard_Time">
                                                      <span>2</span>
                                                </a></li>
                                                <li><a class="nav-link" href="#wizard_Details">
                                                      <span>3</span>
                                                </a></li>
                                          </ul>
                                          <div class="tab-content">
                                                <form method="post">
                                                      <input type="hidden" name="id_user" value="<?= $id ?>">
                                                      <div id="wizard_Service" class="tab-pane" role="tabpanel">
                                                            <div class="row">
                                                                  <div class="col-lg-12 mb-2">
                                                                        <div class="mb-3">
                                                                              <label class="text-label form-label">Nama User*</label>
                                                                              <input type="text" name="nama_user" class="form-control" value="<?= $sql['nama_user']; ?>" required="">
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
                                                            </div>
                                                      </div>
                                                      <div id="wizard_Time" class="tab-pane" role="tabpanel">
                                                            <div class="row">
                                                                  <div class="col-lg-12"> 
                                                                        <label class="text-label form-label">Alamat*</label>
                                                                        <textarea class="form-control" rows="1" name="alamat"><?= $sql['alamat']; ?></textarea>
                                                                  </div>
                                                                  <div class="col-lg-6 mb-2">
                                                                        <div class="mb-3">
                                                                              <label class="text-label form-label">No HP*</label>
                                                                              <input type="number" name="no_hp" class="form-control" value="<?= $sql['no_hp']; ?>">
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div id="wizard_Details" class="tab-pane" role="tabpanel">
                                                            <div class="row">
                                                                  <div class="col-lg-6 mb-2">
                                                                        <div class="mb-3">
                                                                              <label class="text-label form-label">Username*</label>
                                                                              <div class="input-group">
                                                                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                                                                    <input type="text" class="form-control" name="username" id="validationCustomUsername" value="<?= $sql['username']; ?>">
                                                                                    <div class="invalid-feedback">
                                                                                          Please Enter a username.
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-lg-6 mb-2">
                                                                        <div class="mb-3">
                                                                              <label class="text-label form-label">Password*</label>
                                                                              <div class="input-group transparent-append">
                                                                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                                                    <input type="password" class="form-control" name="password" id="dlab-password" value="<?= $sql['password']; ?>" >
                                                                                    <span class="input-group-text show-pass"> 
                                                                                          <i class="fa fa-eye-slash"></i>
                                                                                          <i class="fa fa-eye"></i>
                                                                                    </span>
                                                                                    <div class="invalid-feedback">
                                                                                          Please Enter a username.
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-lg-6 mb-2">
                                                                        <label class="text-label form-label">Level *</label><br>

                                                                        <select name="level" class="dropdown-groups" required>
                                                                            <option selected="">-- Pilih Kasir --</option>
                                                                            <option value="Admin" <?= $lvl == 'Admin' ? 'selected' : '' ?> >Admin</option>
                                                                            <option value="Kasir" <?= $lvl == 'Kasir' ? 'selected' : '' ?> >Kasir</option>
                                                                            <option value="Manajer" <?= $lvl == 'Manajer' ? 'selected' : '' ?> >Manajer</option>
                                                                      </select>
                                                                  </div>
                                                            </div>
                                                            <button type="submit" value="Simpan" name="simpan" class="btn me-2 btn-primary">Submit</button>
                                                      </div>
                                                </form>
                                          </div>
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
    //include 'config/koneksi.php';

if (isset($_POST['simpan'])) {
  $nama_user = $_POST['nama_user'];
  $jenkel = $_POST['jenkel'];
  $alamat = $_POST['alamat'];
  $no_hp = $_POST['no_hp'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $level = $_POST['level'];

  $sql = mysqli_query($koneksi, "UPDATE user SET nama_user = '$nama_user', jenkel = '$jenkel', alamat = '$alamat', no_hp = '$no_hp', username = '$username', password = '$password', level = '$level' WHERE id_user = $id ");

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert ("Data Berhasil Di Simpan");
      window.location.href="user.php";
    </script>      
    <?php
  }
}
?>