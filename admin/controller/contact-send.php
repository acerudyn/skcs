<?php
//session_start();
include "koneksi.php";

$from 		= "ragil.poetra@yahoo.com";
$id 			= $_POST['id'];
$to	    	= $_POST['to'];
$subject	= $_POST['subject'];
$message  = $_POST['message'];

$headers  = 'From : <'.$from.'>'."\r\n";

$sendmail = mail($to, $subject, $message, $headers);

/*
	$query  = ("insert into contact (contact_id, tanggal, nama_pengirim, email, isi_pesan, subject) values ('$user_id',CURRENT_TIMESTAMP,'$nama_pengirim','$email','$isi_pesan','$subject')");
	$save   = pg_query($query);
	*/

	if ($sendmail) {

		?>
    <script type="text/javascript">
        alert('Message Sent !')
        document.location = '../views/home.php?page=list_contact';

    </script>

    <?php } else {?>
    <script type="text/javascript">
        alert('Failed to Replay Message !')
				document.location = '../views/home.php?page=form_replay&id='
        <?php echo $id; ?>
        '';

    </script>

    <?php } ?>
