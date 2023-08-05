<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../alert/css/sweetalert.css">
</head>
<body> 
 <?php
        include '../../koneksi.php';
            
        $id_hutang  = $_GET['id_hutang'];
           
        mysqli_query($konek, "DELETE FROM hutang_pembelian WHERE id_hutang = '$id_hutang'");

        mysqli_query($konek, "DELETE FROM hutang_detail WHERE id_hutang = '$id_hutang'");

        echo "<script>setTimeout(function () { 
  
    swal({
            title: 'Data Berhasil Terhapus',
            text:  '$id_hutang',
            type: 'success',
            timer: 3000,
            showConfirmButton: true
        });   
  },10);  
  window.setTimeout(function(){ 
    window.location.replace('../hutang.php');
  } ,1000); </script>"; 
?>
<script src="../../alert/js/sweetalert.min.js"></script>
<script src="../../alert/js/qunit-1.18.0.js"></script>

</body>
</html>
