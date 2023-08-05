<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../alert/css/sweetalert.css">
<link rel="icon" href="../images/favicon3.ico">
</head>
<body>
  <script type='text/javascript'>
	setTimeout(function () { 
	
		swal({
            title: 'Login Terlebih Dahulu',
            text:  'Point Of Sale',
            type: 'warning',
            timer: 3000,
            showConfirmButton: true
        });		
	},10);	
	window.setTimeout(function(){ 
		window.location.replace('../index.php');
	} ,3000);	
  </script>
<script src="../alert/js/sweetalert.min.js"></script>
<script src="../alert/js/qunit-1.18.0.js"></script>

</body>
</html>
