<?php include "header.php";?>

<div class="right_col" role="main">
<div class="">
<div class="row">
                   
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Add Barang</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    </div>

                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">

                    <br/>
                   <?php
                    $level  = $_POST['level'];
                    $sql = mysqli_query($konek, "SELECT max(id_user) AS maxKode FROM user WHERE id_user LIKE '$level%'");
                    $row = mysqli_fetch_array($sql);
                    $kodeMax = $row['maxKode'];

                    $no_urut = (int) substr($kodeMax, 3, 2);

                    $no_urut++;

                    $newkode = $level . sprintf("%02s", $no_urut);

                    if ($level == "ksr"){
                      $level_user = "kasir";
                    }elseif ($level == "gdg"){
                      $level_user = "gudang";
                    }

                    ?>
                    <form method="POST" class="form-horizontal form-label-left" action="pengguna/pengguna_save.php">
                    
                    <label>Id User</label>
                    <input type="text" name="id_user" id="id_user" class="form-control" placeholder="ID User" value="<?php echo $newkode; ?>" required oninvalid="this.setCustomValidity('ID User Tidak Boleh Kosong')" oninput="setCustomValidity('')"/>
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
                    <input type="text" name="level" id="level" value="<?php echo $level_user ;?>" class="form-control" placeholder="Level" readonly/>
                    <br />

                    <div class="form-group">
                     
                   
                      <button class="btn btn-primary" style="width: 90px;"><i class="fa fa-floppy-o" ></i> Tambah</button>
                       <a href="pengguna.php"><button type="button" class="btn btn-default">Kembali</button></a>
                   
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