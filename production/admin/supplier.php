
<?php include "header.php"; ?>

<div class="right_col" role="main">
<div class="">
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;overflow-x:scroll;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Supplier</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-plus"></i> Tambah Supplier</button>
                    </div>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="color: #26B99A;">No</th>
                          <th style="color: #26B99A;">Kode Supplier</th>
                          <th style="color: #26B99A;">Nama Supplier</th>
                          <th style="color: #26B99A;">Alamat</th>
                          <th style="color: #26B99A;">Telepon</th>
                          <th style="color: #26B99A;">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                         $no=1;
                          $sql = mysqli_query($konek,"SELECT * FROM supplier");
                            while ($data = mysqli_fetch_array($sql)) {
                        ?>

                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $data['kode_supplier'];?></td>
                          <td><?php echo $data['nama_supplier'];?></td>
                          <td><?php echo $data['alamat'];?></td>
                          <td><?php echo $data['telepon'];?></td>
                          <td>
                             <a href="supplier_edit.php?kode_supplier=<?php echo $data['kode_supplier'];?>" type="button" class="btn btn-success"><i class="fa fa-edit"></i></a>
                             <a href="supplier/proses_delete.php?kode_supplier=<?php echo $data['kode_supplier'];?>" id="hapus" type="button" class="btn btn-danger"><i class="fa fa-close"></i></a>
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
 <div id="ModalAdd" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="user_form" action="supplier/supplier_save.php" enctype="multipart/form-data">
       <?php
       $sql = mysqli_query($konek, "SELECT max(kode_supplier) AS maxKode FROM supplier");
       $row = mysqli_fetch_array($sql);
       $kodeMax = $row['maxKode'];
       $no_urut = (int) substr($kodeMax, 2, 4);
       $no_urut++;
       $char = "SP";
       $supplier = $char . sprintf("%04s", $no_urut);
      ?>
      <div class="modal-content">
        <div class="modal-header" style="background: #337ab7">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: white;">Add Supplier</h4>
        </div>
        <div class="modal-body">
          <label>Kode Supplier</label>
          <input type="text" name="kode_supplier" value="<?php echo $supplier;?>" id="kode_supplier" class="form-control" placeholder="kode supplier" readonly/>
          <br />
          <label>Nama Supplier</label>
          <input type="text" name="nama_supplier" id="nama_supplier" class="form-control" placeholder="Nama supplier" required oninvalid="this.setCustomValidity('Nama Supplier Masih Kosong')" oninput="setCustomValidity('')"/>
          <br />
          <label>Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control" placeholder="alamat" required oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')" oninput="setCustomValidity('')"/>
          </textarea>
          <br />
          <label>Telepon</label>
          <input type="number" name="telepon" id="telepon" class="form-control" placeholder="telepon" required oninvalid="this.setCustomValidity('Telepon Tidak Boleh Kosong')" oninput="setCustomValidity('')"/>
          <br />
        </div>
        <div class="modal-footer">
          <input type="submit" name="action" id="action" class="btn btn-primary" value="Tambah" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
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