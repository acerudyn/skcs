<?php
//session_start();
include "koneksi.php";
$kode =$_GET['id'];

$cari   = pg_query("select * from berita where berita_id = '$kode' ");
$row    = pg_fetch_array($cari);
$gambar = $row[4];
$folder = "../img/berita/$gambar";

$del  = "delete from berita where berita_id = '$kode' ";
$ok   = pg_query($del);
if ($ok) {
  unlink($folder);
?>
    <script type="text/javascript">
        alert('Data berhasil dihapus !')
        document.location = '../views/home.php?page=list_berita';

    </script>

    <?php } else {?>
    <script type="text/javascript">
        alert('Data Gagal Dihapus !')
        document.location = '../views/home.php?page=list_berita';

    </script>
    <?php }?>
