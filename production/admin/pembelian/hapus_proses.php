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

$id_pembelian_detail = $_GET['id_pembelian_detail'];
$query1 = mysqli_query($konek, "SELECT * FROM pembelian_detail");
$data = mysqli_fetch_array($query1);
$nama_barang = $data['nama_barang'];

$query = mysqli_query($konek, "DELETE FROM pembelian_detail WHERE id_pembelian_detail = '$id_pembelian_detail'"); // query hapus data
 
   echo "<script>window.location.href='../pembelian.php';</script>"; 

		
?>
<script src="../../alert/js/sweetalert.min.js"></script>
<script src="../../alert/js/qunit-1.18.0.js"></script>

</body>
</html>