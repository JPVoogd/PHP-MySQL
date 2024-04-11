<?php 
class AccountController 
{
    public function get_account(): void
    {
        $id = $_SESSION['account_id'];
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $role = $_SESSION['role'];
        include 'view/updateAccount.php';
    }

    public function update_account($id, $username, $password): void
    {
        $controller = new Members();
        $controller->update_account(sanitizeString($id), sanitizeString($username), sanitizeString($password));
        header('location: index.php?home');
    }
}

?>