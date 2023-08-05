<?php

  session_start();  

	include '../../koneksi.php';

   $query_cek = mysqli_query($konek,"SELECT * FROM  user WHERE  username =  '$user' and password='$pass'");
mysqli_close();
$cek = mysqli_num_rows($query_cek);

if ($cek>0) {
  
     $_SESSION['username'] = $cek['username'];}

  $tanggal = date('Y-m-d');
  $qry2 = mysqli_query($konek, "SELECT * FROM pemesanan");
      
      $data2 = mysqli_num_rows($qry2);
?>

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
            <div class="style9" style="margin-bottom: -12px;">Telp. (0231) 357514, Hp. 081 324 594 803</div></td>
            <td colspan="3"><div align="center" class="style9b">
              <div align="left" class="style19b"><strong><u>SURAT PEMESANAN</u></strong></div>
            </div></td>
            </tr>
          <tr>
            <td width="11%" height="18" class="style9">Tanggal Cetak </td>
            <td width="1%" class="style9"><div align="center">:</div></td>
            <td width="14%" class="style9"><u><?php echo $tanggal; ?></u></td>
          </tr>   
        </table>
          </div>
       </td>
    </tr>
  </table>
   </br>
 </br>
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="9">
      <hr />      
      </td>
    </tr>
    <tr>
    	<td width="24" class="style6"><div align="center">No</div></td>
      <td width="100" class="style6"><div align="center">Kode Barang</div></td>
      <td width="80" class="style6"><div align="left">Nama Barang</div></td>
      <td width="60" class="style6"><div align="left">Keterangan</div></td>
      <td width="60" class="style6"><div align="center">Harga Beli</div></td>
      <td width="60" class="style6"><div align="center">Stok</div></td>
    </tr>
      <tr>
      <td colspan="9">
      <hr />      </td>
      </tr>
      <?php
      	$no = 1;
      	$tampil = mysqli_query($konek, "SELECT * FROM pemesanan pm JOIN barang br ON pm.kode_barang = br.kode_barang");
		while ($data1 = mysqli_fetch_assoc($tampil)){	
       
	  ?>
      <tr>
        <td class="style9" align="center"><?php echo $no++;?>.</td>
        <td class="style9" align="center"><?php echo $data1['kode_barang'];?></td>
        <td class="style9"><?php echo $data1['nama_barang'];?></td>
        <td class="style9" align="left"><?php echo $data1['keterangan'];?></td>
        <td class="style9" align="center">Rp. <?php echo number_format($data1['harga_beli']);?></td>
        <td class="style9" align="center"><?php echo $data1['stok'];?></td>
      </tr>
      <?php }?>
      <tr>
      <td colspan="9">
      <hr />      </td>
      </tr>
  </table>
 
  <table width="98%" align="center">
   
    <tr>
      <td colspan="5" align="right" class="st_total">TOTAL BARANG</td>
      <td width="200" align="right"><div id="total" class="st_total" align="right"><?php echo $data2; ?>
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