<?php

include 'config/koneksi.php';
$id = $_GET['id'];

$sql = mysqli_query($koneksi, "DELETE FROM menu WHERE id_menu = $id ");

if ($sql) {
  ?>
  
  <script type="text/javascript">
    alert ("Data Berhasil Di Hapus");
    window.location.href="menu_makanan.php";
  </script>
  <?php
}else {
  echo "error hapus";
}

?>