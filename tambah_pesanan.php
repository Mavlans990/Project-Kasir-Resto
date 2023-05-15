<?php
include 'header.php';
include 'config/koneksi.php';

$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT max(substring(kode_pesanan, 7)) as maxKode FROM pesanan"));
$kodeBarang = $data['maxKode'];
$noUrut = (int) substr($kodeBarang, 0, 4);
$noUrut++;
$char = "PSN";
$kodeBarang = $char . sprintf("%04s", $noUrut);
$inv = htmlspecialchars($kodeBarang);
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
          <h4 class="card-title">Tambah Data Pesanan</h4>
        </div>

        <div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="basic-form">
                  <form class="form-valide-with-icon needs-validation" method="post" >
                    <div class="row">
                      <div class=" form-group">
                        <label>Kode Pesanan*</label>
                        <input class="form-control" type="text" name="kode_pesanan" value="<?= $inv ?>" readonly=""><br>
                      </div>
                      <div class="col-lg-6">
                        <label class="text-label form-label" for="validationCustomUsername">Cari Menu Makanan*</label>
                        <select name="id_menu" id="single-select" required onchange="changeValue(this.value)">
                          <option value="">-- Pilih --</option>
                          <?php
                          $sql = mysqli_query($koneksi, "SELECT * FROM menu");
                          $jsArray = "var prdName = new Array();\n";
                          while ($data = mysqli_fetch_array($sql)) {
                            echo '<option value="' . $data['id_menu'] . '">'
                            . $data['nama_menu'] . '</option> ';
                            $jsArray .= "prdName['" . $data['id_menu'] . "']={
                              nama:'" . addslashes($data['nama_menu']) . "',
                              harga:'" . addslashes($data['harga']) . "'
                            };\n";
                          }
                          ?>
                        </select><br><br><br>
                      </div>
                      <!-- <div class="col-lg-6">
                        <label class="text-label form-label" for="validationCustomUsername">Nama Pelanggan*</label>
                        <div class="input-group">
                          <span class="input-group-text"> <i class="icon-user"></i> </span>
                          <input type="text" name="nama_pelanggan" class="form-control">
                        </div>
                      </div> -->
                      <div class="col-xl-4">
                        <div class="mb-3 row">
                          <label class="text-label form-label" for="validationCustomUsername">Menu Makanan*</label>
                          <div class="input-group">
                            <span class="input-group-text"> <i class="fa fa-book"></i> </span>
                            <input type="text" class="form-control" name="id_menu" id="nama" disabled > 
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-4">
                        <div class="mb-3 row">
                          <label class="text-label form-label" for="validationCustom01">Nama Pegawai*</label>
                          <div class="input-group">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            <select class="default-select wide form-control" id="validationCustom05" name="id_pegawai">
                              <option data-display="-- Pilih --" value="">Pilih Nomer Meja</option>
                              <?php
                              $qr = mysqli_query($koneksi, "SELECT * FROM pegawai");
                              while ($d = mysqli_fetch_assoc($qr)) { ?>
                                <option value="<?= $d['id_pegawai'] ?>">
                                  <?= $d['nama_pegawai'] ?>
                                </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-4">
                        <div class="mb-3 row">
                          <label class="text-label form-label" for="validationCustom01">Nomer Meja*</label>
                          <div class="input-group">
                            <span class="input-group-text"> <i class="fa fa-table"></i> </span>
                            <select class="default-select wide form-control" id="validationCustom05" name="id_meja">
                              <option data-display="-- Pilih --" value="">Pilih Nomer Meja</option>
                              <?php
                              $qr = mysqli_query($koneksi, "SELECT * FROM meja");
                              while ($d = mysqli_fetch_assoc($qr)) { ?>
                                <option value="<?= $d['id_meja'] ?>">
                                  <?= $d['nomor_meja'] ?>
                                </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div><br><br>
                    <div class="row">
                      <div class="col-xl-2">
                        <div class="mb-3 row">
                          <label class="text-label form-label" for="validationCustomUsername">Harga Makanan*</label>
                          <div class="input-group">
                            <span class="input-group-text"> <i class="fas fa-dollar-sign"></i> </span>
                            <input type="text" class="form-control" name="jml_harga" id="harga" onkeyup="sum();" readonly="" > 
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-5">
                        <div class="mb-3 row">
                          <label class="text-label form-label" for="validationCustomUsername">Jumlah Pesanan*</label>
                          <div class="input-group">
                            <span class="input-group-text"> <i class="fas fa-dollar-sign"></i> </span>
                            <input type="number" class="form-control" name="jumlah_pesanan" id="jumlah_pesanan" onkeyup="sum();" > 
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-5">
                        <div class="mb-3 row">
                          <label class="text-label form-label" for="validationCustomUsername">Total Harga*</label>
                          <div class="input-group">
                            <span class="input-group-text"> <i class="fas fa-dollar-sign"></i> </span>
                            <input type="text" class="form-control" name="total_hrg" id="total"  readonly="" > 
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="simpan" value="Simpan" class="btn me-2 btn-primary">Submit</button><br><br><br>
                    <div class="table-responsive">
                      <table class="table table-hover table-responsive-sm">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>No Meja</th>
                            <th>Menu Makanan</th>
                            <th>Jml Pesanan</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                      </table>
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
  $kode_pesanan = $_POST['kode_pesanan'];
  $id_pegawai = $_POST['id_pegawai'];
  $id_meja = $_POST['id_meja'];
  $id_menu = $_POST['id_menu'];
  $jumlah_pesanan = $_POST['jumlah_pesanan'];
  $jml_harga = $_POST['jml_harga'];
  $total_hrg = $_POST['total_hrg'];

  $sql = mysqli_query($koneksi, " INSERT INTO pesanan VALUES( '$kode_pesanan', '$id_pegawai', '$id_meja', '$id_menu', '$jumlah_pesanan', '$jml_harga', '$total_hrg')");

  $sql2 = mysqli_query($koneksi, " INSERT INTO detail_pesanan VALUES('', '$kode_pesanan', '$id_pegawai', '$id_meja', '$id_menu', '$jumlah_pesanan', '$total_hrg')");

  if ($sql && $sql2) {
    echo"
    <script>
    alert ('Data Berhasil Di Simpan');
    window.location.href='tambah_pesanan_lanjut.php?kode=" . $kode_pesanan . "';
    </script>   
    ";     
  }
}
?>