<?php 
    session_start();
    $orginalRequest = $_SERVER['PHP_SELF'];
        
    if(!isset($_SESSION['user_id']) && !((strpos($orginalRequest,"index.php")) || (strpos($orginalRequest,"song_play.php")) || (strpos($orginalRequest,"artists.php")) || (strpos($orginalRequest,"top10.php")) || (strpos($orginalRequest,"user_profile.php"))) ){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Ingoma</title>
    <meta name="description" content="Ingoma is the drum taken from bantu language which is a tool used for intertainment and information. ingoma is used in most of African culture as a tool for alert and information. that is why we believe music is one of the tool to spread information.">
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

<body id="page-top">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container"><a class="navbar-brand" href="index.php">Ingoma</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto text-uppercase">
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="top10.php"><i class="fa fa-toggle-up"></i>&nbsp;Top10</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="artists.php"><i class="icon ion-earth"></i>&nbsp;Artists</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="song_play.php"><i class="fa fa-play"></i>&nbsp;Play</a></li>
                    <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item dropdown show d-flex d-xl-flex  justify-content-xl-center align-items-xl-center"><a class="dropdown-toggle justify-content-lg-center" data-toggle="dropdown" aria-expanded="true" href="#"><img class="rounded-circle d-inline" style="margin: 0px;width: 40px;height: 40px;" src="assets/profiles/<?php  echo $_SESSION['profile']; ?>" height="150px">&nbsp;Account</a>
                            <div
                                class="dropdown-menu show" role="menu"><a class="dropdown-item" role="presentation" href="upload_song.php">Upload</a><a class="dropdown-item" role="presentation" href="#">dashboard</a><a class="dropdown-item" role="presentation" href="app/controllers/logout.php">Logout</a></div>
                   
                    </li>

                    <?php endif;  ?>

                </ul>
            </div>
        </div>
    </nav>
    