<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>POINT OF SALE</title>


    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <link rel="stylesheet" href="alert/css/sweetalert.css">
    <link rel="shortcut icon" href="images/favicon5.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon5.ico" type="image/x-icon">

  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <br/>
      <div class="login_wrapper">
        <center><img src="images/pos4.png" width="50%" style="margin-top:40px;"></center>
        <div class="animate form login_form">
          <section class="login_content" style="padding:130px 0 0;">
            <form method="POST" action="login.php">
              <h1 style="color:#fff;">Login Form</h1>
              <div>
                <input type="text" class="form-control has-feedback-left"  name="username" placeholder="Username" required oninvalid="this.setCustomValidity('Username Masih Kosong')" oninput="setCustomValidity('')" style="border-radius: 30px;" /><i class="fa fa-user" style="position:absolute;
                left:17px;top:61px;color:#777;"></i>
              </div>
              <div>
                <input type="password" class="form-control has-feedback-left" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Password Masih Kosong')" oninput="setCustomValidity('')" style="border-radius: 30px;" /><i class="fa fa-key" style="position:absolute;
                left:17px;top:114px;color:#777;"></i>
              </div>
              <div>
                <button type="submit" class="btn btn-round btn-warning" style="width: 100%;">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />
                <div>
                  <p style="color:#fff; font-size:17px;">POINT OF SALE &copy; 2019</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
    
     <script src="alert/js/sweetalert.min.js"></script>
    <script src="alert/js/qunit-1.18.0.js"></script>
  </body>
</html>
