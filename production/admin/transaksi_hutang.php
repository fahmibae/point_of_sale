<?php include "header.php";?>

<?php include 'kode_pb.php'; ?>
<div class="right_col" role="main">
<div class="">
<div class="row">
                   
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;overflow-x:scroll;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Pembayaran Hutang</h3>
                    </div>
                
                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">
                    <?php 

                      $id_hutang = $_GET['id_hutang'];
                      $tampil = mysqli_query($konek, "SELECT * FROM hutang_pembelian WHERE id_hutang='$id_hutang'");

                      $data = mysqli_fetch_array($tampil);

                      $faktur_pembelian  = $data['faktur_pembelian'];
                      $nota_order        = $data['nota_order'];
                      $supplier          = $data['kode_supplier'];
                      $tanggal_jatuh_tempo = $data['tanggal_jatuh_tempo'];
                      $tanggal_pembelian   = $data['tanggal_pembelian'];
                     ?>
                    <br/>
                    <form method="POST" action="hutang/simpan_hutang.php?id_hutang=<?php echo $data['id_hutang'] ;?>" class="form-horizontal form-label-left">

                     <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Id Hutang</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required oninvalid="this.setCustomValidity('Id Hutang Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="id_hutang" id="id_hutang" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $id_hutang;?>"></div></div>

                     <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Faktur Pembelian</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required oninvalid="this.setCustomValidity('Faktur Pembelian Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="faktur_pembelian" id="faktur_pembelian" readonly="" class="form-control col-md-7 col-xs-12" value="<?php echo $faktur_pembelian;?>"></div></div>

                     <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Nota Order</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required oninvalid="this.setCustomValidity('Nota Order Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="nota_order" id="nota_order" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $nota_order;?>"></div></div>

                     <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Tanggal Pembelian</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="date" readonly required oninvalid="this.setCustomValidity('Tanggal Pembelian Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="tanggal_pembelian" class="form-control has-feedback-left col-md-7 col-xs-12" value="<?php echo $tanggal_pembelian; ?>"><span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span></div></div>

                     <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Tanggal Jatuh Tempo</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="date" readonly required oninvalid="this.setCustomValidity('Tanggal Jatuh Tempo Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="tanggal_jatuh_tempo" class="form-control has-feedback-left col-md-7 col-xs-12" value="<?php echo $tanggal_jatuh_tempo; ?>"><span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span></div></div>
                    
                    <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Supplier</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="supplier" id="supplier" required oninvalid="this.setCustomValidity('Supplier Tidak Boleh Kosong')" oninput="setCustomValidity('')" readonly="" class="form-control col-md-7 col-xs-12" value="<?php echo $supplier;?>"></div></div>

                    <br/>
                    <br/>

                    <div class="col-sm-2">Nomor Transfer
                    <div class="form-group">
                    <input type="text" required oninvalid="this.setCustomValidity('Nomor Transfer Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="nomor_transfer" id="nomor_transfer" class="form-control">
                    </div></div>

                     <div class="col-sm-2">Tanggal Pencatatan
                    <div class="form-group">
                    <input type="date" name="tanggal_pencatatan" required oninvalid="this.setCustomValidity('Tanggal Pencatatan Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control">
                    </div></div>

                     <div class="col-sm-2">Cicilan
                    <div class="form-group">
                    <input type="text" name="cicilan" id="cicilan" required oninvalid="this.setCustomValidity('Cicilan Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control">
                  </div></div>


                  <div class="col-sm-2">Jumlah Cicilan
                    <div class="form-group">
                    <input type="number" name="jumlah_cicilan" id="jumlah_cicilan" required oninvalid="this.setCustomValidity('Jumlah Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control">
                  </div></div>

                    <div class="col-sm-2"><a style="color: #fff;">Klik</a>

                    <div class="form-group">
                    <button type="submit" name="tambah" id="tambah" class="btn btn-info" style="width: 120px;"><i class="fa fa-arrow-down"></i> Masuk</button>
                    </div>
                    </div>

                    <br />
                    <br />
                    </form>

                    <hr style="border-bottom: 2px solid #E6E9ED;">
                    <br />
                    
                     <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="color: #26B99A;">No</th>
                          <th style="color: #26B99A;">Nomor Transfer</th>
                          <th style="color: #26B99A;">Tanggal Pencatatan</th>
                          <th style="color: #26B99A;">Cicilan</th>
                          <th style="color: #26B99A;">Jumlah Pembayaran</th>
                          <th style="color: #26B99A;">Sisa Hutang</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                          $no= 1;
                          $sql = mysqli_query($konek, "select * from hutang_detail where id_hutang='$id_hutang'");
                        
                        while($data = mysqli_fetch_array($sql)){
                         ?>
                    
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $data['nomor_transfer'];?></td>
                          <td><?php echo $data['tanggal_pencatatan'];?></td>
                          <td><?php echo $data['cicilan'];?></td>
                          <td><?php echo number_format($data['jumlah_cicilan']);?></td>
                          <td><?php echo number_format($data['sisa_hutang']);?></td>
                        </tr>

                        

                        <?php
                      }
                        ?>
                      </tbody>
                    </table>
                    <br />
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