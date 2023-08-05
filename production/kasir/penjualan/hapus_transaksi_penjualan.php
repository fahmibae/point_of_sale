<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../alert/css/sweetalert.css">
</head>
<body>
<?php
include '../../koneksi.php';
include 'kode_pj.php';

$faktur_penjualan = $_GET['faktur_penjualan'];
$query = "DELETE FROM penjualan WHERE faktur_penjualan = '$faktur_penjualan'"; 
$query1 = "DELETE FROM d_penjualan WHERE faktur_penjualan = '$faktur_penjualan'";

$proses = mysqli_query($konek, $query);
$proses1 = mysqli_query($konek, $query1);

echo "<script>setTimeout(function () { 
  
    swal({
            title: 'Data Berhasil Terhapus',
            text:  '$faktur_penjualan',
            type: 'success',
            timer: 3000,
            showConfirmButton: true
        });   
  },10);  
  window.setTimeout(function(){ 
    window.location.replace('../transaksi_penjualan.php');
  } ,1000); </script>";
		
?>
<script src="../../alert/js/sweetalert.min.js"></script>
<script src="../../alert/js/qunit-1.18.0.js"></script>

</body>
</html>