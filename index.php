<?php
include 'header.php';
include 'config/koneksi.php';

$sql = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM transaksi WHERE tgl_transaksi"));
?>



		<!--**********************************
            Content body start
            ***********************************-->
            <div class="content-body">
            	<!-- row -->
            	<div class="container-fluid">
            		<div class="row">
            			<div class="col-xl-12">
            				<div class="row">
            					<div class="col-xl-6">
            						<div class="row">
            							<div class="col-xl-12">
            								<div class="card tryal-gradient">
            									<div class="card-body tryal row">
            										<div class="col-xl-7 col-sm-6">
            											<h2>Selamat Datang Di Restoran Kami</h2>
            											<span>" Tidak ada cinta yang lebih tulus daripada cinta makanan. "</span>
            											<a href="javascript:void(0);" class="btn btn-rounded  fs-18 font-w500">Order Now</a>
            										</div>
            										<div class="col-xl-5 col-sm-6">
            											<img src="images/logo kasir.png" alt="" class="sd-shape">
            										</div>
            									</div>
            								</div>
            							</div>
                          <?php if ($_SESSION['level']=="Kasir") { ?>
                            <div class="col-xl-3 col-xxl-12 col-lg-12 col-sm-12">
                              <div class="widget-stat card bg-primary ">
                                <div class="card-body p-4">
                                  <div class="media">
                                    <span class="me-3">
                                      <i class="la la-dollar"></i>
                                    </span>
                                    <?php
                                    $tgl =  date("Y-m-d") ;
                                    $nm  = $_SESSION['nama_user']; 
                                    $bayar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(jumlah_total) AS total FROM transaksi WHERE tgl_transaksi = '$tgl' AND nama_user = '$nm' "));
                                    ?>
                                    <div class="media-body text-white">
                                      <p class="mb-1">Total Pemasukan Hari Ini : <?= date("Y-m-d") ?></p>
                                      <h3 class="text-white"><?= "Rp.".rupiah($bayar['total']) ?></h3>
                                      <div class="progress mb-2 bg-secondary">
                                        <div class="progress-bar progress-animated bg-light" style="width: 30%"></div>
                                      </div>
                                      <small><?= $_SESSION['nama_user'] ?></small>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php } ?>
                        </div>
                      </div>
                      <?php if ($_SESSION['level']=="Kasir") { ?>
                       <div class="col-xl-6">
                        <div class="row">
                          <form method="post" action="">
                            <div class="row">
                              <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                  <div class="card-header">
                                    <div>
                                      <h4 class="fs-20 font-w700">Menu Terbaru</h4>
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
                                                    <br><br>
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
                          </div>
                        </div>
                      <?php } ?>
                      <?php if ($_SESSION['level']=="Manajer") { ?>
                        <div class="col-xl-6">
                          <div class="row">
                            <div class="col-xl-3 col-xxl-12 col-lg-12 col-sm-12">
                              <div class="widget-stat card bg-primary ">
                                <div class="card-body p-4">
                                  <div class="media">
                                    <span class="me-3">
                                      <i class="la la-dollar"></i>
                                    </span>
                                    <?php
                                    $tgl =  date("Y-m-d") ; 
                                    $bayar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(jumlah_total) AS total FROM transaksi WHERE tgl_transaksi = '$tgl'  "));
                                    ?>
                                    <div class="media-body text-white">
                                      <p class="mb-1">Total Pemasukan Hari Ini : <?= date("Y-m-d") ?></p>
                                      <h3 class="text-white"><?= "Rp.".rupiah($bayar['total']) ?></h3>
                                      <div class="progress mb-2 bg-secondary">
                                        <div class="progress-bar progress-animated bg-light" style="width: 30%"></div>
                                      </div>
                                      <small>Login Sebagai Manajer : <?= $_SESSION['nama_user'] ?></small>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-3 col-xxl-12 col-lg-12 col-sm-12">
                              <div class="widget-stat card bg-success ">
                                <div class="card-body p-4">
                                  <div class="media">
                                    <span class="me-3">
                                      <i class="la la-dollar"></i>
                                    </span>
                                    <?php
                                    $tgl =  date("m") ; 
                                    $bayar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(jumlah_total) AS total FROM transaksi WHERE month(tgl_transaksi) = '$tgl'  "));
                                    ?>
                                    <div class="media-body text-white">
                                      <p class="mb-1">Total Pemasukan Bulan Ini : <?= date("M") ?></p>
                                      <h3 class="text-white"><?= "Rp.".rupiah($bayar['total']) ?></h3>
                                      <div class="progress mb-2 bg-secondary">
                                        <div class="progress-bar progress-animated bg-light" style="width: 30%"></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                      <?php if ($_SESSION['level']=="Admin") { ?>
                        <div class="col-xl-6">
                          <div class="row">
                            <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                              <div class="widget-stat card">
                                <div class="card-body p-4">
                                  <div class="media ai-icon">
                                    <span class="me-3 bgl-primary text-primary">
                                      <i class="ti-user"></i>
                                      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                      <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                  </span>
                                  <?php 
                                  $query_user=mysqli_query($koneksi,"SELECT *  FROM user");
                                  $num_user = mysqli_num_rows($query_user);

                                  $query_menu=mysqli_query($koneksi,"SELECT *  FROM menu");
                                  $num_menu = mysqli_num_rows($query_menu);
                                  ?>
                                  <div class="media-body">
                                    <p class="mb-1">Data User</p>
                                    <h4 class="mb-0"><?php echo $num_user;?></h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                            <div class="widget-stat card">
                              <div class="card-body p-4">
                                <div class="media ai-icon">
                                  <span class="me-3 bgl-success text-success">
                                    <i class="ti-book"></i>
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                  </svg>
                                </span>
                                <div class="media-body">
                                  <p class="mb-1">Data Menu Makanan</p>
                                  <h4 class="mb-0"><?php echo $num_menu;?></h4>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-xxl-12 col-lg-12 col-sm-12">
                          <div class="widget-stat card">
                            <div class="card-body p-4">
                              <div class="media ai-icon">
                                <span class="me-3 bgl-danger text-danger">
                                  <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                  </svg>
                                </span>
                                <div class="media-body">
                                  <?php
                                  $bayar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(jumlah_total) AS total FROM transaksi"));
                                  ?>
                                  <h4 class="card-title">Total Pemasukan</h4>
                                  <h3><?= "Rp.".rupiah($bayar['total']) ?></h3>
                                  <div class="progress mb-2">
                                    <div class="progress-bar progress-animated bg-success" style="width: 30%"></div>
                                  </div>
                                  <small>Seluruh Kasir</small>
                                </div>
                              </div>
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
      </div>
    </div>
        <!--**********************************
            Content body end
            ***********************************-->
            


            
            <?php
            include 'footer.php'
          ?>