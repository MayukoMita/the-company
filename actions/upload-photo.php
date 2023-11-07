<?php
    require "../classes/User.php";

    $file_name = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];

    session_start();
    $user = new User;
    $user->uploadPhoto($_SESSION['user_id'],$file_name,$tmp_name);
?>