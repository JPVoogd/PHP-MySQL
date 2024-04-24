<?php
require_once 'model/members.php';
require_once 'model/payment.php';

 class LoginController{
     public function admin(): void
     {
         require_admin($_SESSION['is_admin']);
         $model = new Members();
         $members = $model->get_members();
         include 'view/admin.php';
     }

     public function login_page(): void
     {
         global $logged_in;
         if ($logged_in) {
             header('location: index.php?user');
             exit;
         }
         include 'view/login.php';
     }

     public function login(): void
     {
         global $pdo;
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $un_temp = sanitizeString($_POST['email']);
             $pw_temp = sanitizeString($_POST['password']);
             $query = "SELECT * FROM account WHERE email='$un_temp'";
             $result = $pdo->query($query);
             $row = $result->fetch();
             $id = $row['account_id'];
             $username = $row['email'];
             $password = $row['password'];
             $role = $row['role'];
             if ($un_temp == $username and $pw_temp == $password) {
                 login($id, $username, $password, $role);
                 if ($role == 'admin') {
                     admin();
                     header('location: index.php?admin');
                     exit;
                 } else {
                     header('location: index.php?user');
                     exit;
                 }
             }
         }
         include 'view/login.php';
     }

     public function logout(): void
     {
         logout();
         header('location: index.php?home');
     }
 }