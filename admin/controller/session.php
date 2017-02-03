<?php
error_reporting(0);
include 'koneksi.php';
session_start();// Memulai Session
// Menyimpan Session
$username = $_SESSION['login'];
$user_id = $_SESSION['admin'];
// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc
$ses_sql = pg_query("select * from admin where username='$username' ");
$row = pg_fetch_assoc($ses_sql);
$login_session = $row['nama_user'];

if(!isset($login_session)) {
	pg_close(); // Menutup koneksi ?>
    <script type="text/javascript">
        alert('Silahkan Login atau Daftar Dahulu ')
        document.location = '../index.php';

    </script>
    <?php } ?>
