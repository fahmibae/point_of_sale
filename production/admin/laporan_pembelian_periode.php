<?php include "header.php"; ?>

<div class="right_col" role="main" style="min-height: 750px">
<div class="">
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;overflow-x:scroll;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Laporan Pembelian Periode</h3>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                  
                  <div class="col-md-12"> 
                  <form method="POST" action="laporan/proses_pembelian_periode.php" class="form-inline">
 	
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
                         $qry2 = mysqli_query($konek,"SELECT * FROM pembelian WHERE tanggal_pembelian BETWEEN '$tanggal1' AND '$tanggal2'");
                         while($data2 = mysqli_fetch_array($qry2));


                      echo "<a href='laporan/proses_cetak_pembelian_periode.php?tanggal1=$tanggal1&tanggal2=$tanggal2' class='btn btn-success'><i class='fa fa-print'></i> Cetak</a>";
                    
                      ?>
                  </div>
                  <div class="panel-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr class="active">
              <th>No</th>
              <th>Faktur Pembelian</th>
              <th>Nota Order</th>
              <th>Tanggal Pembelian</th>
              <th>Supplier</th>
              <th>User</th>
              <th>Tanggal Jatuh Tempo</th>
              <th>Total Muatan</th>
              <th>Total Belanja</th>
            </tr>
          </thead>
          <tbody>
             <?php
        $no = 1;
        $tanggal1 = $_GET['tanggal1'];
        $tanggal2 = $_GET['tanggal2'];
        $qry1 = mysqli_query($konek,"SELECT * FROM pembelian WHERE tanggal_pembelian BETWEEN '$tanggal1' AND '$tanggal2'");

        while ($data1 = mysqli_fetch_array($qry1)){
          $muatan = $data1['total_muatan'];
          $total_pembelian = $data1['total_pembelian'];
          $total_muatan = $total_muatan + $muatan;
          $total        = $total + $total_pembelian;
    ?>
        <tr>
        <td><?php echo $no++;?>.</td>
        <td><?php echo $data1['faktur_pembelian'];?></td>
        <td><?php echo $data1['nota_order'];?></td>
        <td><?php echo date_format(date_create($data['tanggal_pembelian']),'d-m-Y'); ?></td>
        <td><?php echo $data1['kode_supplier'];?></td>
        <td><?php echo $data1['id_user'];?></td>
        <td><?php echo $data1['tanggal_jatuh_tempo'];?></td>
        <td align="center"><?php echo $data1['total_muatan'];?>PCS</td>
        <td align="right">Rp. <?php echo number_format($data1['total_pembelian']);?></td>
      </tr>

          <?php }?>
      <tr style="background-color: #26B99A;">
      <td colspan="7" align="center" style="color: #fff;"><strong>Total Belanja</strong></td>
      <td colspan="1" style="color: #fff; text-align: center;"><?php echo number_format($total_muatan); ?>PCS</td>
      <td colspan="3" style="color: #fff; text-align: right;">Rp. <?php echo number_format($total); ?></td>
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