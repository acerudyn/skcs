<?php
session_start();
include "koneksi.php";

$user_id		= $_POST['id'];
$nama_user	    = $_POST['nama_admin'];
$username		= $_POST['username'];
$password		= $_POST['password'];
$tanggal		= date('d-m-Y');

if (strlen($password) < 6){ ?>
    <script type="text/javascript">
        alert('Password Kurang dari 6 karakter')
        document.location = '../views/home.php?page=add_admin';

    </script>
    <?php } else {

	$cost = 10;
	$hash = password_hash($password, PASSWORD_BCRYPT, [10 => $cost]);

	$query  = ("insert into ADMIN (user_id, nama_user, username, password, tanggal) values ('$user_id','$nama_user','$username','$hash',CURRENT_TIMESTAMP)");
	$save   = pg_query($query);
	//$simpan	= pg_query("insert into user values ('$user_id','$nama_user','$username','$password','$tanggal')");
	if($save){

		?>
    <script type="text/javascript">
        alert('Data Berhasil Disimpan')
        document.location = '../views/home.php?page=add_admin';

    </script>

    <?php } else {?>
    <script type="text/javascript">
        alert('Data Gagal Disimpan')
        document.location = '../views/home.php?page=add_admin';

    </script>

    <?php }
}
?>
