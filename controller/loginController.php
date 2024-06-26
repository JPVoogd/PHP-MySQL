<?php
require_once 'model/members.php';
require_once 'model/login.php';

class LoginController
{

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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email_temp = sanitizeString($_POST['email']);
            $pw_temp = sanitizeString($_POST['password']);
            $user = User::user_login($email_temp);

            if ($email_temp == $user->email and $pw_temp == $user->password) {
                login($user->id, $user->email, $user->password, $user->role);
                if ($user->role == 'admin') {
                    admin();
                    header('location: index.php?admin');
                    exit;
                } else {
                    header('location: index.php?user');
                    exit;
                }
            } else {
                header('location: index.php?error');
                exit;
            }
        }
        include 'view/login.php';
    }

    public function admin(): void
    {
        require_admin($_SESSION['is_admin']);
        $members = Members::get_all();
        include 'view/admin.php';
    }

    public function logout(): void
    {
        //logout();

        $_SESSION = [];

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'],
            $params['domain'], $params['secure'], $params['httponly']);

        session_destroy();

        header('location: index.php?home');
    }
}