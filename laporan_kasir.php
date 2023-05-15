<?php
include 'header.php';
include 'config/koneksi.php';
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
            <h4 class="card-title">Tambah Data Transaksi</h4>
          </div>
          <div class="card-body">
            <div class="basic-form">
              <form class="form-valide-with-icon needs-validation" method="post" >
                <div class="row">
                  <div class="col-xl-10">
                    <div class="mb-3 row">
                      <label class="text-label form-label" for="validationCustomUsername">Nama Kasir*</label>
                      <div class="input-group">
                        <select name="kasir" class="dropdown-groups" required onchange="changeValue(this.value)">
                          <option selected="">-- Pilih Kasir --</option>
                          <?php
                          $sql = mysqli_query($koneksi, "SELECT * FROM user where level = 'Kasir' ");
                          $jsArray = "var prdName = new Array();\n";
                          while ($data = mysqli_fetch_array($sql)) {
                          	echo '<option value="' . $data['id_user'] . '">'
                          	. $data['nama_user'] . '</option> ';
                           $jsArray .= "prdName['" . $data['id_user'] . "']={
                            nama:'" . addslashes($data['nama_user']) . "'
                          };\n";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <input type="hidden" class="form-control" name="nama_user" id="nama"> 
                
                <div class="col-lg-2">
                  <label class="text-label form-label" for="validationCustomUsername">Tampilkan</label><br>
                  <button type="submit" name="cari" value="Cari" class="btn me-2 btn-primary">Cari</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST['cari'])) {
    $kasir = $_POST['kasir'];
    $nama = $_POST['nama_user']; 
    ?>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="bootstrap-badge">
              <?php
              $bayar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(jumlah_total) AS total FROM transaksi WHERE nama_user = '$nama' "));
              ?>
              <span class="badge badge-lg light badge-primary">Total Pemasukan : <?= "Rp.".rupiah($bayar['total']) ?></span>
            </div>
            <a href="<?= 'print_kasir.php?nama=' . $nama  ?>" target="_blank" class="btn-sm btn me-2 btn-primary">Cetak</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
               <thead>
                <tr>
                  <th class="center">No</th>
                  <th class="right">Nama Kasir</th>
                  <th class="right">No Transaksi</th>
                  <th class="center">Tgl Transaksi</th>
                  <th class="right">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $sql = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE nama_user = '$nama' ");
                while ($row = mysqli_fetch_assoc($sql)) {
                  ?>
                  <tr>
                    <td class="center"><?php echo $no++ ?></td>
                    <td class="right"><?= $row['nama_user']?></td>
                    <td class="right"><?= $row['kode_transaksi']?></td>
                    <td class="center"><?= $row['tgl_transaksi']?></td>
                    <td class="right"><?= $row['jumlah_total']?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-lg-4 col-sm-5"> </div>
            <div class="col-lg-4 col-sm-5 ms-auto">
              <table class="table table-clear">
                <tbody>
                    <!-- <tr>
                      <?php
                      $bayar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(total_hrg) AS total FROM transaksi WHERE nama_user = '$nama' "));
                      ?>
                      <td class="left"><strong>Total Pemasukan</strong></td>
                      <td class="right"><input type="text" name="jumlah_total" class="form-control" value="<?= $bayar['total'] ?>" readonly>  </td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  <?php } ?>

</div>
</div>

<!--**********************************
            Footer start
            ***********************************-->
            <div class="footer">
              <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignLab</a> 2021</p>
              </div>
            </div>
        <!--**********************************
            Footer end
            ***********************************-->

    <!--**********************************
           Support ticket button start
           ***********************************-->

        <!--**********************************
           Support ticket button end
           ***********************************-->


         </div>
    <!--**********************************
        Main wrapper end
        ***********************************-->

    <!--**********************************
        Scripts
        ***********************************-->
        <!-- Required vendors -->
        <script src="vendor/global/global.min.js"></script>
        <script src="vendor/chart.js/Chart.bundle.min.js"></script>

        <!-- Apex Chart -->
        <script src="vendor/apexchart/apexchart.js"></script>

        <script src="vendor/chart.js/Chart.bundle.min.js"></script>

        <!-- Chart piety plugin files -->
        <script src="vendor/peity/jquery.peity.min.js"></script>

        <!-- Form validate init -->
        <script src="js/plugins-init/jquery.validate-init.js"></script>


        <!-- Form Steps -->
        <script src="vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js"></script>
        <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

        <!-- Datatable -->
        <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="js/plugins-init/datatables.init.js"></script>

        <!-- Dashboard 1 -->
        <script src="js/dashboard/dashboard-1.js"></script>

        <script src="vendor/owl-carousel/owl.carousel.js"></script>

        <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendor/select2/js/select2.full.min.js"></script>
        <script src="js/custom.min.js"></script>
        <script src="js/dlabnav-init.js"></script>
        <script src="js/demo.js"></script>
        <script src="js/styleSwitcher.js"></script>
        <script src="js/plugins-init/select2-init.js"></script>
        <script>
          function cardsCenter()
          {

            /*  testimonial one function by = owl.carousel.js */



            jQuery('.card-slider').owlCarousel({
              loop:true,
              margin:0,
              nav:true,
        //center:true,
        slideSpeed: 3000,
        paginationSpeed: 3000,
        dots: true,
        navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
        responsive:{
          0:{
            items:1
          },
          576:{
            items:1
          },  
          800:{
            items:1
          },      
          991:{
            items:1
          },
          1200:{
            items:1
          },
          1600:{
            items:1
          }
        }
      })
          }

          jQuery(window).on('load',function(){
            setTimeout(function(){
              cardsCenter();
            }, 1000); 
          });

        </script>
        <script>
          $(document).ready(function(){
      // SmartWizard initialize
      $('#smartwizard').smartWizard(); 
    });
  </script>
  <script type="text/javascript">
    <?php echo $jsArray; ?>

    function changeValue(X) {
      document.getElementById('nama').value = prdName[X].nama;
    };
  </script>

</body>
</html>