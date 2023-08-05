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
	 include 'kode_pj.php';

	 $query_cek = mysqli_query($konek,"SELECT * FROM  user WHERE  username =  '$user' and password='$pass' and id_user='$id_user'");
	 mysqli_close();
	 $cek = mysqli_num_rows($query_cek);

	 if ($cek > 0) {
  
     $_SESSION['id_user'] = $cek['id_user'];
 	 }

	 $faktur_penjualan       = $_POST['faktur_penjualan'];
	 $tanggal_penjualan      = $_POST['tanggal_penjualan'];
	 $pelanggan              = $_POST['pelanggan'];
	 $total         		 = $_POST['total'];
	 $bayar					 = $_POST['bayar'];            
	 $kembali				 = $_POST['kembali'];

	 if ($kembali < 0){
	 	echo "
			  <script type='text/javascript'>
				setTimeout(function () { 
				
					swal({
			            title: 'Pembayaran Tidak Boleh Kurang Dari Total Penjualan',
			            text:  '$bayar',
			            type: 'error',
			            timer: 3000,
			            showConfirmButton: true
			        });		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('../penjualan.php');
				} ,1000);	
			  </script>";
	 }else{

      $sql = mysqli_query($konek, "SELECT * FROM penjualan_detail");
                        
      $total = 0;
        if(mysqli_num_rows($sql) > 0){
                        
        while($data = mysqli_fetch_array($sql)){
           $subtotal = $data['item'] * $data['harga_jual'];
           $total    = $total + $subtotal;
           $total_item = $total_item + $data['item'];
                          }}

	 	mysqli_query($konek,"INSERT INTO penjualan (faktur_penjualan, tanggal_penjualan, pelanggan, id_user, total_penjualan, total_muatan, uang_pembayaran)VALUES('$faktur_penjualan', '$tanggal_penjualan', '$pelanggan', '$_SESSION[id_user]', '$total', '$total_item', '$bayar')");

	 	mysqli_query($konek, "INSERT INTO d_penjualan (faktur_penjualan, kode_barang, harga_jual, jumlah, total, id_penjualan_detail)
	 		SELECT faktur_penjualan, kode_barang, harga_jual, item, subtotal, id_penjualan_detail FROM penjualan_detail WHERE faktur_penjualan='$penjualan'");

		mysqli_query($konek, "DELETE FROM penjualan_detail WHERE faktur_penjualan = '$faktur_penjualan'");


		echo "<script>setTimeout(function () { 
  
            swal({
            title: 'Data Berhasil Tersimpan',
            text:  '$faktur_penjualan',
            type: 'success',
            timer: 3000,
            showConfirmButton: true
            });   
            },10);  
            window.setTimeout(function(){ 
            window.location.replace('../transaksi_penjualan.php');
            window.open('../cetak/cetak_kwitansi.php?faktur_penjualan=$faktur_penjualan');
            } ,3000); </script>";
}

 ?>
 <script src="../../alert/js/sweetalert.min.js"></script>
<script src="../../alert/js/qunit-1.18.0.js"></script>

</body>
</html>