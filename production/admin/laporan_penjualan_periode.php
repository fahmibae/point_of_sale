<?php include "header.php"; ?>

<div class="right_col" role="main" style="min-height: 750px">
<div class="">
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;overflow-x:scroll;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Laporan Penjualan Periode</h3>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                  
                  <div class="col-md-12"> 
                  <form method="POST" action="laporan/proses_penjualan_periode.php" class="form-inline">
 	
                    <div class="form-group">
                    <input type="date" required oninvalid="this.setCustomValidity('Tanggal Awal Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="tanggal1" id="tanggal1" class="form-control">
                    </div>

                    <label>  Sampai  </label>
                    <div class="form-group"> 
                    <input type="date" name="tanggal2" required oninvalid="this.setCustomValidity('Tanggal Akhir Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="tanggal2" class="form-control">
                    </div>
	
                    <div class="form-group">
                    <button type="submit" name="lihat" class="btn btn-info"><i class="fa fa-calendar-o"></i> Lihat</button>  
                </form>
                </div> 
                <br/>
                <br/> 
                <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                      <div class="panel-heading" align="center">
                      <?php
                         $tanggal1 = $_GET['tanggal1'];
                         $tanggal2 = $_GET['tanggal2'];
                         $qry2 = mysqli_query($konek,"SELECT * FROM penjualan WHERE tanggal_penjualan BETWEEN '$tanggal1' AND '$tanggal2'");
                         while($data2 = mysqli_fetch_array($qry2));


                      echo "<a href='laporan/proses_cetak_penjualan_periode.php?tanggal1=$tanggal1&tanggal2=$tanggal2' class='btn btn-success'><i class='fa fa-print'></i> Cetak</a>";
                    
                      ?>
                  </div>
                  <div class="panel-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr class="active">
              <th>No</th>
              <th>Faktur Penjualan</th>
              <th>Tanggal Penjualan</th>
              <th>Pelanggan</th>
              <th>User</th>
              <th>Pembayaran</th>
              <th>Total Muatan</th>
              <th>Total Belanja</th>
            </tr>
          </thead>
          <tbody>
             <?php
        $no = 1;
        $tanggal1 = $_GET['tanggal1'];
        $tanggal2 = $_GET['tanggal2'];
        $qry1 = mysqli_query($konek,"SELECT * FROM penjualan WHERE tanggal_penjualan BETWEEN '$tanggal1' AND '$tanggal2'");

        while ($data1 = mysqli_fetch_array($qry1)){
          $total_penjualan = $data1['total_penjualan'];
          $total        = $total + $total_penjualan;
          $total_muatan = $total_muatan + $data1['total_muatan'];
    ?>
        <tr>
        <td><?php echo $no++;?>.</td>
        <td><?php echo $data1['faktur_penjualan'];?></td>
        <td><?php echo date_format(date_create($data['tanggal_penjualan']),'d-m-Y'); ?></td>
        <td><?php echo $data1['pelanggan'];?></td>
        <td><?php echo $data1['id_user'];?></td>
        <td align="right">Rp. <?php echo number_format($data1['uang_pembayaran']);?></td>
        <td align="right"><?php echo $data1['total_muatan'];?></td>
        <td align="right">Rp. <?php echo number_format($data1['total_penjualan']);?></td>
      </tr>

          <?php }?>
      <tr style="background-color: #26B99A;">
      <td colspan="6" align="center" style="color: #fff;"><strong>Total Penjualan</strong></td>
      <td colspan="1" style="color: #fff; text-align: right;"><?php echo number_format($total_muatan); ?></td>
      <td colspan="2" style="color: #fff; text-align: right;">Rp. <?php echo number_format($total); ?></td>
      </tr>
    </tbody>
  </table>


                </div>
              </div>
          </div>
      </div>
    </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
            <?php include "footer.php"; ?>
            <?php include "auto_logout.php"; ?>