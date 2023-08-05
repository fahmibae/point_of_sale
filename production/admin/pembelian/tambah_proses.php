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


            $kode_barang       = $_POST['kode_barang'];
            $nama_barang       = $_POST['nama_barang'];
            $keterangan        = $_POST['keterangan'];
            $harga_beli        = $_POST['harga_beli'];
            $item              = $_POST['item'];
            $subtotal          = $item * $harga_beli;
            $id_pemesanan      = $_POST['id'];
           $cek = mysqli_num_rows(mysqli_query($konek, "select * from pembelian_detail where kode_barang = '$kode_barang' "));
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
            window.location.replace('../pembelian.php');
            } ,3000); </script>";

            }else{

             mysqli_query($konek, "insert into pembelian_detail (faktur_pembelian, kode_barang, nama_barang, keterangan, harga_beli, item, subtotal, id_pemesanan) values ('$pembelian', '$kode_barang' , '$nama_barang', '$keterangan', '$harga_beli' , '$item', '$subtotal', '$id_pemesanan')");

              echo "<script> window.location='../pembelian.php'; </script>";  
           }
                    
              ?>

<script src="../../alert/js/sweetalert.min.js"></script>
<script src="../../alert/js/qunit-1.18.0.js"></script>

</body>
</html>
