<?php

include 'config/koneksi.php';
$id = $_GET['id'];

$sql = mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai = $id ");

if ($sql) {
  ?>
  
  <script type="text/javascript">
    alert ("Data Berhasil Di Hapus");
    window.location.href="pegawai.php";
  </script>
  <?php
}else {
  echo "error hapus";
}

?>