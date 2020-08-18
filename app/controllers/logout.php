<?php
    session_start();
    session_destroy();
    
    // set_cookie("user_id", "", time() - 3600);
    // set_cookie("fullname", "", time() - 3600);

    header("Location: ../../index.php");
?>