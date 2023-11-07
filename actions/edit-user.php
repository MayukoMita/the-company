<?php
    require "../classes/User.php";

    // get data from the form
    $id = $_POST['user_id'];
    $f_name = $_POST['first_name'];
    $l_name = $_POST['last_name'];
    $username = $_POST['username'];

    // make an object
    $user = new User;

    // call function
    $user->editUser($id,$f_name,$l_name,$username);
?>