<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../alert/css/sweetalert.css">
</head>
<body>
<?php
    include '../../koneksi.php';

    $kode_supplier = $_POST['kode_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $alamat    	   = $_POST['alamat'];
    $telepon       = $_POST['telepon'];
    
    $supplier = mysqli_query($konek,"insert into supplier values ('$kode_supplier','$nama_supplier','$alamat','$telepon')");

    if ($supplier) {
    	 echo "
			  <script type='text/javascript'>
				setTimeout(function () { 
				
					swal({
			            title: 'Berhasil Disimpan',
			            text:  '$kode_supplier',
			            type: 'success',
			            timer: 3000,
			            showConfirmButton: true
			        });		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('../supplier.php');
				} ,1000);	
			  </script>";
    }else{
    	echo "
			  <script type='text/javascript'>
				setTimeout(function () { 
				
					swal({
			            title: 'Gagal Disimpan',
			            text:  '$kode_supplier',
			            type: 'error',
			            timer: 3000,
			            showConfirmButton: true
			        });		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('../supplier.php');
				} ,1000);	
			  </script>";

    }
?>
<script src="../../alert/js/sweetalert.min.js"></script>
<script src="../../alert/js/qunit-1.18.0.js"></script>

</body>
</html>

