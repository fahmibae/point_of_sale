<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../alert/css/sweetalert.css">
</head>
<body>

<?php

include '../../koneksi.php';

    $kode_barang    = $_POST['kode_barang'];
    $nama_barang    = $_POST['nama_barang'];
    $keterangan     = $_POST['keterangan'];
    $harga_beli     = $_POST['harga_beli'];

    $cek = mysqli_num_rows(mysqli_query($konek, "select * from pemesanan where kode_barang = '$kode_barang' "));
            if ($cek > 0)
            {

              echo "<script>setTimeout(function () { 
  
            swal({
            title: 'Data Sudah Ada',
            text:  '$kode_barang',
            type: 'warning',
            timer: 3000,
            showConfirmButton: true
            });   
            },10);  
            window.setTimeout(function(){ 
            window.location.replace('../pemesanan.php');
            } ,3000); </script>";

            }else{

             mysqli_query($konek, "insert into pemesanan (kode_barang, nama_barang, keterangan, harga_beli) values ('$kode_barang', '$nama_barang', '$keterangan', '$harga_beli')");

              echo "<script>window.location.href='../pemesanan.php';
              </script>";  
                       }
?>
<script src="../../alert/js/sweetalert.min.js"></script>
<script src="../../alert/js/qunit-1.18.0.js"></script>

</body>
</html>