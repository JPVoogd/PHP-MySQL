<?php
require_once 'model/members.php';

class HomeController
{
    public function index(): void
    {
        $members = Members::get_all();
        include 'view/home.php';
    }

    public function error(): void
    {
        include 'view/error.php';
    }
}

?>