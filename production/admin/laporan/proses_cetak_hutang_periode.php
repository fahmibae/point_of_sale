 <?php 
 include '../../koneksi.php';
 include 'kode_pb.php';

	 $tanggal1 = $_GET['tanggal1'];
	 $tanggal2 = $_GET['tanggal2'];
	echo "<script language='javascript'>

		window.location='../laporan_hutang_periode.php';
		window.open('laphutangperiode.php?tanggal1=$tanggal1&tanggal2=$tanggal2');
		
		</script>";
?>