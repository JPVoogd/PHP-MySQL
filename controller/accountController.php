<?php 
require_once 'model/account.php';

class AccountController 
{
    public function get_account(): void
    {
        // $id = $_SESSION['account_id'];
        // $username = $_SESSION['username'];
        // $password = $_SESSION['password'];
        // $role = $_SESSION['role'];

        $id = $_SESSION['account_id'];
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $role = $_SESSION['role'];
        include 'view/updateAccount.php';
    }

    public function update_account($id, $email, $password): void
    {
        $id = sanitizeString($id);
        $email = sanitizeString($email)
        $password = sanitizeString($password)

        $account = Account::update_account($id, $email, $password);
        header('location: index.php?home');
    }
}

?>