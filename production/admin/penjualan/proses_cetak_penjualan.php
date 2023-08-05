<?php
include '../../koneksi.php';

$faktur_penjualan = $_GET['faktur_penjualan'];

$sql = mysqli_query($konek, "SELECT * FROM penjualan WHERE faktur_penjualan='$faktur_penjualan'");

$cek = mysqli_num_rows($sql);
if ($cek>0) {

	$data = mysqli_fetch_assoc($sql);
	
		echo "<script language='javascript'>

		window.location='../transaksi_penjualan.php';
		window.open('../cetak/cetak_kwitansi.php?faktur_penjualan=$faktur_penjualan');
		
		</script>";

}else{
echo "<script language='javascript'>

		window.location='../transaksi_penjualan.php';
		
		
		</script>";	
}
	
		

		
	




?>

