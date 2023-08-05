<?php include "header.php"; ?>

<div class="right_col" role="main" style="min-height: 750px">
<div class="">
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;overflow-x:scroll;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Barang Pembelian</h3>
                    </div>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="color: #26B99A;">No</th>
                          <th style="color: #26B99A;">Faktur Pembelian</th>
                          <th style="color: #26B99A;">Nota Order</th>
                          <th style="color: #26B99A;">Kode Barang</th>
                          <th style="color: #26B99A;">Nama Barang</th>
                          <th style="color: #26B99A;">Keterangan</th>
                          <th style="color: #26B99A;">Harga Beli</th>
                          <th style="color: #26B99A;">Jumlah</th>
                          <th style="color: #26B99A;">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                          $no = 1;
                          $sql = mysqli_query($konek,"SELECT * FROM barang_pembelian bpm JOIN pembelian pem ON bpm.faktur_pembelian = pem.faktur_pembelian");
                            while ($data = mysqli_fetch_array($sql)) {
                        ?>

                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data['faktur_pembelian'];?></td>
                          <td><?php echo $data['nota_order'];?></td>
                          <td><?php echo $data['kode_barang'];?></td>
                          <td><?php echo $data['nama_barang'];?></td>
                          <td><?php echo $data['keterangan'];?></td>
                          <td><?php echo number_format($data['harga_beli']);?></td>
                          <td><?php echo $data['jumlah'];?></td>
                          <td>
                             <a href="pembelian/simpan_barang_gudang.php?id_barang_pembelian=<?php echo $data['id_barang_pembelian'] ;?>" id="masuk" class="btn btn-success"> Masukkan Gudang</a>
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
  $(document).on("click", "#masuk", function(e) {
    e.preventDefault();
    var link = $(this).attr("href");
    bootbox.confirm("Yakin Ingin Memasukkan Barang ?", function(confirmed){
      if (confirmed){
        window.location.href = link;
      };
    })
  })
</script>