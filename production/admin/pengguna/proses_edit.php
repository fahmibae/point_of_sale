<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../alert/css/sweetalert.css">
</head>
<body>
<?php
    include '../../koneksi.php';
    $id_user        = $_POST['id_user'];
    $nama_pengguna  = $_POST['nama_pengguna'];
    $username       = $_POST['username'];
    $password       = md5($_POST['password']);
    $level          = $_POST['level'];
    
    $user =  mysqli_query($konek,"update user set id_user='$id_user', nama_pengguna='$nama_pengguna', username='$username',password='$password', level='$level' where id_user='$id_user'");
    if ($user) {
    	 echo "
			  <script type='text/javascript'>
				setTimeout(function () { 
				
					swal({
			            title: 'Berhasil Diubah',
			            text:  '$username',
			            type: 'success',
			            timer: 3000,
			            showConfirmButton: true
			        });		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('../pengguna.php');
				} ,1000);	
			  </script>";
    }else{
    	echo "
			  <script type='text/javascript'>
				setTimeout(function () { 
				
					swal({
			            title: 'Gagal Diubah',
			            text:  '$username',
			            type: 'error',
			            timer: 3000,
			            showConfirmButton: true
			        });		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('../pengguna.php');
				} ,1000);	
			  </script>";

    }
?>
<script src="../../alert/js/sweetalert.min.js"></script>
<script src="../../alert/js/qunit-1.18.0.js"></script>

</body>
</html>

