<?php
require_once 'controller/homeController.php';
require_once 'controller/memberController.php';
require_once 'controller/sessions.php';

//Ontvang de request en verwerk de route naar de juiste controller
$qs = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
$qsParams = explode('&', $qs);
$action = !empty($qsParams[0]) ? $qsParams[0] : 'home';


// Controleer welke controller en methode moet worden uitgevoerd
switch (sanitizeString($action)) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;
    case 'user':
        $controller = new MemberController();
        $controller->user();
        break;
    case 'admin':
        $controller = new LoginController();
        $controller->admin();
        break;
    case 'edit':
        $controller = new MemberController();
        $controller->get_member();
        break;
    case 'save':
        $controller = new MemberController();
        $controller->update_member($_POST['id'], $_POST['name'], $_POST['birthday']);
        break;
    case 'delete':
        $controller = new MemberController();
        $controller->delete_member();
        break;
    case 'account':
        $controller = new AccountController();
        $controller->get_account();
        break;
    case 'updateAccount':
        $controller = new AccountController();
        $controller->update_account($_POST['id'], $_POST['username'], $_POST['password']);
        break;
    case 'login_page':
        $controller = new LoginController();
        $controller->login_page();
        break;
    case 'login':
        $controller = new LoginController();
        $controller->login();
        break;
    case 'logout':
        $controller = new LoginController();
        $controller->logout();
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        $controller = new HomeController();
        $controller->error();
        break;
}
?>