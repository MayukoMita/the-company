<?php
    session_start();
    session_unset();
    session_destroy();

    // go to the login page
    header("location: ../views");
    exit;
?>