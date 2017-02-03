<?php
session_start();
include "koneksi.php";

if($_POST){
	$id				=	$_POST['id'];
	$nama			=	$_POST['nama_admin'];
	$username	=	$_POST['username'];
	$password	=	$_POST['password'];
	//$konfirm	=	$_POST['konfirmasi_pwd'];

	$cost = 10;
	$hash = password_hash($password, PASSWORD_BCRYPT, [10 => $cost]);

	$update		= pg_query("update admin SET
                     nama_user	=	'".$nama."',
				    username		=		'".$username."',
                     password		=	'".$hash."'
                     WHERE user_id =	'".$id."'");

if($update){

	?>
    <script type="text/javascript">
        alert('Data Berhasil Diupadate')
        document.location = '../views/home.php?page=list_admin';

    </script>

    <?php } else {?>
    <script type="text/javascript">
        alert('Data Gagal Diupadate')
        document.location = '../views/home.php?page=edit_admin&id='
        <?php echo $id; ?>
        '';

    </script>

    <?php }
	} ?>
