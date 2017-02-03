<?php
session_start(); // Memulai Session
include 'koneksi.php';

if (isset($_POST['login'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) { ?>

    <script type="text/javascript">
        alert('Username dan Password tidak boleh kosong !')
        document.location = '../index.php';

    </script>

    <?php }
	else
	 {
		// Variabel username dan password
		$username=$_POST['username'];
		$password=$_POST['password'];
		// Membangun koneksi ke database
		// Mencegah MySQL injection
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = pg_escape_string($username);
		$password = pg_escape_string($password);
		// SQL query untuk memeriksa apakah karyawan terdapat di database?
		$query = "SELECT * FROM admin WHERE username = '$username'";
$hasil = pg_query($query);
$data = pg_fetch_array($hasil);
// cek kesesuaian password

$hash = $data['password'];
if (password_verify($password, $hash))
//if ($password == $data['password'])
{
				$_SESSION['login']=$username;
				$_SESSION['admin']=$data['user_id'];// Membuat Sesi/session
				header("location: ../views/home.php"); // Mengarahkan ke halaman profil
				} else { ?>
    <script type="text/javascript">
        alert('Username atau Password belum terdaftar !')
        document.location = '../index.php';

    </script>
    <?php }
				pg_close(); // Menutup koneksi
	}
}
?>
