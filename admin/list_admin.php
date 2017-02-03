<?php
   $connection = pg_connect("host=localhost port=5432 dbname=skcsdb user=postgres password=akhirudin");
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Admin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       $sql = "select * from admin order by user_id";
                       $result  = pg_query($connection, $sql);
                       while( $row = pg_fetch_array($result) )
                            {
                                echo "
                                <tr>
                                    <td>$row[1]</td>
                                    <td>$row[2]</td>
                                    <td>$row[3]</td>
                                    <td style='text-align:center'>
                        <a href='index.php?page=edit_admin&id=$row[0]'>
                        <span data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' >
                        <span class='glyphicon glyphicon-pencil'></span></button><span></a>

                        <a href='index.php?page=delete_admin&id=$row[0]'>
                        <span data-placement='top' data-toggle='tooltip' title='Delete'><button class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#delete' >
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
