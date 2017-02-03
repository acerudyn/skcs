<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Produk</th>
                            <th>Merk EDC</th>
                            <th>Spesifikasi</th>
                            <th>Gambar</th>
                            <th>
                                <center>Action</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                      $connection = pg_connect("host=localhost port=5432 dbname=skcsdb user=postgres password=akhirudin");
                      $sql = "select * from produk order by produk_id";
                      $result  = pg_query($connection, $sql);
                      while( $row = pg_fetch_array($result) )
                           {
                                echo "
                                <tr>
                                <td width='100'>$row[1]</td>
                                <td width='150'>$row[2]</td>
                                <td width='100'>$row[3]</td>
                                <td width='300'>$row[4]</td>
                                <td width='100'><img src='../img/produk/$row[5]' border='0' width='90' height='90' /></td>
                                <td width='100' style='text-align:center'>
                        <a href='home.php?page=edit_product&id=$row[0]'>
                        <span data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' >
                        <span class='glyphicon glyphicon-pencil'></span></button><span></a>

                        <a href='home.php?page=delete_product&id=$row[0]'>
                        <span data-placement='top' data-toggle='tooltip' title='Delete'><button class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#myModal' >
                        <span class='glyphicon glyphicon-trash'></span></button><span></a>
                                    </td>
                                </tr>
                                ";
                            }
                       ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
