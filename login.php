<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ingoma</title>
    <link rel="icon" type="image/png" sizes="280x281" href="assets/img/ingomalogo2.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/login-form-1.css">
    <link rel="stylesheet" href="assets/css/login-form.css">
    <link rel="stylesheet" href="assets/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body>
    <div class="container full-height">
        <div class="row flex center v-center full-height">
            <div class="col-8 col-sm-4">
                <div class="form-box">
                    <form action="app/controllers/login.php" method="POST">
                        <fieldset>
                            <legend>Sign in</legend><img id="avatar" class="avatar round" src="assets/img/avatar.png"><p class="text-danger"><?php if(isset($_GET['message'])){ echo $_GET['message']; }?></p><input class="form-control" type="text" id="username" name="username" placeholder="username">
                            <input class="form-control" type="password" id="password" name="password" placeholder="password"><button class="btn btn-primary btn-block" type="submit">LOGIN </button>
                            <a href="register.php">
                                <p>No account?</p>
                            </a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/login-full-page-bs4.js"></script>
    <script src="assets/js/agency.js"></script>
    <script src="assets/js/login-full-page-bs4-1.js"></script>
</body>

</html>