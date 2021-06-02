<?php
    session_start();
    require_once "connect.php";

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = "SELECT * FROM `users` WHERE `login` = `$login` AND `password` = '$password'";
    