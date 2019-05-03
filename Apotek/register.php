<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
         <?php
			    include "koneksi.php";
				//skrip ini melakukan query INSERT yg menambah sebuah rekaman pada tabel pengguna.
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$arrayError = array();//inisialisasi array error
					
					//apakah nama telah dimasukkan
					if(empty($_POST['nama'])){
						$arrayError[]='<script type="text/javascript">alert("Nama tidak boleh kosong");</script> ';
					}
					else{$nama = trim($_POST['nama']);
					}
					
					if(empty($_POST['email'])){
						$arrayError[]='<script type="text/javascript">alert("Email tidak boleh kosong");</script>';
					}
					else{$email = trim($_POST['email']);
					}
					
					//apakah kedua password cocok
					if(!empty($_POST['password1'])){
						if($_POST['password1'] != $_POST['password']){
							$arrayError[]='<script type="text/javascript">alert("Password yang anda masukkan tidak sama");</script> ';
						}
						else{$password = trim($_POST['password']);
						}
					}
					else{$arrayError[]='<script type="text/javascript">alert("password tidak boleh kosong");</script>' ;
					}
					
					//jika sebua data terisi
					if(empty($arrayError)){
						require('koneksi.php');//koneksi ke database.
						//melakukan query
						$cek_data=mysqli_query($conn, "SELECT * FROM pengguna WHERE
						email ='".$_POST['email']."'  ");
						if (mysqli_num_rows($cek_data) < 1){
							$q = "INSERT INTO pengguna (id,nama,email,password,status)
							VALUES('','$nama','$email','$password','Kasir' )";
							$hasil = @mysqli_query ($conn, $q);//menjalankan query
						
							if($hasil){//jika berhasil
								echo'<script type="text/javascript">alert("Data berhasil dimasukkan");</script> ';
								header("Location:datapegawai.php");
							}else{//jika gagal
							//tampilkan error
							echo '<script type="text/javascript">alert("Data gagal dimasukkan karena error sistem");</script> ';
							//Debug:
							echo '<p>'. mysqli_error($conn).'<br><br>Query: ' .$q. '</p>';
							}
						}else{
							echo'<script type="text/javascript">alert("Email Telah Digunakan");</script> ';
						}
						mysqli_close($conn);//menutup koneksi
					}
					else{
						foreach ($arrayError as $psn) {//menampilkan error
							echo"<h11>$psn</h11><br>\n";
						}
						echo '</p><h2>Silahkan coba lagi.</h2>';
					}
					}
				?>
        <form action="register.php" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input class="form-control" id="nama"  for="nama" 
				placeholder="Name" name="nama" type="text" required autofocus
				value="<?php if (isset($_POST['nama'])) echo $_POST['nama']; ?>"/>
              <label for="nama">Name</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input class="form-control" id="email" for="email" 
				placeholder="Email" name="email" type="email" required autofocus
				value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/>
              <label for="email">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input class="form-control" id="password" for="password" 
					placeholder="Password" name="password" type="password" required autofocus
					value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"/>
                  <label for="password">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input class="form-control" id="password1"  for="password1" 
					placeholder="Confirm password" name="password1" type="password" required autofocus
					value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>"/>
                  <label for="password1">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
		  <div class="text-center">
		  <input class="btn btn-primary btn-block" 
			  id="submit" type="submit" name="submit" 
			  value="Registrasi" />
		  </div>
           </form>
        <div class="text-center">
			<a class="d-block small mt-3" href="adminpage.php">Dashboard</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
