
<?php include "header.php";?>


<div class="right_col" role="main">
<div class="">
<div class="row">
                   
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Edit Supplier</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    </div>

                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">

                    <br/>
                   <?php
                     $kode_supplier = $_GET['kode_supplier'];
                      $supplier = mysqli_query($konek,"select * from supplier where kode_supplier='$kode_supplier'");
                      
                      $row=  mysqli_fetch_array($supplier);

                    ?>
                    <form method="POST" class="form-horizontal form-label-left" action="supplier/proses_edit.php">
                    
                   <label>Kode Supplier</label>
                    <input type="text" name="kode_supplier" id="kode_supplier" value="<?php echo $row['kode_supplier'];?>" class="form-control" placeholder="Kode supplier" readonly/>
                    <br />
                    <label>Nama Supplier</label>
                    <input type="text" name="nama_supplier" value="<?php echo $row['nama_supplier'];?>" class="form-control" placeholder="Nama supplier" required oninvalid="this.setCustomValidity('Nama Supplier Tidak Boleh Kosong')" oninput="setCustomValidity('')"/>
                    <br />
                    <label>Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" placeholder="alamat" required oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')" oninput="setCustomValidity('')"><?php echo $row['alamat'];?>
                    </textarea>
                    <br />
                    <label>Telepon</label>
                    <input type="number" name="telepon" value="<?php echo $row['telepon'];?>" class="form-control" placeholder="telepon" required oninvalid="this.setCustomValidity('Telepon Tidak Boleh Kosong')" oninput="setCustomValidity('')"/>
                    <br />
                    <br />

                    <div class="form-group">  
                    
                      <button class="btn btn-success" style="width: 90px;"><i class="fa fa-floppy-o" ></i> Ubah</button>
                      <a href="supplier.php"><button type="button" class="btn btn-default">Kembali</button></a>
                    
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