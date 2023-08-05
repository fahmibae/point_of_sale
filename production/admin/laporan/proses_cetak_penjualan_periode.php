 <?php 
 include '../../koneksi.php';
 include 'kode_pj.php';

	 $tanggal1 = $_GET['tanggal1'];
	 $tanggal2 = $_GET['tanggal2'];
	echo "<script language='javascript'>

		window.location='../laporan_penjualan_periode.php';
		window.open('lappenjualanperiode.php?tanggal1=$tanggal1&tanggal2=$tanggal2');
		
		</script>";
?>