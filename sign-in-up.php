<!DOCTYPE html>
<html>
<head>
  <title>Sign In & Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- style css -->
  <link rel="stylesheet" href="css/sign-in-up.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="row px-3">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
                <div class="img-left d-none d-md-flex"></div>        
                <div class="card-body">
                    <!-- daftar -->
                    <form action="regist.php" method="post" class="form-box px-3 none" id="login-up">
                        <h4 class="title text-center mt-4">
                            Daftar
                        </h4>
                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="username" name="name" placeholder="Username" id="userlogin" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-key"></i></span>
                            <input type="password" name="password" placeholder="Password" id="pass" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-block text-uppercase" id="signup">
                                Daftar
                            </button>
                        </div>
                        <hr class="my-4">
                        <div class="text-center mb-2">
                            Sudah punya akun?
                            <a href="#" class="register-link" id="sign-in">
                                Masuk
                            </a>
                        </div>
                    </form>
                    <!-- masuk -->
                    <form action="validation.php" method="post" class="form-box px-3" id="login-in">
                        <h4 class="title text-center mt-4">
                            Masuk
                        </h4>
                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="username" name="name" placeholder="Username" tabindex="10" required id="emaillogin">
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-key"></i></span>
                            <input type="password" name="password" placeholder="Password" required id="passlogin">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-block text-uppercase" id="signin">
                                Masuk
                            </button>
                        </div>
                        <hr class="my-4">
                        <div class="text-center mb-2">
                            Belum punya akun?
                            <a href="#" class="register-link" id="sign-up">
                                Daftar akun
                            </a>
                        </div>
                    </form>                  
                </div>
            </div>
        </div>
    </div>
  </div>

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <!-- js -->
  <script src="js/sign-in-up.js"></script>
</body>
</html>