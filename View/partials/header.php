<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Mysql Introduction</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        .form-error-message {color: red;}
    </style>
</head>
<body>
    <header id="main-header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>

                        <?php
                        if (isset($_SESSION['isAuthenticated']) && $_SESSION['isAuthenticated']) {
                            echo "
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"?logout\">Logout</a>
                                </li>
                            ";
                        }else {
                            echo "
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"?page=register\">Register</a>
                                </li>
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"?page=login\">Login</a>
                                </li>
                            ";
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>