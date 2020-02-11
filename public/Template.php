<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> <?= $title?> </title>

    <meta name="description" content="Site du photographe Stefano G Bianchi">
    <meta name="author" content="Stefano G bianchi photographe, Paris">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap-4.4.1-dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="/public/faw/css/all.min.css"/>
    <link href="/public/css/starter-template.css" rel="stylesheet">
</head>

<body>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <?php if(isset($_SESSION['id']) && $_SESSION['role'] = 1){?>
                <a class="navbar-brand" href="/adminHomePage">Stefano G Bianchi</a>
            <?php } else {?>
                <a class="navbar-brand" href="/home">STEFANO G BIANCHI</a>
            <?php }?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">ACCUEIL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/expos">ACTUALITES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/series">TRAVAUX</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Bio">A PROPOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">CONTACT</a>
                    </li>

                    <?php if(isset($_SESSION['id']) && $_SESSION['role'] = 1){ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/adminHomePage">ADMIN</a>
                        </li>
                    <?php }
                    elseif (isset($_SESSION['id']) && $_SESSION['role'] = 0)
                    { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/disconnect"><i class="fas fa-power-off"></i></a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </nav>

    </header>

    <?= $content ?>

    <footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="/public/css/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
        <script src="/public/js/slider.js"></script>
        <script src="/public/js/ajaxTest.js"></script>
        <script src="/public/js/main.js"></script>
        <p> Copyright © Etienne Juffard - 2019 - Campo d'Ombra - Stefano Bianchi - tous droits réservés </p>
    </footer>

</body>
</html>
