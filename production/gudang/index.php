
<?php 
  include "header.php";

  $sql = $konek->query("select * from barang");

   while ($tampil = $sql->fetch_assoc()) {
   $databarang = $sql->num_rows;}

   $sql3 = $konek->query("select * from user");

   while ($tampil = $sql3->fetch_assoc()){
    $datauser = $sql3->num_rows;}

    $sql5 = $konek->query("SELECT sum(a.jumlah) AS barang_jual, b.tanggal_penjualan FROM d_penjualan a JOIN penjualan b ON a.faktur_penjualan=b.faktur_penjualan WHERE MONTH(b.tanggal_penjualan) = MONTH(NOW())");
    while ($tampil = mysqli_fetch_array($sql5)){
      $data_jumlah = $tampil['barang_jual'];
    }

    $sql6 = $konek->query("SELECT sum(stok) AS stok_barang FROM barang");
    while ($tampil = mysqli_fetch_array($sql6)){
      $data_stok = $tampil['stok_barang'];
    }

?>
       <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
              <h2 style="margin-left: 9px; font-size: 27px;"><marquee>Selamat Datang Di<b style="color: #ee0000;"> POINT OF SALE</marquee></b></h2>
              <br>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="barang.php">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-th-list"></i></div>
                  <div class="count"><?php echo number_format($databarang);?></div>
                  <h3>Barang </h3>
                  <p>Lihat Data Barang</p>
                </div>
              </a>
              </div>
          
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user"></i></div>
                  <div class="count"><?php echo number_format($datauser);?></div>
                  <h3>Users </h3>
                  <p>Lihat Data User</p>
                </div>
              </a>
              </div>
              

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="barang_keluar.php">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-arrow-up"></i></div>
                  <div class="count" style="font-size: 31pt;"><?php echo number_format($data_jumlah);?></div>
                  <h3 style="font-size: 16px;">Barang Keluar Bulan Ini </h3>
                  <p>Lihat Data Barang Keluar Bulan Ini</p>
                </div>
              </a>
              </div>

               <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="barang.php">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-arrow-down"></i></div>
                  <div class="count" style="font-size: 31pt;"><?php echo number_format($data_stok);?></div>
                  <h3 style="font-size: 16px;">Barang Yang Tersedia </h3>
                  <p>Lihat Data Barang Yang Tersedia</p>
                </div>
              </a>
              </div>
              

            </div>
          </div>
        </div>
        <!-- /page content -->

<?php include "footer.php"; ?>
<?php include "auto_logout.php"; ?>

