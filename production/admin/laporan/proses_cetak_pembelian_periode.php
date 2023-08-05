 <?php 
 include '../../koneksi.php';
 include 'kode_pb.php';

	 $tanggal1 = $_GET['tanggal1'];
	 $tanggal2 = $_GET['tanggal2'];
	echo "<script language='javascript'>

		window.location='../laporan_pembelian_periode.php';
		window.open('lappembelianperiode.php?tanggal1=$tanggal1&tanggal2=$tanggal2');
		
		</script>";
?>