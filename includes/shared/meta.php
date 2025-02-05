<?php

    session_name('eduwebdash_ui');
    session_start();

    if(!isset($_SESSION['admin_token'])){
        header('Location: admin-login.php');
        exit();
    }

    require "./functions/config/Database.php";

    $databse = new Database();
    $databse->connect();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">