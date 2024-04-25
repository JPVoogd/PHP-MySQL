<?php

session_start();
$logged_in = $_SESSION['logged_in'] ?? false;
$email = $_SESSION['email'] ?? false;
$password = $_SESSION['password'] ?? false;
$id = $_SESSION['account_id'] ?? false;
$role = $_SESSION['role'] ?? false;
$is_admin = $_SESSION['is_admin'] ?? false;

function login($id, $email, $password, $role): void
{
    session_regenerate_id(true);
    $_SESSION['logged_in'] = true;
    $_SESSION['account_id'] = sanitizeString($id);
    $_SESSION['email'] = sanitizeString($email);
    $_SESSION['password'] = sanitizeString($password);
    $_SESSION['role'] = sanitizeString($role);
}

function require_login($logged_in): void
{
    if (!$logged_in) {
        header('location: index.php?login');
        exit;
    }
}

function admin(): void
{
    $_SESSION['is_admin'] = true;
    include 'view/admin.php';
}

function require_admin($is_admin): void
{
    if (!$is_admin) {
        header('Location: login.php');
        exit;
    }
}

function sanitizeString($var): string
{
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}