<?php
    require_once 'config.php';
    require_once './classes/User.php';
    $user = new User(); 
    $isLogged = $user->isLogged();
?>



<html lang="en">
    <head>
        <title>Login/Register System PHP</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        /> 
</head>
    <body>



    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Stane034's Github</a>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <form class="d-flex my-2 my-lg-0">
                    <ul class="navbar-nav me-auto mt-3 mt-lg-0" style="position: absolute; bottom: 1vh; right: 5vh;">
                        <?php if (!$isLogged) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./register.php" aria-current="page">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./login.php">Login</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./logout.php">Logout</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </form>
            </div>
        </div>
    </nav>
