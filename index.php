<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Karyawan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <span class="brand-text font-weight-light"><b><h2>Data Karyawan</h2></b></span>
      </a>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <?php
        // Create database connection using config file
        include_once("connect/config.php");
 
        // Fetch all users data from database
        if(isset($_GET['keyword'])) {
          $keyword = $_GET['keyword'];
          $result = mysqli_query($mysqli, "SELECT * FROM karyawan WHERE nama LIKE '%$keyword%' OR jabatan LIKE '%$keyword%' ORDER BY id DESC");
            } else {
          $result = mysqli_query($mysqli,"SELECT * FROM karyawan ORDER BY id DESC");
        }
        ?>
        <section class="content">
          <div class="container-fluid">
        <form method="GET" action="">

          <div class="input-group">
          <input type="text" name="keyword" class="form-control form-control-lg" placeholder="Cari Nama atau Jabatan">
          <div class="input-group-append">
            <button type="submit" class="btn btn-lg btn-default">
                <i class="fa fa-search"></i>
            </button>
          </div>
          </div>

        </form>
        <br></br>
        <a href="crud/tambah_karyawan.php" class="btn btn-success">Tambah Karyawan</a><br/><br/>
                <div class="card">
        <br/>
            <div class="card-body">
            <table width='80%' border=1 class="table table-bordered table-hover">

            <tr>
                <th>Nama</th> <th>Jabatan</th> <th>Alamat</th> <th>Status</th> <th>Update</th>
            </tr>
            <?php
            $batas = 5;
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
				$previous = $halaman - 1;
				$next = $halaman + 1;
				
				$data = mysqli_query($mysqli,"select * from karyawan");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);
 
				$result = mysqli_query($mysqli,"select * from karyawan limit $halaman_awal, $batas");
				$nomor = $halaman_awal+1;
            while($karyawan = mysqli_fetch_array($result)) {         
                echo "<tr>";
                echo "<td>".$karyawan['nama']."</td>";
                echo "<td>".$karyawan['jabatan']."</td>";
                echo "<td>".$karyawan['alamat']."</td>";
                echo "<td>".$karyawan['statuss']."</td>";    
                echo "<td><a href='crud/edit.php?id=$karyawan[id].'class='btn btn-warning text-white'>Edit</a> | <a href='crud/delete.php?id=$karyawan[id].'class='btn btn-danger'>Delete</a></td></tr>";        
            }
            ?>
            </table>
            <nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>
                </div>
              </div>
            </div>
          </section>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
