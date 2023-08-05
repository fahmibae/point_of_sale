<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../alert/css/sweetalert.css">
</head>
<body>
<?php
include '../../koneksi.php';
include 'kode_pb.php';

$faktur_pembelian = $_GET['faktur_pembelian'];

$query = "DELETE FROM pembelian WHERE faktur_pembelian = '$faktur_pembelian'"; 

$query2 = "DELETE FROM d_pembelian WHERE faktur_pembelian = '$faktur_pembelian'";

$query3 = "DELETE FROM barang_pembelian WHERE faktur_pembelian = '$faktur_pembelian'";

$proses = mysqli_query($konek, $query);

$proses2 = mysqli_query($konek, $query2);

$proses3 = mysqli_query($konek, $query3);

echo "<script>setTimeout(function () { 
  
    swal({
            title: 'Data Berhasil Terhapus',
            text:  '$faktur_pembelian',
            type: 'success',
            timer: 3000,
            showConfirmButton: true
        });   
  },10);  
  window.setTimeout(function(){ 
    window.location.replace('../transaksi_pembelian.php');
  } ,1000); </script>"; 
		
?>
<script src="../../alert/js/sweetalert.min.js"></script>
<script src="../../alert/js/qunit-1.18.0.js"></script>

</body>
</html>