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
    <div class="container-fluid main-panel">
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center">
                <div class="login-panel" style="height: auto;">
                    <div class="login-user-avatar" style="padding:0px;" id="profile">
                        <img id="image" width="145" height="145" class="img-round"style="margin-left: 3px; margin-top: 3px;border-radius: 50%;">
                    </div>
                    <div class="login-form">
                        <form method="POST" action="app/controllers/register.php"enctype="multipart/form-data" >
                            <div class="form-group">
                                <div class="input-group"><input class="form-control d-none" type="file" id="fileUpload" onchange="setPicture(event)" name="profilePicture" required="" placeholder=""></div>
                                <div class="input-group"><input class="form-control" type="text" id="login-username" name="fullname" required="" placeholder="Full Name"></div>
                            </div>
                            <div class="form-group">
                                <div class="input-group"><input class="form-control" type="text" id="login-username" name="phone_number" required="" placeholder="Phone Number"></div>
                                <div class="form-group"><select class="form-control" name="categories"><option value="Artist" selected="">Artist</option><option value="Not Artist">Not Artist</option></select>
                                <div class="input-group"><input class="form-control" type="text" id="login-username" name="email" required="" placeholder="Email"></div>
                            </div>
                            <div class="form-group">
                                <div class="input-group"><input class="form-control" type="text" id="login-username" name="username" required="" placeholder="Username"></div>
                            </div>
                            <div class="form-group">
                                <div class="input-group"><input class="form-control" type="password" name="password" required="" placeholder="Password"></div>
                            </div>
                            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Register</button></div>
                            <a href="login.php">
                                <p class="text-center">Already a member?</p>
                            </a>
                        </form>
                    </div>
                    <div class="login-response has-error"></div>
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
    <script src="assets/js/register.js"></script>
    
</body>

</html>