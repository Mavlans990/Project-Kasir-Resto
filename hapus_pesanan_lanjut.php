<?php

include 'config/koneksi.php';
$id = $_GET['id'];

$dt = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM detail_pesanan WHERE id_detail = $id "));
$kode_pesanan = $dt['kode_pesanan'];

$sql = mysqli_query($koneksi, "DELETE FROM detail_pesanan WHERE id_detail = $id ");

if ($sql) {
  ?>
  
  <script type="text/javascript">
    alert ("Data Berhasil Di Hapus");
    window.location.href="<?= 'tambah_pesanan_lanjut.php?kode=' . $kode_pesanan  ?>";
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