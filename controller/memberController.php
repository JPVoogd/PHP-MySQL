<?php
require_once 'model/database.php';
require_once 'model/members.php';
require_once 'model/payment.php';

class MemberController
{
    public function user(): void
    {
        require_login($_SESSION['logged_in']);
        $controller = new Members();
        $member = $controller->get_member($_SESSION['account_id']);
        $role = $_SESSION['role'];

        $paymentController = new Payment();
        $financial_years = $paymentController->get_financial_years();

        $payments = "";
        if (isset($_POST['year'])) {
            $payments = $paymentController->get_payments($_SESSION['account_id'], $_POST['year']);
        }
        include 'view/user.php';
    }

    public function delete_member(): void
    {
        $qs = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        $qsParams = explode('&', $qs);
        $id = explode("=", $qsParams[1])[1];
        $controller = new Members();
        $controller->delete_member($id);
        header('location: index.php?home');
    }

    public function get_member(): void
    {
        $qs = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        $qsParams = explode('&', $qs);

        $id = explode("=", $qsParams[1])[1];
        $name = explode("=", $qsParams[2])[1];
        $birthday = explode("=", $qsParams[3])[1];
        include 'view/updateUser.php';
    }

    public function update_member($id, $name, $birthday): void
    {
        $controller = new Members();
        $controller->update_member(sanitizeString($id), sanitizeString($name), sanitizeString($birthday));
        header('location: index.php?home');
    }
}

?>