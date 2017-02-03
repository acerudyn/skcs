<?php
date_default_timezone_set('Asia/Jakarta');
//$connection = pg_connect("host=localhost port=5432 dbname=skcsdb user=postgres password=akhirudin");
include "koneksi.php";

$id      = $_GET['id'];
$sql     = "select * from contact where contact_id = '$id' ";
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
                    <h3 class="box-title">Form Replay Message</h3>
                </div>

                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="../controller/contact-send.php" >
                            <input type="hidden" name="id" value="<?php echo $myData[0]; ?>" >
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="dua" class="col-sm-2 control-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="dua" value="<?php echo $myData[1]; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tiga" class="col-sm-2 control-label">To</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="To" name="to" id="tiga" required
                                         value="<?php echo "$myData[3]"; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tiga" class="col-sm-2 control-label">Subject</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Subject" name="subject" id="tiga" required
                                         value="<?php echo $myData[5]; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tiga" class="col-sm-2 control-label">Isi Pesan</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control konten" placeholder="Your Message" name="message" required></textarea>
                                    </div>
                                </div>
                                <!--input image awal-->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <input onclick="change_url()" type="submit" class="btn btn-info pull-right" value="send" name="send">
                            </div>
                            <!-- /.box-footer -->
                        </form>
            </div>
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
