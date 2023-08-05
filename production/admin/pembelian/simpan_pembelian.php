<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../alert/css/sweetalert.css">
</head>
<body>
<?php
	session_start();
	 include '../../koneksi.php';
	 include 'kode_pb.php';
	 
	 $query_cek = mysqli_query($konek,"SELECT * FROM user WHERE username =  '$user' and password='$pass'");
	 mysqli_close();
	 $cek = mysqli_num_rows($query_cek);

	 if ($cek > 0) {
  	 
  	 $data = mysqli_fetch_assoc($query_cek);
     $_SESSION['id_user'] = $data['id_user'];
 	 }

	 $faktur_pembelian       = $_POST['faktur_pembelian'];
	 $nota_order             = $_POST['nota_order'];
	 $tanggal_pembelian      = $_POST['tanggal_pembelian'];
	 $supplier               = $_POST['supplier'];
	 $tanggal_jatuh_tempo_pb = $_POST['tanggal_jatuh_tempo'];

	 if ($tanggal_pembelian > $tanggal_jatuh_tempo_pb){
	 	echo "
			  <script type='text/javascript'>
				setTimeout(function () { 
				
					swal({
			            title: 'Tanggal Tidak Boleh Lebih Dari Tanggal Pembelian',
			            text:  '$tanggal_jatuh_tempo_pb',
			            type: 'error',
			            timer: 3000,
			            showConfirmButton: true
			        });		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('../pembelian.php');
				} ,1000);	
			  </script>";
	 
	 }else{

	 $qsup = mysqli_query($konek, "SELECT * FROM supplier WHERE kode_supplier = '$supplier'");
	 while ($data = mysqli_fetch_array($qsup)) {
	 	$kode_supplier = $data['kode_supplier'];
	 }	


     $sql   = mysqli_query($konek, "select * from pembelian_detail");

     $total = 0;
         if(mysqli_num_rows($sql) > 0){
                        
     while($data = mysqli_fetch_array($sql)){
          $item         = $data['item'];
          $harga_beli   = $data['harga_beli'];
          $subtotal     = $item * $harga_beli;
          $jumlah_item  = $jumlah_item + $item;
          $total        = $total + $subtotal;
     }

 }


	mysqli_query($konek,"INSERT INTO pembelian (faktur_pembelian, nota_order, tanggal_pembelian, kode_supplier, id_user, tanggal_jatuh_tempo, total_muatan,  total_pembelian)VALUES('$faktur_pembelian', '$nota_order', '$tanggal_pembelian', '$kode_supplier', '$_SESSION[id_user]', '$tanggal_jatuh_tempo_pb', '$jumlah_item', '$total')");

	mysqli_query($konek, "INSERT INTO d_pembelian(faktur_pembelian, kode_barang, harga_beli, jumlah, total, id_pembelian_detail) 
        SELECT faktur_pembelian, kode_barang, harga_beli, item, subtotal, id_pembelian_detail FROM pembelian_detail");

	mysqli_query($konek, "INSERT INTO hutang_pembelian(faktur_pembelian, nota_order, tanggal_pembelian, tanggal_jatuh_tempo, jumlah_hutang, kode_supplier, id_user, sisa_hutang)
		SELECT faktur_pembelian, nota_order, tanggal_pembelian, tanggal_jatuh_tempo, total_pembelian, kode_supplier, id_user, total_pembelian FROM pembelian WHERE faktur_pembelian='$faktur_pembelian'");

	mysqli_query($konek, "DELETE FROM pembelian_detail WHERE faktur_pembelian = '$faktur_pembelian'");

	   echo "<script>setTimeout(function () { 
  
    swal({
            title: 'Data Berhasil Tersimpan',
            text:  '$faktur_pembelian',
            type: 'success',
            timer: 3000,
            showConfirmButton: true
        });   
  },10);  
  window.setTimeout(function(){ 
    window.location.replace('../transaksi_pembelian.php');
  } ,1000); </script>";  
       }
 ?>
 <script src="../../alert/js/sweetalert.min.js"></script>
<script src="../../alert/js/qunit-1.18.0.js"></script>

</body>
</html>