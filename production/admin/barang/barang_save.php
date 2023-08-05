<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../alert/css/sweetalert.css">
</head>
<body>
<?php
    include '../../koneksi.php';
 	
    $kode_barang       = $_POST['kode_barang'];
    $kategori          = $_POST['kategori'];
    $nama_barang       = $_POST['nama_barang'];
    $keterangan        = $_POST['keterangan'];
    $keuntungan        = $_POST['untung'];
    $potongan          = $_POST['potongan_harga'];
    $harga_beli        = $_POST['harga_beli'];
    $tahun_kadaluarsa  = $_POST['tahun_kadaluarsa'];
    $harga_jual        = $_POST['harga_jual'];
    $stok		       = $_POST['stok'];
   
    
    $barang = mysqli_query($konek,"insert into barang values ('$kode_barang','$kategori', '$nama_barang', '$keterangan', '$harga_beli', '$tahun_kadaluarsa', '$keuntungan', '$potongan', '$harga_jual', '$stok')");

    if ($barang) {
    	 echo "
			  <script type='text/javascript'>
				setTimeout(function () { 
				
					swal({
			            title: 'Berhasil Disimpan',
			            text:  '$kode_barang',
			            type: 'success',
			            timer: 3000,
			            showConfirmButton: true
			        });		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('../barang.php');
				} ,1000);	
			  </script>";
    }else{
    	echo "
			  <script type='text/javascript'>
				setTimeout(function () { 
				
					swal({
			            title: 'Gagal Disimpan',
			            text:  '$kode_barang',
			            type: 'error',
			            timer: 3000,
			            showConfirmButton: true
			        });		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('../barang.php');
				} ,1000);	
			  </script>";

    }
?>
<script src="../../alert/js/sweetalert.min.js"></script>
<script src="../../alert/js/qunit-1.18.0.js"></script>

</body>
</html>

