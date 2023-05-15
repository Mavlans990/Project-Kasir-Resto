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
                      <a href="tambah_menu_makanan.php" class="btn btn-primary">Add Data 
                        <span class="btn-icon-end"><i class="fa fa-plus color-info"></i></span>
                      </a>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Menu</th>
                              <th>Harga</th>
                              <th style="text-align: center;">Foto</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($koneksi, "SELECT * FROM menu");
                            while ($row = mysqli_fetch_assoc($sql)) {    
                              ?>
                              <tr>
                                <td> <?php echo $no++ ?> </td>
                                <td><?= $row['nama_menu']?></td>
                                <td><?= "Rp.".rupiah($row['harga']) ?></td>
                                <td style="text-align: center;">
                                  <a href="<?= 'images/image-gallery/' . $row['foto']?>" data-sub-html="Demo Description">
                                    <img  src="<?= 'images/image-gallery/'. $row['foto']?>" height="80">
                                  </a>												
                                </td>
                                <td>
                                  <div class="d-flex">
                                  <a href="<?= 'edit_menu_makanan.php?id=' . $row['id_menu']?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                  <a href="<?= 'hapus_menu_makanan.php?id=' . $row['id_menu']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
        <!--**********************************
            Content body end
            ***********************************-->
            <?php
            include 'footer.php'
            ?>