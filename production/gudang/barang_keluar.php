<?php include "header.php"; ?>

<div class="right_col" role="main" style="min-height: 750px">
<div class="">
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;overflow-x:scroll;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Barang Keluar</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    </div>
                    

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="color: #26B99A;">No</th>
                          <th style="color: #26B99A;">Kode Barang</th>
                          <th style="color: #26B99A;">Kategori</th>
                          <th style="color: #26B99A;">Nama Barang</th>
                          <th style="color: #26B99A;">Jumlah</th>
                         
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                         $no=1;
                          $sql = mysqli_query($konek,"SELECT * FROM d_penjualan dpj
                            JOIN barang brg ON brg.kode_barang = dpj.kode_barang");
                            while ($data = mysqli_fetch_array($sql)) {
                        ?>

                        <tr>
                          <td><?php echo $no++;?></td>
                          <td>BR<?php echo $data['kode_barang'];?></td>
                          <td><?php echo $data['kategori'];?></td>
                          <td><?php echo $data['nama_barang'];?></td>
                          <td><?php echo $data['jumlah'];?></td>
                         
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