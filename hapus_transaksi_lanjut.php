<?php

include 'config/koneksi.php';
$id = $_GET['id'];

$dt = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM detail_transaksi WHERE id_detail = $id "));
$kode_transaksi = $dt['kode_transaksi'];

$sql = mysqli_query($koneksi, "DELETE FROM detail_transaksi WHERE id_detail = $id ");

if ($sql) {
  ?>
  
  <script type="text/javascript">
    alert ("Data Berhasil Di Hapus");
    window.location.href="<?= 'tambah_transaksi_lanjut.php?kode=' . $kode_transaksi  ?>";
  </script>
  <?php

  // echo"
  //   <script>
  //   alert ('Data Berhasil Di Simpan');
  //   window.location.href='tambah_pesanan_lanjut.php?kode=" . $kode_pesanan . "';
  //   </script>   
  //   ";
}else {
  echo "error hapus";
}

?>