<?php
	include '../../koneksi.php';
	$kode_barang = $_GET['kode_barang'];

	$query = mysqli_query($konek, "SELECT * FROM pemesanan WHERE kode_barang = '$kode_barang'");
	$data = mysqli_fetch_array($query);
	$barang = array(
	 'id'            => $data['id_pemesanan'],
	 'nama_barang'   => $data['nama_barang'],
	 'harga_beli'    => $data['harga_beli'],
	 'keterangan'    => $data['keterangan']);
	echo json_encode($barang); 

?>