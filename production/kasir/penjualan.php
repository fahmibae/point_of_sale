<?php include "header.php";?>


<div class="right_col" role="main">
<div class="">
<div class="row">
                   
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;overflow-x:scroll;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Transaksi Penjualan Cash</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    </div>
                    
                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">

                    <br/>
                    <?php include "penjualan/kode_pj.php"; ?>
                    <?php
                       $tanggal = date('Y-m-d');
                       $no=1;
                          $sql = mysqli_query($konek, "SELECT * FROM penjualan_detail");
                        
                        $total = 0;
                        if(mysqli_num_rows($sql) > 0)
                           {
                        
                        while($data = mysqli_fetch_array($sql)){
                          $subtotal = $data['item'] * $data['harga_jual'];
                          $total    = $total + $subtotal;
                          }}
                    ?>
                    <form method="POST" class="form-horizontal form-label-left" action="penjualan/simpan_penjualan_cash.php">
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: right;">Faktur Penjualan</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required oninvalid="this.setCustomValidity('Faktur Penjualan Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="faktur_penjualan" id="faktur_penjualan" value="<?php echo $penjualan;?>" readonly="" class="form-control col-md-7 col-xs-12"></div></div>

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: right;">Tanggal Penjualan</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="date" name="tanggal_penjualan" value="<?php echo $tanggal; ?>" readonly class="form-control has-feedback-left col-md-7 col-xs-12"><span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span></div></div>
                    
                      <div class="form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: right;">Pelanggan</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required oninvalid="this.setCustomValidity('Pelanggan Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="pelanggan" id="pelanggan" class="form-control col-md-7 col-xs-12"></div></div>
                   
                    <hr style="border-bottom: 2px solid #E6E9ED;">
                    <div class="form-group">
                    <label class="control-label col-md-5 col-sm-2 col-xs-12" style="text-align: right; margin-left: 80px; color: #fff;">Kembalian (Rp.)</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="total" required oninvalid="this.setCustomValidity('Total Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="total" value="<?php echo $total; ?>"  onkeyup="hitung();" style="text-align: right; font-size: 45px; margin-left: 15px; height: 80px;" class="form-control col-md-7 col-xs-12" readonly/>
                    </div>
                    </div>

                     <div class="form-group">
                    <label class="control-label col-md-9 col-sm-9 col-xs-12" style="text-align: right; margin-left: 0px;">Kembalian (Rp.)</label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="number" style="text-align: right; margin-left: 10px" required oninvalid="this.setCustomValidity('Kembalian Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="kembali" id="kembali" class="form-control col-md-7 col-xs-12" readonly/>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-9 col-sm-9 col-xs-12" style="text-align: right; margin-left: 0px;">Pembayaran (Rp.)</label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="number" style="text-align: right; margin-left: 10px;" required oninvalid="this.setCustomValidity('Pembayaran Tidak Boleh Kosong')" oninput="setCustomValidity('')" onkeyup="hitung();" name="bayar" id="bayar" class="form-control col-md-7 col-xs-12">
                    </div>
                    </div>

                  
                    <div class="form-group">
                      <label class="control-label col-md-9 col-sm-9 col-xs-12" style="color: #fff; text-align: right; margin-left: 84px;">Kembalian</label>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                      <button class="btn btn-success col-md-12 col-xs-12" style=" text-align: center; margin-left: 10px;"><i class="fa fa-floppy-o" ></i> Bayar</button>
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
                          <th style="color: #26B99A;">Harga Jual</th>
                          <th style="color: #26B99A;">Item</th>
                          <th style="color: #26B99A;">Subtotal</th>
                          <th style="color: #26B99A;">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                         $no=1;
                          $sql = mysqli_query($konek, "select * from penjualan_detail where faktur_penjualan='$penjualan'");
                        
                        $total = 0;
                        $jumlah_item = 0;
                        if(mysqli_num_rows($sql) > 0)
                           {
                        
                        while($data = mysqli_fetch_array($sql)){
                          $subtotal = $data['item'] * $data['harga_jual'];
                          $jumlah_item = $jumlah_item + $data['item']; 
                          $total    = $total + $subtotal;

                        echo
                        "<tr>
                          <td>$no</td>
                          <td>$data[kode_barang]</td>
                          <td>$data[nama_barang]</td>
                          <td>$data[keterangan]</td>
                          <td>".number_format($data['harga_jual'])."</td>
                          <td>$data[item]</td>
                          <td>".number_format($data['subtotal'])."</td>
                          <td>
                             <a href='penjualan/hapus_proses_penjualan.php?id_penjualan_detail=$data[id_penjualan_detail]' class='btn btn-danger'><i class='fa fa-close'></i></a>
                          </td>
                        </tr>";

                        $no++;
                      }}
                        ?>
                        <tr style="background-color: #26B99A;">
                        <td colspan="5" align="center" style="color: #fff;"><strong>Total Item</strong></td>
                        <td colspan="3" style="color: #fff; text-align: center;" name="total"><?php echo number_format($jumlah_item); ?></td>
                        </tr>                        
                      </tbody>
                    </table>
                    <br />
                    
                    <h3>Data Barang</h3>
                     <hr style="border-bottom: 2px solid #E6E9ED;">
                    <br />
                     <form method="POST" action="penjualan/tambah_proses_jual.php" class="form-horizontal form-label-left">
                    
                    <div class="col-sm-2">Kode Barang
                    <div class="form-group">
                    <input type="text" name="kode_barang" id="kode_barang" required oninvalid="this.setCustomValidity('Kode Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" onkeyup="tampil_otomatis();">
                    </div></div>

                    <div class="col-sm-2">Nama Barang
                    <div class="form-group">
                    <input type="text" name="nama_barang" id="nama_barang" required oninvalid="this.setCustomValidity('Nama Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control">
                    </div></div>

                    <div class="col-sm-2">Keterangan
                    <div class="form-group">
                    <input type="text" name="keterangan" id="keterangan" required oninvalid="this.setCustomValidity('Keterangan Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control">
                    </div></div>

                    <div class="col-sm-2">Harga Jual <b>Rp.</b>
                    <div class="form-group">
                    <input type="number" name="harga_jual" id="harga_jual" required oninvalid="this.setCustomValidity('Harga Jual Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control">
                    </div></div>

                    <div class="col-sm-2">Jumlah
                    <div class="form-group">
                    <input type="number" name="item" id="item" required oninvalid="this.setCustomValidity('Jumlah Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control">
                    </div></div>

                    <div class="col-sm-2"><a style="color: #fff;">Klik</a>
                    <div class="form-group">
                    <button type="submit" name="tambah" id="tambah" class="btn btn-info" style="width: 150px;"><i class="fa fa-arrow-down"></i> Tambah</button>
                    </div>
                    </div>

                  </form>



                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>
  
            <?php include "footer.php"; ?>
            <?php include "auto_logout.php"; ?>

<script type="text/javascript"> 

function hitung() {  
  var total   = document.getElementById('total').value;
  var bayar   = document.getElementById('bayar').value;
  var jual    = parseInt(bayar) - parseInt(total);

  if ( !isNaN(jual)){
    document.getElementById('kembali').value = jual;
  } 
}
</script>

<script type="text/javascript">
  function tampil_otomatis(){
    var kode_barang = $("#kode_barang").val();
    $.ajax({
          url: 'penjualan/proses_tambah.php',
          data: "kode_barang="+kode_barang ,
    }).success(function (data) {
        var json = data,
            obj  = JSON.parse(json);
            $('#nama_barang').val(obj.nama_barang);
            $('#harga_jual').val(obj.harga_jual);
            $('#keterangan').val(obj.keterangan);
    })
  }
</script>