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
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($koneksi, "SELECT a.*, c.* FROM transaksi AS a
                              JOIN menu    AS c ON a.id_menu = c.id_menu ");
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