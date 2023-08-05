<?php include "header.php";?>


<div class="right_col" role="main">
<div class="">
<div class="row">
                   
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Edit Barang</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    </div>

                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">

                    <br/>
                   <?php
                    $kode_barang = $_GET['kode_barang'];
                    $sql = mysqli_query($konek, "SELECT * FROM barang WHERE kode_barang='$kode_barang'");
                    $row = mysqli_fetch_array($sql);

                    ?>
                    <form method="POST" class="form-horizontal form-label-left" action="barang/proses_edit.php">
                    
                    <label>Kode Barang</label>
                    <input type="text" readonly name="kode_barang" value="<?php echo $row['kode_barang'];?>" id="kode_barang" required oninvalid="this.setCustomValidity('Kode Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" placeholder="Kode Barang" required/>

                    <br/>
                     <label>Kategori</label>
                     <input type="text" name="kategori" required oninvalid="this.setCustomValidity('Kategori Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="<?php echo $row['kategori'];?>" id="kategori" class="form-control" placeholder="Kategori" />

                    <br/>
                    <label>Nama Barang</label>
                   <input type="text" name="nama_barang" required oninvalid="this.setCustomValidity('Nama Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="<?php echo $row['nama_barang'];?>" id="nama_barang" class="form-control" placeholder="Nama Barang"/>
                    
                    <br/>
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" required oninvalid="this.setCustomValidity('Keterangan Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="<?php echo $row['keterangan'];?>" id="keterangan" class="form-control" placeholder="Keterangan"/>  

                     <br/>
                    <label>Harga Beli</label>
                    <input type="number" name="harga_beli" id="harga_beli" onkeyup="hitung();" required oninvalid="this.setCustomValidity('Harga Beli Tidak Boleh Kosong')" oninput="setCustomValidity('')"  value="<?php echo $row['harga_beli'];?>" class="form-control" placeholder="Harga Beli"/>

                     <br/>
                    <label>Tahun Kadaluarsa</label>
                    <input type="date" name="tahun_kadaluarsa" id="tahun_kadaluarsa" required oninvalid="this.setCustomValidity('Tanggal Kadaluarsa Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="<?php echo $row['tahun_kadaluarsa']?>" class="form-control" placeholder="Tanggal Kadaluarsa"/>

                     <br/>
                    <label>Keuntungan</label>
                    <input type="number" name="untung" id="untung" onkeyup="hitung();" required oninvalid="this.setCustomValidity('Keuntungan Tidak Boleh Kosong')" oninput="setCustomValidity('')"  value="<?php echo $row['keuntungan'];?>" class="form-control" placeholder="Keuntungan"/>

                    <br/>
                    <label>Potongan Harga</label>
                    <input type="number" name="potongan_harga" id="potongan_harga" onkeyup="hitung();" required oninvalid="this.setCustomValidity('Diskon Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="<?php echo $row['potongan_harga'];?>" class="form-control" placeholder="Potongan Harga"/>

                     <br/>
                    <label>Harga Jual</label>
                    <input type="number" onkeyup="hitung();" name="harga_jual" id="harga_jual" required oninvalid="this.setCustomValidity('Harga Jual Tidak Boleh Kosong')" oninput="setCustomValidity('')"  value="<?php echo $row['harga_jual'];?>" class="form-control" placeholder="Harga Jual"/>

                     <br/>
                    <label>Stok</label>
                    <input type="number" name="stok" id="stok" required oninvalid="this.setCustomValidity('Stok Barang Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="<?php echo $row['stok'];?>" class="form-control" placeholder="Jumlah Stok" readonly/>

                    <br/>
                    <div class="form-group">
                     
                   
                      <button class="btn btn-success" style="width: 90px;"><i class="fa fa-floppy-o" ></i> Ubah</button>
                       <a href="barang.php"><button type="button" class="btn btn-default">Kembali</button></a>
                   
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