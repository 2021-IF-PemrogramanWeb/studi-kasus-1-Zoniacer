<?php
    // mengalihkan halaman ke halaman login
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    setcookie('id', '', time()-3700);
    setcookie('key', '',time()-3700 );
    header("Location: ./login.php");
    exit;
//gtmetrix
?>
