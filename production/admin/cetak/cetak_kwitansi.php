<?php
  include '../../koneksi.php';
  include 'kode_pj';

  $faktur_penjualan = $_GET['faktur_penjualan'];

  $qry = mysqli_query($konek, "SELECT * FROM penjualan pen
        JOIN user usr ON usr.id_user = pen.id_user
        JOIN d_penjualan dpen ON pen.faktur_penjualan = dpen.faktur_penjualan
        JOIN barang bar ON dpen.kode_barang = bar.kode_barang
        WHERE pen.faktur_penjualan = '$faktur_penjualan'");
      
      $data = mysqli_fetch_assoc($qry);

  $qry2 = mysqli_query($konek, "SELECT sum(jumlah) AS jumlah_total FROM d_penjualan WHERE faktur_penjualan = '$faktur_penjualan'");
      
      $data2 = mysqli_fetch_assoc($qry2);
      $data_jumlah = $data2['jumlah_total'];


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
              <div align="left" class="style19b"><strong><u>NOTA PENJUALAN</u></strong></div>
            </div></td>
            </tr>
          <tr>
            <td width="11%" height="18" class="style9">Nomor </td>
            <td width="1%" class="style9"><div align="center">:</div></td>
            <td width="14%" class="style9"><u><?php echo $data['faktur_penjualan']; ?></u></td>
          </tr>
          <tr>
            <td class="style9">Tanggal</td>
            <td><div align="center">:</div></td>
            <td><span class="style9">
              <u><?php echo $data['tanggal_penjualan'];?></u>
            </span></td>
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
      <td colspan="7">
      <hr />      
      </td>
    </tr>
    <tr>
      <td width="24" class="style6"><div align="center">No</div></td>
      <td width="130" class="style6"><div align="center">Kode Barang</div></td>
      <td width="130" class="style6"><div align="left">Nama Barang</div></td>
      <td width="60" class="style6"><div align="left">Keterangan</div></td>
      <td width="100" class="style6"><div align="center">Jumlah</div></td>
      <td width="117" class="style6"><div align="center">Harga Jual</div></td>
      <td width="117" class="style6"><div align="right">Total</div></td>
    </tr>
      <tr>
      <td colspan="7">
      <hr />      </td>
      </tr>
      <?php
        $no = 1;
        $tampil = mysqli_query($konek, "SELECT * FROM penjualan pen
        JOIN user usr ON usr.id_user = pen.id_user
        JOIN d_penjualan dpen ON pen.faktur_penjualan = dpen.faktur_penjualan
        JOIN barang bar ON dpen.kode_barang = bar.kode_barang
        WHERE pen.faktur_penjualan = '$faktur_penjualan'");
    while ($data1 = mysqli_fetch_assoc($tampil)){ 
       
    ?>
      <tr>
        <td class="style9" align="center"><?php echo $no++;?>.</td>
        <td class="style9" align="center"><?php echo $data1['kode_barang'];?></td>
        <td class="style9"><?php echo $data1['nama_barang'];?></td>
        <td class="style9" align="left"><?php echo $data1['keterangan'];?></td>
        <td class="style9" align="center"><?php echo $data1['jumlah'];?></td>
        <td class="style9" align="center">Rp. <?php echo number_format($data1['harga_jual']);?></td>
        <td class="style9" align="right">Rp. <?php echo number_format($data1['total']);?></td>
      </tr>
      <?php }?>
      <tr>
      <td colspan="7">
      <hr />      </td>
      </tr>
  </table>
 
  <table width="98%" align="center">
   
    <tr>
      <td colspan="6" align="right" class="st_total">TOTAL</td>
      <td width="200" align="right"><div id="total" class="st_total" align="right">Rp. 
      <?php echo number_format($data['total_penjualan']); ?>
      </div></td>
    </tr>
    <tr>
      <td colspan="6" align="right" class="st_total">DIBAYAR</td>
      <td width="200" align="right"><div id="total" class="st_total" align="right">Rp. 
      <?php echo number_format($data['uang_pembayaran']); ?>
      </div></td>
    </tr>
     <tr>
      <td colspan="6" align="right" class="st_total">JUMLAH BARANG</td>
      <td width="200" align="right"><div id="total" class="st_total" align="right"><?php echo $data2['jumlah_total']; ?> Item
      </div></td>
    </tr>
    <?php  
      $kembali = $data['uang_pembayaran'] - $data['total_penjualan'];
    ?>
    <tr>
      <td colspan="6" align="right" class="st_total">KEMBALI</td>
      <td width="200" align="right"><div id="total" class="st_total" align="right">Rp. 
      <?php echo number_format($kembali); ?>
      </div></td>
    </tr>
    <tr>
      <td colspan="6" align="right" class="st_total">TUAN/PELANGGAN</td>
      <td width="200" align="right"><div id="status" class="st_total" align="right"><?php echo $data['pelanggan'];?>
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
     <td colspan="3"><div align="center" class="style9"><?php echo $data['username']; ?></div></td>
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

