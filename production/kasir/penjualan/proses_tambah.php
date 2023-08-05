<?php
	include '../../koneksi.php';
	$kode_barang = $_GET['kode_barang'];

	$query = mysqli_query($konek, "SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
	$data = mysqli_fetch_array($query);
	$barang = array(
	 'nama_barang'   => $data['nama_barang'],
	 'harga_jual'    => $data['harga_jual'],
	 'keterangan'    => $data['keterangan']);
	echo json_encode($barang); 

?>