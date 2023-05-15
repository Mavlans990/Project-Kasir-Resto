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
                              <th>Pembeli</th>
                              <th>Petugas</th>
                              <th>Tanggal</th>
                              <th>Jml Total</th>
                              <th>Bayar</th>
                              <th>Kembali</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($koneksi, "SELECT a.*, b.*, c.* FROM transaksi AS a
                              JOIN pesanan AS b ON a.kode_pesanan = b.kode_pesanan
                              JOIN user    AS c ON a.id_user = c.id_user");
                            while ($row = mysqli_fetch_assoc($sql)) {    
                              ?>
                              <tr>
                                <td> <?php echo $no++ ?> </td>
                                <td><?= $row['kode_pesanan']?></td>
                                <td><?= $row['nama_pelanggan']?></td>
                                <td><?= $row['nama_user']?></td>
                                <td><?= $row['tgl_transaksi']?></td>
                                <td><?= "Rp.".rupiah($row['jumlah_total'])?></td>
                                <td><?= "Rp.".rupiah($row['bayar'])?></td>
                                <td><?= "Rp.".rupiah($row['kembali'])?></td>
                                <td>
                                 <div class="d-flex">
                                  <a href="<?= 'edit_transaksi.php?id=' . $row['id_transaksi']?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                  <a href="<?= 'hapus_transaksi.php?id=' . $row['id_transaksi']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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