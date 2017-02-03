<?php
date_default_timezone_set('Asia/Jakarta');
//$connection = pg_connect("host=localhost port=5432 dbname=skcsdb user=postgres password=akhirudin");
include "koneksi.php";

$id      = $_GET['id'];
$sql     = "select * from berita where berita_id = '$id' ";
$result  = pg_query($connection, $sql);
$myData	 = pg_fetch_array($result);
?>
    <style>
        #image-holder {
            margin-top: 8px;
        }

        #image-holder img {
            border: 8px solid #DDD;
            max-width: 100%;
        }

    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Edit Berita</h3>
                </div>

                <?php
                # SKRIP SAAT TOMBOL SIMPAN DIKLIK
                if(isset($_POST['save'])){
                	$berita_id = $_GET['id'];
                	$judul     = $_POST['judul'];
                	$isi       = $_POST['konten'];

                    // Validasi jika gambar tidak diupdate, hanya mengupdte text
                		if (trim($_FILES['gambar']['name']) =="") {

                      /*
                      $Sql	= "update berita SET
                                         tanggal      = CURRENT_TIMESTAMP,
                                         judul				=	'$judul',
                    										 isi_berita		=	'$konten'
                                         WHERE berita_id =	'$berita_id' ";
                      		$myQry	= pg_query($Sql, $connection);
                          */

                      // Update data tanpa gambar
                      $update		= pg_query("update berita SET
                                         tanggal      = CURRENT_TIMESTAMP,
                                         judul				=	'$judul',
                    										 isi_berita		=	'$konten'
                                         WHERE berita_id = '$berita_id' ");

                		if($update){  ?>
                    <script type="text/javascript">
                        alert('Data Berhasil Dismpan')
                        document.location = '../views/home.php?page=list_berita';

                    </script>
                    <?php } ?>

                    <?php }

                		else {
                			// Jika file gambar lama ada, akan dihapus
                			if(file_exists("../img/berita/".$myData[4])) {
                				unlink("../img/berita/".$myData[4]);
                			}

                			// Mengkopi file gambar terbaru yang ditambahkan
                			$nama_file = $_FILES['gambar']['name'];
                			$nama_file = stripslashes($nama_file);
                			$nama_file = str_replace("'","",$nama_file);

                			$nama_file = $berita_id.".".$nama_file;
                			copy($_FILES['gambar']['tmp_name'],"../img/berita/".$nama_file);


                		// Simpan hasil perubahan data
                    /*
                    $Sql	= "update berita SET
                                       tanggal      = CURRENT_TIMESTAMP,
                                       judul				=	'$judul',
                                       isi_berita		=	'$konten',
                                       gambar       = '$nama_file'
                                       WHERE berita_id =	'$berita_id' ";
                        $myQry	= pg_query($Sql, $connection)  or die ();
                        */

                    // Mengupdate data berserta gambar
                    $update		= pg_query("update berita SET
                                       tanggal      = CURRENT_TIMESTAMP,
                                       judul				=	'$judul',
                                       isi_berita		=	'$konten',
                                       gambar       = '$nama_file'
                                       WHERE berita_id =	'$berita_id' ");


                		if($update){ ?>
                    <script type="text/javascript">
                        alert('Data Berhasil Dismpan')
                        document.location = '../views/home.php?page=list_berita';

                    </script>
                    <?php }
                   }
                } ?>


                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']; ?>" target="_self">
                            <input type="hidden" name="id">
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="dua" class="col-sm-2 control-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="dua" value="<?php echo $myData[1]; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tiga" class="col-sm-2 control-label">Judul Berita</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Judul" name="judul" id="tiga" required value="<?php echo $myData[2]; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tiga" class="col-sm-2 control-label">Isi Berita</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control konten" placeholder="Isi Berita" name="konten" required><?php echo $myData[3]; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tiga" class="col-sm-2 control-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <input type="file" accept="image/*" name="gambar" class="form-control" id="foto" />
                                        <div id="image-holder">
                                            <?php
                                    if(isset($_GET['id']))
                                        echo "<img src='../img/berita/$myData[4]'.'?rand='".rand()."' alt=''>";
                                    ?>
                                        </div>
                                        <script>
                                            $("#foto").on('change', function() {

                                                //Get count of selected files
                                                var countFiles = $(this)[0].files.length;

                                                var imgPath = $(this)[0].value;
                                                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                                                var image_holder = $("#image-holder");
                                                image_holder.empty();

                                                var x = document.getElementById("foto");
                                                var file = x.files[0];

                                                if (extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "gif") {
                                                    if (typeof(FileReader) != "undefined") {

                                                        //loop for each file selected for uploaded.
                                                        for (var i = 0; i < countFiles; i++) {

                                                            var reader = new FileReader();
                                                            reader.onload = function(e) {
                                                                $("<img />", {
                                                                    "src": e.target.result,
                                                                    "class": "thumb-image"
                                                                }).appendTo(image_holder);
                                                            }

                                                            image_holder.show();
                                                            reader.readAsDataURL($(this)[0].files[i]);
                                                        }

                                                    } else {
                                                        alert("This browser does not support FileReader.");
                                                    }
                                                } else {
                                                    alert("hanya boleh foto bertype PNG, JPG dan GIF");
                                                    var control = $("#foto");
                                                    control.replaceWith(control.val('').clone(true));
                                                }
                                            });

                                        </script>
                                    </div>
                                </div>
                                <!--input image awal-->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <input onclick="change_url()" type="submit" class="btn btn-info pull-right" value="save" name="save">
                            </div>
                            <!-- /.box-footer -->
                        </form>
            </div>
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
