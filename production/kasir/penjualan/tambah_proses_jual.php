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
            
            $kode_barang       = $_POST['kode_barang'];
            $nama_barang       = $_POST['nama_barang'];
            $keterangan        = $_POST['keterangan'];
            $harga_jual        = $_POST['harga_jual'];
            $item              = $_POST['item'];
            $subtotal          = $item * $harga_jual;

            $cek_barang = mysqli_query($konek,"SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
            $barangrow = mysqli_fetch_array($cek_barang);

            if ($barangrow['stok'] < $item ){
              echo "
              <script type='text/javascript'>
              setTimeout(function () { 
              
                swal({
                        title: 'Stok Barang Habis Atau Tidak Tidak Cukup',
                        text:  '$kode_barang',
                        type: 'warning',
                        timer: 3000,
                        showConfirmButton: true
                    });   
              },10);  
              window.setTimeout(function(){ 
                window.location.replace('../penjualan.php');
              } ,1000); 
              </script>";
   
   }else{

           $cek = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM penjualan_detail WHERE kode_barang = '$kode_barang' "));
            if ($cek > 0)
            {

              echo "<script>setTimeout(function () { 
  
            swal({
            title: 'Data Sudah Ada',
            text:  '$nama_barang',
            type: 'warning',
            timer: 3000,
            showConfirmButton: true
            });   
            },10);  
            window.setTimeout(function(){ 
            window.location.replace('../penjualan.php');
            } ,3000); </script>";

            }else{

              mysqli_query($konek, "INSERT INTO penjualan_detail (faktur_penjualan, kode_barang, nama_barang, keterangan, harga_jual, item, subtotal) VALUES ('$penjualan', '$kode_barang', '$nama_barang', '$keterangan','$harga_jual', '$item', '$subtotal')");

              echo "<script>window.location='../penjualan.php'; </script>";  
           }
}
              ?>

<script src="../../alert/js/sweetalert.min.js"></script>
<script src="../../alert/js/qunit-1.18.0.js"></script>

</body>
</html>
