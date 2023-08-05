<?php

include '../../koneksi.php';

$tanggal1 = $_POST['tanggal1'];
$tanggal2 = $_POST['tanggal2'];

$qry = mysqli_query($konek,"SELECT * FROM pembelian WHERE (tanggal_pembelian BETWEEN '$tanggal1' AND '$tanggal2')");
echo "<script>window.location='../laporan_pembelian_periode.php?tanggal1=$tanggal1&tanggal2=$tanggal2';
</script>";

?>