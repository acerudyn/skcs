<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Berita</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Isi Berita</th>
                            <th>Gambar</th>
                            <th><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "select * from berita order by berita_id";
                        $result  = pg_query($connection, $sql);
                        while( $row = pg_fetch_array($result) )
                             {
                                echo "
                                <tr>
                                    <td width='100'>$row[1]</td>
                                    <td width='100'>$row[2]</td>
                                    <td width='300'>$row[3]</td>
                                    <td width='100'><img src='img/berita/$row[4]' border='0' width='90' height='90' /></td>
                                    <td width='100' style='text-align:center'>
                        <a href='index.php?page=edit_berita&id=$row[0]'>
                        <span data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' >
                        <span class='glyphicon glyphicon-pencil'></span></button><span></a>

                        <a href='index.php?page=delete_berita&id=$row[0]'>
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
