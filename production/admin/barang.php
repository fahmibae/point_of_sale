<?php include "header.php"; ?>

<div class="right_col" role="main" style="min-height: 750px">
<div class="">
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;overflow-x:scroll;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Barang</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalKategori"><i class="fa fa-plus"></i> Tambah Barang</button>
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
                          <th style="color: #26B99A;">Keterangan</th>
                          <th style="color: #26B99A;">Harga Beli</th>
                          <th style="color: #26B99A;">Tahun Kadaluarsa</th>
                          <th style="color: #26B99A;">Keuntungan</th>
                          <th style="color: #26B99A;">Potongan Harga</th>
                          <th style="color: #26B99A;">Harga Jual</th>
                          <th style="color: #26B99A;">Stok</th>
                          <th style="color: #26B99A;">Action</th>
                        </tr>
                      </thead>
                      <tbody>


                        <?php
                         $no=1;
                          $sql = mysqli_query($konek,"SELECT * FROM barang");
                            while ($data = mysqli_fetch_array($sql)) {
                        ?>

                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $data['kode_barang'];?></td>
                          <td><?php echo $data['kategori'];?></td>
                          <td><?php echo $data['nama_barang'];?></td>
                          <td><?php echo $data['keterangan'];?></td>
                          <td><?php echo number_format ($data['harga_beli']);?></td>
                          <td><?php echo $data['tahun_kadaluarsa'];?></td>
                          <td><?php echo number_format ($data['keuntungan']);?></td>
                          <td><?php echo number_format ($data['potongan_harga']);?></td>
                          <td><?php echo number_format ($data['harga_jual']);?></td>
                          <td><?php echo $data['stok'];?></td>
                          <td>
                             <a href="barang_edit.php?kode_barang=<?php echo $data['kode_barang'];?>" type="button" class="btn btn-success"><i class="fa fa-edit"></i></a>
                             <a href="barang/proses_delete.php?kode_barang=<?php echo $data['kode_barang'];?>" id="hapus" type="button" class="btn btn-danger"><i class="fa fa-close"></i></a>
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

<div id="ModalKategori" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="user_form" action="barang/barang_save.php" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header" style="background: #337ab7">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: white;">Add Barang</h4>
        </div>
        <div class="modal-body">

        <?php
       $sql = mysqli_query($konek, "SELECT max(kode_barang) AS maxKode FROM barang");
       $row = mysqli_fetch_array($sql);
       $kodeMax = $row['maxKode'];
       $no_urut = (int) substr($kodeMax, 3, 5);
       $no_urut++;
       $char = "BRG";
       $barang = $char . sprintf("%05s", $no_urut);
      ?>

        <label>Kode Barang</label>
        <input type="text" name="kode_barang" required oninvalid="this.setCustomValidity('Kode Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="<?php echo $barang;?>" id="kode_barang" class="form-control" readonly placeholder="Kode Barang"/>
        <br/>

        <label>Kategori</label>
        <input type="text" name="kategori" required oninvalid="this.setCustomValidity('Kategori Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="kategori" class="form-control" placeholder="Kategori"/>

        </br>
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" required oninvalid="this.setCustomValidity('Nama Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="nama_barang" class="form-control" placeholder="Nama Barang"/>
                    
        <br/>
        <label>Keterangan</label>
        <input type="text" name="keterangan" required oninvalid="this.setCustomValidity('Keterangan Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="keterangan" class="form-control" placeholder="Keterangan"/>

        <br/>
        <label>Harga Beli</label>
        <input type="number" name="harga_beli" id="harga_beli" onkeyup="hitung();" required oninvalid="this.setCustomValidity('Harga Beli Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" placeholder="Harga Beli"/>

         <br/>
        <label>Tahun Kadaluarsa</label>
        <input type="date" name="tahun_kadaluarsa" id="tahun_kadaluarsa" required oninvalid="this.setCustomValidity('Tahun Kadaluarsa Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" placeholder="Tahun Kadaluarsa"/>

        <br/>
        <label>Keuntungan</label>
        <input type="number" name="untung" id="untung" onkeyup="hitung();" required oninvalid="this.setCustomValidity('Keuntungan Tidak Boleh Kosong')" oninput="setCustomValidity('')"  class="form-control" placeholder="Keuntungan"/>

        <br/>
        <label>Potongan Harga</label>
        <input type="number" name="potongan_harga" id="potongan_harga" onkeyup="hitung();" required oninvalid="this.setCustomValidity('Diskon Tidak Boleh Kosong')" oninput="setCustomValidity('')"  class="form-control" placeholder="Potongan Harga"/>

        <br/>
        <label>Harga Jual</label>
        <input type="number" onkeyup="hitung();" name="harga_jual" id="harga_jual" required oninvalid="this.setCustomValidity('Harga Jual Tidak Boleh Kosong')" oninput="setCustomValidity('')"  class="form-control" placeholder="Harga Jual"/>

        </div>
        <div class="modal-footer">
          <input type="submit" name="action" id="action" class="btn btn-primary" value="Tambah" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>


            <?php include "footer.php"; ?>
            <?php include "auto_logout.php"; ?>

<script type="text/javascript">
 $( document ).ready(function() {
            $('.datatable').datatable({});
        });
</script>
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

<script type="text/javascript">
  function hitung(){

    var harga_beli      = document.getElementById('harga_beli').value;
    var keuntungan      = document.getElementById('untung').value;
    var potongan_harga  = document.getElementById('potongan_harga').value;
    var jual            = parseInt(harga_beli) + parseInt(keuntungan) - parseInt(potongan_harga);

     if (!isNaN(jual)){
      var harga_jual = document.getElementById('harga_jual').value = jual;
     }

}
</script>