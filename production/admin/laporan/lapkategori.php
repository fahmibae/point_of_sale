<?php
session_start();
	include '../../koneksi.php';

	 $query_cek = mysqli_query($konek,"SELECT * FROM  user WHERE  username =  '$user' and password='$pass'");
mysqli_close();
$cek = mysqli_num_rows($query_cek);

if ($cek>0) {

     $_SESSION['username'] = $cek['username'];}


?>
<?php
function tglIndonesia($str){
    $tr   = trim($str);
    $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
    return $str;
  }  ?>

<style type="text/css">
	.st_total {
		font-size: 9pt;
		font-weight: bold;
		font-family: Verdana, Arial, Helvetica, sans-serif;
	}

	.style6 {
		color: #000000;
		font-size: 9pt;
		font-weight: bold;
		font-family: Arial;
	}

	.style9 {
		color: #000000;
		font-size: 9pt;
		font-weight: normal;
		font-family: Arial;
	}

	.style9b {
		color: #000000;
		font-size: 9pt;
		font-weight: bold;
		font-family: Arial;
	}

	.style19b {
		color: #000000;
		font-size: 11pt;
		font-weight: bold;
		font-family: Arial;
	}

	.style10b {
		color: #000000;
		font-size: 11pt;
		font-weight: bold;
		font-family: Arial;
	}
</style>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="7">
			<div align="center">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="69%" rowspan="3" valign="top" class="style19b">
							<h3 style="margin-bottom: -29px;">Sedia Rupa-rupa Kulit Krecek</h3><br />
							<h2 style="margin-bottom: -12px;">UD HJ LATIFAH</h2><br />
							<div class="style9" style="margin-bottom: -12px;">- Jl. Raya Stamplat Arjawinangun (Kedapang Indah) No. 1</div><br />
							<div class="style9" style="margin-bottom: -12px;">- Jl. Ir. Djuanda (Battembat) No. 13 Cirebon</div><br />
							<div class="style9" style="margin-bottom: -12px;">Telp. (0231) 357514, Hp. 081 324 594 803</div>
						</td><br />
					</tr>
					<tr>
						<td class="style9">Tanggal Cetak</td>
						<td>
							<div align="center">:</div>
						</td>
						<td><span class="style9">
								<u><?php echo tglIndonesia(date('D, d F Y')); ?></u>
							</span></td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
</table>
</br>
<hr style="border-bottom: 1px solid #000000;">
<h2>
	<div class="style19b" style="text-align: center; font-size: 18pt;"><u>Laporan Data Kategori</u></div>
</h2>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="12">
			<hr />
		</td>
	</tr>
	<tr>
      <td width="100" class="style6"><div align="left">Kode Kategori</div></td>
      <td width="70" class="style6"><div align="left">Nama Kategori</div></td>
      <td width="70" class="style6"><div align="left">Nama Barang</div></td>
	</tr>
	<tr>
		<td colspan="12">
			<hr />
		</td>
	</tr>

	<?php
      	$no = 1;
      	$tampil = mysqli_query($konek, "SELECT * FROM kategori ktg JOIN barang brg ON ktg.nama_kategori = brg.nama_kategori");
		while ($data1 = mysqli_fetch_assoc($tampil)){
	  ?>
	<tr>
		<td class="style9" align="left"><?php echo $data1['kode_kategori'];?></td>
		<td class="style9" align="left"><?php echo $data1['nama_kategori'];?></td>
		<td class="style9" align="left"><?php echo $data1['nama_barang'];?></td>
	</tr>
	<?php }?>
	<tr>
		<td colspan="12">
			<hr />
		</td>
	</tr>
</table>


<table width="98%" border="0" align="center">
	<tr>
		<td colspan="3">&nbsp;</td>
		<td colspan="3">&nbsp;</td>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3">
			<div align="center" class="style9"><?php echo $_SESSION['username']; ?></div>
		</td>
		<td colspan="3">&nbsp;</td>
		<td colspan="3"></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
		<td colspan="3">&nbsp;</td>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
		<td colspan="3">&nbsp;</td>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="82">
			<div align="right">(</div>
		</td>
		<td width="89">
			<div align="center" class="style9"></div>
		</td>
		<td width="76">)</td>
	</tr>
</table>
<script type="text/javascript">
	//---yang load di awal
	window.print();
</script>
