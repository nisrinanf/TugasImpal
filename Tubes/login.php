<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
<?php
	//Bagian ini berfungsi untuk memproses submisi form login!
	//memeriksa apakah form login sudah terisi:
	if (isset($_POST['login'])){
		include "koneksi.php";

		$cek_data=mysqli_query($conn, "SELECT * FROM pengguna WHERE
		email ='".$_POST['email']."' AND password = '".$_POST['password']."' ");
		$data = mysqli_fetch_array($cek_data);
		$status = $data['status'];
		if (mysqli_num_rows($cek_data) > 0){
		if($status == 'Admin'){
			header("Location:adminpage.php");
		}elseif($status == 'Kasir'){
			header("Location:kasirpage.php");
		}
	}else{
		echo '<script type="text/javascript">alert("Pastikan email dan password anda benar");</script> ';
	}
		}
?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Apotek NISR Login</div>
      <div class="card-body">
        <form method="post" action="login.php">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus"
			  value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" placeholder="Username" />
              <label for="email">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required"
			  value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" placeholder="Password" />
              <label for="password">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
		  <div class="text-center">
		  <input class="btn btn-primary btn-block" 
			  id="submit" type="submit" name="login" 
			  value="Login" />
        </form>
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
