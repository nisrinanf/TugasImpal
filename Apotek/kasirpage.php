<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Kasir - Dashboard</title>

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
        <a class="nav-link" href="kasirpage.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Database:</h6>
          <a class="dropdown-item" href="dataobatkasir.php">Data Obat</a>
          <a class="dropdown-item" href="datapenjualankasir.php">Data Penjualan</a>
        </div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">KASIR</li>
        </ol>
		<!-- DataTables Example -->
         <div class="container">
    <div class="card card-register mx-auto mt-5">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Form Data Penjualan</div>
          <div class="card-body">
            <?php
			    include "koneksi.php";
				//skrip ini melakukan query INSERT yg menambah sebuah rekaman pada tabel pengguna.
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$arrayError = array();//inisialisasi array error
					
					//apakah nama telah dimasukkan
					if(empty($_POST['kode_transaksi'])){
						$arrayError[]='<script type="text/javascript">alert("Kode obat barang tidak boleh kosong");</script> ';
					}
					else{$kode_transaksi = trim($_POST['kode_transaksi']);
					}
					
					if(empty($_POST['kode_obat'])){
						$arrayError[]='<script type="text/javascript">alert("Nama obat barang tidak boleh kosong");</script>';
					} 
					else{$kode_obat = trim($_POST['kode_obat']);
					}
					
					//apakah alamat email telah dimasukkan
					if(empty($_POST['harga_obat'])){
						$arrayError[]='<script type="text/javascript">alert("harga_obat barang tidak boleh kosong");</script> ';
					}
					else{$harga_obat = trim($_POST['harga_obat']);
					}
					
					if(empty($_POST['jumlah'])){
						$arrayError[]='<script type="text/javascript">alert("Jumlah stok tidak boleh kosong");</script> ';
					}
					else{$jumlah = trim($_POST['jumlah']);
					}
					
					//jika sebua data terisi
					if(empty($arrayError)){
						require('koneksi.php');//koneksi ke database.
						//melakukan query
						$cek_data=mysqli_query($conn, "SELECT * FROM data_terjual WHERE
						kode_transaksi ='".$_POST['kode_transaksi']."' ");
						$cek_kode=mysqli_query($conn, "SELECT * FROM data_obat WHERE
						kode_obat ='".$_POST['kode_obat']."' ");
					if(mysqli_num_rows($cek_kode) < 1){
						echo'<script type="text/javascript">alert("Kode Obat Tidak ditemukan");</script> ';
					}else{
						if (mysqli_num_rows($cek_data) < 1){
							$q = "INSERT INTO data_terjual (kode_transaksi,kode_obat,tanggal,waktu,jumlah,harga_obat)
							VALUES('$kode_transaksi','$kode_obat',NOW(),NOW(),'$jumlah','$harga_obat')";
							$hasil = @mysqli_query ($conn, $q);//menjalankan query
						
							if($hasil){//jika berhasil
								echo'<script type="text/javascript">alert("Data berhasil dimasukkan");</script> ';
								
							}else{//jika gagal
							//tampilkan error
							echo '<script type="text/javascript">alert("Data gagal dimasukkan karena error sistem");</script> ';
							//Debug:
							echo '<p>'. mysqli_error($conn).'<br><br>Query: ' .$q. '</p>';
							}
						}else{
							echo'<script type="text/javascript">alert("Kode Transaksi Telah Digunakan");</script> ';
						}
					}
						mysqli_close($conn);//menutup koneksi
					}
					else{
						foreach ($arrayError as $psn) {//menampilkan error
							echo"<h11>$psn</h11><br>\n";
						}
						echo '</p><h5>Silahkan coba lagi.</h5>';
					}
				}
				?>
            <form action="kasirpage.php" method="post">
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<div class="form-label-group">
					  <input type="text" name="kode_transaksi" id="kode_transaksi" class="form-control" placeholder="Kode Obat" required="required" autofocus="autofocus">
					  <label for="kode_transaksi">Kode Transaksi</label>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="form-label-group">
					  <input type="text" name="kode_obat" id="kode_obat" class="form-control" placeholder="Kode Obat" required="required">
					  <label for="kode_obat">Kode Obat</label>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="form-group">
				<div class="form-row">
				  <div class="col-md-6">
					<div class="form-label-group">
					  <input type="text" name="harga_obat" id="harga_obat" class="form-control" placeholder="Harga" required="required">
					  <label for="harga_obat">Harga</label>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="form-label-group">
					  <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Qty" required="required">
					  <label for="jumlah">Qty</label>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="text-center">
		  <input class="btn btn-primary btn-block" 
			  id="submit" type="submit" name="submit" 
			  value="Tambah" />
		  </div>
			</form>
          </div>
          <div class="card-footer small text-muted"></div>
        </div>
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
