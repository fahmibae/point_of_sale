
<?php include "header.php"; ?>

<div class="right_col" role="main" style="min-height: 750px">
<div class="">
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;overflow-x:scroll;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Pemesanan</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="width: 148px;"><i class="fa fa-search"></i>  Cari Barang</button>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                   
                  <form method="POST" action="pemesanan/tambah_pemesanan.php" class="form-horizontal form-label-left">

                    <div class="col-sm-2">Kode Barang
                    <div class="form-group">
                    <input type="text" onkeyup="tampil_otomatis();" name="kode_barang" id="kode_barang" required oninvalid="this.setCustomValidity('Kode Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" >
                    </div></div>

                    <div class="col-sm-2">Nama Barang
                    <div class="form-group">
                    <input type="text" name="nama_barang" required oninvalid="this.setCustomValidity('Nama Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="nama_barang" class="form-control">
                    </div></div>

                    <div class="col-sm-2">Keterangan
                    <div class="form-group">
                    <input type="text" name="keterangan" id="keterangan" required oninvalid="this.setCustomValidity('Keterangan Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control">
                    </div></div>

                    <div class="col-sm-2">Harga Beli <b>Rp.</b>
                    <div class="form-group">
                    <input type="number" required oninvalid="this.setCustomValidity('Harga Jual Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="harga_beli" id="harga_beli" class="form-control">
                    </div></div>

                    <div class="col-sm-2"><a style="color: #fff;">Klik</a>
                    <div class="form-group">
                    <button type="submit" name="tambah" id="tambah" class="btn btn-info" style="width: 150px;"><i class="fa fa-arrow-down"></i> Tambah</button>
                    </div></div>

                     <div class="col-sm-2"><a style="color: #fff;">Klik</a>
                    <div class="form-group">
                    <a href="pemesanan/proses_cetak_surat_pemesanan.php" class="btn btn-warning" style="width: 150px;"><i class="fa fa-print"></i> Cetak</a>
                    </div></div>

                </form>
                <br/>
                <br/>
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="color: #26B99A;">No</th>
                          <th style="color: #26B99A;">Kode Barang</th>
                          <th style="color: #26B99A;">Nama Barang</th>
                          <th style="color: #26B99A;">Keterangan</th>
                          <th style="color: #26B99A;">Harga Beli</th>
                          <th style="color: #26B99A;">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                         $no =1;
                          $sql = mysqli_query($konek,"SELECT * FROM pemesanan");
                            while ($data = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $data['kode_barang'];?></td>
                          <td><?php echo $data['nama_barang'];?></td>
                          <td><?php echo $data['keterangan'];?></td>
                          <td><?php echo $data['harga_beli'];?></td>
                          <td>
                             <a href="pemesanan/hapus_pemesanan.php?id_pemesanan=<?php echo $data[id_pemesanan]; ?>" id="hapus" class='btn btn-danger'><i class='fa fa-close'></i></a>
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
  <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 800px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Data Pemesanan</h4>
        </div>
        <div class="modal-body">
          <table id="lookup" class="table table-bordered table-hover table-striped">
            <thead style="background: #26B99A;">
              <tr>
                <th style="color: #fff;">Kode Barang</th>
                <th style="color: #fff;">Nama Barang</th>
                <th style="color: #fff;">Keterangan</th>
                <th style="color: #fff;">Harga Beli</th>
                <th style="color: #fff;">Stok</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql2 = $konek->query('SELECT * FROM barang');
                while ($data = $sql2->fetch_assoc()){
              ?>
                <tr class="pilih" data-kodebarang="<?php echo $data['kode_barang'];?>" data-namabarang="<?php echo $data['nama_barang'];?>" data-keterangan="<?php echo $data['keterangan'];?>" data-hargabeli="<?php echo $data['harga_beli'];?>" >
                    <td><?php echo $data['kode_barang'];?></td>
                    <td><?php echo $data['nama_barang'];?></td>
                    <td><?php echo $data['keterangan'];?></td>
                    <td><?php echo $data['harga_beli'];?></td>
                    <td><?php echo $data['stok'];?></td>
                </tr>
                <?php } ?> 
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div> 
            <?php include "footer.php"; ?>
            <?php include "auto_logout.php"; ?>

<script type="text/javascript">

    $(document).on('click','.pilih', function (e) {
    document.getElementById("kode_barang").value = $(this).attr('data-kodebarang');
    document.getElementById("nama_barang").value = $(this).attr('data-namabarang');
    document.getElementById("keterangan").value = $(this).attr('data-keterangan');
    document.getElementById("harga_beli").value = $(this).attr('data-hargabeli');
    $('#myModal').modal('hide'); });

    $(function () {
    $("#lookup").dataTable();
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
  function tampil_otomatis(){
    var kode_barang = $("#kode_barang").val();
    $.ajax({
          url: 'pemesanan/tambah_proses.php',
          data: "kode_barang="+kode_barang ,
    }).success(function (data) {
        var json = data,
            obj  = JSON.parse(json);
            $('#nama_barang').val(obj.nama_barang);
            $('#keterangan').val(obj.keterangan);
            $('#harga_beli').val(obj.harga_beli);
    })
  }
</script>