<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> <?= $title?> </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif] -->
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
            <a class="navbar-brand" href="/adminHomePage">STEFANO G BIANCHI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">ACCUEIL <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">ACTUALITES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/series">TRAVAUX</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Bio">A PROPOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">CONTACT</a>
                    </li>

                    <?php if(isset($_SESSION['id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/adminHomePage">ADMIN</a>
                        </li>
                    <?php endif; ?>
                    
                </ul>
            </div>
        </nav>

        <!-- <div class="menu_ham">
        <span></span>
    </div>

    <div class="menu_top">

    <div id="name">
    <p>
    <a href="/UploadImg"> STEFANO G BIANCHI </a>
</p>
</div>

<div class="menu nav">
<a href="/home"> ACCUEIL</a>
<a href="/">ACTUALITES</a>
<a href="/series">TRAVAUX</a>
<a href="/Bio">A PROPOS</a>
<a href="/home">CONTACT</a>
<a href="/adminHomePage">ADMIN</a>
</div>

</div> -->

</header>

<?= $content ?>

<footer>
    <!-- <script src="/public/js/transitions.js"></script> -->
    <script src="/public/css/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    <script src="/public/js/ajax.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <p> Copyright © Etienne Juffard - 2019 - Campo d'Ombra - Stefano Bianchi - tous droits réservés </p>
</footer>

</body>
</html>
