<?php
    require "../classes/User.php";

    // get the data from the form
    $f_name = $_POST["first_name"];
    $l_name = $_POST["last_name"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // make an object
    $user = new User;

    // call the function
    $user->saveUser($f_name, $l_name, $username, $password);
?>