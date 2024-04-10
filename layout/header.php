<?php
global $logged_in, $is_admin;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leden contributie.</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="styled-nav">
    <a href="index.php?home">Home</a>
    <?= $is_admin ? '<a href="index.php?admin">All Accounts</a>' : '<a href="index.php?user">My Account</a>'; ?>
    <?= $logged_in ? '<a href="index.php?logout">Log Out</a>' : '<a href="index.php?login_page">Log In</a>'; ?>
</nav>



