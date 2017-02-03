<?php
session_start();
include "koneksi.php";

if($_POST){
	$id			=	$_POST['id'];
	$judul	=	$_POST['judul'];
	$konten	=	$_POST['konten'];
//	$gambar	=	$_POST['gambar'];

	if(file_exists("img/berita/".$_POST['gambar'])) {
				unlink("img/berita/".$_POST['gambar']);
			}

			// Mengkopi file gambar terbaru yang ditambahkan
			$nama_file = $_FILES['gambar']['name'];
			$nama_file = stripslashes($nama_file);
			$nama_file = str_replace("'","",$nama_file);

			$nama_file = $id.".".$nama_file;
			copy($_FILES['gambar']['tmp_name'],"img/berita/".$nama_file);

	$update		= pg_query("update berita SET
                     judul				=	'".$judul."',
										 isi_berita		=		'".$konten."',
                     gambar				=	'".$nama_file."'
                     WHERE berita_id =	'".$id."'");

if($update){

	?>
    <script type="text/javascript">
    	alert('Data Berhasil Diupadate')
		document.location='../index.php?page=list_berita';
    </script>

    <?php } else {?>
    <script type="text/javascript">
	alert('Data Gagal Diupadate')
	document.location='../index.php?page=edit_berita&id='<?php echo $id; ?>'';
	</script>

    <?php }
	} ?>
