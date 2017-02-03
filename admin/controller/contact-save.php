<?php
//session_start();
include "koneksi.php";

$user_id		    = $_POST['id'];
$nama_pengirim  = $_POST['name'];
$email	    	  = $_POST['email'];
$isi_pesan	    = $_POST['message'];
$subject        = $_POST['subject'];

	$query  = ("insert into contact (contact_id, tanggal, nama_pengirim, email, isi_pesan, subject) values ('$user_id',CURRENT_TIMESTAMP,'$nama_pengirim','$email','$isi_pesan','$subject')");
	$save   = pg_query($query);
	//$simpan	= pg_query("insert into user values ('$user_id','$nama_user','$username','$password','$tanggal')");
	if($save){

		?>
    <script type="text/javascript">
        alert('Message Sent !')
        document.location = '../../skcs/contact.php';

    </script>

    <?php } else {?>
    <script type="text/javascript">
        alert('Failed to Send Message !')
          document.location = '../../skcs/contact.php';

    </script>

    <?php } ?>
