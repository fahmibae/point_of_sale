

<?php include "header.php"; ?>
<?php include "penjualan/kode_pj.php"; ?>

<div class="right_col" role="main" style="min-height: 750px">
<div class="">
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;overflow-x:scroll;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Penjualan</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                    <a href="penjualan.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Transaksi</a>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <br />
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="color: #26B99A;">No</th>
                          <th style="color: #26B99A;">Faktur Penjualan</th>
                          <th style="color: #26B99A;">Tanggal Penjualan</th>
                          <th style="color: #26B99A;">Pelanggan</th>
                          <th style="color: #26B99A;">User</th>
                          <th style="color: #26B99A;">Total Penjualan</th>
                          <th style="color: #26B99A;">Total Muatan</th>
                          <th style="color: #26B99A;">Pembayaran</th>
                          <th style="color: #26B99A;">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                          $no = 1;
                          $sql = mysqli_query($konek,"SELECT * FROM penjualan");
                            while ($data = mysqli_fetch_array($sql)) {
                        ?>

                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data['faktur_penjualan'];?></td>
                          <td><?php echo $data['tanggal_penjualan'];?></td>
                          <td><?php echo $data['pelanggan'];?></td>
                          <td><?php echo $data['id_user'];?></td>
                          <td><?php echo number_format($data['total_penjualan']);?></td>
                          <td><?php echo $data['total_muatan'];?></td>
                          <td><?php echo number_format($data['uang_pembayaran']);?></td>
                          <td>
                            <!--<a href="penjualan/hapus_transaksi_penjualan.php?faktur_penjualan=<?php echo $data['faktur_penjualan'] ;?>" class="btn btn-danger" id="hapus"><i class="fa fa-close"></i></a>-->
                            <a href="penjualan/proses_cetak_penjualan.php?faktur_penjualan=<?php echo $data['faktur_penjualan'] ;?>" class="btn btn-info"><i class="fa fa-print"></i></a>
                          </td>
                        </tr>

                        <?php
                      }
                        ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>

 

            <?php include "footer.php"; ?>
            <?php include "auto_logout.php"; ?>
 
<script>
  $(document).on("click", "#hapus", function(e) {
    e.preventDefault();
    var link = $(this).attr("href");
    bootbox.confirm("Yakin Ingin Menghapus ?", function(confirmed){
      if (confirmed){
        window.location.href = link;
      };
    })
  })
</script>