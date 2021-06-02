<?php

    session_start();
    require_once "connect.php";

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    
    if ($password === $password_confirm) {

        $password = md5($password);
        $sql = "INSERT INTO users (full_name, login, email, password) VALUES ('$full_name', '$login', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['message'] = 'Регистрация прошла успешно!';
            header('Location: ../index.php');
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);   
        }
  
    } else {
        $_SESSION['message'] = 'Пароли не совподают';
        header('Location: ../register.php');
    }

?> 
