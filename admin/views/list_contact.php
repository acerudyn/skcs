<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List Contact</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Isi Pesan</th>
                            <th>
                                <center>Action</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                      $connection = pg_connect("host=localhost port=5432 dbname=skcsdb user=postgres password=akhirudin");
                      $sql = "select * from contact order by contact_id";
                      $result  = pg_query($connection, $sql);
                      while( $row = pg_fetch_array($result) )
                           {
                                echo "
                                <tr>
                                    <td width='100'>$row[1]</td>
                                    <td width='100'>$row[2]</td>
                                    <td width='100'>$row[3]</td>
                                    <td width='300'>Subject : <b>$row[5]</b>
                                    <br>$row[4]</td>
                                    <td width='100' style='text-align:center'>
                        <a href='home.php?page=replay_contact&id=$row[0]'>
                        <span data-placement='top' data-toggle='tooltip' title='Replay'><button class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' >
                        <span class='glyphicon glyphicon-share-alt'></span></button><span></a>

                        <a href='home.php?page=delete_contact&id=$row[0]'>
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
