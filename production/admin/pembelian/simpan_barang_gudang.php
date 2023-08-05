<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../alert/css/sweetalert.css">
</head>
<body>
<?php

	include '../../koneksi.php';

	$id_barang_pembelian = $_GET['id_barang_pembelian'];

	$qry   = mysqli_query($konek, "SELECT * FROM barang_pembelian");
	$data  = mysqli_fetch_array($qry);

	$id_barang_pembelian  = $data['id_barang_pembelian'];
	$faktur_pembelian = $data['faktur_pembelian'];
	$kode_barang   = $data['kode_barang'];
	$nama_barang   = $data['nama_barang'];
	$keterangan    = $data['keterangan'];
	$harga_beli    = $data['harga_beli'];
	$jumlah        = $data['jumlah'];
	$subtotal      = $data['subtotal'];  

	mysqli_query($konek, "INSERT INTO d_pembelian (id_pembelian, faktur_pembelian, kode_barang, harga_beli, jumlah, total, id_barang_pembelian)VALUES('$id_pembelian','$faktur_pembelian','$kode_barang','$harga_beli', '$jumlah','$subtotal', '$id_barang_pembelian')");

	mysqli_query($konek, "DELETE FROM barang_pembelian WHERE id_barang_pembelian='$id_barang_pembelian'");

	echo "<script>setTimeout(function () { 
  
    swal({
            title: 'Data Berhasil Tersimpan',
            text:  '$nama_barang',
            type: 'success',
            timer: 3000,
            showConfirmButton: true
        });   
  },10);  
  window.setTimeout(function(){ 
    window.location.replace('../barang.php');
  } ,1000); </script>"; 



?>
<script src="../../alert/js/sweetalert.min.js"></script>
<script src="../../alert/js/qunit-1.18.0.js"></script>

</body>
</html>