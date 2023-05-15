<?php
include 'header.php';
include 'config/koneksi.php';

$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT max(substring(kode_transaksi, 7)) as maxKode FROM transaksi"));
$kodeBarang = $data['maxKode'];
$noUrut = (int) substr($kodeBarang, 0, 4);
$noUrut++;
$char = "TRS";
$kodeBarang = $char . sprintf("%04s", $noUrut);
$inv = htmlspecialchars($kodeBarang);

?>
<!--**********************************
            Content body start
            ***********************************-->
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
                <form method="post" action="">
                  <div class="row">
                    <div class="col-xl-6 col-lg-12">
                      <div class="card">
                        <div class="card-header">
                          <div>
                            <h4 class="fs-20 font-w700">Pilih Pesanan</h4>
                          </div>
                          <div>
                            <input type="text" class="form-control" name="kode_transaksi" value="<?= $inv ?>" readonly>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="basic-form">
                            <div class="row">
                              <div class="col-xl-16">
                                <div class="row">
                                  <?php
                                  $no = 1;
                                  $sql = mysqli_query($koneksi, "SELECT * FROM menu");
                                  while ($row = mysqli_fetch_assoc($sql)) {
                                    ?>
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                      <div class="new-arrival-product">
                                        <div class="new-arrivals-img-contnent" >
                                          <img class="img-fluid" src="<?= 'images/image-gallery/'. $row['foto']?>"   alt="">
                                        </div>
                                        <div class="new-arrival-content text-center mt-3">
                                          <h4><?= $row['nama_menu'] ?></h4>
                                          <span class="price"><?= "Rp.".rupiah($row['harga']) ?></span>
                                          <div class="input-group mb-3">
                                            <input type="hidden" name="id_menu" value="<?= $row['id_menu'];?>">
                                            <input type="number" name="jumlah_pesanan"  class="form-control">
                                            <input type="hidden" name="jml_harga">
                                            <input type="hidden" name="total_hrg">
                                            <button class="btn btn-primary btn-sm" type="submit" name="simpan" value="Simpan">Tambah</button>
                                          </div>
                                          <br>
                                        </div>
                                      </div>
                                    </div>
                                  <?php } ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <div class="col-xl-6 col-lg-6">
                    <div class="card">
                      <div class="card-header">
                        <div>
                          <h4 class="fs-20 font-w700">Data Pesanan</h4><br>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th class="center">No</th>
                                <th class="right">Menu Makanan</th>
                                <th class="center">Qty</th>
                                <th class="right">Total</th>
                                <th class="right">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="center"></td>
                                <td class="right"></td>
                                <td class="center"></td>
                                <td class="right"></td>
                                <td class="right">
                                  <a href="<?= 'hapus_transaksi.php?id=' . $row['kode_transaksi']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        <!--**********************************
            Content body end
            ***********************************-->
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
        <script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="js/plugins-init/sweetalert.init.js"></script>

        <!-- Daterangepicker -->
        <!-- momment js is must -->
        <script src="vendor/moment/moment.min.js"></script>
        <script src="vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- Material color picker -->
        <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
        <!-- pickdate -->
        <script src="vendor/pickadate/picker.js"></script>
        <script src="vendor/pickadate/picker.time.js"></script>
        <script src="vendor/pickadate/picker.date.js"></script>

        <!-- Apex Chart -->
        <script src="vendor/apexchart/apexchart.js"></script>

        <script src="vendor/chart.js/Chart.bundle.min.js"></script>

        <!-- Chart piety plugin files -->
        <script src="vendor/peity/jquery.peity.min.js"></script>

        <!-- Form validate init -->
        <script src="js/plugins-init/jquery.validate-init.js"></script>

        <!-- Daterangepicker -->
        <script src="js/plugins-init/bs-daterange-picker-init.js"></script>
        <!-- Clockpicker init -->
        <script src="js/plugins-init/clock-picker-init.js"></script>
        <!-- asColorPicker init -->
        <script src="js/plugins-init/jquery-asColorPicker.init.js"></script>
        <!-- Material color picker init -->
        <script src="js/plugins-init/material-date-picker-init.js"></script>
        <!-- Pickdate -->
        <script src="js/plugins-init/pickadate-init.js"></script>


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
        <script src="vendor/lightgallery/js/lightgallery-all.min.js"></script>
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
      document.getElementById('harga').value = prdName[X].harga;

    };
  </script>
  <script type="text/javascript">
    function sum() {
      var txtFirstNumberValue = document.getElementById('jumlah_pesanan').value;
      var txtSecondNumberValue = document.getElementById('harga').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
        document.getElementById('total').value = result;
      }
    }
  </script>
  <script type="text/javascript">
    $('bayar').keyup(function(e) {
      var jumlah_total = parseInt($('total_bayar').html());
      var bayar = parseInt($(this).val());
      var kembali = bayar - jumlah_total;
      $('kembali').html(kembali);
    })
  </script>


</body>
</html>


<?php
if (isset($_POST['simpan'])) {
  $kode_transaksi = $_POST['kode_transaksi'];
  $id_menu = $_POST['id_menu'];
  $id_meja = $_POST['id_meja'];
  $tgl_transaksi = $_POST['tgl_transaksi'];
  $bayar = $_POST['bayar'];
  $jumlah_pesanan = $_POST['jumlah_pesanan'];
  $jml_harga = $_POST['jml_harga'];
  $total_hrg = $_POST['total_hrg'];

  $sql = mysqli_query($koneksi, " INSERT INTO transaksi VALUES( '$kode_transaksi', '', '$id_menu', '', '', '', '', '$jumlah_pesanan', '', '$jml_harga', '$total_hrg')");

  $sql2 = mysqli_query($koneksi, " INSERT INTO detail_transaksi VALUES('', '$kode_transaksi', '', '$id_menu', '$jumlah_pesanan', '$total_hrg')");

  if ($sql ) {
    echo"
    <script>
    alert ('Data Berhasil Di Simpan');
    window.location.href='tambah_transaksi_lanjut.php?kode=" . $kode_transaksi . "';
    </script>   
    "; 

    // echo"
    // <script>
    // alert ('Data Berhasil Di Simpan');
    // window.location.href='transaksi.php';
    // </script>   
    // ";      
  }
}
?>