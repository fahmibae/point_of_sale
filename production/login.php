<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="alert/css/sweetalert.css">
<link rel="icon" href="images/favicon3.ico">
</head>
<body>
<?php
session_start();
include "koneksi.php";
$konek->query("SET NAMES 'utf8'");
$user = $_POST['username'];
$pass = md5($_POST['password']); 

$query_cek = mysqli_query($konek,"SELECT * FROM  user WHERE  username =  '$user' and password='$pass'");
$cek = mysqli_num_rows($query_cek);

if ($cek>0) {


	$data = mysqli_fetch_assoc($query_cek);

		if ($data['level'] == "admin"){
		 $_SESSION['id_user'] = $data['id_user'];
		 $_SESSION['username'] = $_POST['username'];
		 $_SESSION['level']    = $data['level'];
		 $_SESSION['nama_pengguna'] = $data['nama_pengguna'];
		 echo "
			  <script type='text/javascript'>
				setTimeout(function () { 
				
					swal({
			            title: 'Berhasil Login',
			            text:  '$user',
			            type: 'success',
			            timer: 3000,
			            showConfirmButton: true
			        });		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('admin/index.php');
				} ,1000);	
			  </script>";

		}elseif ($data['level'] == "kasir"){
		 $_SESSION['id_user']  = $data['id_user'];
		 $_SESSION['username'] = $_POST['username'];
		 $_SESSION['level']    = $data['level'];
		 $_SESSION['nama_pengguna'] = $data['nama_pengguna'];
		 echo "
			  <script type='text/javascript'>
				setTimeout(function () { 
				
					swal({
			            title: 'Berhasil Login',
			            text:  '$user',
			            type: 'success',
			            timer: 3000,
			            showConfirmButton: true
			        });		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('kasir/transaksi_penjualan.php');
				} ,1000);	
			  </script>";
		
	}else{
	
		 echo "
			  <script type='text/javascript'>
				setTimeout(function () { 
				
					swal({
			            title: 'Username Salah',
			            text:  '$user',
			            type: 'error',
			            timer: 3000,
			            showConfirmButton: true
			        });		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('index.php');
				} ,1000);	
			  </script>";
	}

}else{

	echo "
			  <script type='text/javascript'>
				setTimeout(function () { 
				
					swal({
			            title: 'Username Salah',
			            text:  '$user',
			            type: 'error',
			            timer: 3000,
			            showConfirmButton: true
			        });		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('index.php');
				} ,1000);	
			  </script>";
	

}
?>
<script src="alert/js/sweetalert.min.js"></script>
<script src="alert/js/qunit-1.18.0.js"></script>

</body>
</html>
