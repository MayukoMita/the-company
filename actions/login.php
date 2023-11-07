<?php
    require "../classes/User.php";

    // get data from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // make an object
    $user = new User;

    // call function
    $user->login($username,$password);
?>