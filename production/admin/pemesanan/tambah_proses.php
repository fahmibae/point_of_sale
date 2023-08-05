<?php
	include '../../koneksi.php';
	$kode_barang = $_GET['kode_barang'];

	$query = mysqli_query($konek, "SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
	$data = mysqli_fetch_array($query);
	$barang = array(
	 'nama_barang'   => $data['nama_barang'],
	 'keterangan'    => $data['keterangan'],
	 'harga_beli'    => $data['harga_beli'],);
	echo json_encode($barang); 

?>