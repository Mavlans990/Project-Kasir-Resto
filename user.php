<?php
include 'header.php';
include 'config/koneksi.php';
?>
 <!--**********************************
            Content body start
            ***********************************-->
            <div class="content-body">
              <div class="container-fluid">

                <div class="row page-titles">
                 <ol class="breadcrumb">
                  <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Datatable</a></li>
                </ol>
              </div>
              <!-- row -->


              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <a href="tambah_user.php" class="btn btn-primary">Add Data 
                        <span class="btn-icon-end"><i class="fa fa-plus color-info"></i></span>
                      </a>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-responsive-md">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Jenis</th>
                              <th>Username</th>
                              <th>Password</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($koneksi, "SELECT * FROM user");
                            while ($row = mysqli_fetch_assoc($sql)) {    
                              ?>
                              <tr>
                                <td><?= $no++ ?></td>
                                <td><div class="d-flex align-items-center"><img src="images/avatar/1.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no"><?= $row['nama_user'] ?></span></div></td>
                                <td><?= $row['jenkel'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['password'] ?></td>
                                <td>
                                  <div class="d-flex">
                                    <a href="<?= 'edit_user.php?id=' . $row['id_user']?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="<?= 'hapus_user.php?id=' . $row['id_user']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                  </div>
                                </td>
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
          </div>
        </div>
        <!--**********************************
            Content body end
            ***********************************-->
            <?php
            include 'footer.php'
          ?>