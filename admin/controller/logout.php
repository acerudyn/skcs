<?php
session_start();
/*
$_SESSION['admin'] = '';
unset ($_SESSION['admin']);
session_unset();
session_destroy();
header("location : ../index.php");
*/

if(session_destroy()) // Menghapus Sessions
{
	header("Location: ../index.php"); // Langsung mengarah ke Home index.php
}
?>
