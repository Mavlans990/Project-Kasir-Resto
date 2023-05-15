<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_kasir_restoran2");

?>

<?php 
function rupiah($rp){
  if($rp!=0){
    $hasil = number_format($rp, 2, '.', ',');
  }else{
    $hasil=0;
  }
  return $hasil;
}
?>