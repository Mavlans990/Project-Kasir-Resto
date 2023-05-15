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
                      <a href="tambah_transaksi.php" class="btn btn-primary">Add Data 
                        <span class="btn-icon-end"><i class="fa fa-plus color-info"></i></span>
                      </a>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Kode</th>
                              <th>Petugas</th>
                              <th>No Meja</th>
                              <th>Total</th>
                              <th>Bayar</th>
                              <th>Kembali</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $nama = $_SESSION['nama_user'];
                            $no = 1;
                            $sql = mysqli_query($koneksi, "SELECT a.*, c.* FROM transaksi AS a
                              JOIN menu    AS c ON a.id_menu = c.id_menu WHERE nama_user = '$nama'");
                            while ($row = mysqli_fetch_assoc($sql)) {    
                              ?>
                              <tr>
                                <td> <?php echo $no++ ?> </td>
                                <td><?= $row['kode_transaksi']?></td>
                                <td><?= $row['nama_user']?></td>
                                <td><?= $row['nomor_meja']?></td>
                                <td><?= "Rp.".rupiah($row['jumlah_total'])?></td>
                                <td><?= "Rp.".rupiah($row['bayar'])?></td>
                                <td><?= "Rp.".rupiah($row['kembali'])?></td>
                                <td>
                                 <div class="d-flex">
                                  <a href="<?= 'tambah_transaksi_lanjut.php?kode=' . $row['kode_transaksi']?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                  <a href="<?= 'hapus_transaksi.php?id=' . $row['kode_transaksi']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                  <a href="<?= 'print_nota.php?kode=' . $row['kode_transaksi']?>" target="_blank" class="btn btn-success shadow btn-xs sharp"><i class="fa fa-print"></i></a>
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