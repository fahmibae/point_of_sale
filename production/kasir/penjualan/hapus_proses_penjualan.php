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

$id_penjualan_detail = $_GET['id_penjualan_detail'];
$query1 = mysqli_query($konek, "SELECT * FROM penjualan_detail");
$data = mysqli_fetch_array($query1);
$nama_barang = $data['nama_barang'];
$query = mysqli_query($konek, "DELETE FROM penjualan_detail WHERE id_penjualan_detail = '$id_penjualan_detail'"); // query hapus data
 
echo "<script>window.location.href='../penjualan.php'</script>";
?>

<script src="../../alert/js/sweetalert.min.js"></script>
<script src="../../alert/js/qunit-1.18.0.js"></script>

</body>
</html>