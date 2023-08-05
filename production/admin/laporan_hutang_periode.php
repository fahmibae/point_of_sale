<?php include "header.php"; ?>

<div class="right_col" role="main" style="min-height: 750px">
<div class="">
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;overflow-x:scroll;">
                  <div class="x_title">

                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <h3>Laporan Hutang Pembelian Periode</h3>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                  
                  <div class="col-md-12"> 
                  <form method="POST" action="laporan/proses_hutang_periode.php" class="form-inline">
 	
                    <div class="form-group">
                    <input type="date" name="tanggal1" required oninvalid="this.setCustomValidity('Tanggal Awal Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="tanggal1" class="form-control">
                    </div>

                    <label>  Sampai  </label>
                    <div class="form-group"> 
                    <input type="date" name="tanggal2" id="tanggal2" required oninvalid="this.setCustomValidity('Tanggal Akhir Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control">
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
                         $qry2 = mysqli_query($konek,"SELECT * FROM hutang_pembelian WHERE tanggal_pembelian BETWEEN '$tanggal1' AND '$tanggal2'");
                         while($data2 = mysqli_fetch_array($qry2));


                      echo "<a href='laporan/proses_cetak_hutang_periode.php?tanggal1=$tanggal1&tanggal2=$tanggal2' class='btn btn-success'><i class='fa fa-print'></i> Cetak</a>";
                    
                      ?>
                  </div>
                  <div class="panel-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr class="active">
              <th>No</th>
              <th>Id Hutang</th>
              <th>Faktur Pembelian</th>
              <th>Nota Order</th>
              <th>Tanggal Pembelian</th>
              <th>Supplier</th>
              <th>Username</th>
              <th>Keterangan</th>
              <th>Sisa Hutang</th>
              <th>Jumlah Hutang</th>
            </tr>
          </thead>
          <tbody>
             <?php
        $no = 1;
        $tanggal1 = $_GET['tanggal1'];
        $tanggal2 = $_GET['tanggal2'];
        $qry1 = mysqli_query($konek,"SELECT * FROM hutang_pembelian WHERE tanggal_pembelian BETWEEN '$tanggal1' AND '$tanggal2'");

        while ($data1    = mysqli_fetch_array($qry1)){
          $sisa_hutang   = $data1['sisa_hutang'];
          $jumlah_hutang = $data1['jumlah_hutang'];
          $total         = $total + $sisa_hutang;
          $total1        = $total1 + $jumlah_hutang;
    ?>
        <tr>
        <td><?php echo $no++;?>.</td>
        <td><?php echo $data1['id_hutang'];?></td>
        <td><?php echo $data1['faktur_pembelian'];?></td>
        <td><?php echo $data1['nota_order'];?></td>
        <td><?php echo date_format(date_create($data['tanggal_pembelian']),'d-m-Y'); ?></td>
        <td><?php echo $data1['kode_supplier'];?></td>
        <td><?php echo $data1['id_user'];?></td>
        <td align="center"><?php echo $data1['keterangan_hutang'];?></td>
        <td align="right">Rp. <?php echo number_format($data1['sisa_hutang']);?></td>
        <td align="right">Rp. <?php echo number_format($data1['jumlah_hutang']);?></td>
      </tr>

          <?php }?>
      <tr style="background-color: #26B99A;">
      <td colspan="8" align="center" style="color: #fff;"><strong>Total Hutang</strong></td>
      <td colspan="1" style="color: #fff; text-align: right;">Rp. <?php echo number_format($total); ?></td>
      <td colspan="1" style="color: #fff; text-align: right;">Rp. <?php echo number_format($total1); ?></td>
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