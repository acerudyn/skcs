<?php
include "koneksi.php";
$kode=$_GET['id'];

if ($_SESSION['admin'] == $kode) {?>
    <script type="text/javascript">
        alert('Tidak bisa dihapus !')
        document.location = '../views/home.php?page=list_admin';

    </script>
    <?php } else {
          $del = "delete from admin where user_id = '$kode' ";
          $ok = pg_query($del);
          if ($ok) {
          ?>
    <script type="text/javascript">
        alert('Data berhasil dihapus !')
        document.location = '../views/home.php?page=list_admin';

    </script>

    <?php } else {?>
    <script type="text/javascript">
        alert('Data Gagal Dihapus !')
        document.location = '../views/home.php?page=list_admin';

    </script>
    <?php }
            } ?>
