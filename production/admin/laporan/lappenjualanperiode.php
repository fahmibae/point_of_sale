<?php
  
  session_start();

	include '../../koneksi.php';
	
   $query_cek = mysqli_query($konek,"SELECT * FROM  user WHERE  username =  '$user' and password='$pass'");
   mysqli_close();
   $cek = mysqli_num_rows($query_cek);

   if ($cek>0) {
  
     $_SESSION['username'] = $cek['username'];}

  $tanggal1 = $_GET['tanggal1'];
  $tanggal2 = $_GET['tanggal2'];

	$qry = mysqli_query($konek,"SELECT * FROM penjualan WHERE (tanggal_penjualan BETWEEN '$tanggal1' AND '$tanggal2')");
			
  $data = mysqli_fetch_array($qry);




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
	font-family:Verdana, Arial, Helvetica, sans-serif;
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
            <h3 style="margin-bottom: -29px;">Sedia Rupa-rupa Kulit Krecek</h3><br/><h2 style="margin-bottom: -12px;">UD HJ LATIFAH</h2><br/>
            <div class="style9" style="margin-bottom: -12px;">- Jl. Raya Stamplat Arjawinangun (Kedapang Indah) No. 1</div><br/>
            <div class="style9" style="margin-bottom: -12px;">- Jl. Ir. Djuanda (Battembat) No. 13 Cirebon</div><br/>
            <div class="style9" style="margin-bottom: -12px;">Telp. (0231) 357514, Hp. 081 324 594 803</div></td><br/>
            </tr>
          <tr>
            <td class="style9">Tanggal Cetak</td>
            <td><div align="center">:</div></td>
            <td><span class="style9">
              <u><?php echo $tanggal1;?> Sampai <?php echo $tanggal2;?></u>
            </span></td>
          </tr>   
        </table>
          </div>
       </td>
    </tr>
  </table>
   </br>
  <hr style="border-bottom: 1px solid #000000;">
  <h2><div class="style19b" style="text-align: center; font-size: 18pt;"><u>Laporan Penjualan Per Periode</u></div></h2>
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="8">
      <hr />      
      </td>
    </tr>
    <tr>
      <td width="40" class="style6"><div align="left">No</div></td>
      <td width="100" class="style6"><div align="left">Faktur Penjualan</div></td>
      <td width="70" class="style6"><div align="left">Tanggal Penjualan</div></td>
      <td width="70" class="style6"><div align="center">Pelanggan</div></td>
      <td width="60" class="style6"><div align="center">User</div></td>
      <td width="80" class="style6"><div align="right">Pembayaran</div></td>
      <td width="80" class="style6"><div align="center">Total Muatan</div></td>
      <td width="70" class="style6"><div align="right">Total Penjualan</div></td>
    </tr>
      <tr>
      <td colspan="8">
      <hr />      </td>
      </tr>

      <?php
      	$no = 1;
      	$qry1 = mysqli_query($konek,"SELECT * FROM penjualan WHERE tanggal_penjualan BETWEEN '$tanggal1' AND '$tanggal2'");

		    while ($data1 = mysqli_fetch_array($qry1)){
          $total_penjualan = $data1['total_penjualan'];
          $total           = $total + $total_penjualan;

	  ?>
      <tr>
        <td class="style9" align="left"><?php echo $no++;?>.</td>
        <td class="style9" align="left"><?php echo $data1['faktur_penjualan'];?></td>
        <td class="style9" align="left"><?php echo $data1['tanggal_penjualan'];?></td>
        <td class="style9" align="center"><?php echo $data1['pelanggan'];?></td>
        <td class="style9" align="center"><?php echo $data1['id_user'];?></td>
        <td class="style9" align="right">Rp. <?php echo number_format($data1['uang_pembayaran']);?></td>
        <td class="style9" align="center"><?php echo number_format($data1['total_muatan']);?></td>
        <td class="style9" align="right">Rp. <?php echo number_format($data1['total_penjualan']);?></td>
      </tr>
      <?php }?>
      <tr>
      <td colspan="8">
      <hr />      </td>
      </tr>
  </table>
  
  <table width="98%" align="center">
   
    <tr>
      <td colspan="6" align="right" class="st_total">TOTAL</td>
      <td width="200" align="right"><div id="total" class="st_total" align="right">Rp. 
      <?php echo number_format($total); ?>
      </div></td>
    </tr>
  </table>

   <table width="98%" border="0" align="center">
   <tr>
     <td colspan="3">&nbsp;</td>
     <td colspan="3">&nbsp;</td>
     <td colspan="3">&nbsp;</td>
   </tr>
   <tr>
     <td colspan="3"><div align="center" class="style9"><?php echo $_SESSION['username']; ?></div></td>
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
     <td width="82"><div align="right">(</div></td>
     <td width="89">
     <div align="center" class="style9"></div></td>
     <td width="76">)</td>
   </tr>
 </table>
<script type="text/javascript">
//---yang load di awal
window.print();
</script>

