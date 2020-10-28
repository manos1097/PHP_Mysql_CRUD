<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}
//whatIsHappening();

require 'Model/connection.php';
require 'Model/Student.php';
require 'Model/StudentInsert.php';
require 'Model/StudentLoader.php';
require 'Model/Auth.php';

$isAuthenticated = false;
if (isset($_SESSION['isAuthenticated']) && $_SESSION['isAuthenticated']) {
    $isAuthenticated = true;
}

if (isset($_GET['user'])) {
    // Profile HTML
    require 'Controller/ProfileController.php';
    $profileController = new ProfileController();
    $profileController->render();
}else if (isset($_GET['page'])) {
    if ($_GET['page'] === 'register') {
        // Register HTML form
        require 'Controller/RegisterController.php';
        $registerController = new RegisterController();
        $registerController->render();
    }elseif ($_GET['page'] === 'login') {
        // Login HTML form
        require 'Controller/LoginController.php';
        $loginController = new LoginController();
        $loginController->render();
    }
}elseif(isset($_GET['logout'])) {
    $auth = new Auth();
    $auth->logout();
}else {
    if (!$isAuthenticated) {
        Header("Location: ?page=login");
        die();
    }

    // Homepage HTML, shows a table listing all the Students
    require 'Controller/FrontController.php';
    $frontController = new FrontController();
    $frontController->render();
}