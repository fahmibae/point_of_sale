<?php
	$date = date("Ymd");
	$query =mysqli_query($konek, "SELECT max(faktur_penjualan) as maxKode FROM penjualan");
	$data = mysqli_fetch_array($query);
	$faktur_penjualan = $data['maxKode'];
	$faktur_penjualan = (int) substr($faktur_penjualan, 12, 4);
	$faktur_penjualan++;
	$char = "PJ-";
	$tahun=substr($date, 0, 4);
	$bulan=substr($date, 5, 2);
	$tanggal=substr($date,7, 2);
	$penjualan = $char .$tahun .$bulan . $tanggal . sprintf("%04s", $faktur_penjualan);
	
?>