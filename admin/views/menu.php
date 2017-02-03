<?php
include "../controller/session.php";
?>

    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <!-- search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="treeview">
                    <a href="">
                        <i class="glyphicon glyphicon-queen"></i>
                        <span>Hello,</span> <span style="color : red;"><?php echo "$login_session"; ?></span>
                    </a>
                </li>

                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-user"></i> <span>Admin</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="home.php?page=add_admin"><i class="glyphicon glyphicon-pencil"></i> Add Admin</a></li>
                        <li><a href="home.php?page=list_admin"><i class="glyphicon glyphicon-list active"></i> List Admin</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-file"></i> <span>Berita</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="home.php?page=add_berita"><i class="glyphicon glyphicon-pencil"></i> Input Berita</a></li>
                        <li><a href="home.php?page=list_berita"><i class="glyphicon glyphicon-list active"></i> List Berita</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-th-large"></i> <span>Product</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="home.php?page=add_product"><i class="glyphicon glyphicon-pencil"></i> Input Product</a></li>
                        <li><a href="home.php?page=list_product"><i class="glyphicon glyphicon-list active"></i> List Product</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-envelope"></i> <span>Contact</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="home.php?page=list_contact"><i class="glyphicon glyphicon-list active"></i> List Contact</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="../controller/logout.php">
                        <i class="glyphicon glyphicon-off"></i> <span>Log out</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
