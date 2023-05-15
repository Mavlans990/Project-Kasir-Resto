<?php

include 'config/koneksi.php';
$id = $_GET['id'];

$sql = mysqli_query($koneksi, "DELETE FROM transaksi WHERE kode_transaksi = '$id' ");
$sql2 = mysqli_query($koneksi, "DELETE FROM detail_transaksi WHERE kode_transaksi = '$id' ");

if ($sql && $sql2) {
  ?>
  
  <script type="text/javascript">
    alert ("Data Berhasil Di Hapus");
    window.location.href="transaksi.php";
  </script>
  <?php
}else {
  echo "error hapus";
}

?>