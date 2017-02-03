<?php
//session_start();
include "koneksi.php";
$kode=$_GET['id'];

$cari   = pg_query("select * from produk where produk_id = '$kode' ");
$row    = pg_fetch_array($cari);
$gambar = $row[5];
$folder = "../img/produk/$gambar";

$del    = "delete from produk where produk_id = '$kode' ";
$ok     = pg_query($del);
if ($ok) {
  unlink($folder);
?>
    <script type="text/javascript">
        alert('Data berhasil dihapus !')
        document.location = '../views/home.php?page=list_product';

    </script>

    <?php } else {?>
    <script type="text/javascript">
        alert('Data Gagal Dihapus !')
        document.location = '../views/home.php?page=list_product';

    </script>
    <?php }?>
