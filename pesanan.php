<?php
include 'header.php';
include 'config/koneksi.php';

$detail = mysqli_query($koneksi, "SELECT * FROM detail_pesanan");
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
                      <a href="tambah_pesanan.php" class="btn btn-primary">Add Data 
                        <span class="btn-icon-end"><i class="fa fa-plus color-info"></i></span>
                      </a>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Kode Pesanan</th>
                              <th>Nama Pegawai</th>
                              <th>No Meja</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($koneksi, "SELECT a.*, b.nama_pegawai, c.nomor_meja FROM pesanan AS a
                              JOIN pegawai AS b ON a.id_pegawai = b.id_pegawai
                              JOIN meja    AS c ON a.id_meja = c.id_meja");
                            while ($row = mysqli_fetch_assoc($sql)) {    
                              ?>
                              <tr>
                                <td> <?php echo $no++ ?> </td>
                                <td><?= $row['kode_pesanan']?></td>
                                <td><?= $row['nama_pegawai']?></td>
                                <td><?= $row['nomor_meja']?></td>
                                <td>
                                 <div class="d-flex">
                                  <a href="<?= 'tambah_pesanan_lanjut.php?kode=' . $row['kode_pesanan']?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                  <a href="<?= 'hapus_pesanan.php?id=' . $row['kode_pesanan']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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