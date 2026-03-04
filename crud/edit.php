<?php
include_once("../connect/config.php");
 
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name=$_POST['name'];
	$jabatan=$_POST['jabatan'];
	$alamat=$_POST['alamat'];
	$status=$_POST['status'];
		
	$result = mysqli_query($mysqli, "UPDATE karyawan SET nama='$name',jabatan='$jabatan',alamat='$alamat',statuss='$status' WHERE id=$id");
	
	header("Location: ../index.php");
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM karyawan WHERE id=$id");
 
while($karyawan = mysqli_fetch_array($result))
{
	$name = $karyawan['nama'];
	$jabatan = $karyawan['jabatan'];
	$alamat = $karyawan['alamat'];
	$status = $karyawan['statuss'];
}
?>

<?php
	if(isset($_POST['Submit'])) {
		$name = $_POST['name'];
		$jabatan = $_POST['jabatan'];
		$alamat = $_POST['alamat'];
		$status = $_POST['status'];
		
		include_once("../connect/config.php");
				
		$result = mysqli_query($mysqli, "INSERT INTO karyawan(nama,jabatan,alamat,statuss) VALUES('$name','$jabatan','$alamat','$status')");
		
		header("Location: ../index.php");
	}
	?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Data Karyawan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../app/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../app/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <span class="brand-text font-weight-light"><b><h2>Edit Data Karyawan</h2></b></span>
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
        <div class="row">
          <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title text-white">Edit Karyawan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="edit.php" method="post" name="form2">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama Karyawan</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>" required>
                  </div>
                  <div class="form-group">
                    <label for="jabatan">Jabatan Karyawan</label>
                    <input type="text" class="form-control" name="jabatan" value="<?php echo $jabatan;?>" required>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat Karyawan</label>
                    <input type="text" class="form-control" name="alamat" value="<?php echo $alamat;?>" required>
                  </div>
                  <div class="form-group">
                  <label for="Status">Status</label>
                  <select class="custom-select form-control-border border-width-2" name="status" required>
                    <option value="Aktif" <?php if($status=='Aktif') echo 'selected'; ?>>Aktif</option>
  					<option value="Inaktif" <?php if($status=='Inaktif') echo 'selected'; ?>>Inaktif</option>
                  </select>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
					<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                  <button type="submit" name="update" value="Update" class="btn btn-warning text-white">Submit</button>
                  <a href="../index.php" class="btn btn-warning text-white">Kembali</a>
                </div>
              </form>
            </div>
            </div>
            <!-- /.card -->
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
