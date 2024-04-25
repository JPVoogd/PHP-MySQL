<?php
require_once 'model/member.php';
require_once 'model/payment.php';
require_once 'model/years.php';

class MemberController
{
    public function get_member(): void
    {
        require_login($_SESSION['logged_in']);
        $member = Member::get_by_id($_SESSION['account_id']);

        $years = Years::get_all();

        $payments = "";
        if (isset($_POST['year'])) {
            $payments = Payment::get_payments($_SESSION['account_id'], $_POST['year']);
        }
        include 'view/user.php';
    }

    public function delete_member(): void
    {
        $qs = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        $qsParams = explode('&', $qs);
        $id = htmlentities(explode("=", $qsParams[1])[1]);

        $member = Member::delete_member($id);

        header('location: index.php?home');
    }

    public function edit_member(): void
    {
        $qs = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        $qsParams = explode('&', $qs);

        $id = htmlentities(explode("=", $qsParams[1])[1]);
        $name = htmlentities(explode("=", $qsParams[2])[1]);
        $birthday = htmlentities(explode("=", $qsParams[3])[1]);

        include 'view/updateUser.php';
    }

    public function update_member($id, $name, $birthday): void
    {
        $id = sanitizeString($id);
        $name = sanitizeString($name);
        $birthday = sanitizeString($birthday);

        Member::update_member($id, $name, $birthday);
        header('location: index.php?home');
    }
}

?>