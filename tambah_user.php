<?php
include 'header.php';
include 'config/koneksi.php';
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
                                    <h4 class="card-title">Tambah Data User</h4>
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
                                                      <div id="wizard_Service" class="tab-pane" role="tabpanel">
                                                            <div class="row">
                                                                  <div class="col-lg-12 mb-2">
                                                                        <div class="mb-3">
                                                                              <label class="text-label form-label">Nama User*</label>
                                                                              <input type="text" name="nama_user" class="form-control" placeholder="Enter Name..." required="">
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-lg-6 mb-2">
                                                                        <label class="text-label form-label">Jenis Kelamin*</label><br>

                                                                        <label class="radio-inline me-3">
                                                                              <input class="form-check-input" type="radio" name="jenkel" value="Laki-Laki"> Laki-Laki
                                                                        </label>

                                                                        <label class="radio-inline me-3">
                                                                              <input class="form-check-input" type="radio" name="jenkel" value="Perempuans"> Perempuan
                                                                        </label>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div id="wizard_Time" class="tab-pane" role="tabpanel">
                                                            <div class="row">
                                                                  <div class="mb-3">
                                                                        <label class="text-label form-label">Alamat*</label>
                                                                        <textarea class="form-control" rows="4" name="alamat" id="comment"></textarea>
                                                                  </div>
                                                                  <div class="col-lg-6 mb-2">
                                                                        <div class="mb-3">
                                                                              <label class="text-label form-label">No HP*</label>
                                                                              <input type="text" name="no_hp" class="form-control" required="">
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
                                                                                    <input type="text" class="form-control" name="username" id="validationCustomUsername" placeholder="Enter a username.." required="">
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
                                                                                    <input type="password" class="form-control" name="password" id="dlab-password" placeholder="Choose a safe one.." required="">
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
                                                                            <option value="Admin">Admin</option>
                                                                            <option value="Kasir">Kasir</option>
                                                                            <option value="Manajer">Manajer</option>
                                                                      </select>
                                                                </div>
                                                                <div class="col-lg-6 mb-2">
                                                                 <label class="text-label form-label">Level *</label>
                                                                 <div class="input-group mb-3">
                                                                  <span class="input-group-text">Upload</span>
                                                                  <div class="form-file">
                                                                        <input type="file" class="form-file-input form-control">
                                                                  </div>
                                                            </div>
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
if (isset($_POST['simpan'])) {
    $nama_user = $_POST['nama_user'];
    $jenkel = $_POST['jenkel'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $sql = mysqli_query($koneksi, " INSERT INTO user VALUES('', '$nama_user', '$jenkel', '$alamat', '$no_hp', '$username', '$password', '$level')");

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