<?php include "header.php"; ?>

<div class="right_col" role="main">
<div class="">
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;overflow-x:scroll;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Pengguna</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-plus"></i> Tambah Pengguna</button>
                    </div>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="color: #26B99A;">No.</th>
                          <th style="color: #26B99A;">Id User</th>
                          <th style="color: #26B99A;">Nama Pengguna</th>
                          <th style="color: #26B99A;">Username</th>
                          <th style="color: #26B99A;">Level</th>
                          <th style="color: #26B99A;">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                         $no=1;
                          $sql = mysqli_query($konek,"SELECT * FROM user");
                            while ($data = mysqli_fetch_array($sql)) {
                        ?>

                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $data['id_user'];?></td>
                          <td><?php echo $data['nama_pengguna'];?></td>
                          <td><?php echo $data['username'];?></td>
                          <td><?php echo $data['level'];?></td>
                          <td>
                             <a href="pengguna_edit.php?id_user=<?php echo $data['id_user'];?>" type="button" class="btn btn-success"><i class="fa fa-edit"></i></a>
                             <a href="pengguna/proses_delete.php?id_user=<?php echo $data['id_user'];?>" id="hapus" type="button" class="btn btn-danger"><i class="fa fa-close"></i></a>
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
    <form method="post" id="user_form" action="pengguna/pengguna_save.php" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header" style="background: #337ab7">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: white;">Add Pengguna</h4>
        </div>
        <div class="modal-body">
           <?php
       $sql = mysqli_query($konek, "SELECT max(id_user) AS maxKode FROM user");
       $row = mysqli_fetch_array($sql);
       $kodeMax = $row['maxKode'];
       $no_urut = (int) substr($kodeMax, 3, 2);
       $no_urut++;
       $char = "ksr";
       $user = $char . sprintf("%02s", $no_urut);
      ?>
          <label>Id User</label>
                    <input type="text" name="id_user" id="id_user" class="form-control" placeholder="ID User" value="<?php echo $user; ?>" readonly required oninvalid="this.setCustomValidity('ID User Tidak Boleh Kosong')" oninput="setCustomValidity('')"/>
                    <br />
                    <label>Nama Pengguna</label>
                    <input type="text" name="nama_pengguna" id="nama_pengguna" class="form-control" placeholder="Nama pelanggan" required oninvalid="this.setCustomValidity('Nama Pengguna Tidak Boleh Kosong')" oninput="setCustomValidity('')"/>
                    <br />
                    <label>Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required oninvalid="this.setCustomValidity('Username Tidak Boleh Kosong')" oninput="setCustomValidity('')"/>
                    <br />
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="password" required oninvalid="this.setCustomValidity('Password Tidak Boleh Kosong')" oninput="setCustomValidity('')"/>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="checkbox" name="show-hide" value="" id="show-hide"/> Tampilkan  
                    </div>
                    <br />
                    <br/>
                    <label>Level</label>
                    <input type="text" name="level" id="level" value="kasir" class="form-control" placeholder="Level" readonly/>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#show-hide').click(function(){
            if($(this).is(':checked')){
                $('#password').attr('type', 'text');
            }else{
                $('#password').attr('type', 'password');
            }
        });
    });
</script>