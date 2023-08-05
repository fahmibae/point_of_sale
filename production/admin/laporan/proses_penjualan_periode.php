<?php

include '../../koneksi.php';

$tanggal1 = $_POST['tanggal1'];
$tanggal2 = $_POST['tanggal2'];

$qry = mysqli_query($konek,"SELECT * FROM penjualan WHERE (tanggal_penjualan BETWEEN '$tanggal1' AND '$tanggal2')");
echo "<script>window.location='../laporan_penjualan_periode.php?tanggal1=$tanggal1&tanggal2=$tanggal2';
</script>";

?>