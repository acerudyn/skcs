<?php
$id = base_convert(microtime(false), 10, 36); // create ID with php convert
date_default_timezone_set('Asia/Jakarta');
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
                    <h3 class="box-title">Form Input Admin</h3>
                </div>
                <!-- Form input admin -->
                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="../controller/admin-save.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="dua" class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tanggal" id="dua" value="<?php echo date('d-m-Y'); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Nama Admin</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nama Admin" name="nama_admin" id="tiga" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Username" name="username" id="tiga" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="password minimal 6 karakter" name="password" id="tiga" required>
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
