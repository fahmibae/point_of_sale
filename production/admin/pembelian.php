<?php include "header.php";?>


<div class="right_col" role="main">
<div class="">
<div class="row">
                   
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;overflow-x:scroll;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Transaksi Pembelian</h3>
                    </div>
              
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="width: 148px;"><i class="fa fa-search"></i>  cari Pemesanan</button>
                    </div>
                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">
                    <?php include "pembelian/kode_pb.php";?>
                    <br/>
                    <form method="POST" action="pembelian/simpan_pembelian.php" class="form-horizontal form-label-left">

                     <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Faktur Pembelian</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required oninvalid="this.setCustomValidity('Faktur Pembelian Tidak Boleh Kosong ')" oninput="setCustomValidity('')" name="faktur_pembelian" id="faktur_pembelian" readonly="" class="form-control col-md-7 col-xs-12" value="<?php echo $pembelian;?>"></div></div>

                    <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Nota Order</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required oninvalid="this.setCustomValidity('Nota Order Tidak Boleh Kosong ')" oninput="setCustomValidity('')" name="nota_order" id="nota_order" class="form-control col-md-7 col-xs-12"></div></div>

                    <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Tanggal Pembelian</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="tanggal_pembelian" readonly required oninvalid="this.setCustomValidity('Tanggal Pembelian Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="tanggal_pembelians" value="<?php echo date('Y-m-d')?>" class="form-control has-feedback-left col-md-7 col-xs-12"><span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span></div></div>
                    
                    <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Supplier</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="supplier" id="supplier" required oninvalid="this.setCustomValidity('Supplier Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control col-md-7 col-xs-12"><option value="">Pilih Supplier</option>
                     
                    <?php  
                      $sp = mysqli_query($konek, "select * from supplier");
                      foreach ($sp as $index => $data) {
                    ?>
                    <option value="<?php echo $data['kode_supplier']; ?>"><?php echo $data['nama_supplier']; ?></option>
                    <?php  
                      }
                    ?>
                    </select></div></div>
                    
                    <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Tanggal Jatuh Tempo</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="date" required oninvalid="this.setCustomValidity('Tanggal Jatuh Tempo Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="tanggal_jatuh_tempo" class="form-control has-feedback-left col-md-7 col-xs-12"><span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" style="color: #fff;">Tombol</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <button type="submit" name="simpan" id="simpan" class="btn btn-success" style="width: 120px;"><i class="fa fa-floppy-o"></i> Simpan</button>
                  
                    </div>
                    </div>


                    <br />
                    <br />
                    </form>
                    <br />
                    
                    
                    <form method="POST" action="pembelian/tambah_proses.php" class="form-horizontal form-label-left">

                     
                    <div class="form-group">
                    <input type="hidden" required oninvalid="this.setCustomValidity('id pemesanan Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="id" id="id" class="form-control">
                    </div>

                      <div class="col-sm-2">Kode Barang
                    <div class="form-group">
                    <input type="text" required oninvalid="this.setCustomValidity('Kode Kategori Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="kode_barang" id="kode_barang" class="form-control" onkeyup="tampil_otomatis();">
                    </div></div>

                     <div class="col-sm-2">Nama Barang
                    <div class="form-group">
                    <input type="text" required oninvalid="this.setCustomValidity('Nama Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="nama_barang" id="nama_barang" class="form-control">
                    </div></div>

                     <div class="col-sm-2">Keterangan
                    <div class="form-group">
                    <input type="text" name="keterangan" required oninvalid="this.setCustomValidity('Keterangan Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="keterangan" class="form-control">
                  </div></div>

                     <div class="col-sm-2">Harga Beli <b>Rp.</b>
                    <div class="form-group">
                    <input type="number" name="harga_beli" required oninvalid="this.setCustomValidity('Harga Beli Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="harga_beli" class="form-control">
                  </div></div>

                   <div class="col-sm-2">Item
                    <div class="form-group">
                    <input type="number" name="item" required oninvalid="this.setCustomValidity('Item Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="item" class="form-control">
                  </div></div>

                    <div class="col-sm-2"><a style="color: #fff;">Klik</a>

                    <div class="form-group">
                    <button type="submit" name="tambah" id="tambah" class="btn btn-info" style="width: 120px;"><i class="fa fa-arrow-down"></i> Masuk</button>
                    </div>
                    </div>


                     </form>

                      <hr style="border-bottom: 2px solid #E6E9ED;">
                    <br />


                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="color: #26B99A;">No</th>
                          <th style="color: #26B99A;">Kode Barang</th>
                          <th style="color: #26B99A;">Nama Barang</th>
                          <th style="color: #26B99A;">Keterangan</th>
                          <th style="color: #26B99A;">Harga Beli</th>
                          <th style="color: #26B99A;">Item</th>
                          <th style="color: #26B99A;">Subtotal</th>
                          <th style="color: #26B99A;">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                          $no= 1;
                          $sql = mysqli_query($konek, "select * from pembelian_detail where faktur_pembelian='$pembelian'");

                        $total = 0;
                        if(mysqli_num_rows($sql) > 0)
                           {
                        
                        while($data = mysqli_fetch_array($sql)){
                          $item         = $data['item'];
                          $harga_beli   = $data['harga_beli'];
                          $subtotal     = $item * $harga_beli;
                          $jumlah_item  = $jumlah_item + $item;
                          $total        = $total + $subtotal;

                    echo"
                        <tr>
                          <td>$no</td>
                          <td>$data[kode_barang]</td>
                          <td>$data[nama_barang]</td>
                          <td>$data[keterangan]</td>
                          <td>".number_format($data['harga_beli'])."</td>
                          <td align='center'>$data[item]</td>
                          <td>".number_format($data['subtotal'])."</td>
                          <td align='center'>
                             <a href='pembelian/hapus_proses.php?id_pembelian_detail=$data[id_pembelian_detail]' class='btn btn-danger' id='hapus'><i class='fa fa-close'></i></a>
                          </td>
                        </tr>";

                        $no++;

                      }
                    }
                        ?>

                        <tr style="background-color: #26B99A;">
                        <td colspan="5" align="center" style="color: #fff;"><strong>Total Belanja</strong></td>
                        <td colspan="1" style="color: #fff; text-align: center;" name="total"><?php echo number_format($jumlah_item); ?></td>
                        <td colspan="3" style="color: #fff; text-align: right;" name="total">Rp. <?php echo number_format($total); ?></td>
                        </tr>

                      </tbody>
                    </table>
                    <br />
                     <div class="col-sm-6">
                    <div class="form-group">
                    <input type="text" name="total" required oninvalid="this.setCustomValidity('Total Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="total" style="text-align: right; margin-left: 525px; font-size: 50px; height: 80px; width: 500px;" value="<?php echo number_format($total); ?>" class="form-control" readonly/>
                  </div></div>
                   
                    
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
                $sql2 = $konek->query('SELECT * FROM pemesanan pem JOIN barang bar ON pem.kode_barang = bar.kode_barang');
                while ($data = $sql2->fetch_assoc()){
              ?>
                <tr class="pilih" data-id="<?php echo $data['id_pemesanan']?>" data-kodebarang="<?php echo $data['kode_barang'];?>" data-namabarang="<?php echo $data['nama_barang'];?>" data-keterangan="<?php echo $data['keterangan'];?>" data-hargabeli="<?php echo $data['harga_beli'];?>" >
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

    document.getElementById("id").value = $(this).attr('data-id');  
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
          url: 'pembelian/proses_tambah.php',
          data: "kode_barang="+kode_barang ,
    }).success(function (data) {
        var json = data,
            obj  = JSON.parse(json);
            $('#id').val(obj.id);
            $('#nama_barang').val(obj.nama_barang);
            $('#harga_beli').val(obj.harga_beli);
            $('#keterangan').val(obj.keterangan);
    })
  }
</script>
