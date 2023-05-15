<?php
include 'header.php';
include 'config/koneksi.php';

$kode = $_GET['kode'];
$psnl = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT a.*, c.*, d.* FROM detail_transaksi AS a
  JOIN meja    AS c ON a.id_meja = c.id_meja
  JOIN menu    AS d ON a.id_menu = d.id_menu WHERE kode_transaksi = '$kode' "));

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
      <form method="post" action="">
        <div class="row">
          <div class="col-xl-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <div>
                  <h4 class="fs-20 font-w700">Pilih Pesanan</h4>
                </div>
                <div>
                  <input type="text" class="form-control" name="kode_transaksi" value="<?= $kode ?>" readonly>
                </div>
              </div>
              <div class="card-body">
                <div class="basic-form">
                  <div class="row">
                    <div class="col-lg-12">
                      <label class="text-label form-label" for="validationCustomUsername">Pilih Menu Makanan / Minuman*</label>
                      <select name="id_menu" class="dropdown-groups" required onchange="changeValue(this.value)">
                        <option  value="">-- Pilih --</option>
                        <optgroup label="---------- Makanan -----------">
                          <?php
                          $sql = mysqli_query($koneksi, "SELECT * FROM menu where kategori = 'Makanan' ");
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
                        </optgroup>
                        <optgroup label="---------- Minuman -----------">
                          <?php
                          $sql = mysqli_query($koneksi, "SELECT * FROM menu where kategori = 'Minuman' ");
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
                        </optgroup>
                        <!-- <?php
                        $sql = mysqli_query($koneksi, "SELECT * FROM menu ");
                        $jsArray = "var prdName = new Array();\n";
                        while ($data = mysqli_fetch_array($sql)) {
                          echo '<option value="' . $data['id_menu'] . '">'
                          . $data['nama_menu'] . '</option> ';
                          $jsArray .= "prdName['" . $data['id_menu'] . "']={
                            nama:'" . addslashes($data['nama_menu']) . "',
                            harga:'" . addslashes($data['harga']) . "'
                          };\n";
                        }
                      ?> -->
                    </select><br><br><br>
                  </div>
                  <div class="col-xl-6">
                    <div class="mb-3 row">
                      <label class="text-label form-label" for="validationCustomUsername">Menu Makanan*</label>
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fa fa-book"></i> </span>
                        <input type="text" class="form-control" name="nama_menu" id="nama" disabled > 
                      </div>
                    </div>
                  </div><br><br>
                  <div class="col-xl-6">
                    <div class="mb-3 row">
                      <label class="text-label form-label" for="validationCustomUsername">Harga Makanan*</label>
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fas fa-dollar-sign"></i> </span>
                        <input type="text" class="form-control" name="jml_harga" id="harga" onkeyup="sum();" readonly="" > 
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="mb-3 row">
                      <label class="text-label form-label" for="validationCustomUsername">Jumlah Pesanan*</label>
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fas fa-dollar-sign"></i> </span>
                        <input type="number" class="form-control" name="jumlah_pesanan" id="jumlah_pesanan" onkeyup="sum();" > 
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="mb-3 row">
                      <label class="text-label form-label" for="validationCustomUsername">Total Harga*</label>
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fas fa-dollar-sign"></i> </span>
                        <input type="text" class="form-control" name="total_hrg" id="total"  readonly="" > 
                      </div>
                    </div>
                  </div>
                  <div class="basic-form">
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Nomer Meja*</label>
                        <div class="input-group">
                          <span class="input-group-text"> <i class="fa fa-table"></i> </span>
                          <select id="inputState" class="default-select form-control wide" name="id_meja">
                            <option selected="">-- Pilih --</option>
                            <?php
                            $qr = mysqli_query($koneksi, "SELECT * FROM meja");
                            while ($d = mysqli_fetch_assoc($qr)) { 

                              if ($psnl['id_meja'] == $d['id_meja']){

                                $sc = 'selected';
                              }else {
                                $sc = '';
                              }
                              ?>
                              <option <?= $sc; ?> value="<?= $d['id_meja'] ?>">
                                <?= $d['nomor_meja'] ?>
                              </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" name="simpan" value="Simpan" class="btn btn-primary">Sign in</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <form method="post" action="">
      <div class="col-xl-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Transaksi</h4>
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
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $sql = mysqli_query($koneksi, "SELECT a.*, b.*, c.* FROM detail_transaksi a
                  JOIN menu AS b ON a.id_menu = b.id_menu
                  JOIN meja AS c ON a.id_meja = c.id_meja WHERE kode_transaksi = '$kode' ");
                while ($row = mysqli_fetch_assoc($sql)) {
                  ?>
                  <tr>
                    <td class="center"><?php echo $no++ ?></td>
                    <td class="right"><?= $row['nama_menu']?></td>
                    <td class="center"><?= $row['jumlah_pesanan']?></td>
                    <td class="right"><?= $row['total_hrg']?></td>
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
                  <tr>
                    <td class="left"><strong>Nomer Meja</strong></td>
                    <td class="right">01</td>
                  </tr>
                  <tr>
                    <?php
                    $bayar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(total_hrg) AS total FROM detail_transaksi WHERE kode_transaksi = '$kode' "));
                    ?>
                    <td class="left"><strong>Total</strong></td>
                    <td class="right"><input type="text" name="jumlah_total" class="form-control" value="<?= $bayar['total'] ?>" readonly>  </td>
                  </tr>
                  <tr>
                    <td class="left"><strong>Tgl Transaksi</strong></td>
                    <td class="right"> <input type="date" class="form-control" name="tgl_transaksi" value="<?php echo date("Y-m-d") ?>">  </td>
                  </tr>
                  <tr>
                    <td class="left"><strong>Bayar</strong></td>
                    <td class="right"> <input type="text" name="bayar" id="bayar">  </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
            <button type="submit" name="edit" class="btn btn-primary">Sign in</button>
        </div>
      </div>
    </form>
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
  $kode_transaksi = $_POST['kode_transaksi'];
  $id_meja = $_POST['id_meja'];
  $id_menu = $_POST['id_menu'];
  $jumlah_pesanan = $_POST['jumlah_pesanan'];
  $jml_harga = $_POST['jml_harga'];
  $total_hrg = $_POST['total_hrg'];

  $sql = mysqli_query($koneksi, " INSERT INTO detail_transaksi VALUES('', '$kode_transaksi', '$id_meja', '$id_menu', '$jumlah_pesanan', '$total_hrg')");

  if ($sql ) {
    echo"
    <script>
    alert ('Data Berhasil Di Simpan');
    window.location.href='tambah_transaksi_lanjut2.php?kode=" . $kode_transaksi . "';
    </script>   
    ";     
  }
}
?>

<?php
if (isset($_POST['edit'])) {
  $kode_transaksi = $_POST['kode_transaksi'];
  $id_meja = $_POST['id_meja'];
  $id_menu = $_POST['id_menu'];
  $jumlah_pesanan = $_POST['jumlah_pesanan'];
  $jumlah_total = $_POST['jumlah_total'];
  $jml_harga = $_POST['jml_harga'];
  $total_hrg = $_POST['total_hrg'];
  $tgl_transaksi = $_POST['tgl_transaksi'];
  $bayar = $_POST['bayar'];
  $kembali = $bayar - $jumlah_total;

  $sql = mysqli_query($koneksi, " UPDATE transaksi SET tgl_transaksi = '$tgl_transaksi', bayar = '$bayar', kembali = '$kembali', jumlah_total = '$jumlah_total' WHERE kode_transaksi = '$kode' ");

  if ($sql ) {
    echo"
    <script>
    alert ('Data Berhasil Di Simpan');
    window.location.href='transaksi.php';
    </script>   
    ";     
  }
}
?>
