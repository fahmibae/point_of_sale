<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../alert/css/sweetalert.css">
</head>
<body>
<?php
include '../../koneksi.php';

$id_pemesanan = $_GET['id_pemesanan'];
$qry   = mysqli_query($konek, "SELECT * FROM pemesanan WHERE id_pemesanan = '$id_pemesanan'");

$data        = mysqli_fetch_array($qry);
$kode_barang = $data['kode_barang'];  

$query = mysqli_query($konek, "DELETE FROM pemesanan WHERE id_pemesanan = '$id_pemesanan'");
 
if ($query) {
    	 echo "
			  <script type='text/javascript'>
				window.location.href='../pemesanan.php';
			  </script>";
    }else{
    	echo "
			  <script type='text/javascript'>
				setTimeout(function () { 
				
					swal({
			            title: 'Gagal Dihapus',
			            text:  'BR$kode_barang',
			            type: 'error',
			            timer: 3000,
			            showConfirmButton: true
			        });		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('../pemesanan.php');
				} ,1000);	
			  </script>";

    }
?>


?>
<script src="../../alert/js/sweetalert.min.js"></script>
<script src="../../alert/js/qunit-1.18.0.js"></script>

</body>
</html>
