<?php

include 'config/koneksi.php';
$id = $_GET['id'];

$sql = mysqli_query($koneksi, "DELETE FROM pesanan WHERE kode_pesanan = '$id' ");
$sql2 = mysqli_query($koneksi, "DELETE FROM detail_pesanan WHERE kode_pesanan = '$id' ");

if ($sql && $sql2) {
  ?>
  
  <script type="text/javascript">
    alert ("Data Berhasil Di Hapus");
    window.location.href="pesanan.php";
  </script>
  <?php
}else {
  echo "error hapus";
}

?>