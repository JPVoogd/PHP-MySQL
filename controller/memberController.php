<?php
require_once 'model/members.php';
require_once 'model/member.php';
require_once 'model/payment.php';

class MemberController
{
    public function get_user(): void
    {
        require_login($_SESSION['logged_in']);
        $member = Member::get_by_id($_SESSION['account_id']);

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
        $member = Member::delete_member($id);
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
        $member = Member::update_member(sanitizeString($id), sanitizeString($name), sanitizeString($birthday));
        header('location: index.php?home');
    }
}

?>