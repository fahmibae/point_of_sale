

<?php include "header.php"; ?>

<div class="right_col" role="main" style="min-height: 750px">
<div class="">
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;overflow-x:scroll;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Hutang</h3>
                    </div>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="color: #26B99A;">No</th>
                          <th style="color: #26B99A;">Id Hutang</th>
                          <th style="color: #26B99A;">Faktur Pembelian</th>
                          <th style="color: #26B99A;">Nota Order</th>
                          <th style="color: #26B99A;">Tanggal Transaksi</th>
                          <th style="color: #26B99A;">Supplier</th>
                          <th style="color: #26B99A;">Username</th>
                          <th style="color: #26B99A;">Tanggal Jatuh Tempo</th>
                          <th style="color: #26B99A;">Jumlah Hutang</th>
                          <th style="color: #26B99A;">Sisa Hutang</th>
                          <th style="color: #26B99A;">Keterangan</th>
                          <th style="color: #26B99A;">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                          $no = 1;
                          $sql = mysqli_query($konek,"SELECT * FROM hutang_pembelian");
                            while ($data = mysqli_fetch_array($sql)) {
                        ?>

                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data['id_hutang'];?></td>
                          <td><?php echo $data['faktur_pembelian'];?></td>
                          <td><?php echo $data['nota_order'];?></td>
                          <td><?php echo $data['tanggal_pembelian'];?></td>
                          <td><?php echo $data['kode_supplier'];?></td>
                          <td><?php echo $data['id_user'];?></td>
                          <td><?php echo $data['tanggal_jatuh_tempo'];?></td>
                          <td><?php echo number_format($data['jumlah_hutang']);?></td>
                          <td><?php echo number_format($data['sisa_hutang']);?></td>
                          <td><?php echo $data['keterangan_hutang'];?></td>
                          <td>
                             <a href="transaksi_hutang.php?id_hutang=<?php echo $data['id_hutang'];?>" class="btn btn-success"><i class="fa fa-money"></i></a>
                             <a href="hutang/hapus_bayar.php?id_hutang=<?php echo $data['id_hutang'];?>" id="hapus" class="btn btn-danger"><i class="fa fa-close"></i></a>
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
