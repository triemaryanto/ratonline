<!-- Preloader -->


<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="home.php" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a class="dropdown-item" data-toggle="modal" data-target="#gantiPassword">
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Ganti Password
                            </h3>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" data-toggle="modal" data-target="#logout">
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Logout
                            </h3>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
        </li>

    </ul>

</nav>
<!-- Logout Modal-->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Ganti Password-->
<div class="modal fade" id="gantiPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="function.php?act=ubahpwd" method="POST" enctype="multipart/form-data">
                    <?php
                                            $id_user = $_SESSION['id_user'];
                                            $query1 = "SELECT * FROM tbl_user WHERE id_user='$id_user'";
                                            $result1 = mysqli_query($conn, $query1);
                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                            ?>
                    <div class="form-group">
                        <h5 class="modal-title">Username</h5>
                        <input type="text" class="form-control" name="id_user" value="<?php echo $row1['id_user']; ?>"
                            hidden>
                        <input type="text" class="form-control" name="Username" value="<?php echo $row1['username']; ?>"
                            readonly>
                        <h5 class="modal-title">Password</h5>
                        <input type="password" class="form-control" name="pass1" id="pass1"
                            placeholder="Masukan Password Baru">
                        <h5 class="modal-title">Ulangi Password</h5>
                        <input type="password" class="form-control" name="pass2" id="pass2"
                            placeholder="Ulangi Password Baru">

                    </div>

                    <br>
                    <div class="modal-footer">
                        <button id="noedit" type="button" class="btn btn-danger pull-left"
                            data-dismiss="modal">Batal</button>
                        <input type="submit" name="submit" class="btn btn-primary" value="Ganti Password">
                    </div>
                    <?php
                                            }
                                            ?>
                </form>
            </div>

        </div>
    </div>
</div>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
        <img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">RAT ONLINE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/koperasi.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="home.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="materi.php" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Materi RAT
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="kehadiran.php" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-user-check"></i>
                        <p>
                            Kehadiran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tanggapan.php" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-users"></i>
                        <p>
                            Tanggapan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="anggota.php" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-database"></i>
                        <p>
                            Anggota
                        </p>
                    </a>
                </li>
                <div class="user-panel mt-2 pb-2 mb-2 d-flex">
                </div>
                <li class="nav-item">
                    <a href="question.php" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-question"></i>
                        <p>
                            Question
                        </p>
                    </a>
                </li>
                <div class="user-panel mt-2 pb-2 mb-2 d-flex">
                </div>
                <li class="nav-item">
                    <a href="user.php" class="nav-link">
                        <i class="fas fa-fw fa-cogs"></i>
                        <p>
                            Manajemen User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="jabatan.php" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-cog"></i>
                        <p>
                            Jabatan
                        </p>
                    </a>
                </li>

        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>