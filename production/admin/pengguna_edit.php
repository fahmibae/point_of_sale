<?php include "header.php";?>


<div class="right_col" role="main">
<div class="">
<div class="row">
                   
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border:1px solid white;width:100%;height:100%;">
                  <div class="x_title">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <h3>Edit Pelanggan</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    </div>

                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">

                    <br/>
                   <?php
                    $id_user = $_GET['id_user'];
                    $sql = mysqli_query($konek, "SELECT * FROM user WHERE id_user='$id_user'");
                    $row = mysqli_fetch_array($sql);

                    ?>
                    <form method="POST" class="form-horizontal form-label-left" action="pengguna/proses_edit.php">
                    
                     
                     <input type="hidden" name="id_user" value="<?php echo $row['id_user'];?>" class="form-control" readonly/>
                     <br/>
                      <label>Nama Pengguna</label>
                      <input type="text" name="nama_pengguna" value="<?php echo $row['nama_pengguna'];?>" class="form-control" placeholder="Nama pelanggan" required oninvalid="this.setCustomValidity('Nama Pengguna Tidak Boleh Kosong')" oninput="setCustomValidity('')"/>
                      <br />
                      <label>Username</label>
                      <input type="text" name="username" id="username" class="form-control" value="<?php echo $row['username'];?>" placeholder="username" required oninvalid="this.setCustomValidity('Username Tidak Boleh Kosong')" oninput="setCustomValidity('')"/>
                      <br />
                      <label>Password</label>
                      <input type="password" name="password" id="password" value="<?php echo $row['password'];?>" class="form-control" placeholder="Password" required oninvalid="this.setCustomValidity('Password Tidak Boleh Kosong')" oninput="setCustomValidity('')"/>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="checkbox" name="show-hide" value="" id="show-hide"/> Tampilkan  
                      </div>
                      <br />
                      <br />
                      <label>Level</label>
                      <input type="text" name="level" value="<?php echo $row['level'];?>" class="form-control" placeholder="level" required oninvalid="this.setCustomValidity('level Tidak Boleh Kosong')" oninput="setCustomValidity('')" readonly/>
                      <br />
                   

                    <div class="form-group">
                      
                    
                      <button class="btn btn-success" style="width: 90px;"><i class="fa fa-floppy-o" ></i> Ubah</button>
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