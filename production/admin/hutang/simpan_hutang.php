<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../alert/css/sweetalert.css">
</head>
<body>

<?php

	include '../../koneksi.php';


    $id_hutang            = $_GET['id_hutang'];
    $faktur_pembelian     = $_POST['faktur_pembelian'];
    $nota_order           = $_POST['nota_order'];
	$nomor_transfer       = $_POST['nomor_transfer'];
	$tanggal_pencatatan   = $_POST['tanggal_pencatatan'];
	$cicilan			  = $_POST['cicilan'];
	$jumlah_cicilan       = $_POST['jumlah_cicilan'];

	$qry = mysqli_query($konek, "SELECT * FROM hutang_pembelian WHERE id_hutang='$id_hutang'");
		$data1 = mysqli_fetch_array($qry);
		$tanggal_pembelian = $data1['tanggal_pembelian'];
		$sisa              = $data1['sisa_hutang']; 

	if ($sisa < $jumlah_cicilan){
				echo "
			  <script type='text/javascript'>
				setTimeout(function () { 
				
					swal({
			            title: 'Jumlah Cicilan Lewat Batas',
			            text:  '$jumlah_cicilan',
			            type: 'error',
			            timer: 3000,
			            showConfirmButton: true
			        });		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('../hutang.php');
				} ,1000);	
			  </script>";
	 
			}else{

	 if ($tanggal_pembelian > $tanggal_pencatatan){
	 	echo "
			  <script type='text/javascript'>
				setTimeout(function () { 
				
					swal({
			            title: 'Tanggal Hutang Tidak Boleh Lebih Dari Tanggal Pencatatan',
			            text:  '$tanggal_pencatatan',
			            type: 'error',
			            timer: 3000,
			            showConfirmButton: true
			        });		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('../hutang.php');
				} ,1000);	
			  </script>";
	 
	 }else{


	$query = mysqli_query($konek, "SELECT * FROM hutang_pembelian WHERE id_hutang='$id_hutang'");

	$data_hutang  = mysqli_fetch_array($query);

			$sisa_hutang  = $data_hutang['sisa_hutang'] - $jumlah_cicilan;

			if ($sisa_hutang == 0)
			{
				$keterangan = "Lunas";
			}
			else
			{
				$keterangan = "Belum Lunas";
			}

			mysqli_query($konek, "UPDATE hutang_pembelian SET sisa_hutang = '$sisa_hutang', keterangan_hutang='$keterangan' WHERE id_hutang='$id_hutang'");
			
			mysqli_query($konek, "INSERT INTO hutang_detail(id_hutang_detail, id_hutang, faktur_pembelian, nota_order, nomor_transfer, tanggal_pencatatan, cicilan, jumlah_cicilan, sisa_hutang) VALUES (null, '$id_hutang', '$faktur_pembelian', '$nota_order', '$nomor_transfer', '$tanggal_pencatatan', '$cicilan', '$jumlah_cicilan', '$sisa_hutang')");

			echo "<script>setTimeout(function () { 
  
    swal({
            title: 'Data Berhasil Tersimpan',
            text:  '$nomor_transfer',
            type: 'success',
            timer: 3000,
            showConfirmButton: true
        });   
  },10);  
  window.setTimeout(function(){ 
    window.location.replace('../hutang.php');
  } ,1000); </script>";  
		}
	}
?>

<script src="../../alert/js/sweetalert.min.js"></script>
<script src="../../alert/js/qunit-1.18.0.js"></script>

</body>
</html>