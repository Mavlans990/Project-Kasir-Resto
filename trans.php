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

<div class="content-body">
    <div class="col-lg-12">
        <div class="container-fluid">
            <!-- <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Bootstrap</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Card</a></li>
                </ol>
            </div> -->
            <div class="row">
                <h1 style="text-align: center; font-size: 50px;">MENU MAKANAN & MENU MINUMAN</h1>
                <?php 
                $sql=mysqli_query($koneksi, "select * from menu order by kategori asc");
                while ($r=mysqli_fetch_array($sql)) {
                    ?>
                    <div class="col-lg-3">
                        <form method="post">
                            <div class="card text-white bg-dark text-center">
                                <div class="card-header">
                                    <h5 class="card-title text-white"><?= $r['nama_menu'].' - '.$r['harga'];?></h5>
                                </div>
                                <div class="card-body mb-0">
                                    <input type="hidden" name="id_menu" value="<?= $r['id_menu'];?>">
                                    <input type="hidden" name="menu" value="<?= $r['nama_menu'];?>">
                                    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah">
                                    <input type="hidden" name="harga" value="<?= $r['harga'];?>">

                                </div>
                                <div class="card-footer bg-transparent border-0 text-white">
                                    <button type="submit" name="simpan" class="btn btn-rounded btn-success"><span class="btn-icon-start text-primary"><i class="fa fa-shopping-cart"></i>
                                    </span>Buy</button>
                                </div>
                            </div>
                        </form>

                    </div>
                <?php } ?>
                    <!-- <div class="col-xl-6">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="images/card/2.png" alt="Card image cap">
                            <div class="card-header">
                                <h5 class="card-title">Card title</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">He lay on his armour-like back, and if he lifted his head a little
                                </p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text d-inline">Card footer</p>
                                <a href="javascript:void(0);" class="card-link float-end">Card link</a>
                            </div>
                        </div>
                    </div> -->
                    
                </div>
            </div>
        </div>


        <div class="container-fluid">
        <!-- <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Form</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Element</a></li>
            </ol>
        </div> -->
        <div class="col-lg-6 col-lg-12">
            <div class="card">
                <!-- <div class="card-header">
                    <h4 class="card-title">Vertical Form</h4>
                </div> -->
                <div class="card-body">
                    <div class="basic-form">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <h1 style="text-align: center; font-size: 50px;">TRANSAKSI MAKANAN & MENU MINUMAN</h1>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form id="formD" name="formD" action="" method="post" class="form-valide-with-icon needs-validation" novalidate="">
                                                <table class="table primary-table-bg-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Menu</th>
                                                            <th scope="col">jumlah</th>
                                                            <th scope="col">harga</th>
                                                            <th scope="col">total</th>
                                                        </tr>
                                                    </thead>
                                                    <body>
                                                        <?php 
                                                        $total=0;
                                                        $tot_bayar=0;
                                                        $no=1;
                                                        $pemesanan=mysqli_query($koneksi,"select id_pesanan,id_menu,menu,jumlah,harga, jumlah*harga as total from pesanan ");
                                                        while($row=mysqli_fetch_array($pemesanan)){
                                                        // total adalah hasil dari harga x qty
                                                          $total = $row['jumlah'] * $row['harga'];
                                                        // total bayar adalah penjumlahan dari keseluruhan total
                                                          $tot_bayar += $total;

                                                          ?>
                                                          <tr>
                                                            <td><?= $no++;?></td>
                                                            <td><?= $row['menu'];?></td>
                                                            <td><?= $row['jumlah'];?></td>
                                                            <td><?= $row['harga'];?></td>
                                                            <td><?= $total;?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </body>
                                            </table>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="text-label form-label" for="validationCustomUsername">Kode Transaksi</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"> <i class="fa fa-code"></i> </span>
                                                    <input type="text" class="form-control" id="validationCustomUsername" name="kode" value="<?= $inv;?>" readonly>
                                                    <!-- <div class="invalid-feedback">
                                                        Please Enter a username.
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="text-label form-label" for="validationCustomUsername">Tanggal Transaksi</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
                                                    <input type="text" class="form-control" id="validationCustomUsername" name="meja" class="form-control" value="<?= date('d-m-Y');?>" readonly>
                                                    <!-- <div class="invalid-feedback">
                                                        Please Enter a username.
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="text-label form-label" for="validationCustomUsername">No Meja</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"> <i class="fa fa-chair"></i> </span>
                                                    <input type="text" class="form-control" id="validationCustomUsername" name="meja" class="form-control" required="ISI NO MEJA">
                                                    <div class="invalid-feedback">
                                                        Please Enter a username.
                                                    </div>
                                                </div>
                                            </div>

                                        
                                        <div class="mb-3">
                                            <label class="text-label form-label" for="validationCustomUsername">TOTAL</label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="fa fa-money-check-alt"></i> </span>
                                                <input type="text" class="form-control" id="validationCustomUsername" class="form-control" name="totalan" value="<?= $tot_bayar ;?>">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-label form-label" for="validationCustomUsername">BAYAR</label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="fa fa-credit-card"></i> </span>
                                                <input type="text" class="form-control" id="validationCustomUsername" class="form-control" name="bayar" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-label form-label" for="validationCustomUsername">KEMBALI</label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="fa fa-cash-register"></i> </span>
                                                <input type="text" class="form-control" id="validationCustomUsername" name="kembalian" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <button type="submit" name="simpan" class="btn btn-rounded btn-primary"><span class="btn-icon-start text-primary"><i class="fa fa-shopping-cart"></i>
                                    </span>Simpan</button>

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
</div>
<script type="text/javascript" language="Javascript">
   totalbayar = document.formD.totalan.value;
   document.formD.kembalian.value = totalbayar;
   pembayaran = document.formD.bayar.value;
   document.formD.kembalian.value = pembayaran;
   function OnChange(value){
     totalbayar = document.formD.totalan.value;
     pembayaran = document.formD.bayar.value;
     total = pembayaran - totalbayar;
     document.formD.kembalian.value = total;
 }
</script>

<?php include 'footer.php';?>

<?php
if (isset($_POST['simpan'])) {
  $id_menu = $_POST['id_menu'];
  $menu = $_POST['menu'];
  $jumlah = $_POST['jumlah'];
  $harga = $_POST['harga'];
  

  $sql = mysqli_query($koneksi, " INSERT INTO pesanan VALUES('','$id_menu', '$menu', '$jumlah', '$harga')");

  if ($sql) {
    ?>
    <script type="text/javascript">
      // alert ("Data Berhasil Di Simpan");
      window.location.href="trans.php";
  </script>      
  <?php  
}
}
?>