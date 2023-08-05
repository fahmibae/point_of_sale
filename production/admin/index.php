
<?php
  include "header.php";

  $sql = $konek->query("select * from barang");

   while ($tampil = $sql->fetch_assoc()) {
   $databarang = $sql->num_rows;}

   $sql3 = $konek->query("select * from user");

   while ($tampil = $sql3->fetch_assoc()){
    $datauser = $sql3->num_rows;}

   $sql4 = $konek->query("select * from supplier");

   while ($tampil = $sql4->fetch_assoc()){
    $datasupplier = $sql4->num_rows;}

    $sql5 = $konek->query("SELECT sum(total_penjualan) AS terjual, tanggal_penjualan FROM penjualan WHERE MONTH(tanggal_penjualan)=MONTH(NOW())");

    while ($tampil = mysqli_fetch_array($sql5)){
      $data_penjualan = $tampil['terjual'];
    }

    $sql6 = $konek->query("SELECT sum(a.jumlah) AS barang_jual, b.tanggal_penjualan FROM d_penjualan a JOIN penjualan b ON a.faktur_penjualan=b.faktur_penjualan WHERE MONTH(b.tanggal_penjualan) = MONTH(NOW())");
    while ($tampil = mysqli_fetch_array($sql6)){
      $data_jumlah = $tampil['barang_jual'];
    }

     $sql8 = $konek->query("SELECT sum(stok) AS stok_barang FROM barang");
    while ($tampil = mysqli_fetch_array($sql8)){
      $data_stok = $tampil['stok_barang'];
    }

?>
       <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
              <h2 style="margin-left: 9px; font-size: 27px;"><marquee>Selamat Datang Di<b style="color: #ee0000;"> POINT OF SALE</marquee></b></h2>
              <br>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="barang.php">
                <div class="tile-stats">
                  <div class="icon" style="margin-top: 20px;"><i class="fa fa-th-list"></i></div>
                  <div class="count"><?php echo number_format($databarang);?></div>
                  <h3>Barang </h3>
                  <p>Lihat Data Barang</p>
                </div>
              </a>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="">
                <div class="tile-stats">
                  <div class="icon" style="margin-top: 20px;"><i class="fa fa-user"></i></div>
                  <div class="count"><?php echo number_format($datauser);?></div>
                  <h3>Users </h3>
                  <p>Lihat Data User</p>
                </div>
              </a>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="supplier.php">
                <div class="tile-stats">
                  <div class="icon" style="margin-top: 20px;"><i class="fa fa-users"></i></div>
                  <div class="count"><?php echo number_format($datasupplier);?></div>
                  <h3>Supplier </h3>
                  <p>Lihat Jumlah Supplier</p>
                </div>
              </a>
              </div>

              <div class="row"></div>
              <div class="animated flipInY col-lg-4 col-md-5 col-sm-6 col-xs-12">
                <a href="transaksi_penjualan.php">
                <div class="tile-stats">
                  <div class="icon" style="margin-top: 20px;"><i class="fa fa-money"></i></div>
                  <div class="count" style="font-size: 16pt; margin-top: 10px;">Rp. <?php echo number_format ($data_penjualan); ?></div>
                  <br/>
                  <h3 style="font-size: 20px;">Penjualan Bulan Ini </h3>
                  <p>Lihat Penjualan Bulan Ini</p>
                </div>
              </a>
              </div>

              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="barang_keluar.php">
                <div class="tile-stats">
                  <div class="icon" style="margin-top: 20px;"><i class="fa fa-arrow-up"></i></div>
                  <div class="count" style="font-size: 32pt;"><?php echo number_format($data_jumlah);?></div>
                  <h3 style="font-size: 16px;">Barang Keluar Bulan Ini </h3>
                  <p>Lihat Data Barang Keluar Bulan Ini</p>
                </div>
              </a>
              </div>

              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="barang.php">
                <div class="tile-stats">
                  <div class="icon" style="margin-top: 20px;"><i class="fa fa-arrow-down"></i></div>
                  <div class="count" style="font-size: 32pt;"><?php echo number_format($data_stok);?></div>
                  <h3 style="font-size: 16px;">Barang Masuk </h3>
                  <p>Lihat Data Barang Masuk</p>
                </div>
              </a>
              </div>
<br/>
<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="dashboard_graph x_panel" style="vertical-align: center;">
                  <div class="row x_title">
                    <div class="col-md-6">
                    <h2>Penjualan Per Bulan</h2>
                    <br/>
                  </div>
                  </div>
                    <div class="x_content">
<canvas id="linechart" width="150" height="70"></canvas>
</div></div></div>

<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="dashboard_graph x_panel" style="vertical-align: center;">
                  <div class="row x_title">
                    <div class="col-md-6">
                    <h2>Hutang Pembelian Per bulan</h2>
                    <br/>
                  </div>
                  </div>
                    <div class="x_content">
<canvas id="linehutang" width="150" height="70"></canvas>
</div></div></div>

            </div>
          </div>
        </div>
        <!-- /page content -->

<?php include "footer.php"; ?>
<?php include "auto_logout.php"; ?>

<?php

$query = mysqli_query($konek, "SELECT tanggal_penjualan, SUM(total_penjualan) AS total FROM penjualan GROUP BY MONTH(tanggal_penjualan)");
  
  $data_tanggal = array();
  $data_total   = array();

while ($data = mysqli_fetch_array($query)) {
  
  $data_tanggal[] = tglIndonesia(date('F', strtotime($data['tanggal_penjualan'])));
  $data_total[]   = $data['total'];

}

?>



<script type="text/javascript">
var ctx = document.getElementById('linechart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: <?php echo json_encode($data_tanggal)?>,
        datasets: [{
            label: 'Penjualan Per Bulan',
            backgroundColor: 'rgb(30, 172, 254)',
            borderColor: 'rgb(0, 123, 214)',
            data: <?php echo json_encode($data_total)?>
        }]
    },
    legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },

    // Configuration options go here
    options: {}
});
</script>

<?php
$query = mysqli_query($konek, "SELECT tanggal_pembelian, SUM(sisa_hutang) AS total_hutang FROM hutang_pembelian GROUP BY MONTH(tanggal_pembelian)");
  
  $data_tanggal_hutang = array();
  $data_total_hutang   = array();

while ($data = mysqli_fetch_array($query)) {
  
  $data_tanggal_hutang[] = tglIndonesia(date('F', strtotime($data['tanggal_pembelian'])));
  $data_total_hutang[]   = $data['total_hutang'];

}

?>

<script type="text/javascript">
var ctx = document.getElementById('linehutang').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: <?php echo json_encode($data_tanggal_hutang)?>,
        datasets: [{
            label: 'Hutang Pembelian Per Bulan',
            backgroundColor: 'rgb(30, 172, 254)',
            borderColor: 'rgb(0, 123, 214)',
            data: <?php echo json_encode($data_total_hutang)?>
        }]
    },
    legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },

    // Configuration options go here
    options: {}
});
</script>
