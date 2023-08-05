<?php
	$date = date("Ymd");
	$query =mysqli_query($konek, "SELECT max(faktur_pembelian) as maxKode FROM pembelian");
	$data = mysqli_fetch_array($query);
	$faktur_pembelian = $data['maxKode'];
	$faktur_pembelian = (int) substr($faktur_pembelian, 12, 4);
	$faktur_pembelian++;
	$char = "PB-";
	$tahun=substr($date, 0, 4);
	$bulan=substr($date, 5, 2);
	$tanggal=substr($date,7, 2);
	$pembelian = $char .$tahun .$bulan . $tanggal . sprintf("%04s", $faktur_pembelian);
	
?>