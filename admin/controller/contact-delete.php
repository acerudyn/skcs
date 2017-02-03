<?php
//session_start();
include "koneksi.php";
$kode=$_GET['id'];

$del = "delete from contact where contact_id = '$kode' ";
$ok = pg_query($del);
if ($ok) {
?>
    <script type="text/javascript">
        alert('Data berhasil dihapus !')
        document.location = '../views/home.php?page=list_contact';

    </script>

    <?php } else {?>
    <script type="text/javascript">
        alert('Data Gagal Dihapus !')
        document.location = '../views/home.php?page=list_contact';

    </script>
    <?php }?>
