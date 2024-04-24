<?php
require_once 'model/members.php';
require_once 'model/payment.php';

class HomeController
{
    public function index(): void
    {
        $model = new Members();
        $members = $model->get_members();
        include 'view/home.php';
    }

    public function error(): void
    {
        include 'view/error.php';
    }
}

?>