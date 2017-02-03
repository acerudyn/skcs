<?php
date_default_timezone_set('Asia/Jakarta');
include "koneksi.php";

$id      = $_GET['id'];
$sql     = "select * from produk where produk_id = '$id' ";
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
                    <h3 class="box-title">Form Edit Product</h3>
                </div>

                <?php
                # SKRIP SAAT TOMBOL SIMPAN DIKLIK
                if(isset($_POST['save'])){
                	$produk_id   = $_GET['id'];
                	$nama        = $_POST['nama_produk'];
                  $merk       = $_POST['merk'];
                	$spesifikasi = $_POST['spesifikasi'];

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
                      $update		= pg_query("update produk SET
                                         tanggal         = CURRENT_TIMESTAMP,
                                         nama_produk     =	'$nama',
                                         merk				     =	'$merk',
                    										 spesifikasi		 =	'$spesifikasi'
                                         WHERE produk_id =  '$produk_id' ");

                		if($update){  ?>
                    <script type="text/javascript">
                        alert('Data Berhasil Dismpan')
                        document.location = '../views/home.php?page=list_product';

                    </script>
                    <?php } ?>

                    <?php }

                		else {
                			// Jika file gambar lama ada, akan dihapus
                			if(file_exists("../img/produk/".$myData[5])) {
                				unlink("../img/produk/".$myData[5]);
                			}

                			// Mengkopi file gambar terbaru yang ditambahkan
                			$nama_file = $_FILES['gambar']['name'];
                			$nama_file = stripslashes($nama_file);
                			$nama_file = str_replace("'","",$nama_file);

                			$nama_file = $berita_id.".".$nama_file;
                			copy($_FILES['gambar']['tmp_name'],"../img/produk/".$nama_file);

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
                    $update		= pg_query("update produk SET
                                       tanggal         = CURRENT_TIMESTAMP,
                                       nama_produk     =	'$nama',
                                       merk				     =	'$merk',
                                       spesifikasi		 =	'$spesifikasi',
                                       gambar          = '$nama_file'
                                       WHERE produk_id =	'$produk_id' ");


                		if($update){ ?>
                    <script type="text/javascript">
                        alert('Data Berhasil Dismpan')
                        document.location = '../views/home.php?page=list_product';

                    </script>
                    <?php }
                   }
                } ?>

                    <!-- Memanggil Data dari database -->

                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']; ?>" target="_self">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="dua" class="col-sm-2 control-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="dua" value="<?php echo $myData[1]; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tiga" class="col-sm-2 control-label">Nama dan Tipe EDC</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Nama Produk" name="nama_produk" id="tiga" value="<?php echo $myData[2]; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tiga" class="col-sm-2 control-label">Merk EDC</label>
                                    <div class="col-sm-10">
                                        <select name="merk" class="form-control" required>
                                  <option value="">--Merk EDC--</option>
                                  <option value="ingenico">Ingenico</option>
                                  <option value="pax">Pax</option>
                                  <option value="verifone">Verifone</option>
                              </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tiga" class="col-sm-2 control-label">Keterangan Spesifikasi</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control konten" placeholder="Keterangan Dan Spesifikasi" name="spesifikasi" required="true"><?php echo $myData[4]; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tiga" class="col-sm-2 control-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <input type="file" accept="image/*" name="gambar" class="form-control" id="foto">
                                        <div id="image-holder">
                                            <?php
                                    if(isset($_GET['id']))
                                        echo "<img src='../img/produk/$myData[5].'?rand='".rand()."' alt=''>";
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
                                <input onclick="change_url()" type="submit" class="btn btn-info pull-right" value="Save" name="save">
                            </div>
                            <!-- /.box-footer -->
                        </form>
            </div>
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
