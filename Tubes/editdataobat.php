<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="adminpage.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="register.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Registrasi Pegawai Kasir</span>
        </a>
      </li>
	   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Input Data</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Form Input:</h6>
          <a class="dropdown-item" href="inputdataobat.php">Data Obat</a>
          <a class="dropdown-item" href="inputpenjualan.php">Data Penjualan</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Database:</h6>
          <a class="dropdown-item" href="dataobat.php">Data Obat</a>
          <a class="dropdown-item" href="datapenjualan.php">Data Penjualan</a>
		   <a class="dropdown-item" href="datapegawai.php">Data Pegawai</a>
		</div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Input Data Obat Baru</a>
          </li>
          <li class="breadcrumb-item active">ADMIN</li>
        </ol>
		
        <!-- DataTables Example -->
         <div class="container">
		 <div class="card card-register mx-auto mt-5">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Form Data Obat</div>
          <div class="card-body">
		  <?php
				if ((isset($_GET['kode_obat'])) && (is_numeric($_GET['kode_obat']))){
					$kdobat = $_GET['kode_obat'];
				}elseif ((isset($_POST['kode_obat'])) && (is_numeric($_POST['kode_obat']))){
					$kdobat = $_POST['kode_obat'];
				}else {
					echo '<p class="error"> Halaman ini Error</p>';
					exit();
				}
				require('koneksi.php');
				
				//skrip ini melakukan query INSERT yg menambah sebuah rekaman pada tabel pengguna.
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$arrayError = array();//inisialisasi array error
					
					//apakah nama telah dimasukkan
					if(empty($_POST['kode_obat'])){
						$arrayError[]='<script type="text/javascript">alert("Kode obat barang tidak boleh kosong");</script> ';
					}
					else{$kode_obat = trim($_POST['kode_obat']);
					}
					
					if(empty($_POST['nama_obat'])){
						$arrayError[]='<script type="text/javascript">alert("Nama obat barang tidak boleh kosong");</script>';
					} 
					else{$nama_obat = trim($_POST['nama_obat']);
					}
					
					//apakah alamat email telah dimasukkan
					if(empty($_POST['harga_obat'])){
						$arrayError[]='<script type="text/javascript">alert("harga_obat barang tidak boleh kosong");</script> ';
					}
					else{$harga_obat = trim($_POST['harga_obat']);
					}
					
					if(empty($_POST['stok_obat'])){
						$arrayError[]='<script type="text/javascript">alert("Jumlah stok tidak boleh kosong");</script> ';
					}
					else{$stok_obat = trim($_POST['stok_obat']);
					}
					
					//Algoritma Update Database
					if (empty($arrayError)){
					$q="UPDATE data_obat SET kode_obat='$kode_obat', nama_obat='$nama_obat', harga_obat='$harga_obat', stok_obat='$stok_obat' WHERE kode_obat = $kdobat LIMIT 1";
					$hasil = @mysqli_query($conn, $q);
					
					if (mysqli_affected_rows($conn) == 1){
						echo '<p>  BERHASIL DIEDIT. <a href="data_obat.php">Kembali</a>, <a href="superadmin.php">Halaman Utama</a>.</p>';
					}else{
						echo '<script type="text/javascript">alert("Batal diedit");</script>';
						
					}
				}else{
					echo '<script type="text/javascript">alert("Pastikan Semua Kolom Terisi");</script>';
				}
				}
				
			//Seleksi Rekaman
			$q = "SELECT kode_obat, nama_obat, harga_obat, stok_obat, status  FROM data_obat WHERE kode_obat =$kdobat";
			$hasil = @mysqli_query ($conn, $q);
			
			if(mysqli_num_rows ($hasil) == 1){
				$baris = mysqli_fetch_array ($hasil, MYSQLI_NUM);
			
			//From Edit
			echo '	
            <form action="editdataobat.php" method="post">
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<div class="form-label-group">
					  <input type="text" name="kode_obat" class="form-control" placeholder="Kode Obat" required="required" autofocus="autofocus" 
					  value="' . $baris[0] . '" />
					  <label for="kode_obat">Kode Obat</label>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="form-label-group">
					  <input type="text" name="nama_obat" class="form-control" placeholder="Nama Obat" required="required"
					  value="' . $baris[1] . '" />
					  <label for="nama_obat">Nama Obat</label>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<div class="form-label-group">
					  <input type="text" name="harga_obat" class="form-control" placeholder="Harga obat" required="required"
					  value="' . $baris[2] . '"/>
					  <label for="harga_obat">Harga obat</label>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-label-group">
					  <input type="text" name="stok_obat" class="form-control" placeholder="Stok obat" required="required"
					  value="' . $baris[3] . '" />
					  <label for="stok_obat">Stok obat</label>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-label-group">
					  <input type="text" name="stok_obat" class="form-control" placeholder="Stok obat" required="required"
					  value="' . $baris[4] . '" />
					  <label for="stok_obat">Status</label>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="text-center">
		  <input class="btn btn-primary btn-block" 
			id="submit" type="submit" name="submit" 
			value="Tambah" />
			<input type="hidden" class="btn btn-primary btn-block" 
			id="kode_obat" type="kode_obat" name="kode_obat" 
			value="' . $kdobat . '" />
		  </div>
			</form>';
			}else{
				echo "Halaman Error";
			}
			mysqli_close($conn);
			?>
			 <div class="text-center">
			<a class="d-block small mt-3" href="dataobat.php">Data Obat</a>
        </div>
          </div>
          <div class="card-footer small text-muted"></div>
        </div>
		</div>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © NISRINA 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
